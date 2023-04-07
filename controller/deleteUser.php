<?php 
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/model/db.users.php";
include_once "$racine/model/db.resto.php";

if (isLoggedOn() && isset($_GET['mailU'])) {
    $mailU = $_GET['mailU'];
    $utilisateur = getUserByMail($mailU);

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

        deleteUser($mailU);

        if ($userType == 3) {
            header("Location: ./?action=admin");
        } elseif ($userType == 1) {
            header("Location: ./?action=profil");
        }
        exit();
    }
} else {
    $title = "Error";
}
