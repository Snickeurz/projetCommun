-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 20 Juin 2018 à 16:00
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetcommun`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE `contrat` (
  `id` int(11) NOT NULL,
  `contratUrl` varchar(255) DEFAULT NULL,
  `nomContrat` varchar(255) DEFAULT NULL,
  `idClient` int(11) DEFAULT NULL,
  `idEntreprise` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `dateupload` datetime DEFAULT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(100) DEFAULT NULL,
  `reponse` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `titre` varchar(40) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `idAccount` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `preferences`
--

CREATE TABLE `preferences` (
  `id` int(11) NOT NULL,
  `idAccount` int(11) DEFAULT NULL,
  `getNotif` tinyint(1) DEFAULT NULL,
  `newsLetter` tinyint(1) DEFAULT NULL,
  `notifMail` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `relation_client_entreprise`
--

CREATE TABLE `relation_client_entreprise` (
  `id` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idEntreprise` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idEntreprise` (`idEntreprise`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAccount` (`idAccount`);

--
-- Index pour la table `relation_client_entreprise`
--
ALTER TABLE `relation_client_entreprise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CLIENT` (`idClient`),
  ADD KEY `FK_ENTREPRISE` (`idEntreprise`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `relation_client_entreprise`
--
ALTER TABLE `relation_client_entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `idClient` FOREIGN KEY (`idClient`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `idEntreprise` FOREIGN KEY (`idEntreprise`) REFERENCES `account` (`id`);

--
-- Contraintes pour la table `preferences`
--
ALTER TABLE `preferences`
  ADD CONSTRAINT `idAccount` FOREIGN KEY (`idAccount`) REFERENCES `account` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
