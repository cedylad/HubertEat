<?php ob_start(); ?>
<h2>Ajouter un restaurant</h2>
<form action="./?action=ajoutSolde" method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>nom</label>
      <input type="text" class="form-control" placeholder="Nom du propritaire de la carte" name="nomCarte">
    </div>
    <div class="form-group col-md-6">
      <label>Numéreo</label>
      <input type="number" class="form-control" placeholder="Numéro de la carte bancaire" name="numCarte">
    </div>
    <div class="form-group col-md-6">
      <label>Date</label>
      <input type="date" class="form-control" placeholder="Date d'expiration" name="dateCarte">
    </div>
    <div class="form-group col-md-6">
      <label>Numéros secret</label>
      <input type="number" class="form-control" placeholder="La 3 chiffre secret de la carte" name="secretCarte">
    </div>
    <div class="form-group col-md-6">
      <label>Montant (€) </label>
      <input type="number" class="form-control" placeholder="Le montant souhaiter" name="montantCarte">
    </div>
  </div> <br>
  <button type="submit" values="Enregistrer" class="btn btn-primary btn-lg">Ajouter le solde</button>
</form>
  <?php $content = ob_get_clean(); ?>
