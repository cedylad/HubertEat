<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/model/db.users.php";

$ajoutResto = false; 
$msg = "";

// Récupération des données POST
if (isset($_POST['nomCarte']) && isset($_POST['numCarte']) && isset($_POST['dateCarte']) 
    && isset($_POST['secretCarte']) && isset($_POST['montantCarte'])) {
    
    // Récupère les valeurs des champs de formulaire et les stocke dans des variables
    $nomCarte = $_POST["nomCarte"];
    $numCarte = $_POST["numCarte"];
    $dateCarte = $_POST["dateCarte"];
    $secretCarte = $_POST["secretCarte"];
    $solde = $_POST["montantCarte"];

    // Vérifie si l'utilisateur est connecté
    if (isLoggedOn()) {
        $ownerR = $_SESSION["mailU"];

        $return = addSolde($solde, $ownerR);

        // Vérifie si l'ajout de solde a réussi
        if ($return) {
            $ajoutResto = true;
            header("Location: ./?action=profil");
        } else {
            $msg = 'Problème provenant de votre carte bancaire';
            header("Location: ./?action=ajoutSolde");
        }
    } 
}

if ($ajoutResto) {
    $title = "HuberEat | Profil";
    include "$racine/controller/profil.php";
} else {
    $title = "HuberEat | Ajout Solde";
    include "$racine/view/viewAjoutSolde.php";
    include "$racine/view/layout.php";
}
