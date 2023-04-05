<?php ob_start(); ?>
Nom : <?= $nom; ?> 
<br/>
Prénom : <?= $prenom; ?>
<br/>
<hr>
<?php if ($boutonAjoutResto == 1 || $boutonAjoutResto == 3 ){ ?>
    Mes restaurants :<br> 
    
    <?php 
    foreach($restosbymail as $resto){ 
        echo "<a href='./?action=afficherResto&idR=" . $resto['idR'] . "'>" . $resto['nameR'] . "</a> <a href='./?action=deleteResto&idR=" . $resto['idR'] . "'>supprimer le resto</a><br>";
    }?>
    <a href="./?action=ajoutResto">Ajouter un restaurant</a>
<?php } ?>

<?php $content = ob_get_clean(); ?>
