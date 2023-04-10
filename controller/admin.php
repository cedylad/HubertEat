<?php
// Vérifie si le fichier est appelé directement depuis le serveur
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = ".."; // définit la racine du projet
}

// Vérifie si l'utilisateur est connecté
if (isLoggedOn()) {
    $mailU = $_SESSION["mailU"]; // récupère l'email de l'utilisateur connecté
    $admin = getUserByMail($mailU); // récupère l'utilisateur correspondant à cet email
    $userType = $admin["typeU"]; // récupère le type de l'utilisateur

    // Si l'utilisateur est un administrateur (typeU = 3)
    if ($userType == 3) {
        include_once "$racine/model/db.resto.php";
        include_once "$racine/model/db.users.php";
        $lesUsers = getUsers();

        $title = "HuberEat | Administrateur";
        include "$racine/view/viewAdmin.php";
        include "$racine/view/layoutAdmin.php";
    }

    // Si l'utilisateur est un client ou un restaurateur (typeU = 1 ou 2)
    if ($userType == 1 || $userType == 2) {
        header("Location: ./?action=home");
        $title = "HuberEat | Home";
        include "$racine/controller/home.php";
    }
} else { // Si l'utilisateur n'est pas connecté
    header("Location: ./?action=connexion");
    $title = "HuberEat | Connexion";
    include "$racine/controller/connexion.php";
}

