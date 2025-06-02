<?php
require_once 'config.php';
requireLogin();

$message = '';
$messageType = '';

// Gestion de la suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    try {
        $pdo = getDBConnection();
        $photoIds = is_array($_POST['photos']) ? $_POST['photos'] : [$_POST['photos']];
        
        // Récupérer les informations des fichiers à supprimer
        $stmt = $pdo->prepare("SELECT file_path FROM photos WHERE id = ?");
        
        foreach ($photoIds as $photoId) {
            $stmt->execute([$photoId]);
            $photo = $stmt->fetch();
            
            if ($photo && file_exists($photo['file_path'])) {
                unlink($photo['file_path']); // Suppression du fichier
            }
        }

        // Suppression des enregistrements dans la base de données
        $placeholders = str_repeat('?,', count($photoIds) - 1) . '?';
        $stmt = $pdo->prepare("DELETE FROM photos WHERE id IN ($placeholders)");
        $stmt->execute($photoIds);

        $message = "Photos supprimées avec succès";
        $messageType = "success";
    } catch (PDOException $e) {
        $message = "Erreur lors de la suppression des photos";
        $messageType = "danger";
    }
}

// Récupération des photos
try {
    $pdo = getDBConnection();
    $stmt = $pdo->query("SELECT * FROM photos ORDER BY upload_date DESC");
    $photos = $stmt->fetchAll();
} catch (PDOException $e) {
    $message = "Erreur lors de la récupération des photos";
    $messageType = "danger";
    $photos = [];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie - Veille photo Collège</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <div class="container">
            <h1>Galerie photos</h1>
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

        <form id="galleryForm" method="POST">
            <div class="gallery-controls" style="margin-bottom: 1rem;">
                <button type="button" class="btn btn-primary" onclick="selectAll()">Tout sélectionner</button>
                <button type="button" class="btn btn-primary" onclick="deselectAll()">Tout désélectionner</button>
                <button type="button" class="btn btn-primary" onclick="downloadSelected()">Télécharger la sélection</button>
                <button type="submit" name="delete" class="btn btn-danger" onclick="return confirmDelete()">
                    Supprimer la sélection
                </button>
            </div>

            <div class="gallery">
                <?php foreach ($photos as $photo): ?>
                    <div class="photo-item">
                        <label class="photo-container">
                            <input type="checkbox" name="photos[]" value="<?php echo $photo['id']; ?>" class="photo-checkbox">
                            <img src="<?php echo htmlspecialchars($photo['file_path']); ?>" 
                                 alt="<?php echo htmlspecialchars($photo['description']); ?>">
                            <div class="photo-description">
                                <?php echo htmlspecialchars($photo['description']); ?>
                            </div>
                        </label>
                    </div>
                <?php endforeach; ?>

                <?php if (empty($photos)): ?>
                    <p>Aucune photo n'a été téléchargée pour le moment.</p>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <script>
    function selectAll() {
        document.querySelectorAll('.photo-checkbox').forEach(cb => cb.checked = true);
    }

    function deselectAll() {
        document.querySelectorAll('.photo-checkbox').forEach(cb => cb.checked = false);
    }

    function confirmDelete() {
        const selectedCount = document.querySelectorAll('.photo-checkbox:checked').length;
        if (selectedCount === 0) {
            alert('Veuillez sélectionner au moins une photo à supprimer.');
            return false;
        }
        return confirm(`Êtes-vous sûr de vouloir supprimer ${selectedCount} photo(s) ?`);
    }

    function downloadSelected() {
        const selected = document.querySelectorAll('.photo-checkbox:checked');
        if (selected.length === 0) {
            alert('Veuillez sélectionner au moins une photo à télécharger.');
            return;
        }

        selected.forEach(checkbox => {
            const imgSrc = checkbox.closest('.photo-container').querySelector('img').src;
            const link = document.createElement('a');
            link.href = imgSrc;
            link.download = '';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    }
    </script>
</body>
</html>
