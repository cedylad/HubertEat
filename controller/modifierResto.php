<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/model/db.resto.php";

$modifierRestoOK = false; 
$msg = "";

$idR = $_GET["idR"];

if (isLoggedOn()) {
   $monResto = getRestoById($idR);
    $adresseResto = getAddressRestoById($idR);
    
    $hourOpen = $monResto['hourOpenR'];
    $hourOpenFormat = substr($hourOpen, 0, 5);
    $hourClose = $monResto['hourCloseR'];
    $hourCloseFormat = substr($hourClose, 0, 5);

    // Récupération des données POST
    if (isset($_POST['nameR']) && isset($_POST['hourOpenR']) && isset($_POST['hourCloseR']) 
         && isset($_POST['countryA']) && isset($_POST['cityA']) && isset($_POST['phoneR'])) {

            // Récupère les valeurs des champs de formulaire et les stocke dans des variables
            $nameR = $_POST["nameR"];
            $hourOpenR = $_POST["hourOpenR"];
            $hourCloseR = $_POST["hourCloseR"];
            $countryA = $_POST["countryA"];
            $cityA = $_POST["cityA"];
            $phoneR = $_POST["phoneR"];

            $modifierResto = modifierResto($idR, $nameR, $hourOpenR, $hourCloseR, $phoneR);
            $modifierAddress = modifierAddressResto($idR, $countryA, $cityA);
                if($modifierResto && $modifierAddress){
                    $modifierRestoOK = true;
                    $title = "pb ici";
                } 
        } else {
                $msg = "Des champs ne sont pas remplis";
        }
       if (isset($_POST['imgR'])){
            $imgR = $_POST["imgR"];

            // Traitement de l'image
            $imgName = uniqid() . '.' . pathinfo($imgR['name'], PATHINFO_EXTENSION); // Génère un nom unique pour l'image
            $targetDir = "img/resto/"; // Dossier pour enregistrer l'image
            $targetFile = $targetDir . $imgName;
            move_uploaded_file($imgR['tmp_name'], $targetFile); // Enregistre l'image dans le dossier

            $modifierImgResto = modifierImgResto($idR, $imgName);
                if($modifierImgResto){
                    $modifierRestoOK =  true;
                    header("Location: ./?action=profil");
                }

        } 
}

if($modifierRestoOK){
    header("Location: ./?action=profil"); // Redirection vers le profil de l'utilisateur en cas d'ajout réussi
} else {

$title = "HuberEat |  mon Restaurant";
include "$racine/view/viewModifierResto.php";
include "$racine/view/layout.php";
}
