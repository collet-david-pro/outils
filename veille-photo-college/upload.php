<?php
require_once 'config.php';
requireLogin();

$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['photo']) && isset($_POST['description'])) {
        $photo = $_FILES['photo'];
        $description = trim($_POST['description']);

        // Vérifications de base
        if (empty($description)) {
            $message = "La description est obligatoire";
            $messageType = "danger";
        } elseif (strlen($description) > MAX_DESCRIPTION_LENGTH) {
            $message = "La description ne doit pas dépasser " . MAX_DESCRIPTION_LENGTH . " caractères";
            $messageType = "danger";
        } elseif ($photo['error'] !== UPLOAD_ERR_OK) {
            $message = "Erreur lors du téléchargement du fichier";
            $messageType = "danger";
        } else {
            // Vérification du type de fichier
            $fileInfo = pathinfo($photo['name']);
            $extension = strtolower($fileInfo['extension']);
            
            if (!in_array($extension, ALLOWED_TYPES)) {
                $message = "Type de fichier non autorisé. Types acceptés : " . implode(', ', ALLOWED_TYPES);
                $messageType = "danger";
            } elseif ($photo['size'] > MAX_FILE_SIZE) {
                $message = "Le fichier est trop volumineux (max " . (MAX_FILE_SIZE / 1024 / 1024) . "MB)";
                $messageType = "danger";
            } else {
                try {
                    // Création du nom de fichier basé sur la description
                    $newFilename = sanitizeFilename($description) . '_' . time() . '.' . $extension;
                    
                    // Création du dossier uploads s'il n'existe pas
                    if (!file_exists(UPLOAD_DIR)) {
                        mkdir(UPLOAD_DIR, 0777, true);
                    }

                    // Déplacement du fichier
                    $destination = UPLOAD_DIR . $newFilename;
                    if (move_uploaded_file($photo['tmp_name'], $destination)) {
                        // Enregistrement dans la base de données
                        $pdo = getDBConnection();
                        $stmt = $pdo->prepare("INSERT INTO photos (filename, original_filename, description, file_path, file_size, mime_type) VALUES (?, ?, ?, ?, ?, ?)");
                        $stmt->execute([
                            $newFilename,
                            $photo['name'],
                            $description,
                            $destination,
                            $photo['size'],
                            $photo['type']
                        ]);

                        $message = "Photo téléchargée avec succès";
                        $messageType = "success";
                    } else {
                        $message = "Erreur lors du déplacement du fichier";
                        $messageType = "danger";
                    }
                } catch (PDOException $e) {
                    $message = "Erreur lors de l'enregistrement dans la base de données";
                    $messageType = "danger";
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Télécharger une photo - Veille photo Collège</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <div class="container">
            <h1>Télécharger une photo</h1>
        </div>
    </div>

    <div class="container">
        <a href="index.php" class="btn btn-primary" style="margin-bottom: 1rem;">
            ← Retour à l'accueil
        </a>

        <?php if ($message): ?>
            <div class="alert alert-<?php echo $messageType; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <div class="upload-form">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="photo">Sélectionner une photo :</label>
                    <input type="file" id="photo" name="photo" class="form-control" accept=".jpg,.jpeg,.png,.gif" required>
                    <small>Types acceptés : JPG, JPEG, PNG, GIF (max <?php echo MAX_FILE_SIZE / 1024 / 1024; ?>MB)</small>
                </div>

                <div class="form-group">
                    <label for="description">Description (<?php echo MAX_DESCRIPTION_LENGTH; ?> caractères max) :</label>
                    <input type="text" id="description" name="description" class="form-control" 
                           maxlength="<?php echo MAX_DESCRIPTION_LENGTH; ?>" required>
                    <div id="charCount">0/<?php echo MAX_DESCRIPTION_LENGTH; ?> caractères</div>
                </div>

                <button type="submit" class="btn btn-primary">Télécharger la photo</button>
            </form>
        </div>
    </div>

    <script>
    // Mise à jour du compteur de caractères
    const descInput = document.getElementById('description');
    const charCount = document.getElementById('charCount');
    const maxLength = <?php echo MAX_DESCRIPTION_LENGTH; ?>;

    descInput.addEventListener('input', function() {
        const remaining = this.value.length;
        charCount.textContent = `${remaining}/${maxLength} caractères`;
    });

    // Prévisualisation de l'image
    document.getElementById('photo').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                let preview = document.getElementById('preview');
                if (!preview) {
                    preview = document.createElement('img');
                    preview.id = 'preview';
                    preview.style.maxWidth = '300px';
                    preview.style.marginTop = '10px';
                    document.querySelector('.upload-form').appendChild(preview);
                }
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
    </script>
</body>
</html>
