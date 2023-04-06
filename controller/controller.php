<?php

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["defaut"] = "home.php";
    $lesActions["home"] = "home.php";
    $lesActions["resturant"] = "home.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["inscription"] = "inscription.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["profil"] = "profil.php";
    $lesActions["afficherResto"] = "afficherResto.php";
    $lesActions["ajoutResto"] = "ajoutResto.php";
    $lesActions["deleteResto"] = "deleteResto.php";
    $lesActions["restaurateur"] = "restaurateur.php";
    $lesActions["ajoutPlat"] = "ajoutPlat.php";
    $lesActions["deletePlat"] = "deletePlat.php";

    /* PARTIE ADMIN */
    $lesActions["admin"] = "admin.php";
    
    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } 
    else {
        return $lesActions["defaut"];
    }
}

?>
