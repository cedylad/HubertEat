<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/model/db.resto.php";

$commande = false;
$msg="";

    if (isLoggedOn()) {
        
        $mailU = getMailULoggedOn();
        $idP = $_GET['idP']; // Récupération de l'id du plat courant depuis l'URL

        $return = commanderPlat($idP, $mailU);
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
    exit();
} else {
    $title = "HuberEat | Ajout plat";
    include "$racine/view/viewcommande.php";
    include "$racine/view/layout.php";
}
