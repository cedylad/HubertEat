<?php
include_once "db.hubereat.php"; // Inclusion du fichier de connexion à la base de données

// Fonction pour récupérer tous les restaurants
function getResto(){
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare('SELECT * FROM resto'); 
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC); // Récupération des résultats sous forme de tableau associatif
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $result;
}

//Fonction pour récuperer les restaurant ouverts et fermés
function getRestoOpenAtTime($heure) {
    try{
        $cnx = connexionPDO();
        $statement = $cnx->prepare("SELECT * FROM resto WHERE hourOpenR <= :heure AND hourCloseR >= :heure");
        $statement->bindValue(':heure', $heure, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }

    return $result;
}


// Fonction pour récupérer un restaurant par son identifiant
function getRestoById($idR){
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare('SELECT * FROM resto WHERE idR=:idR'); 
        $statement->bindValue(':idR', $idR, PDO::PARAM_STR); // Attribution de la valeur de l'identifiant au paramètre de la requête
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC); // Récupération du résultat sous forme de tableau associatif
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $result;
}

// Fonction pour récupérer l'adresse d'unrestaurant par son identifiant
function getAddressRestoById($idR){
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare('SELECT * FROM address WHERE idR=:idR');
        $statement->bindValue(':idR', $idR, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);// Récupération des résultats sous forme d'array associatif
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $result;
}

// Fonction pour récupérer le Onwer d'un restaurant par son adresse mail
function getRestoByMail($mail){
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare('SELECT * FROM resto WHERE ownerR =:mail');
        $statement->bindValue(':mail', $mail, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC); // Récupération des résultats sous forme d'array associatif
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $result;
}

