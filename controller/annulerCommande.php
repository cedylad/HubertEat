<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = ".."; 
}

include_once "$racine/model/db.users.php";
include_once "$racine/model/db.resto.php";

if (isLoggedOn()) {
   
    $idC = $_GET["idC"]; 
    if(isset($idC)){ 
        annulerCommande($idC); 
        header("Location: ./?action=profil");
        include "$racine/controller/profil.php";
    }
}
