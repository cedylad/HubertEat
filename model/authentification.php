<?php
// Inclusion du fichier contenant les fonctions de gestion des utilisateurs
include_once "db.users.php";

// Fonction de connexion d'un utilisateur
function login($mailU, $passwordUser){

    // Vérification de l'existence de la session, sinon on la démarre
    if(!isset($_SESSION)){
        session_start();
    }

    // Récupération de l'utilisateur en utilisant son adresse mail
    $user = getUserByMail($mailU);

    // Récupération du mot de passe haché de l'utilisateur depuis la base de données
    $passwordDB = $user['passwordU'];

    // Vérification de la correspondance entre le mot de passe entré par l'utilisateur et le mot de passe haché stocké en base de données
    if (trim($passwordDB) == trim(crypt($passwordUser, $passwordDB))){

        // Si la vérification est réussie, on initialise les variables de session
        $_SESSION['mailU'] = $mailU;
        $_SESSION['passwordU'] = $passwordDB;
    }
}

// Fonction de déconnexion d'un utilisateur
function logout() {

    // Vérification de l'existence de la session, sinon on la démarre
    if (!isset($_SESSION)) {
        session_start();
    }

    // Suppression des variables de session correspondant à l'utilisateur connecté
    unset($_SESSION["mailU"]);
    unset($_SESSION["passwordU"]);
}

// Fonction renvoyant l'adresse mail de l'utilisateur connecté
function getMailULoggedOn(){

    // Vérification que l'utilisateur est connecté
    if (isLoggedOn()){
        $ret = $_SESSION["mailU"];
    }
    else {
        $ret = "";
    }
    return $ret; 
}

// Fonction indiquant si un utilisateur est connecté ou non
function isLoggedOn() {

    // Vérification de l'existence de la session, sinon on la démarre
    if (!isset($_SESSION)) {
        session_start();
    }

    // Initialisation de la variable de retour
    $ret = false;

    // Vérification de l'existence des variables de session correspondant à l'utilisateur connecté
    if (isset($_SESSION["mailU"])) {

        // Récupération de l'utilisateur correspondant à l'adresse mail stockée en session
        $utilisateur = getUserByMail($_SESSION["mailU"]);

        // Vérification de la correspondance entre les variables de session et l'utilisateur récupéré
        if ($utilisateur["mailU"] == $_SESSION["mailU"] && $utilisateur["passwordU"] == $_SESSION["passwordU"]) {
            $ret = true;
        }
    }
    return $ret;
}