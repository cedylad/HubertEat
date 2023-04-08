-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 07 avr. 2023 à 21:08
-- Version du serveur : 5.7.24
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hubereat`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

CREATE TABLE `address` (
  `idA` int(11) NOT NULL,
  `cityA` varchar(25) DEFAULT NULL,
  `countryA` varchar(25) DEFAULT NULL,
  `idR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `address`
--

INSERT INTO `address` (`idA`, `cityA`, `countryA`, `idR`) VALUES
(4, 'Paris', 'France', 1),
(5, 'Paris', 'France', 2),
(6, 'Paris', 'France', 11),
(10, 'Metz', 'France', 18),
(12, 'Marseille', 'France', 20);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idC` int(11) NOT NULL,
  `idP` int(11) DEFAULT NULL,
  `mailU` varchar(30) DEFAULT NULL,
  `dateC` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `livraison` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idC`, `idP`, `mailU`, `dateC`, `livraison`) VALUES
(1, 12, 'willsmith@mail.fr', '2023-04-07 21:16:30', '0'),
(2, 12, 'willsmith@mail.fr', '2023-04-07 21:16:30', '1'),
(3, 10, 'willsmith@mail.fr', '2023-04-07 22:06:44', '0'),
(4, 11, 'willsmith@mail.fr', '2023-04-07 22:07:44', '2'),
(5, 10, 'willsmith@mail.fr', '2023-04-07 22:07:56', '0'),
(6, 10, 'willsmith@mail.fr', '2023-04-07 22:08:01', '0');

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `idP` int(11) NOT NULL,
  `nomP` varchar(25) DEFAULT NULL,
  `prixP` varchar(5) NOT NULL,
  `descP` varchar(200) NOT NULL,
  `imgP` varchar(50) NOT NULL,
  `restoR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`idP`, `nomP`, `prixP`, `descP`, `imgP`, `restoR`) VALUES
(9, 'Café gourmand', '0', 'Le café gourmand est principalement constitué d\'une farandole de desserts miniatures, de mignardises aux multiples saveurs.', '642e7e3d8e66a.jpg', 11),
(10, 'Sushi', '0', 'A base de riz vinaigré froid, le sumeshi : poisson cru ou cuit, crustacé, légume, omelette et bien d\'autres ingrédients encore. ', '642e80eb5e233.jpg', 18),
(11, 'Nouille', '0', 'Les nouilles sont un incontournable de la cuisine japonaise. Ils sont souvent servis frais avec des trempettes, ou dans des soupes ou des plats chauds. ', '642e8f7915a3f.jpg', 18),
(12, 'Hommard', '0', 'Fruit de mer, servi avec du citron.', '642e9fb7383e8.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `resto`
--

CREATE TABLE `resto` (
  `idR` int(11) NOT NULL,
  `nameR` varchar(25) DEFAULT NULL,
  `ownerR` varchar(30) DEFAULT NULL,
  `hourOpenR` varchar(25) DEFAULT NULL,
  `hourCloseR` varchar(25) DEFAULT NULL,
  `phoneR` varchar(10) DEFAULT NULL,
  `imgR` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `resto`
--

INSERT INTO `resto` (`idR`, `nameR`, `ownerR`, `hourOpenR`, `hourCloseR`, `phoneR`, `imgR`) VALUES
(1, 'L\'Anglade', 'bg@mail.fr', '09h00', '18h00', '0123456789', 'langlade.jpg'),
(2, 'La Méduse', 'bg@mail.fr', '09h00', '18h00', '0123456789', 'meduse.jpg'),
(11, 'Petit Délice', 'borisvian@mail.fr', '09h30', '23h00', '0123456789', 'petitdelice.jpg'),
(18, 'Le P\'tit Jap', 'borisvian@mail.fr', '11h45', '15h00', '123456789', 'asian-food.jpg'),
(20, 'Le Potager', 'bg@mail.fr', '19h00', '23h00', '123456789', '642d2687ee5ad.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `typeuser`
--

CREATE TABLE `typeuser` (
  `idT` int(11) NOT NULL,
  `nameT` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typeuser`
--

INSERT INTO `typeuser` (`idT`, `nameT`) VALUES
(1, 'Restaurateur'),
(2, 'Client'),
(3, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `mailU` varchar(30) NOT NULL,
  `lastNameU` varchar(25) DEFAULT NULL,
  `firstNameU` varchar(25) DEFAULT NULL,
  `passwordU` varchar(255) DEFAULT NULL,
  `typeU` int(11) DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`mailU`, `lastNameU`, `firstNameU`, `passwordU`, `typeU`) VALUES
('bg@mail.fr', 'Brassens', 'Georges', 'sej5vWNdAeBCw', 1),
('borisvian@mail.fr', 'Vian', 'Boris', 'sej5vWNdAeBCw', 1),
('johndoe@mail.fr', 'Doe', 'John', 'sej5vWNdAeBCw', 3),
('willsmith@mail.fr', 'Smith', 'Will', 'sej5vWNdAeBCw', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`idA`),
  ADD KEY `idR` (`idR`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idC`),
  ADD KEY `idP` (`idP`),
  ADD KEY `mailU` (`mailU`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`idP`),
  ADD KEY `restoR` (`restoR`);

--
-- Index pour la table `resto`
--
ALTER TABLE `resto`
  ADD PRIMARY KEY (`idR`),
  ADD KEY `ownerR` (`ownerR`);

--
-- Index pour la table `typeuser`
--
ALTER TABLE `typeuser`
  ADD PRIMARY KEY (`idT`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`mailU`),
  ADD KEY `typeU` (`typeU`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `address`
--
ALTER TABLE `address`
  MODIFY `idA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `resto`
--
ALTER TABLE `resto`
  MODIFY `idR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `typeuser`
--
ALTER TABLE `typeuser`
  MODIFY `idT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`idR`) REFERENCES `resto` (`idR`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idP`) REFERENCES `plat` (`idP`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`mailU`) REFERENCES `users` (`mailU`);

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `plat_ibfk_1` FOREIGN KEY (`restoR`) REFERENCES `resto` (`idR`);

--
-- Contraintes pour la table `resto`
--
ALTER TABLE `resto`
  ADD CONSTRAINT `resto_ibfk_1` FOREIGN KEY (`ownerR`) REFERENCES `users` (`mailU`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`typeU`) REFERENCES `typeuser` (`idT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
