<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/model/db.resto.php";

// Récupération de l'utilisateur connecté
$mailActif = getMailULoggedOn();

// Vérification si l'utilisateur est un administrateur
$admin = isset($mailActif["typeU"]) ? $mailActif["typeU"] : 0;

if ($admin == 3) {
    // Si l'utilisateur est un administrateur, on affiche la page d'administration
    include "$racine/controller/admin.php";
} else {
    // Si l'utilisateur n'est pas un administrateur, on affiche la page d'accueil
    $lesRestos = getResto();
    $title = "HuberEat | Restaurant";
    include "$racine/view/viewRestaurant.php";
    include "$racine/view/layout.php";
}