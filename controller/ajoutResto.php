<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/model/db.resto.php";

$ajoutResto = false;
$msg="";

// recuperation des donnees GET, POST, et SESSION
if(isset($_POST['nameR']) && isset($_POST['hourOpenR']) && isset($_POST['hourCloseR']) && isset($_POST['phoneR'])){
    $nameR = $_POST["nameR"];
    $hourOpenR = $_POST["hourOpenR"];
    $hourCloseR = $_POST["hourCloseR"];
    $phoneR = $_POST["phoneR"];

    if (isLoggedOn()) {
    $ownerR = $_SESSION["mailU"];

    $return = addResto($nameR, $ownerR, $hourOpenR, $hourCloseR, $phoneR);
        if($return) {
            $ajoutResto = true;
    } 
}else{
        $msg = 'Renseigner tous les champs' ;
        echo "<br><br><br><br>$msg";
    }
}

if($ajoutResto){
    $title = "Profil";
    include "$racine/controller/profil.php";
} else {
    $title = "Ajout restaurant";
    include "$racine/view/viewAjoutResto.php";
    include "$racine/view/layout.php";
}
