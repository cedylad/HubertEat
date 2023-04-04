<?php

include_once "db.hubereat.php";

Function getResto(){
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare('SELECT * FROM resto');
        $statement->execute();
        $result = $statement->fetchAll();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $result;
}

Function getRestoById($idR){
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare('SELECT * FROM resto WHERE idR=:idR');
        $statement->bindValue(':idR', $idR, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $result;
}

Function getAddressRestoById($idR){
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare('SELECT * FROM address WHERE idR=:idR');
        $statement->bindValue(':idR', $idR, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $result;
}

function getRestoByMail($mail){
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare('SELECT * FROM resto WHERE ownerR =:mail');
        $statement->bindValue(':mail', $mail, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $result;
}


Function addResto($nameR, $ownerR, $hourOpenR, $hourCloseR, $phoneR) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('INSERT INTO resto (nameR, ownerR, hourOpenR, hourCloseR, phoneR) VALUES(:nameR, :ownerR, :hourOpenR, :hourCloseR, :phoneR)');
        $req->bindValue(':nameR', $nameR, PDO::PARAM_STR);
        $req->bindValue(':ownerR', $ownerR, PDO::PARAM_STR);
        $req->bindValue(':hourOpenR', $hourOpenR, PDO::PARAM_STR);
        $req->bindValue(':hourCloseR', $hourCloseR, PDO::PARAM_STR);
        $req->bindValue(':phoneR', $phoneR, PDO::PARAM_STR);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

