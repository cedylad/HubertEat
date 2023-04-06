<?php ob_start(); ?>
<h2>Voici les restaurateurs disponibles sur HuberEat :</h2>
<br>
<div class="row">
    <?php foreach ($lesUsers as $user) {
        $lesRestoParIdR = getRestoByMail($user['mailU']);
    ?>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['lastNameU'] . " " . $user['firstNameU'] ?></h5>
                    <p class="card-text"><?= $user['mailU'] ?> </p>
                    <hr>
                    <?php
                    foreach ($lesRestoParIdR as $resto) {
                    ?>  
                        <h4>Restaurant(s)</h6>
                        <a href="./?action=afficherResto&idR=<?= $resto['idR'] ?>"><?= $resto['nameR'] ?></a>
                        <a href="./?action=deleteResto&idR=<?= $resto['idR'] ?>">Supprimer</a>
                        <br>
                        <h5>Plat(s)</h5>
                        <?php
                        $lesPlatsByIdP = getPlatByrestoR($resto['idR']);
                        foreach ($lesPlatsByIdP as $plat) {
                        ?>
                            <?= $plat['nomP'] ?>
                            <a href="./?action=deletePlat&idR=<?= $plat['idP'] ?>">Supprimer</a>
                            <br>
                        <?php
                            }
                        ?>
                        <hr>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php $content = ob_get_clean(); ?>
