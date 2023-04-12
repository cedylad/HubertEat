<?php 
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/model/db.users.php";
include_once "$racine/model/db.resto.php";

// Vérifier si l'utilisateur est connecté et si l'adresse email est fournie en paramètre
if (isLoggedOn() && isset($_GET['mailU'])) {
    $mailU = $_GET['mailU'];
    $utilisateur = getUserByMail($mailU);

    // Si l'utilisateur existe
    if (isset($utilisateur)) {
        $userType = $utilisateur["typeU"];
        
        // Supprimer les restaurants associés à l'utilisateur
        $restos = getRestoByMail($mailU);
        foreach ($restos as $resto) {
            // Supprimer les plats associés au restaurant
            $plats = getPlatByrestoR($resto['idR']);
            foreach ($plats as $plat) {
                deletePlat($plat['idP']);
            }
            deleteResto($resto['idR']);
        }
        //Changer l'utilisateur en Client 
        changeTypeUserOnClient($mailU);

        // Rediriger vers la page d'administration si l'utilisateur est un administrateur
        if ($userType == 3) {
            header("Location: ./?action=admin");
            include "$racine/controller/admin.php";
        // Rediriger vers la page de profil si l'utilisateur est un client
        } elseif ($userType == 1) {
            header("Location: ./?action=profil");
        }
        // Terminer l'exécution du script
        exit();
    }
} else {
    // Définir le titre de la page en cas d'erreur
    $title = "Error";
}