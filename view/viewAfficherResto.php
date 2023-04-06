<?php ob_start(); ?>
<div class="card mb-3">
    <img class="card-img-top" src="img/resto/<?=$photoR?>" height="200px" width="300px" alt="Card image cap" style="object-fit:cover;">
    <div class="card-body">
        <h1 class="card-title">Restaurant <?=$nomR?></h1>
        <p class="card-text">Ville : <?=$villeR?><br>Pays : <?=$paysR?></p>
        <?php if(isset($lesPlats)){?>
          <hr>
            <div class="row">
                <h2> Les plats : </h2>
                <?php foreach($lesPlats as $plat){?>
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="img/plat/<?=$plat['imgP']?>" alt="<?=$plat['nomP']?>" height="200px" sttyle="object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?=$plat['nomP']?></h5>
                                <p class="card-text"><?=$plat['descP']?></p>
                                <a href="#" class="btn btn-primary">Commander</a>
                            </div>
                        </div>
                    </div>
                <?php } ?> <!-- End foreach -->
            </div>
        <?php } ?> <!-- End if -->
    </div>
</div>
<?php $content = ob_get_clean(); ?>
