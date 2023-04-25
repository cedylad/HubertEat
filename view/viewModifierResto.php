<?php ob_start(); ?>
<h2>Modifier <?=$monResto['nameR']?></h2>
<form action="./?action=modifierRestoV2&idR=<?=$_GET['idR']?>" method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Nom du restaurant</label>
      <input type="text" class="form-control" value="<?=$monResto['nameR']?>" name="nameR">
    </div>
    <div class="form-group col-md-6">
      <label>Heure d'ouverture</label>
      <input type="time" class="form-control" value="<?=$hourOpenFormat?>" name="hourOpenR">
    </div>
    <div class="form-group col-md-6">
      <label>Heure de fermeture</label>
      <input type="time" class="form-control" value="<?=$hourCloseFormat?>" name="hourCloseR">
    </div>
    <div class="form-group col-md-6">
      <label>La ville</label>
      <input type="text" class="form-control" value="<?=$adresseResto['cityA']?>" name="cityA">
    </div>
    <div class="form-group col-md-6">
      <label>Le pays</label>
      <input type="text" class="form-control" value="<?=$adresseResto['countryA']?>" name="countryA">
    </div>
    <div class="form-group col-md-6">
      <label>Numéro de téléphone</label>
      <input type="number" class="form-control" value="<?=$monResto['phoneR']?>" name="phoneR">
    </div>
    <div class="form-group col-md-6">
      <label>Photo actuelle du restaurant :</label><br>
      <img src="img/resto/<?=$monResto['imgR'] ?>" width="200px" height="200px" alt="Photo actuelle du restaurant"><br>
      <label>Changer la photo du restaurant :</label>
      <input type="file" class="form-control" name="imgR">
    </div>
  </div> <br>
  <button type="submit" values="Enregistrer" class="btn btn-primary btn-lg">Modifier mon restaurant</button>
</form>
  <?php $content = ob_get_clean(); ?>
