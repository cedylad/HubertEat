<?php ob_start(); ?>
<div class="row">
    <?php if(!empty($lesRestos)){?>
        <h2>Voici les restaurants ouverts sur HuberEat :</h2>
<?php foreach ($lesRestos as $resto){ ?>
<div class="col-sm-4">
            <div class="card">
                <a href="./?action=afficherResto&idR=<?=$resto['idR']?>">
                    <img class="card-img-top" src="img/resto/<?=$resto['imgR']?>" alt="<?=$resto['nameR']?>" height="300px" sttyle="object-fit: cover;">
                </a>
                    <div class="card-body">
                        <h5 class="card-title"><?=$resto['nameR']?></h5>
                        <hr>
                        <p class="card-text">Téléphone : <a href="tel:<?=$resto['phoneR']?>"><?=$resto['phoneR']?> </a></p>
                        <a href="./?action=afficherResto&idR=<?=$resto['idR']?>" class="btn btn-primary">Découvrir !</a>
                    </div>
            </div>
            <br>
            </div>
        <?php } ?>
</div>
</div>
<?php } else { ?>
    <h2>Aucun restaurant n'est disponnible à cette heure-ci.</h2>
    <p>Consulter notre onglet <a href='./?action=restaurant'>"Les restaurants"</a> pour voir les horaires des restaurants.</p>
    <?php } ?>
<?php $content = ob_get_clean(); ?>
