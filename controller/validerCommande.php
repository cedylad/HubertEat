<?php
// Vérifie si le script courant est égal à ce fichier
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/model/db.users.php";
include_once "$racine/model/db.resto.php";

if (isLoggedOn()) {
   
    // Récupère l'ID de la commande à valider depuis les paramètres de l'URL
    $idC = $_GET["idC"];
    if(isset($idC)){
        // Valide la commande
        validerCommande($idC);
        header("Location: ./?action=profil");
        include "$racine/controller/profil.php";
    }
}