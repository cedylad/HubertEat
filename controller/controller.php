<?php
include_once "$racine/model/db.users.php";
include_once "$racine/model/db.resto.php";

function controller($action) {

    // Tableau associatif contenant toutes les actions disponibles et leur correspondance avec un fichier de vue
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
        "deletePlat" => "deletePlat.php",
        "commanderPlat" => "commanderPlat.php",
        "validerCommande" => "validerCommande.php",
        "refuserCommande" => "refuserCommande.php",
        "ajoutSolde" => "ajoutSolde.php",
        "annulerCommande" => "annulerCommande.php",
        "deleteUser" => "deleteUser.php",
        "typeUserOnAdmin" => "typeUserOnAdmin.php",
        "typeUserOnClient" => "typeUserOnClient.php",
        "typeUserOnRestaurant" => "typeUserOnRestaurateur.php",
    );

    // Si un utilisateur est connecté
    if (isLoggedOn()) {
        $mail = getMailULoggedOn();
        $restosbymail = getRestoByMail($mail);
        $utilisateur = getUserByMail($mail);
        $typeU = $utilisateur["typeU"];

        // Si l'utilisateur est un client ou un restaurateur
        if($typeU == 1 || $typeU == 2 || $typeU == NULL){

            // On définit les actions autorisées pour ces utilisateurs
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
            $lesActions["refuserCommande"] =  "refuserCommande.php";
            $lesActions["ajoutSolde"] = "ajoutSolde.php";
            $lesActions["annulerCommande"] = "annulerCommande.php";
        }

        // Si l'utilisateur est un administrateur
        if($typeU == 3){
            // On définit les actions autorisées pour l'administrateur
            $lesActions["defaut"] = "admin.php";
            $lesActions["home"] = "admin.php";
            $lesActions["resturant"] = "admin.php";
            $lesActions["connexion"] = "admin.php";
            $lesActions["inscription"] = "admin.php";
            $lesActions["profil"] = "admin.php";
            $lesActions["deletePlat"] = "deletePlat.php";
            $lesActions["deleteResto"] = "deleteResto.php";
            $lesActions["deleteUser"] = "deleteUser.php";
            $lesActions["typeUserOnAdmin"] = "typeUserOnAdmin.php";
            $lesActions["typeUserOnClient"] = "typeUserOnClient.php";
            $lesActions["typeUserOnRestaurateur"] = "typeUserOnRestaurateur.php";
        }
    }

    if (isset($lesActions[$action])) {
        return $lesActions[$action];
    } 
    else {
        return $lesActions["defaut"];
    }
}

