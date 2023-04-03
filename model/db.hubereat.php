<?php
function connexionPDO() {
    $login = "root";
    $password = "root";
    $db = "hubereat";
    $server = "localhost";

    try {
        $cnx = new PDO("mysql:host=$server;dbname=$db", $login, $password);
        $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $cnx;
    } catch (PDOException $e) {
        print "Erreur de connexion PDO ";
        die();
    }
}

