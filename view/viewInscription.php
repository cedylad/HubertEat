<?php ob_start(); ?>
<h2>Inscription</h2>
<form action="./?action=inscription" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Nom</label>
      <input type="text" class="form-control" placeholder="Votre nom" name="lastName">
    </div>
    <div class="form-group col-md-6">
      <label>Prenom</label>
      <input type="text" class="form-control" placeholder="Votre prénom" name="firstName">
    </div>
    <div class="form-group col-md-6">
      <label>Adresse mail</label>
      <input type="email" class="form-control" placeholder="prenomnom@mail.fr" name="mail">
    </div>
    <div class="form-group col-md-6">
      <label>Mot de passe</label>
      <input type="password" class="form-control" placeholder="Mot de passe" name="password">
    </div>
    <div class="form-group col-md-6">
      <label>Confirmation du mot de passe</label>
      <input type="password" class="form-control" placeholder="Mot de passe" name="password2">
    </div>
  </div> <br>
  <button type="submit" values="Enregistrer" class="btn btn-primary btn-lg">S'inscrire</button>
</form>
  <?php $content = ob_get_clean(); ?>
