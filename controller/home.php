<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/model/db.resto.php";

$mailActif = getMailULoggedOn();
$admin = isset($mailActif["typeU"]) ? $mailActif["typeU"] : 0;

if ($admin == 3) {
    include "$racine/controller/admin.php";
} else {
    $lesRestos = getResto();
    $title = "HuberEat | Accueil";
    include "$racine/view/viewHome.php";
    include "$racine/view/layout.php";
}
