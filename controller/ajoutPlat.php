<?php
// Vérifie si le fichier est appelé directement depuis le serveur
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = ".."; // définit la racine du projet
}
include_once "$racine/model/db.resto.php";

$ajoutPlat = false; 
$msg = "";

// Récupération des données POST 
if(isset($_POST['nomP']) && isset($_POST['prixP']) && isset($_POST['descP']) && isset($_FILES['imgP']) && $_FILES['imgP']['error'] === 0){
    $nomP = $_POST['nomP'];
    $prixP = $_POST['prixP'];
    $descP = $_POST['descP'];
    $imgP = $_FILES['imgP'];
    
    if (isLoggedOn()) { // Vérification que l'utilisateur est connecté
        // Traitement de l'image
        $imgName = uniqid() . '.' . pathinfo($imgP['name'], PATHINFO_EXTENSION);
        $targetDir = "img/plat/";
        $targetFile = $targetDir . $imgName;
        move_uploaded_file($imgP['tmp_name'], $targetFile);

        //Traitement du prix
        $prixFinal = floatval(str_replace(',', '.', $prixP));
        
        if(isset($_GET['idR'])){
            $idR = $_GET['idR']; // Récupération de l'id du restaurant courant depuis l'URL
            $return = addPlat($nomP, $prixFinal, $descP, $imgName, $idR); // Utilisation du nom de l'image sans le chemin pour l'ajout dans la BDD
            if($return) {
                $ajoutPlat = true; // Le plat a été ajouté avec succès
            } else {
                $msg = 'Erreur lors de l\'ajout du plat';
            }
        }   
    }
}

if($ajoutPlat){
    header("Location: ./?action=profil"); // Redirection vers le profil de l'utilisateur en cas d'ajout réussi
    exit();
} else {
    $title = "HuberEat | Ajout plat";
    include "$racine/view/viewAjoutPlat.php";
    include "$racine/view/layout.php";
}
