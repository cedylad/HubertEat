<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/model/db.users.php";
include_once "$racine/model/db.resto.php";

if (isLoggedOn()) {
    // Récupération des données de l'utilisateur connecté
    $mail = getMailULoggedOn();
    $restosbymail = getRestoByMail($mail);
    $utilisateur = getUserByMail($mail);
    $commandeClient = getCommandeByMailU($mail);
    $lesCommandes = getCommandeByLivraison();

    // Récupération des informations nécessaires pour afficher le profil de l'utilisateur
    $boutonAjoutResto = $utilisateur["typeU"];
    $prenom = $utilisateur["firstNameU"];
    $nom = $utilisateur["lastNameU"];
    $solde = $utilisateur["soldeU"];

    // Affichage de la page de profil de l'utilisateur selon son type d'utilisateur
    if ($boutonAjoutResto == 1 || $boutonAjoutResto == 2) {
        $title = "HuberEat | Profil";
        include "$racine/view/viewProfil.php";
        include "$racine/view/layout.php";
    }

    // Redirection vers la page d'administration si l'utilisateur est de type administrateur
    if ($boutonAjoutResto == 3) {
        header("Location: ./?action=admin");
        include "$racine/controller/admin.php";
    }
} else {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    $title = "HuberEeat | Connexion";
    include "$racine/controller/connexion.php";
}