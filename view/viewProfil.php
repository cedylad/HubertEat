<?php ob_start(); ?>
Nom : <?=$nom; ?> 
<br/>
Prénom : <?=$prenom; ?>
<br/>
<hr>
<?php
if (is_array($restobymail) || is_object($restobymail)){
     if(count($restobymail) < 1){
    foreach($restobymail as $resto){?>
    Mes restaurants :<br> <?=$resto?><br>
<?php }
     }
} if ($boutonAjoutResto == 1){;?>
    <a href="./?action=ajoutResto">Ajouter un restaurant</a>
<?php }?>
<?php $content = ob_get_clean(); ?>
