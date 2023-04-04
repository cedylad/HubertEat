<?php

include_once "db.hubereat.php";

Function getUsers(){
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare('SELECT * FROM users');
        $result = $statement->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $result;
}
Function getUserByMail($mail){
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare('SELECT * FROM users WHERE mailU=:mail');
        $statement->bindValue(':mail', $mail, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $result;
}

Function addUser($lastName, $firstName, $mail, $password) {
    try {
        $cnx = connexionPDO();

        $passwordCrypt = crypt($password, "sel");
        $req = $cnx->prepare('INSERT INTO users (lastNameU, firstNameU, mailU, passwordU) VALUES(:lastName, :firstName, :mail, :password)');
        $req->bindValue(':lastName', $lastName, PDO::PARAM_STR);
        $req->bindValue(':firstName', $firstName, PDO::PARAM_STR);
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->bindValue(':password', $passwordCrypt, PDO::PARAM_STR);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


