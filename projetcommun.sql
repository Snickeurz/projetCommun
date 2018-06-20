-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 20 Juin 2018 à 07:41
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

--
-- Contenu de la table `account`
--

INSERT INTO `account` (`id`, `firstname`, `lastname`, `email`, `password`, `role`, `phone`) VALUES
(1, 'unPrenom', 'unNom', 'what@free.fr', 'password', 1, 859959561),
(2, 'Josébové', 'Entreprise', 'entreprise', 'entreprise', 0, 632323233),
(4, 'entreprise2', 'entreprise2', 'entreprise2', 'entreprise2', 0, 0),
(5, 'client2', 'client2', 'client2', 'client2', 1, 0),
(7, 'Romain', 'Fleury', 'fleuryromain17@gmail.com', 'rf', 1, 0),
(8, 'Nestlé', 'entreprise', 'nestlé@gmail.com', 'ent', 0, 0),
(9, 'Google', 'entreprise', 'google@gmail.com', 'ent2', 0, 0),
(10, 'Alexandre', 'Romeo', 'alexandre.romeo.descartes@gmail.com', 'ar', 1, 0),
(11, 'Paris1', 'entreprise', 'paris1@gmail.com', 'paris', 0, 0),
(12, 'Natixis', 'entreprise', 'natixis@gmail.com', 'natixis', 0, 0),
(13, 'Nicolas', 'Sibaud', 'nicolassibaud@gmail.com', 'ns', 1, 0),
(14, 'Nicolas', 'SIBAUD', 'abcdes@hotmail.fr', '123', 1, 0),
(15, 'test', 'sdfsdf', 'what@free.fr', 'password', 1, 0);

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
  `dateupload` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contrat`
--

INSERT INTO `contrat` (`id`, `contratUrl`, `nomContrat`, `idClient`, `idEntreprise`, `status`, `dateupload`) VALUES
(1, 'index.fxml', 'unnomdecontrat', 2, 1, 0, '2018-05-12 00:00:00'),
(3, 'test2', 'test2', 5, 4, 1, '2018-02-09 00:00:00'),
(4, 'test3', 'test3', 5, 4, 0, '2018-02-09 00:00:00'),
(6, 'index.fxml', NULL, NULL, NULL, NULL, NULL),
(7, '.gitconfig', NULL, NULL, NULL, NULL, NULL),
(9, 'chemin/fichier2.ext', 'Contrat numéro 2', 1, 4, 1, '2017-11-22 00:00:00'),
(15, './uploads/contrats/Romeo/contrat.txt', 'contrat.txt', 10, 2, 1, '2018-06-18 20:59:06');

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(100) DEFAULT NULL,
  `reponse` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `faq`
--

INSERT INTO `faq` (`id`, `question`, `reponse`) VALUES
(1, 'Comment contacter les administrateurs du site ? ', 'L\'onglet \'Contact\' est là pour vous aider ! Remplissez le formulaire et nous vous répondrons dès que possible. Si votre question est pertinente pour les autres utilisateurs, elle apparaitra dans notre FAQ.'),
(2, 'A quoi correspondent les notifications ?', 'Les notifications indiquent qu\'une action a été effectuée.'),
(3, 'Quelle sorte de contrat puis-je déposer sur le site ?', 'Vous pouvez déposer tous les contrats que vous jugez utiles selon vos besoins.');

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
  `idEntreprise` varchar(255) DEFAULT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `notification`
--

INSERT INTO `notification` (`id`, `date`, `titre`, `message`, `lien`, `idEntreprise`, `idClient`) VALUES
(1, '2018-02-01 12:50:36', 'Signez votre contrat', 'Vous devez signer le contrat', './index.php?uc=redirect&ac=profil', '2', 1),
(2, '2018-02-05 08:06:44', 'Titre 2', 'Message notification', './index.php?uc=redirect&ac=profil', '2', 1),
(3, '2018-04-27 09:50:59', 'Fin de contrat', 'Votre contrat prendra fin a la date donnée', 'lienContrat', '2', 1),
(4, '2017-08-01 16:59:00', 'Voici un titre', 'Voici un message', 'voici_un__lien', '2', 1);

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

--
-- Contenu de la table `preferences`
--

INSERT INTO `preferences` (`id`, `idAccount`, `getNotif`, `newsLetter`, `notifMail`) VALUES
(2, 1, 1, 1, 1),
(3, 14, 0, 1, 1),
(4, 15, 0, 0, 0);

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
-- Contenu de la table `relation_client_entreprise`
--

INSERT INTO `relation_client_entreprise` (`id`, `idClient`, `idEntreprise`) VALUES
(1, 10, 2),
(2, 14, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `relation_client_entreprise`
--
ALTER TABLE `relation_client_entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
