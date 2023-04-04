<?php ob_start(); ?>
Nom : <?= $nom; ?> 
<br/>
Prénom : <?= $prenom; ?>
<br/>
<hr>
<?php if ($boutonAjoutResto == 1){ ?>
    Mes restaurants :<br> 
    
    <?php 
    foreach($restosbymail as $resto){ 
        echo "<a href='./?action=afficherResto&idR=" . $resto['idR'] . "'>" . $resto['nameR'] . "</a><br>"; 
    } ?> 
    <a href="./?action=ajoutResto">Ajouter un restaurant</a>
<?php } ?>

<?php $content = ob_get_clean(); ?>
