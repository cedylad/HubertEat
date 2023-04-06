<?php
include "getRacine.php";
include "$racine/controller/controller.php";
include_once "$racine/model/authentification.php"; // pour pouvoir utiliser isLoggedOn()

/*Partie pour afficher les infos dans le menu deroulant */
if (isLoggedOn()) {
    $mail = getMailULoggedOn();
    $utilisateur = getUserByMail($mail);

    $prenom = $utilisateur["firstNameU"];
    $nom = $utilisateur["lastNameU"];
}

if (isset($_GET["action"])) {
    $action = $_GET["action"];
}
else {
    $action = "defaut";
}

$fichier = controleurPrincipal($action);
include "$racine/controller/$fichier";