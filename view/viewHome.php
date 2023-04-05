<?php ob_start(); ?>
<h2>Voici les restaurants disponibles sur HuberEat :</h2>
<br>
<div class="row">
<?php if (is_array($lesRestos) || is_object($lesRestos)){
        foreach ($lesRestos as $resto){ ?>
<div class="col-sm-4">
            <div class="card">
                <img class="card-img-top" src="img/<?=$resto['imgR']?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?=$resto['nameR']?></h5>
                    <hr>
                    <p class="card-text">Ouvert à : <?=$resto['hourOpenR']?> </p>
                    <p class="card-text">Fermé à : <?=$resto['hourCloseR']?></p>
                    <p class="card-text">Téléphone : <?=$resto['phoneR']?> </p>
                    <a href="./?action=afficherResto&idR=<?=$resto['idR']?>" class="btn btn-primary">Découvrir !</a>
                </div>
            </div>
            <br>
            </div>
        <?php }
    } ?>
</div>
</div>
<?php $content = ob_get_clean(); ?>
