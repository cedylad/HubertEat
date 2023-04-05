<?php ob_start(); ?>
Nom : <?= $nom; ?> 
<br/>
Prénom : <?= $prenom; ?>
<br/>
<?php if ($boutonAjoutResto == 1 || $boutonAjoutResto == 3 ){ ?>
<a href="./?action=ajoutResto" class="btn btn-secondary btn-lg"> Ajouter un restaurant</a>
<?php } ?>
<hr>
<div class="row">
    <?php if ($boutonAjoutResto == 1 || $boutonAjoutResto == 3 ){ ?>
        <h2> Mes restaurants : </h2><br> 
        <?php foreach($restosbymail as $resto){ ?>
    <div class="col-lg-5">
        <div class="card">
            <img class="card-img-top" src="img/<?=$resto['imgR']?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?=$resto['nameR']?></h5>
                <a href="./?action=afficherResto&idR=<?=$resto['idR']?>" class="btn btn-primary">Ajouter un plat !</a>
                <a href="./?action=deleteResto&idR=<?=$resto['idR']?>" class="btn btn-danger">Supprimer !</a>
            </div>
        </div>
        </div>
        <?php } 
        } ?>
        </div>
    </div>



<?php $content = ob_get_clean(); ?>
