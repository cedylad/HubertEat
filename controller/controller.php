<?php

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["defaut"] = "home.php";
    $lesActions["home"] = "home.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["inscription"] = "inscription.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["profil"] = "profil.php";
    $lesActions["afficherResto"] = "afficherResto.php";
    $lesActions["modifierProfil"] = "modifierProfil.php";
    $lesActions["modifierNom"] = "modifierNom.php";
    $lesActions["modifierPrenom"] = "modifierPrenom.php";
    $lesActions["modifierAdresse"] = "modifierAdresse.php";
    $lesActions["deleteProfil"] = "deleteProfil.php";
    $lesActions["detailResto"] = "detailResto.php";
    $lesActions["critiquesResto"] = "critiquesResto.php";
    $lesActions["desactiverCom"] = "desactiverCom.php";
    $lesActions["activerCom"] = "activerCom.php";
    $lesActions["ajoutPlat"] = "ajoutPlat.php";
        /**
    * ----------------------------------------------------------------------------------------
    * Admin */
    $lesActions["detailUtil"] = "detailUtil.php";
    $lesActions["rechercheUtil"] = "rechercheUtil.php";
    
    
    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } 
    else {
        return $lesActions["defaut"];
    }
}

?>
