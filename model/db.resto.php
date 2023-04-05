<?php

include_once "db.hubereat.php";

function getResto(){
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare('SELECT * FROM resto');
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $result;
}

function getRestoById($idR){
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

function getAddressRestoById($idR){
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


function addResto($nameR, $ownerR, $hourOpenR, $hourCloseR, $phoneR, $imgR) {
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare("INSERT INTO resto (nameR, ownerR, hourOpenR, hourCloseR, phoneR, imgR) VALUES (:nameR, :ownerR, :hourOpenR, :hourCloseR, :phoneR, :imgR)");
        $statement->bindValue(':nameR', $nameR, PDO::PARAM_STR);
        $statement->bindValue(':ownerR', $ownerR, PDO::PARAM_STR);
        $statement->bindValue(':hourOpenR', $hourOpenR, PDO::PARAM_STR);
        $statement->bindValue(':hourCloseR', $hourCloseR, PDO::PARAM_STR);
        $statement->bindValue(':phoneR', $phoneR, PDO::PARAM_INT);
        $statement->bindValue(':imgR', $imgR, PDO::PARAM_STR);
        $statement->execute();
        $idR = $cnx->lastInsertId();
        return $idR;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


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

function getLastIdResto() {
    try {
        $cnx = connexionPDO();
        $statement = $cnx->query('SELECT idR FROM resto ORDER BY idR DESC LIMIT 1');
        $resultat = $statement->fetch(PDO::FETCH_ASSOC);
        if($resultat) {
            return $resultat['idR'];
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return null;
}

function deleteResto($idR){
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare("DELETE FROM address WHERE idR =:idR");
        $statement2 = $cnx->prepare("DELETE FROM resto WHERE idR =:idR");
        $statement->bindValue(':idR', $idR, PDO::PARAM_STR);
        $statement2->bindValue(':idR', $idR, PDO::PARAM_STR);
        $result = $statement->execute();
        $result2 = $statement2->execute();
        return $result && $result2;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function addPlat($nomP, $imgP, $restoR) {
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare("INSERT INTO plat (nomP, imgP, restoR) VALUES (:nomP, :imgP, :restoR)");
        $statement->bindValue(':nomP', $nomP, PDO::PARAM_STR);
        $statement->bindValue(':imgP', $imgP, PDO::PARAM_STR);
        $statement->bindValue(':restoR', $restoR, PDO::PARAM_INT);
        $result = $statement->execute();
        return $result;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}




