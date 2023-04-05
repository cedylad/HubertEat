<?php ob_start(); ?>
<h2>Connexion</h2>
<form action="./?action=connexion" method="POST">
  <div class="form-group">
    <label>Mail</label>
    <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="prenomnom@mail.fr" name="mailU">
  </div>
  <div class="form-group">
    <label>Mot de passe</label>
    <input type="password" class="form-control" placeholder="Mot de passe" name="passwordU"> <br>
  </div>
  <button type="submit" class="btn btn-primary btn-lg">Connexion</button>
</form>
Pas encore de compte ?
<a href="./?action=inscription">Inscription</a>
<hr>
<br />
login amdin: johndoe@mail.fr<br/>
Mot de Passe admin: mdp <br/>
<br>
login restaurateur : borisvian@mail.fr <br>
Mot de passe restaurateur : mdp
<br />
<br>
login client : willsmith@mail.fr <br>
Mot de passe client : mdp
<?php $content = ob_get_clean(); ?>
