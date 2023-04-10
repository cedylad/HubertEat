<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/model/db.users.php";
include_once "$racine/model/db.resto.php";

if (isLoggedOn()) {
    $idR = $_GET['idR'];
    $idP = $_GET['idP'];
    $mail = getMailULoggedOn();
    $restosbymail = getRestoByMail($mail);
    $utilisateur = getUserByMail($mail);

    $userType = $utilisateur["typeU"];
    
    if (isset($idP)){
        deletePlat($idP);
        if($userType == 3){ // Si l'utilisateur est un administrateur
            header("Location: ./?action=admin");
            include "$racine/controller/admin.php";
        } 
        if (($userType == 1)) { // Si l'utilisateur est un restaurateur
            header("Location: ./?action=profil"); // Redirige vers la page de profil
            exit(); // Arrête l'exécution du script
        }
    }
} else { // Si l'utilisateur n'est pas connecté
    $boutonAjoutResto = $utilisateur["typeU"]; // Bouton d'ajout de restaurant
    $prenom = $utilisateur["firstNameU"]; // Prénom de l'utilisateur
    $nom = $utilisateur["lastNameU"]; // Nom de l'utilisateur
    
    $title = "HuberEat | Mon profil";
    include "$racine/view/viewProfil.php";
    include "$racine/view/layout.php";
}