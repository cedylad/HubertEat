<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/model/db.resto.php";

$ajoutResto = false;
$msg="";

// récupération des données GET, POST, et SESSION
if(isset($_POST['nameR']) && isset($_POST['hourOpenR']) && isset($_POST['hourCloseR']) 
    && isset($_POST['phoneR']) && isset($_POST['cityR']) 
    && isset($_POST['countryR']) && isset($_FILES['imgR'])){
        $nameR = $_POST["nameR"];
        $hourOpenR = $_POST["hourOpenR"];
        $hourCloseR = $_POST["hourCloseR"];
        $phoneR = $_POST["phoneR"];
        $cityR = $_POST["cityR"];
        $countryR = $_POST["countryR"];
        $imgR = $_FILES['imgR'];
        
        if (isLoggedOn()) {
            $ownerR = $_SESSION["mailU"];
            // Traitement de l'image
            $imgName = uniqid() . '.' . pathinfo($imgR['name'], PATHINFO_EXTENSION); // Génère un nom unique pour l'image
            $targetDir = "img/"; // Dossier pour enregistrer l'image
            $targetFile = $targetDir . $imgName;
            move_uploaded_file($imgR['tmp_name'], $targetFile); // Enregistre l'image dans le dossier
        
            // Ajout du restaurant et de l'adresse dans la base de données
            $return1 = addResto($nameR, $ownerR, $hourOpenR, $hourCloseR, $phoneR, $imgName);
            $return2 = false; // Initialisation de la variable $return2
            if($return1) {
                $lastId = getLastIdResto();
                $return2 = addAddressResto($cityR, $countryR, $lastId);
                if($return2) {
                    $ajoutResto = true;
                    header("Location: ./?action=profil");
                } else {
                    $msg = 'Erreur lors de l\'ajout de l\'adresse du restaurant';
                }
            } else {
                $msg = 'Erreur lors de l\'ajout du restaurant';
            }
        }        
}

if($ajoutResto){
    $title = "HuberEat | Profil";
    include "$racine/controller/profil.php";
} else {
    $title = "Ajout restaurant";
    include "$racine/view/viewAjoutResto.php";
    include "$racine/view/layout.php";
}