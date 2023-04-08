<?php ob_start(); ?>
<h2>Mon profil</h2>
<br>
Nom : <?= $nom; ?> 
<br>
Prénom : <?= $prenom; ?>
<br>
<?php if ($boutonAjoutResto == 2){ ?>
Solde : <?= $solde; ?> €
<?php } ?>
<hr>

<?php if ($boutonAjoutResto == 1){ ?>
    <a href="./?action=ajoutResto" class="btn btn-secondary btn-lg"> Ajouter un restaurant</a>
    <hr>
<?php } ?>

<div class="row">
    <?php if ($boutonAjoutResto == 1 || $boutonAjoutResto == 3 ){ ?>
        <h2> Mes restaurants : </h2> 
        <?php foreach($restosbymail as $resto){ ?>
            <div class="col-sm-4">
                <div class="card">
                    <img class="card-img-top" src="img/resto/<?=$resto['imgR']?>" alt="<?=$resto['nameR']?>" height="300px%" sttyle="object-fit: cover";>
                    <div class="card-body">
                        <h5 class="card-title"><?=$resto['nameR']?></h5>
                        <a href="./?action=afficherResto&idR=<?=$resto['idR']?>" class="btn btn-primary">Voir le restaurant</a>

                        <?php if ($boutonAjoutResto == 1){ ?>
                            <a href="./?action=ajoutPlat&idR=<?=$resto['idR']?>" class="btn btn-success">Ajouter un plat</a>
                        <?php } ?>

                        <?php if ($boutonAjoutResto == 1 || $boutonAjoutResto == 3 ){ ?>
                            <a href="./?action=ajoutPlat&idR=<?=$resto['idR']?>" class="btn btn-warning">Modifier le restaurant</a>
                            <a href="./?action=deleteResto&idR=<?=$resto['idR']?>" class="btn btn-danger">Supprimer</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    
    <?php } else { ?>
    
        <h2> Mes commandes : </h2>
        <div class="row">
    
            <?php foreach($commandeClient as $commande){ ?>
        
                <div class="col-sm-4 mb-2">
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                            Commande n° : <?=$commande["idC"]?> | Prix : <?=$commande["prixP"]?> €
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Plat : <?=$commande["nomP"]?></li>
                            <li class="list-group-item">Le : <?=date("d/m/Y", strtotime($commande["dateC"]))?></li>
                            <li class="list-group-item">A : <?=date("H:i", strtotime($commande["dateC"]))?></li>

                            <?php 
                                $livre = $commande["livraison"];
                                if($livre == 1){
                            ?>
                                    <li class="p-3 bg-success text-white">Commande livrée</li>
                            <?php
                                } else if($livre == 0){ 
                            ?>
                                    <li class="p-3 bg-secondary text-white">Commande en attente</li>
                            <?php } else { ?>
                                    <li class="p-3 bg-danger text-white">Commande refusé</li>
                            <?php  } ?>
                        </ul>

        </div>
    </div>
    <?php } ?>
</div>
    <?php } ?>
<?php $content = ob_get_clean(); ?>
