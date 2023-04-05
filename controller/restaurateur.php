<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/model/db.resto.php";
include_once "$racine/model/db.users.php";

$userType = 1;
$lesUsersType = getUsersByType($userType);
$lesRestos = [];

foreach ($lesUsersType as $user) {
    $idR = $user['nameR'];
    $resto = getRestoByMail($idR);
    if (!empty($resto)) {
        $lesRestos[$idR] = $resto;
    }
}

$title = "HuberEat | Restaurateur";
include "$racine/view/viewRestaurateur.php";
include "$racine/view/layout.php";
?>
