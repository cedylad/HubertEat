<?php ob_start(); ?>
<div class="card mb-3">
  <div style="position:relative;padding-bottom:25%;overflow:hidden;">
    <img class="card-img-top" src="img/<?=$photoR?>" alt="Card image cap" style="position:absolute;width:100%;height:100%;">
  </div>
  <div class="card-body">
    <h1 class="card-title">Restaurant <?=$nomR?></h1>
    <p class="card-text">Ville : <?=$villeR?><br>Pays : <?=$paysR?>  </p>
  </div>
</div>




<?php $content = ob_get_clean(); ?>
