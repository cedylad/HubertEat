<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

if (isLoggedOn()) {
    $mailU = $_SESSION["mailU"];
    $admin = getUserByMail($mailU);
    $userType = $admin["typeU"];

    if ($userType == 3) {
        include_once "$racine/model/db.resto.php";
        include_once "$racine/model/db.users.php";
        $lesUsers = getUsers();


        $title = "HuberEat | Administrateur";
        include "$racine/view/viewAdmin.php";
        include "$racine/view/layoutAdmin.php";
    }

    if ($userType == 1 || $userType == 2) {
        header("Location: ./?action=home");
        $title = "HuberEat | Home";
        include "$racine/controller/home.php";
    }
} else {
    header("Location: ./?action=connexion");
    $title = "HuberEat | Connexion";
    include "$racine/controller/connexion.php";
}
?>
