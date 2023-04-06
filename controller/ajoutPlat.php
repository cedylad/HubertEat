<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/model/db.resto.php";

$ajoutPlat = false;
$msg="";

// récupération des données GET, POST, et SESSION
if(isset($_POST['nomP']) && isset($_POST['descP']) && isset($_FILES['imgP']) && $_FILES['imgP']['error'] === 0){
    $nomP = $_POST['nomP'];
    $descP = $_POST['descP'];
    $imgP = $_FILES['imgP'];
    
    if (isLoggedOn()) {
        // Traitement de l'image
        $imgName = uniqid() . '.' . pathinfo($imgP['name'], PATHINFO_EXTENSION);
        $targetDir = "img/plat/";
        $targetFile = $targetDir . $imgName;
        move_uploaded_file($imgP['tmp_name'], $targetFile);
        
        $idR = $_GET['idR']; // Récupération de l'id du restaurant courant depuis l'URL
        $return = addPlat($nomP, $descP, $imgName, $idR); // Utilisation du nom de l'image sans le chemin pour l'ajout dans la BDD
        if($return) {
            $ajoutPlat = true;
        } else {
            $msg = 'Erreur lors de l\'ajout du plat';
        }
    }   
}

if($ajoutPlat){
    header("Location: ./?action=profil");
    exit();
} else {
    $title = "HuberEat | Ajout plat";
    include "$racine/view/viewAjoutPlat.php";
    include "$racine/view/layout.php";
}
