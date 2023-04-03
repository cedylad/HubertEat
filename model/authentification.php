<?php

include_once "db.users.php";

function login($mailU, $passwordUser){
    if(!isset($_SESSION)){
        session_start();
    }
    $user = getUserByMail($mailU);
    $passwordDB = $user['passwordU'];

    if (trim($passwordDB) == trim(crypt($passwordUser, $passwordDB))){
        $_SESSION['mailU'] = $mailU;
        $_SESSION['passwordU'] = $passwordDB;
    }
}


function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["mailU"]);
    unset($_SESSION["passwordU"]);
}

function getMailULoggedOn(){
    if (isLoggedOn()){
        $ret = $_SESSION["mailU"];
    }
    else {
        $ret = "";
    }
    return $ret;
        
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["mailU"])) {
        $utilisateur = getUserByMail($_SESSION["mailU"]);
        if ($utilisateur["mailU"] == $_SESSION["mailU"] && $utilisateur["passwordU"] == $_SESSION["passwordU"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}


if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');


    // test de connexion
    login("test@bts.sio", "sio");
    if (isLoggedOn()) {
        echo "logged";
    } else {
        echo "not logged";
    }

    // deconnexion
    logout();
}
?>