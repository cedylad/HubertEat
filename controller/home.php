<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/model/db.resto.php";
if (isLoggedOn()) {
    $mail = getMailULoggedOn();
    $utilisateur = getUserByMail($mail);

    $prenom = $utilisateur["firstNameU"];
    $nom = $utilisateur["lastNameU"];
}

    $lesRestos = getResto();
    $title = "HuberEat | Accueil";
    include "$racine/view/viewHome.php";
    include "$racine/view/layout.php";
?>
