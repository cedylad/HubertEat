<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/model/authentification.php";

// On vérifie la présence des données de connexion (mail et mot de passe) dans les variables POST
if (isset($_POST["mailU"]) && isset($_POST["passwordU"])){
    $mailU=$_POST["mailU"];
    $passwordU=$_POST["passwordU"];
}
else
{
    $mailU="";
    $passwordU= "";
}

// On appelle la fonction "login" du modèle d'authentification en lui passant le mail et le mot de passe récupérés
login($mailU,$passwordU);

// Si l'utilisateur est connecté, on redirige vers la page correspondante à son type d'utilisateur (admin ou client)
if (isLoggedOn()){
    // On récupère les informations de l'utilisateur connecté
    $admin = getUserByMail($mailU);
    $userType = $admin["typeU"];

    if($userType == 3){ // Si l'utilisateur est un administrateur, on redirige vers la page d'administration
        header("Location: ./?action=admin");
        include "$racine/controller/admin.php";

    } if($userType == 1 || $userType == 2){ // Si l'utilisateur est un client, on redirige vers sa page de profil
        header("Location: ./?action=profil");
        include "$racine/controller/profil.php";
    }
}
else{ // Si l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    $title = "HuberEat | Connexion";
    include "$racine/view/viewConnexion.php";
    include "$racine/view/layout.php";
}