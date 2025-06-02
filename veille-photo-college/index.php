<?php
require_once 'config.php';
requireLogin();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veille photo Collège</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <div class="container">
            <h1>Veille photo Collège</h1>
            <div style="float: right; color: white;">
                Connecté en tant que <?php echo htmlspecialchars($_SESSION['username']); ?> |
                <a href="logout.php" style="color: white; text-decoration: none;">Déconnexion</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="menu-buttons" style="margin: 2rem 0;">
            <a href="upload.php" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" style="vertical-align: text-top;">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                Ajouter des photos
            </a>
            <a href="gallery.php" class="btn btn-primary" style="margin-left: 1rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" style="vertical-align: text-top;">
                    <path d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H4z"/>
                    <path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-2zm0 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-2zm0 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-2z"/>
                </svg>
                Voir la galerie
            </a>
        </div>

        <div class="welcome-section">
            <h2>Bienvenue dans l'application de gestion des photos</h2>
            <p>Cette application vous permet de :</p>
            <ul style="margin: 1rem 0; padding-left: 2rem;">
                <li>Télécharger des photos avec une description courte (60 caractères maximum)</li>
                <li>Renommer automatiquement les fichiers en fonction de la description</li>
                <li>Visualiser toutes les photos dans une galerie</li>
                <li>Télécharger les photos individuellement ou en groupe</li>
                <li>Supprimer les photos non désirées</li>
            </ul>
            <p>Commencez par ajouter des photos ou consultez la galerie existante.</p>
        </div>
    </div>

    <script>
    // Vérification du support du navigateur pour les fonctionnalités modernes
    if (!('fetch' in window)) {
        alert('Votre navigateur est peut-être trop ancien pour certaines fonctionnalités. Veuillez le mettre à jour.');
    }
    </script>
</body>
</html>
