<?php ob_start(); ?>
<div class="card mb-3">
    <img class="card-img-top" src="img/<?=$photoR?>" height="200px" width="300px" alt="Card image cap" style="object-fit:cover;">
  <div class="card-body">
    <h1 class="card-title">Restaurant <?=$nomR?></h1>
    <p class="card-text">Ville : <?=$villeR?><br>Pays : <?=$paysR?>  </p>
  </div>
</div>
<?php $content = ob_get_clean(); ?>
