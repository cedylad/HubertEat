<?php ob_start(); ?>
<form action="./?action=ajoutResto" method="POST" enctype="multipart/form-data">
  <input type="text" name="nameR" placeholder="Nom restaurant"><br/><br/>
  <input type="text" name="hourOpenR" placeholder="00h00"><br/><br/>
  <input type="text" name="hourCloseR" placeholder="00h00"><br/><br/>
  <input type="text" name="cityR" placeholder="Ville"><br/><br/>
  <input type="text" name="countryR" placeholder="Pays"><br/><br/>
  <input type="text" name="phoneR" placeholder="0000000000"><br/><br/>
  <input type="file" name="imgR"><br/><br/>
  <div class="panel-footer"><button type="submit" values="Enregistrer" class="btn btn-primary btn-lg">Enregistrer</button></div>
</form>
<?php $content = ob_get_clean(); ?>
