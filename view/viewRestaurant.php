<?php ob_start(); ?>
<h2>Voici tous les restaurants disponibles sur HuberEat :</h2>
<br>
<div class="row">
<?php foreach ($lesRestos as $resto){ 
        $heureOuverture = date("H:i", strtotime($resto["hourOpenR"]));
        $heureFermeture = date("H:i", strtotime($resto["hourCloseR"]));
?>
<div class="col-sm-4">
            <div class="card">
                <a href="./?action=afficherResto&idR=<?=$resto['idR']?>">
                    <img class="card-img-top" src="img/resto/<?=$resto['imgR']?>" alt="<?=$resto['nameR']?>" height="300px" sttyle="object-fit: cover;">
                </a>
                    <div class="card-body">
                        <h5 class="card-title"><?=$resto['nameR']?></h5>
                        <hr>
                        <p class="card-text">Ouvert : <?=$heureOuverture?> </p>
                        <p class="card-text">Fermé : <?=$heureFermeture?></p>
                        <p class="card-text">Téléphone : <a href="tel:<?=$resto['phoneR']?>"><?=$resto['phoneR']?> </a></p>
                        <a href="./?action=afficherResto&idR=<?=$resto['idR']?>" class="btn btn-primary">Découvrir !</a>
                    </div>
            </div>
            <br>
            </div>
        <?php } ?>
</div>
</div>
<?php $content = ob_get_clean(); ?>
