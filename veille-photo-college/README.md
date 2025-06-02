# Veille photo Collège

Application web permettant la gestion et le suivi des photos au sein du collège. Cette application fait partie de la suite d'outils disponible via le hub principal.

## Description

Cette application web PHP permet de :
- Télécharger des photos avec une description courte (60 caractères max)
- Renommer automatiquement les fichiers en fonction de la description (sans caractères spéciaux)
- Visualiser les photos dans une galerie responsive
- Télécharger les photos (individuellement ou en groupe)
- Supprimer les photos (individuellement ou en groupe)
- Interface optimisée pour smartphone

## Prérequis

- PHP 7.4 ou supérieur
- MySQL/MariaDB
- Serveur web (Apache, Nginx, etc.)
- Extensions PHP requises :
  - PDO
  - PDO_MySQL
  - GD ou Imagick

## Installation

1. Placez les fichiers dans votre répertoire web
2. Configurez la base de données dans `config.php` :
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'veille_photo_college');
   define('DB_USER', 'votre_utilisateur');
   define('DB_PASS', 'votre_mot_de_passe');
   ```
3. Exécutez le script d'initialisation :
   ```
   php init_db.php
   ```
4. Assurez-vous que le dossier `uploads/` est créé et accessible en écriture
5. Connectez-vous avec les identifiants par défaut :
   - Utilisateur : admin
   - Mot de passe : admin123
   
**Important** : Changez le mot de passe par défaut après la première connexion !

## Structure des fichiers

- `index.php` - Page d'accueil
- `login.php` - Page de connexion
- `upload.php` - Page de téléchargement des photos
- `gallery.php` - Galerie et gestion des photos
- `config.php` - Configuration de l'application
- `init_db.php` - Script d'initialisation de la base de données
- `style.css` - Styles de l'application
- `uploads/` - Dossier de stockage des photos

## Sécurité

- Les mots de passe sont hashés avec password_hash()
- Protection contre les injections SQL avec PDO
- Validation des types de fichiers
- Limitation de la taille des fichiers
- Authentification requise pour toutes les opérations

## Développement

L'application est conçue pour être simple à utiliser et à maintenir. Le code est organisé de manière modulaire et commenté pour faciliter les modifications futures.

## Intégration avec le Hub

L'application est accessible depuis le hub principal (/outils/index.html) et utilise une charte graphique cohérente avec les autres outils, tout en conservant son identité propre.

## Notes techniques

- Design responsive optimisé pour mobile
- Interface utilisateur moderne avec animations fluides
- Gestion efficace des photos avec prévisualisation
- Messages d'état clairs et visibles