//Fonction pour ajouter un nouveau restautant
function addResto($nameR, $ownerR, $hourOpenR, $hourCloseR, $phoneR, $imgR) {
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare("INSERT INTO resto (nameR, ownerR, hourOpenR, hourCloseR, phoneR, imgR) 
        VALUES (:nameR, :ownerR, :hourOpenR, :hourCloseR, :phoneR, :imgR)");
        $statement->bindValue(':nameR', $nameR, PDO::PARAM_STR);
        $statement->bindValue(':ownerR', $ownerR, PDO::PARAM_STR);
        $statement->bindValue(':hourOpenR', $hourOpenR, PDO::PARAM_STR);
        $statement->bindValue(':hourCloseR', $hourCloseR, PDO::PARAM_STR);
        $statement->bindValue(':phoneR', $phoneR, PDO::PARAM_INT);
        $statement->bindValue(':imgR', $imgR, PDO::PARAM_STR);
        $statement->execute();
        $idR = $cnx->lastInsertId();// Récupération de l'identifiant du restaurant nouvellement inséré dans la table "resto"
        return $idR;// Retourne l'identifiant du restaurant nouvellement inséré dans la table "resto"
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

// Fonction pour ajouter l'adresse d'un restaurant
function addAddressResto($cityA, $countryA, $idR) {
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare('INSERT INTO address (cityA, countryA, idR) VALUES(:cityA, :countryA, :idR)');
        $statement->bindValue(':cityA', $cityA, PDO::PARAM_STR);
        $statement->bindValue(':countryA', $countryA, PDO::PARAM_STR);
        $statement->bindValue(':idR', $idR, PDO::PARAM_INT);
        $resultat = $statement->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

//Fonction pour récupérer le dernier identifiant d'un restaurant ajouté
function getLastIdResto() {
    try {
        $cnx = connexionPDO();
        $statement = $cnx->query('SELECT idR FROM resto ORDER BY idR DESC LIMIT 1');
        $resultat = $statement->fetch(PDO::FETCH_ASSOC); //récupération du résultat sous forme de tableau associatif
        if($resultat) {
            return $resultat['idR']; // retourne la valeur de l'idR s'il existe dans le tableau associatif
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage(); 
        die();
    }
    return null; // retourne null si aucun idR n'a été trouvé
}

// Fonction pour supprimer un restaurant par son identifiant
function deleteResto($idR){
    try {
        $cnx = connexionPDO();
        // Suppression des plats associés au restaurant
        $statement2 = $cnx->prepare("DELETE FROM plat WHERE restoR =:idR");
        $statement2->bindValue(':idR', $idR, PDO::PARAM_STR);
         $result2 = $statement2->execute();
        // Suppression de l'adresse associée au restaurant
        $statement = $cnx->prepare("DELETE FROM address WHERE idR =:idR");
        $statement->bindValue(':idR', $idR, PDO::PARAM_STR);
        $result = $statement->execute();
        // Suppression du restaurant
        $statement3 = $cnx->prepare("DELETE FROM resto WHERE idR =:idR");
        $statement3->bindValue(':idR', $idR, PDO::PARAM_STR);
        $result3 = $statement3->execute();
        // Retourne vrai si toutes les suppressions ont été effectuées avec succès, faux sinon
        return $result2 && $result && $result3;
    } catch (PDOException $e) {
        // En cas d'erreur, affiche un message et arrête l'exécution du script
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

// Fonction pour ajouter un plat
function addPlat($nomP, $prixP, $descP, $imgP, $restoR) {
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare("INSERT INTO plat (nomP, prixP, descP, imgP, restoR) VALUES (:nomP, :prixP, :descP, :imgP, :restoR)");
        $statement->bindValue(':nomP', $nomP, PDO::PARAM_STR);
        $statement->bindValue(':prixP', $prixP, PDO::PARAM_STR);
        $statement->bindValue(':imgP', $imgP, PDO::PARAM_STR);
        $statement->bindValue(':descP', $descP, PDO::PARAM_STR);
        $statement->bindValue(':restoR', $restoR, PDO::PARAM_INT);
        $result = $statement->execute(); 
        return $result;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

//Fonction permettant de récupérer le prix d'un plat par son identifiant
function getPrixPlatById($idP){
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare("SELECT prixP FROM plat WHERE idP = :idP"); 
        $statement->bindValue(':idP', $idP, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $result;
}

// Fonction pour récupérer un plat par son identifiant restaurant 
function getPlatByrestoR($restoR){
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare('SELECT * FROM plat WHERE restoR =:restoR');
        $statement->bindValue(':restoR', $restoR, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $result;
}

// Fonction pour supprimer un plat
function deletePlat($idP) {
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare("DELETE FROM commande WHERE idP = :idP");
        $statement->bindValue(':idP', $idP, PDO::PARAM_STR);
        $result = $statement->execute();

        $statement2 = $cnx->prepare("DELETE FROM plat WHERE idP = :idP");
        $statement2->bindValue(':idP', $idP, PDO::PARAM_STR);
        $result2 = $statement2->execute();

        return $result && $result2;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

//Fonction pour commander un plat
function commanderPlat($idP, $mailU, $prixP) {
    try {
        $cnx = connexionPDO();
        // Vérifie le solde du user
        $statement = $cnx->prepare("SELECT soldeU FROM users WHERE mailU = :mailU");
        $statement->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $statement->execute();
        $soldeActuel = $statement->fetchColumn();
        
        if ($soldeActuel < $prixP) {
            return false; // solde insuffisant
        }
        // Met à jour le solde de l'utilisateur
        $statement = $cnx->prepare("UPDATE users SET soldeU = soldeU - :prixP WHERE mailU = :mailU");
        $statement->bindValue(':prixP', $prixP, PDO::PARAM_STR);
        $statement->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $statement->execute();
        // Ajoute le plat dans la table commande
        $statement = $cnx->prepare("INSERT INTO commande (idP, mailU) VALUES (:idP, :mailU)");
        $statement->bindValue(':idP', $idP, PDO::PARAM_STR);
        $statement->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $result = $statement->execute();
        return $result;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

//Fonction pour récupérer une commande par le mail de l'utilisateurs
function getCommandeByMailU($mailU){
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare('SELECT commande.*, plat.nomP, plat.prixP FROM commande JOIN plat 
        ON commande.idP = plat.idP WHERE mailU = :mail ORDER BY commande.dateC DESC');
        $statement->bindValue(':mail', $mailU, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

//Finctuon pour récupérer les commandes par livraison (si validé, refusé ou annulé)
function getCommandeByLivraison() {
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare("SELECT commande.*, plat.*, users.* FROM commande JOIN plat ON commande.idP = plat.idP JOIN users 
        ON commande.mailU = users.mailU WHERE commande.livraison = '0'");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

//Fonction pour valider une commande
function validerCommande($idC) {
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare("UPDATE commande SET livraison = '1' WHERE idC = :idC");
        $statement->bindValue(':idC', $idC, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
//Fonction pour refser une commande
function refuserCommande($idC) {
    try {
        $cnx = connexionPDO();
        // Récupère le prixP
        $statement = $cnx->prepare("SELECT prixP FROM commande JOIN plat ON commande.idP = plat.idP WHERE idC = :idC");
        $statement->bindValue(':idC', $idC, PDO::PARAM_STR);
        $statement->execute();
        $montant = $statement->fetchColumn();

        // Ajoute le montant au solde du client
        $statement = $cnx->prepare("UPDATE users SET soldeU = soldeU + :prixP WHERE mailU = (SELECT mailU FROM commande WHERE idC = :idC)");
        $statement->bindValue(':prixP', $montant, PDO::PARAM_STR);
        $statement->bindValue(':idC', $idC, PDO::PARAM_STR);
        $result = $statement->execute();
        
        // Marque la commande comme remboursée = rembourse le client par le prixP
        $statement = $cnx->prepare("UPDATE commande SET livraison = '2' WHERE idC = :idC");
        $statement->bindValue(':idC', $idC, PDO::PARAM_STR);
        $statement->execute();
        
        return $result;

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

//Fonciton pour annuler une commande
function annulerCommande($idC) {
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare("SELECT prixP FROM commande JOIN plat ON commande.idP = plat.idP WHERE idC = :idC");
        $statement->bindValue(':idC', $idC, PDO::PARAM_STR);
        $statement->execute();
        $montant = $statement->fetchColumn();
        // Ajoute le montant au solde du client
        $statement = $cnx->prepare("UPDATE users SET soldeU = soldeU + :prixP WHERE mailU = (SELECT mailU FROM commande WHERE idC = :idC)");
        $statement->bindValue(':prixP', $montant, PDO::PARAM_STR);
        $statement->bindValue(':idC', $idC, PDO::PARAM_STR);
        $result = $statement->execute();
        // Marque la commande comme remboursée = rembourse le client par le prixP
        $statement = $cnx->prepare("UPDATE commande SET livraison = '3' WHERE idC = :idC");
        $statement->bindValue(':idC', $idC, PDO::PARAM_STR);
        $statement->execute();
        return $result;

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}