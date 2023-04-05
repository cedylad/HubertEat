<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/model/db.users.php";
include_once "$racine/model/db.resto.php";

$mailU = getMailULoggedOn();
$util = getUserByMail($mailU);

$idR = $_GET["idR"];
$unResto = getRestoById($idR);
$nomR = $unResto["nameR"];
$photoR = $unResto["imgR"];

$addressResto = getAddressRestoById($idR);
$villeR = $addressResto["cityA"];
$paysR = $addressResto["countryA"];

$title = "HuberEat | " . $unResto['nameR'];
include "$racine/view/viewAfficherResto.php";
include "$racine/view/layout.php";

