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
    $lesActions["ajoutResto"] = "ajoutResto.php";
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
