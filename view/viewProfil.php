<?php ob_start(); ?>
    <h2>Mon profil</h2>
    <br>
    Nom : <?= $nom; ?> 
    <br>
    Prénom : <?= $prenom; ?>
    <hr>
    <?php if ($boutonAjoutResto == 1){ ?>
        <a href="./?action=ajoutResto" class="btn btn-secondary btn-lg"> Ajouter un restaurant</a>
        <hr>
    <?php } ?>

    <div class="row">
        <?php if ($boutonAjoutResto == 1 || $boutonAjoutResto == 3 ){ ?>
            <h2> Mes restaurants : </h2><br> 
            <?php foreach($restosbymail as $resto){ ?>
                <div class="col-sm">
                    <div class="card">
                        <img class="card-img-top" src="img/resto/<?=$resto['imgR']?>" alt="<?=$resto['nameR']?>" height="300px%" sttyle="object-fit: cover";>
                        <div class="card-body">
                            <h5 class="card-title"><?=$resto['nameR']?></h5>
                            <a href="./?action=afficherResto&idR=<?=$resto['idR']?>" class="btn btn-primary">Voir le restaurant</a>
                            <?php if ($boutonAjoutResto == 1){ ?>
                                <a href="./?action=ajoutPlat&idR=<?=$resto['idR']?>" class="btn btn-success">Ajouter un plat</a>
                            <?php } ?>
                            <?php if ($boutonAjoutResto == 1 || $boutonAjoutResto == 3 ){ ?>
                                <a href="./?action=ajoutPlat&idR=<?=$resto['idR']?>" class="btn btn-warning">Modifier le restaurant</a>
                                <a href="./?action=deleteResto&idR=<?=$resto['idR']?>" class="btn btn-danger">Supprimer</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
<?php $content = ob_get_clean(); ?>
