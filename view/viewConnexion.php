<?php ob_start(); ?>
<form action="./?action=connexion" method="POST">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input type="text" class="form-control" name="mailU" placeholder="Mail">
    </div>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input type="password" class="form-control" name="passwordU" placeholder="Mot de passe">
    </div>
    <input type="submit" />
  </form>
<br />
<a href="./?action=inscription">Inscription</a>
<hr>
<b>test</b><br />
login: johndoe@mail.com<br/>
Mot de Passe: mdp <br/>
<br />
<?php $content = ob_get_clean(); ?>
