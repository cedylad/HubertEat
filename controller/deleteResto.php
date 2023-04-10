<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
// inclure les fichiers contenant les fonctions de base de données
include_once "$racine/model/db.users.php";
include_once "$racine/model/db.resto.php";

if (isLoggedOn()) {
    $idR = $_GET['idR'];
    $mail = getMailULoggedOn();
    $restosbymail = getRestoByMail($mail);
    $utilisateur = getUserByMail($mail);

    $userType = $utilisateur["typeU"];
    
    if (isset($idR)){
        deleteResto($idR);
        // rediriger l'utilisateur vers la page d'administration ou le profil selon son type d'utilisateur
        if($userType == 3){
            header("Location: ./?action=admin");
            include "$racine/controller/admin.php";
        } else {
            header("Location: ./?action=profil");
            exit();
        }
    }
}

$boutonAjoutResto = $utilisateur["typeU"];
$prenom = $utilisateur["firstNameU"];
$nom = $utilisateur["lastNameU"];
        
$title = "HuberEat | Mon profil";
include "$racine/view/viewProfil.php";
include "$racine/view/layout.php";
