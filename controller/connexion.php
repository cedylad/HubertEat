<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/model/authentification.php";

// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["mailU"]) && isset($_POST["passwordU"])){
    $mailU=$_POST["mailU"];
    $passwordU=$_POST["passwordU"];
}
else
{
    $mailU="";
    $passwordU= "";
}

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


// traitement si necessaire des donnees recuperees
login($mailU,$passwordU);

if (isLoggedOn()){
    $admin = getUserByMail($mailU);
    $userType = $admin["typeU"];

    if($userType == 3){
        header("Location: ./?action=admin");
        include "$racine/controller/admin.php";

    } if($userType == 1 || $userType == 2){
    header("Location: ./?action=profil");
    include "$racine/controller/profil.php";
    }
}
else{ // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    // appel du script de vue 
    $title = "HuberEat | Connexion";
    include "$racine/view/viewConnexion.php";
    include "$racine/view/layout.php";
}

?>
