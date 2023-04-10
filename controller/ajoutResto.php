<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/model/db.resto.php"; 

$ajoutResto = false;
$msg="";

// récupération des données POST
if(isset($_POST['nameR']) && isset($_POST['hourOpenR']) && isset($_POST['hourCloseR']) 
    && isset($_POST['phoneR']) && isset($_POST['cityR']) 
    && isset($_POST['countryR']) && isset($_FILES['imgR'])){

    // Récupération des données POST
    $nameR = $_POST["nameR"];
    $hourOpenR = $_POST["hourOpenR"];
    $hourCloseR = $_POST["hourCloseR"];
    $phoneR = $_POST["phoneR"];
    $cityR = $_POST["cityR"];
    $countryR = $_POST["countryR"];
    $imgR = $_FILES['imgR'];

    // Vérification si l'utilisateur est connecté
    if (isLoggedOn()) {
        $ownerR = $_SESSION["mailU"]; // Récupération de l'email de l'utilisateur connecté

        // Traitement de l'image
        $imgName = uniqid() . '.' . pathinfo($imgR['name'], PATHINFO_EXTENSION); // Génère un nom unique pour l'image
        $targetDir = "img/resto/"; // Dossier pour enregistrer l'image
        $targetFile = $targetDir . $imgName;
        move_uploaded_file($imgR['tmp_name'], $targetFile); // Enregistre l'image dans le dossier

        // Ajout du restaurant et de l'adresse dans la base de données
        $return1 = addResto($nameR, $ownerR, $hourOpenR, $hourCloseR, $phoneR, $imgName); // Ajout du restaurant dans la base de données
        $return2 = false; // Initialisation de la variable $return2
        if($return1) {
            $lastId = getLastIdResto(); // Récupération de l'ID du dernier restaurant ajouté
            $return2 = addAddressResto($cityR, $countryR, $lastId); // Ajout de l'adresse du restaurant dans la base de données
            if($return2) {
                $ajoutResto = true; // Indique que le restaurant a été ajouté avec succès
                header("Location: ./?action=profil"); // Redirige vers la page de profil
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
