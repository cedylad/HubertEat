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
            if($userType == 3){
                header("Location: ./?action=admin");
                include "$racine/controller/admin.php";
            } if (($userType == 1)) {
                header("Location: ./?action=profil");
                exit();
            }
        }
}else {
$boutonAjoutResto = $utilisateur["typeU"];
$prenom = $utilisateur["firstNameU"];
$nom = $utilisateur["lastNameU"];
        
$title = "HuberEat | Mon profil";
include "$racine/view/viewProfil.php";
include "$racine/view/layout.php";
}
