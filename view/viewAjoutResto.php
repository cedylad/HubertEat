<?php ob_start(); ?>
<h2>Ajouter un restaurant</h2>
<form action="./?action=ajoutResto" method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Nom du restaurant</label>
      <input type="text" class="form-control" placeholder="Le nom de votre réstaurant" name="nameR">
    </div>
    <div class="form-group col-md-6">
      <label>Heure d'ouverture</label>
      <input type="time" class="form-control" placeholder="Heure d'ouverture" name="hourOpenR">
    </div>
    <div class="form-group col-md-6">
      <label>Heure de fermeture</label>
      <input type="time" class="form-control" placeholder="Heure de fermeture" name="hourCloseR">
    </div>
    <div class="form-group col-md-6">
      <label>La ville</label>
      <input type="text" class="form-control" placeholder="La ville où se trouve le restaurant" name="cityR">
    </div>
    <div class="form-group col-md-6">
      <label>Le pays</label>
      <input type="text" class="form-control" placeholder="Le pays ou se trouve le restaurant" name="countryR">
    </div>
    <div class="form-group col-md-6">
      <label>Numéro de téléphone</label>
      <input type="number" class="form-control" placeholder="0123456789" name="phoneR">
    </div>
    <div class="form-group col-md-6">
      <label>Photo du restaurant</label>
      <input type="file" class="form-control" name="imgR">
    </div>
  </div> <br>
  <button type="submit" values="Enregistrer" class="btn btn-primary btn-lg">Ajouter le restaurant</button>
</form>
  <?php $content = ob_get_clean(); ?>
