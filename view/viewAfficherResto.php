<?php ob_start(); ?>
<div class="jumbotron">
  <h1 class="display-4">Restaurant <?=$nomR?></h1>
  <img class="banner" src="img/langlade.jpg" alt="View">
  <hr class="my-4">
  <p>Ville : <?=$villeR?></p>
  <p>Pays : <?=$paysR?></p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </p>
</div>
<?php $content = ob_get_clean(); ?>
