<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/model/db.resto.php";
include_once "$racine/model/db.users.php";

// Récupération de tous les utilisateurs ayant le type 1 (restaurateur)
$userType = 1;
$lesUsersType = getUsersByType($userType);
$lesRestos = [];

// Parcours de tous les utilisateurs restaurateurs
foreach ($lesUsersType as $user) {
    $idR = $user['nameR'];
    $resto = getRestoByMail($idR);
    if (!empty($resto)) {
        // Si le restaurant existe, on l'ajoute au tableau des restaurants
        $lesRestos[$idR] = $resto;
    }
}

$title = "HuberEat | Restaurateur";
include "$racine/view/viewRestaurateur.php";
include "$racine/view/layout.php";