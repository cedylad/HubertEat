<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/model/db.users.php";
include_once "$racine/model/db.resto.php";

if (isLoggedOn()) {
    $mail = getMailULoggedOn();
    $restosbymail = getRestoByMail($mail);
    $utilisateur = getUserByMail($mail);
    
    
    $boutonAjoutResto = $utilisateur["typeU"];

    $prenom = $utilisateur["firstNameU"];
    $nom = $utilisateur["lastNameU"];
 
    $title = "HuberEat | Profil";
    include "$racine/view/viewProfil.php";
    include "$racine/view/layout.php";

} else {
    $title = "HuberEeat | Connexion";
    include "$racine/controller/connexion.php";
}

