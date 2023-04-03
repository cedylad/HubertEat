<?php ob_start(); ?>
<form action="./?action=inscription" method="POST">
<input type="text" name="lastName" placeholder="Nom"><br/><br/>
<input type="text" name="firstName" placeholder="Prenom"><br/><br/>
<input type="email" name="mail" placeholder="Adresse mail"><br/><br/>
<input type="password" name="password" placeholder="Mot de passe"><br/><br/>
<input type="password" name="password2" placeholder="Confirmation mot de passe"><br/><br/>
  </div>
    <div class="panel-footer"><button type="submit" values="Enregistrer" class="btn btn-primary btn-lg">Enregistrer</button></div>
  </form>
  <?php $content = ob_get_clean(); ?>
