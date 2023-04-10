<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/model/db.resto.php";

$commande = false;
$msg="";

// Vérifie si un utilisateur est connecté
if (isLoggedOn()) {
    $mailU = getMailULoggedOn(); // Récupère l'email de l'utilisateur connecté
    $idP = $_GET['idP'];
    $prixPlat = getPrixPlatById($idP);
    $prix = $prixPlat['prixP'];

    $return = commanderPlat($idP, $mailU, $prix);
    if($return) {
        $commande = true;
    } else {
        $msg = 'Erreur lors de l\'ajout du plat';
    }
} else {
    header("Location: ./?action=connexion"); 
}   

if($commande){
    header("Location: ./?action=profil");
    exit(); // Arrête l'exécution du script
} else {
    $title = "HuberEat | Erreur";
    include "$racine/view/viewcommande.php";
    include "$racine/view/layout.php";
}