<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/model/db.users.php";
include_once "$racine/model/db.resto.php";

$mailU = getMailULoggedOn();
$util = getUserByMail($mailU);
$userType = $util["typeU"];

$idR = $_GET["idR"];
$unResto = getRestoById($idR);
$nomR = $unResto["nameR"];
$photoR = $unResto["imgR"];
$mailRestaurateur = $unResto["ownerR"];

$addressResto = getAddressRestoById($idR);
$villeR = $addressResto["cityA"];
$paysR = $addressResto["countryA"];

$lesPlats = getPlatByrestoR($idR);

if ($userType == 3){
    $title = "HuberEat | " . $unResto['nameR'];
    include "$racine/view/viewAfficherResto.php";
    include "$racine/view/layoutAdmin.php";
} else {
    $title = "HuberEat | " . $unResto['nameR'];
    include "$racine/view/viewAfficherResto.php";
    include "$racine/view/layout.php";
}

