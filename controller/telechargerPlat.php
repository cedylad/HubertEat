<?php
// Vérifie si le fichier est appelé directement depuis le serveur
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = ".."; // définit la racine du projet
}

// On inclut les fichiers contenant les fonctions de gestion des utilisateurs et des restaurants
include_once "$racine/model/db.users.php";
include_once "$racine/model/db.resto.php";

//Ajout de la librairie tcpdf
require_once('tcpdf/tcpdf.php');

// On récupère le mail de l'utilisateur connecté
$mailU = getMailULoggedOn();
// On récupère les informations de l'utilisateur à partir de son mail
$util = getUserByMail($mailU);
// On récupère le type d'utilisateur (1 = client, 2 = livreur, 3 = administrateur)
$userType = $util["typeU"];
// On récupère l'identifiant du restaurant à afficher dans l'URL
$idR = $_GET["idR"];
// On récupère les informations du restaurant à partir de son identifiant
$unResto = getRestoById($idR);
// On récupère le nom et la photo du restaurant
$nomR = $unResto["nameR"];
$photoR = $unResto["imgR"];
// On récupère le mail du restaurateur
$mailRestaurateur = $unResto["ownerR"];
// On récupère l'adresse du restaurant
$addressResto = getAddressRestoById($idR);
$villeR = $addressResto["cityA"];
$paysR = $addressResto["countryA"];
// On récupère la liste des plats du restaurant
$lesPlats = getPlatByrestoR($idR);
?>

<!-- Contenu HTML du resto -->
<div class="card mb-3">
    <img class="card-img-top" src="img/resto/<?=$photoR?>" height="200px" width="300px" alt="Card image cap" style="object-fit:cover;">
    <div class="card-body">
        <h1 class="card-title">Restaurant <?=$nomR?></h1>
        <p class="card-text">Ville : <?=$villeR?><br>Pays : <?=$paysR?><br>Assistance : <a href="mailto:<?=$mailRestaurateur?>"><?=$mailRestaurateur?></a></p>
        <?php if(isset($lesPlats)){?>
          <hr>
            <div class="row">
                <h2> Les plats : </h2>
                <?php foreach($lesPlats as $plat){?>
                    <div class="col-sm-4">
                        <div class="card">
                            <a href="./?action=commanderPlat&idP=<?=$plat['idP']?>">
                                <img class="card-img-top" src="img/plat/<?=$plat['imgP']?>" alt="<?=$plat['nomP']?>" height="200px" sttyle="object-fit:cover;">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title"><?=$plat['nomP']?></h5>
                                <p class="card-text"><?= number_format(floatval($plat['prixP']), 2) ?> €</p>
                                <p class="card-text"><?=$plat['descP']?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?> <!-- End foreach -->
            </div>
        <?php } ?> <!-- End if -->
    </div>
</div>
<!-- Fin du contenu html -->
<?php

// Stocke le contenu HTML de la page dans une variable
$content = ob_get_clean();
// Créer une instance de la classe TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// Ajout de la page
$pdf->AddPage();
// définit le contenu HTML à convertir en PDF
$html = $content;
// Convertit le contenu HTML en PDF
$pdf->writeHTML($html, true, false, true, false, '');
// nom du pdf  
$filename = 'restaurant_' . $nomR . '.pdf';
// télécharge le PDF
$pdf->Output($filename, 'D');
?>
