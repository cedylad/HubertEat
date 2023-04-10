<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/model/db.users.php";

$inscrit = false;
$msg = "";

// Récupération des données envoyées par POST
if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['password2'])) {

    $lastName = $_POST["lastName"];
    $firstName = $_POST["firstName"];
    $mail = $_POST["mail"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    // Vérification si les mots de passe correspondent
    if ($password == $password2) {

        // Ajout de l'utilisateur à la base de données
        $return = addUser($lastName, $firstName, $mail, $password);

        if ($return) {
            // L'utilisateur a été ajouté avec succès
            $inscrit = true;
        } else {
            // Erreur lors de l'ajout de l'utilisateur
            $msg = 'L\'utilisateur n\'a pas été enregistré';
            echo "<br><br><br><br>$msg";
        }
    } else {
        // Les mots de passe ne correspondent pas
        $msg = 'Renseigner tous les champs';
        echo "<br><br><br><br>$msg";
    }
}

// Redirection vers la page de connexion si l'inscription a été effectuée avec succès
if ($inscrit) {
    header("Location: ./?action=connexion");
    $title = "Connexion";
    include "$racine/controller/connexion.php";
} else {
    // Affichage de la page d'inscription
    $title = "HuberEat | Inscription";
    include "$racine/view/viewInscription.php";
    include "$racine/view/layout.php";
}