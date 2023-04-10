<?php
// Vérifie si le fichier est appelé directement depuis le serveur
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = ".."; // définit la racine du projet
}

// On inclut les fichiers contenant les fonctions de gestion des utilisateurs et des restaurants
include_once "$racine/model/db.users.php";
include_once "$racine/model/db.resto.php";

// On récupère le mail de l'utilisateur connecté
$mailU = getMailULoggedOn();

// On récupère les informations de l'utilisateur à partir de son mail
$util = getUserByMail($mailU);

// On récupère le type d'utilisateur (1 = client, 2 = livreur, 3 = administrateur)
$userType = $util["typeU"];

// On récupère l'identifiant du restaurant à afficher dans l'URL
$idR = $_GET["idR"];

// On récupère les informations du restaurant à partir de son identifiant
$unResto = getRestoById($idR);

// On récupère le nom et la photo du restaurant
$nomR = $unResto["nameR"];
$photoR = $unResto["imgR"];

// On récupère le mail du restaurateur
$mailRestaurateur = $unResto["ownerR"];

// On récupère l'adresse du restaurant
$addressResto = getAddressRestoById($idR);
$villeR = $addressResto["cityA"];
$paysR = $addressResto["countryA"];

// On récupère la liste des plats du restaurant
$lesPlats = getPlatByrestoR($idR);

// Si l'utilisateur est un administrateur, on inclut la vue et la mise en page pour un administrateur
if ($userType == 3){
    $title = "HuberEat | " . $unResto['nameR'];
    include "$racine/view/viewAfficherResto.php";
    include "$racine/view/layoutAdmin.php";
} 
// Sinon, on inclut la vue et la mise en page pour un client ou un livreur
else {
    $title = "HuberEat | " . $unResto['nameR'];
    include "$racine/view/viewAfficherResto.php";
    include "$racine/view/layout.php";
}

