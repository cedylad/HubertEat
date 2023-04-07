<?php
include_once "$racine/model/db.users.php";
include_once "$racine/model/db.resto.php";

function controller($action) {
    $lesActions = array(
        "defaut" => "home.php",
        "home" => "home.php",
        "connexion" => "connexion.php",
        "inscription" => "inscription.php",
        "deconnexion" => "deconnexion.php",
        "profil" => "profil.php",
        "afficherResto" => "afficherResto.php",
        "ajoutResto" => "ajoutResto.php",
        "deleteResto" => "deleteResto.php",
        "restaurateur" => "restaurateur.php",
        "ajoutPlat" => "ajoutPlat.php",
        "deletePlat" => "deletePlat.php"
    );

    if (isLoggedOn()) {
        $mail = getMailULoggedOn();
        $restosbymail = getRestoByMail($mail);
        $utilisateur = getUserByMail($mail);
        $typeU = $utilisateur["typeU"];

        if($typeU == 1 || $typeU == 2 || $typeU == NULL){
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
        }

        if($typeU == 3){
            /* PARTIE ADMIN */
            $lesActions["defaut"] = "admin.php";
            $lesActions["home"] = "admin.php";
            $lesActions["resturant"] = "admin.php";
            $lesActions["connexion"] = "admin.php";
            $lesActions["inscription"] = "admin.php";
            $lesActions["profil"] = "admin.php";
            $lesActions["ajoutResto"] = "admin.php";
            $lesActions["deleteResto"] = "admin.php";
            $lesActions["restaurateur"] = "admin.php";
            $lesActions["ajoutPlat"] = "admin.php";
            $lesActions["deletePlat"] = "admin.php";
        }
    }

    if (isset($lesActions[$action])) {
        return $lesActions[$action];
    } 
    else {
        return $lesActions["defaut"];
    }
}

