<?php
require_once 'config.php';

// Détruire toutes les données de session
session_destroy();

// Rediriger vers la page de connexion
header('Location: login.php');
exit;
?>
