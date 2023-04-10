<?php
// Vérification si le fichier est appelé directement
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

// Inclusion du fichier d'authentification
include_once "$racine/model/authentification.php";

// Déconnexion de l'utilisateur actuel
logout();

// Titre de la page
$titre = "HuberEat | Connexion";

// Redirection vers la page d'accueil
header("Location: ./?action=home");

// Inclusion du script de contrôleur de la page d'accueil
include "$racine/controller/home.php";
