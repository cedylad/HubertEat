<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/model/db.users.php";
include_once "$racine/model/db.resto.php";

// vérifie si l'utilisateur est connecté
if (isLoggedOn()) {
   
    // récupération de l'identifiant de commande dans la variable GET
    $idC = $_GET["idC"];

    // vérifie si l'identifiant de commande est défini
    if(isset($idC)){
        
        // appel de la fonction refuserCommande pour marquer la commande comme refusée
        refuserCommande($idC);

        // redirection vers la page de profil après avoir refusé la commande
        header("Location: ./?action=profil");

        // inclusion du contrôleur de profil
        include "$racine/controller/profil.php";
    }
}