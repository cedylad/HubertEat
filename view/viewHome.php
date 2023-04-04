<?php ob_start(); ?>
Voici les resturant disponnible sur HuberEat : <br>
<?php if (is_array($lesRestos) || is_object($lesRestos)){
    foreach ($lesRestos as $resto){ ?>
<?php echo "<a href='./?action=afficherResto&idR=" . $resto['idR'] . "'>" . $resto['nameR'] . "</a>"; ?> <br>
<?php }
} ?>

<?php $content = ob_get_clean(); ?>
