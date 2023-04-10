<?php
// Fonction de connexion à la base de données PDO
function connexionPDO() {
    $login = "root"; // Identifiant de connexion à la base de données
    $password = "root"; // Mot de passe de connexion à la base de données
    $db = "hubereat"; // Nom de la base de données à laquelle on souhaite se connecter
    $server = "localhost"; // Adresse du serveur de la base de données

    try {

        // Tentative de connexion à la base de données en utilisant PDO
        $cnx = new PDO("mysql:host=$server;dbname=$db", $login, $password);

        // Configuration des erreurs PDO pour afficher les erreurs au lieu de les ignorer
        $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Retourne la connexion à la base de données
        return $cnx;
    } catch (PDOException $e) {
        // En cas d'erreur lors de la connexion, affichage d'un message d'erreur et arrêt du script
        print "Erreur de connexion PDO ";
        die();
    }
}