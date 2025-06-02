<?php
require_once 'config.php';

try {
    // Connexion au serveur MySQL sans sélectionner la base de données
    $pdo = new PDO(
        "mysql:host=" . DB_HOST,
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    // Création de la base de données si elle n'existe pas
    $sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME . " CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
    $pdo->exec($sql);
    echo "Base de données créée avec succès.\n";

    // Sélection de la base de données
    $pdo->exec("USE " . DB_NAME);

    // Création de la table des utilisateurs
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB";
    $pdo->exec($sql);
    echo "Table 'users' créée avec succès.\n";

    // Création de la table des photos
    $sql = "CREATE TABLE IF NOT EXISTS photos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255) NOT NULL,
        original_filename VARCHAR(255) NOT NULL,
        description VARCHAR(60) NOT NULL,
        file_path VARCHAR(255) NOT NULL,
        upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        file_size INT NOT NULL,
        mime_type VARCHAR(50) NOT NULL
    ) ENGINE=InnoDB";
    $pdo->exec($sql);
    echo "Table 'photos' créée avec succès.\n";

    // Création du dossier uploads s'il n'existe pas
    if (!file_exists(UPLOAD_DIR)) {
        mkdir(UPLOAD_DIR, 0777, true);
        echo "Dossier 'uploads' créé avec succès.\n";
    }

    // Création d'un utilisateur par défaut si la table est vide
    $stmt = $pdo->query("SELECT COUNT(*) FROM users");
    if ($stmt->fetchColumn() == 0) {
        $username = "admin";
        $password = password_hash("admin123", PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $password]);
        echo "Utilisateur par défaut créé (username: admin, password: admin123).\n";
    }

    echo "\nInitialisation terminée avec succès !\n";
    echo "N'oubliez pas de changer le mot de passe par défaut après la première connexion.\n";

} catch (PDOException $e) {
    die("Erreur d'initialisation : " . $e->getMessage() . "\n");
}
?>
