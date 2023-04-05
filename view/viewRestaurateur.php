<?php ob_start(); ?>
<h2>Voici les restaurateurs disponibles sur HuberEat :</h2>
<br>
<div class="row">
    <?php foreach ($lesUsersType as $user) {
        $lesRestoParId = getRestoByMail($user['mailU']); // Ajout de cette ligne pour récupérer les restaurants de chaque utilisateur
    ?>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?=$user['lastNameU'] ." ". $user['firstNameU'] ?></h5>
                    <hr>
                    <p class="card-text">Adresse mail : <?=$user['mailU']?> </p>
                    <?php foreach($lesRestoParId as $resto){ ?>
                        <a href="./?action=afficherResto&idR=<?=$resto['idR']?>"><?=$resto['nameR']?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php $content = ob_get_clean(); ?>
