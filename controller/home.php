<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/model/db.resto.php";

    $lesRestos = getResto();
    $title = "HuberEat | Accueil";
    include "$racine/view/viewHome.php";
    include "$racine/view/layout.php";
?>
