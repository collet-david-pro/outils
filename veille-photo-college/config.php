<?php
// Configuration de la base de données pour Veille photo Collège

// Paramètres de connexion à la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'veille_photo_college');
define('DB_USER', 'root');
define('DB_PASS', '');

// Dossier de stockage des photos
define('UPLOAD_DIR', 'uploads/');

// Taille maximale des fichiers (en octets) - 5MB
define('MAX_FILE_SIZE', 5 * 1024 * 1024);

// Types de fichiers autorisés
define('ALLOWED_TYPES', ['jpg', 'jpeg', 'png', 'gif']);

// Longueur maximale de la description
define('MAX_DESCRIPTION_LENGTH', 60);

// Configuration des sessions
session_start();

// Fonction de connexion à la base de données
function getDBConnection() {
    try {
        $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
        return $pdo;
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}

// Fonction pour vérifier si l'utilisateur est connecté
function isLoggedIn() {
    return isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;
}

// Fonction pour rediriger vers la page de connexion
function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}

// Fonction pour nettoyer le nom de fichier
function sanitizeFilename($description) {
    // Supprimer les caractères spéciaux et espaces
    $clean = preg_replace('/[^a-zA-Z0-9\-_]/', '_', $description);
    // Supprimer les underscores multiples
    $clean = preg_replace('/_+/', '_', $clean);
    // Supprimer les underscores en début et fin
    $clean = trim($clean, '_');
    // Limiter la longueur
    return substr($clean, 0, 50);
}
?>
