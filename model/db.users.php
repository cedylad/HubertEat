<?php
include_once "db.hubereat.php";

//Récupération de tous les users
function getUsers(){
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare('SELECT users.*, typeuser.* 
                                    FROM users
                                    JOIN typeuser ON users.typeU = typeuser.idT');
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC); // Récupération des résultats sous forme d'array associatif
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $result;
}


//Récupération de tous les utilisaturs par leur mail
function getUserByMail($mail){
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

//Pour ajouter un utilisateur (inscription)
function addUser($lastName, $firstName, $mail, $password) {
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

//Récupérer un utilisateur par son type (admin, resauateur et client)
function getUsersByType($type){
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare('SELECT u.*, r.* FROM users u LEFT JOIN resto r ON u.mailU = r.idR WHERE u.typeU=:type');
        $statement->bindValue(':type', $type, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $result;
}

//Permet de supprimer un utilisateur (pour l'admin)
function deleteUser($mailU){
    try {
        $cnx = connexionPDO();
        $statement = $cnx->prepare("DELETE address FROM address
                                    LEFT JOIN resto ON address.idR = resto.idR
                                    WHERE resto.ownerR = :mailU");
        $statement->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $statement->execute();

        $statement = $cnx->prepare("DELETE resto FROM resto 
                                    WHERE ownerR = :mailU");
        $statement->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $statement->execute();

        $statement = $cnx->prepare("DELETE FROM users WHERE mailU = :mailU");
        $statement->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $result = $statement->execute();
        return $result;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

//Permet d'ajouter un nouveau solde
function addSolde($solde, $mail) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('UPDATE users SET soldeU = soldeU + :solde WHERE mailU = :mail');
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->bindValue(':solde', $solde, PDO::PARAM_STR);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

//Change un utilisateur en restaurateur
function changeTypeUserOnRestaurateur($mail) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('UPDATE users SET typeU = 1 WHERE mailU = :mail');
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

//Change un utilisateur en Client
function changeTypeUserOnClient($mail) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('UPDATE users SET typeU = 2 WHERE mailU = :mail');
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

//Change un utilisateur en Administrateur
function changeTypeUserOnAdminstrateur($mail) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('UPDATE users SET typeU = 3 WHERE mailU = :mail');
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

