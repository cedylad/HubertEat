<?php ob_start(); ?>
Nom : <?=$nom; ?> 
<br/>
Prénom : <?=$prenom; ?>
<br/>
<hr>
<?php $content = ob_get_clean(); ?>
