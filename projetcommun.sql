-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 20 Juin 2018 à 16:35
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
  `role` tinyint(1) NOT NULL,
  `phone` int(10) NOT NULL,
  `validateAccount` tinyint(1) DEFAULT '0',
  `lastConnexion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `account`
--

INSERT INTO `account` (`id`, `firstname`, `lastname`, `email`, `password`, `role`, `phone`, `validateAccount`, `lastConnexion`) VALUES
(1, 'Lucie', 'Godefert', 'lucie.godefert42@laposte.net', 'moi', 1, 782345822, 0, '2018-06-20 16:28:42'),
(2, 'Romain', 'Fleury', 'fleuryromain17@gmail.com', 'rf', 1, 0, 0, '2018-06-20 16:28:42'),
(3, 'Nestlé', 'entreprise', 'nestlé@gmail.com', 'ent', 0, 0, 0, '2018-06-20 16:28:42'),
(4, 'Google', 'entreprise', 'google@gmail.com', 'ent2', 0, 0, 0, '2018-06-20 16:28:42'),
(5, 'Alexandre', 'Romeo', 'alexandre.romeo.descartes@gmail.com', 'ar', 1, 0, 0, '2018-06-20 16:28:42'),
(6, 'Paris1', 'entreprise', 'paris1@gmail.com', 'paris', 0, 0, 0, '2018-06-20 16:28:42'),
(7, 'Natixis', 'entreprise', 'natixis@gmail.com', 'natixis', 0, 0, 0, '2018-06-20 16:28:42'),
(8, 'Nicolas', 'Sibaud', 'nicolassibaud@gmail.com', 'ns', 1, 0, 0, '2018-06-20 16:28:42'),
(9, 'Paris', '13', 'p13@gmail.com', '123', 0, 0, 0, '2018-06-20 16:28:42');

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

--
-- Contenu de la table `contrat`
--

INSERT INTO `contrat` (`id`, `contratUrl`, `nomContrat`, `idClient`, `idEntreprise`, `status`, `dateupload`, `description`) VALUES
(1, 'index.fxml', 'Contrat d\'embauche', 1, 3, 1, '2018-03-04 00:00:00', ''),
(2, 'contrat.pdf', 'Contrat de travail', 1, 4, 1, '2018-03-02 00:00:00', ''),
(3, 'test2.jpg', 'Contrat d\'apprentissage', 5, 6, 1, '2018-02-09 00:00:00', ''),
(4, 'cie.xml', 'CIE', 2, 7, 1, '2018-08-09 00:00:00', ''),
(5, 'location.pdf', 'Contrat de location', 2, 3, 1, '2018-02-01 00:00:00', ''),
(6, 'adhesion.pdf', 'Contrat d\'adhésion', 8, 6, 1, '2018-06-03 00:00:00', ''),
(7, 'vente.pdf', 'Compromis de vente', 5, 7, 1, '2018-01-12 00:00:00', ''),
(8, 'CGU.jpg', 'Conditions générales d\'utilisation', 1, 4, 0, '2018-06-16 00:00:00', ''),
(9, 'CGU.jpg', 'Conditions générales d\'utilisation', 2, 4, 0, '2018-06-16 00:00:00', ''),
(10, 'CGU.jpg', 'Conditions générales d\'utilisation', 5, 4, 0, '2018-06-16 00:00:00', ''),
(11, 'CGU.jpg', 'Conditions générales d\'utilisation', 8, 4, 0, '2018-06-16 00:00:00', ''),
(12, './uploads/contrats/Godefert/125-Pacte+d%5C\'actionnaires.gif', '125-Pacte+d%5C\'actionnaires.gif', 1, 4, 0, '2018-06-16 19:14:09', ''),
(14, 'ModifCGU.png', 'Modification des conditions d\'utilisation', 1, 3, 0, '2018-06-16 00:00:00', ''),
(15, 'ModifCGU.png', 'Modification des conditions d\'utilisation', 2, 3, 0, '2018-06-16 00:00:00', ''),
(16, 'ModifCGU.png', 'Modification des conditions d\'utilisation', 5, 3, 0, '2018-06-16 00:00:00', ''),
(17, 'ModifCGU.png', 'Modification des conditions d\'utilisation', 8, 3, 0, '2018-06-16 00:00:00', ''),
(18, 'ContratApprentissage.pdf', 'Contrat d\'apprentissatge 2018-2019', 2, 6, 0, '2018-06-16 00:00:00', ''),
(19, 'ContratApprentissage.pdf', 'Contrat d\'apprentissatge 2018-2019', 5, 7, 0, '2018-06-16 00:00:00', ''),
(20, 'propost.pdf', 'Proposition de poste', 8, 7, 0, '2018-06-16 00:00:00', '');

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
  `idAccount` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `notification`
--

INSERT INTO `notification` (`id`, `date`, `titre`, `message`, `lien`, `idAccount`) VALUES
(1, '2018-02-04 00:00:00', 'Signature de contrat', 'Le contrat a été signé par le client', 'lien vers contrat ', '1'),
(2, '2018-01-17 00:00:00', 'Ajout de contrat ', 'L\'entreprise Nestlé a ajouté un contrat', 'Lien', '1'),
(3, '2018-01-17 00:00:00', 'Modification de mot de passe', 'Mot de passe modifié', 'Lien', '1'),
(4, '2018-02-20 00:00:00', 'Signature de contrat ', 'Vous avez signé un contrat ', 'Lien', NULL);

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
(1, 1, 0, 1, 0),
(2, 2, 0, 1, 1),
(3, 3, 1, 0, 0),
(4, 4, 0, 1, 0),
(5, 5, 1, 1, 1),
(6, 6, 1, 0, 1),
(7, 7, 0, 0, 1),
(8, 9, 0, 0, 0);

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
(1, 1, 9);

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
  ADD KEY `fk_id_idClient` (`idClient`),
  ADD KEY `fk_id_idEntreprise` (`idEntreprise`);

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
  ADD KEY `fk_id_account` (`idAccount`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `relation_client_entreprise`
--
ALTER TABLE `relation_client_entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `fk_id_idClient` FOREIGN KEY (`idClient`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `fk_id_idEntreprise` FOREIGN KEY (`idEntreprise`) REFERENCES `account` (`id`);

--
-- Contraintes pour la table `preferences`
--
ALTER TABLE `preferences`
  ADD CONSTRAINT `fk_id_account` FOREIGN KEY (`idAccount`) REFERENCES `account` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
