<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/model/db.users.php";

$inscrit = false;
$msg="";

// recuperation des donnees GET, POST, et SESSION
if(isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['password2'])){
   $lastName = $_POST["lastName"];
    $firstName = $_POST["firstName"];
    $mail = $_POST["mail"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    if($password == $password2){
        $return = addUser($lastName, $firstName, $mail, $password);
        if($return) {
            $inscrit = true;
        } else{
            $msg = 'L\'utilisateur n\'a pas été enregistre' ;
            echo "<br><br><br><br>$msg";
        }
    } else{
        $msg = 'Renseigner tous les champs' ;
        echo "<br><br><br><br>$msg";
    }
}

if($inscrit){
    $title = "Connexion";
    include "$racine/controller/profil.php";
} else {
    $title = "Inscription";
    include "$racine/view/viewConnexion.php";
    include "$racine/view/layout.php";
}
