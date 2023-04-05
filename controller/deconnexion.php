<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/model/authentification.php";

logout();

                

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Connexion";
header("Location: ./?action=home");
include "$racine/controller/home.php";

?>
