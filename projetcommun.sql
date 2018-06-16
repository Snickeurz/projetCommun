SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--DROP DATABASE projetcommun;

--
-- Structure de la table `account`
--

CREATE TABLE IF NOT EXISTS account (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  firstname varchar(30) NOT NULL,
  lastname varchar(30) NOT NULL,
  email varchar(50) NOT NULL,
  password varchar(30) NOT NULL,
  role tinyint(1) DEFAULT NULL,
  phone int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO account (firstname, lastname, email, password, role, phone) VALUES
('Romain', 'Fleury', 'fleuryromain17@gmail.com', 'rf', 1, 0),
('Nestlé', 'entreprise', 'nestlé@gmail.com', 'ent', 0, 0),
('Google', 'entreprise', 'google@gmail.com', 'ent2', 0, 0),
('Alexandre', 'Romeo', 'alexandre.romeo.descartes@gmail.com', 'ar', 1, 0),
('Paris1', 'entreprise', 'paris1@gmail.com', 'paris', 0, 0),
('Natixis', 'entreprise', 'natixis@gmail.com', 'natixis', 0, 0),
('Nicolas', 'Sibaud', 'nicolassibaud@gmail.com', 'ns', 1, 0);


--
-- Structure de la table `contrat`
--

CREATE TABLE IF NOT EXISTS contrat (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  contratUrl varchar(255) DEFAULT NULL,
  nomContrat varchar(255) DEFAULT NULL,
  idClient int(11) DEFAULT NULL,
  idEntreprise int(11) DEFAULT NULL,
  status tinyint(1) DEFAULT NULL,
  dateupload datetime DEFAULT NULL,
  CONSTRAINT fk_id_idClient       
	FOREIGN KEY (idClient)           
	REFERENCES account(id),
	CONSTRAINT fk_id_idEntreprise       
	FOREIGN KEY (idEntreprise)           
	REFERENCES account(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO contrat (contratUrl, nomContrat, idClient, idEntreprise, status, dateupload) VALUES
('index.fxml', 'Contrat d''embauche', 1, 3, 1, '2018-03-04 00:00:00'),
('contrat.pdf', 'Contrat de travail', 1, 4, 1, '2018-03-02 00:00:00'),
('test2.jpg', 'Contrat d''apprentissage', 5, 6, 1, '2018-02-09 00:00:00'),
('cie.xml', 'CIE', 2, 7, 1, '2018-08-09 00:00:00'),
('location.pdf', 'Contrat de location', 2, 3, 1, '2018-02-01 00:00:00'),
('adhesion.pdf', 'Contrat d''adhésion', 8, 6, 1, '2018-06-03 00:00:00'),
('vente.pdf', 'Compromis de vente', 5, 7, 1, '2018-01-12 00:00:00');


--
-- Structure de la table `notification`
--

CREATE TABLE IF NOT EXISTS notification (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  titre varchar(40) DEFAULT NULL,
  message varchar(100) DEFAULT NULL,
  lien varchar(255) DEFAULT NULL,
  idEntreprise varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO notification (`date`, titre, message, lien, idEntreprise) VALUES
('2018-02-04 00:00:00', 'Signature de contrat', 'Le contrat a été signé par le client', 'lien vers contrat ', '1'),
('2018-01-17 00:00:00', 'Ajout de contrat ', 'L''entreprise Nestlé a ajouté un contrat', 'Lien', '1'),
('2018-01-17 00:00:00', 'Modification de mot de passe', 'Mot de passe modifié', 'Lien', '1'),
('2018-02-20 00:00:00', 'Signature de contrat ', 'Vous avez signé un contrat ', 'Lien', NULL);


--
-- Structure de la table `preferences`
--

CREATE TABLE IF NOT EXISTS preferences (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  idAccount int(11) DEFAULT NULL,
  getNotif boolean DEFAULT NULL,
  newsLetter boolean DEFAULT NULL,
  notifMail boolean DEFAULT NULL,    
	CONSTRAINT fk_id_account       
	FOREIGN KEY (idAccount)           
	REFERENCES account(id)  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO preferences (idAccount, getNotif, newsLetter, notifMail) VALUES
( 1, 0, 1, 0),
(2, 0, 1, 1),
(3, 1, 0, 0),
(4, 0,0,0),
(5, 1,1,1),
(6, 1,0,1),
(7, 0,0,1);


--
-- Structure de la table `faq`
--


CREATE TABLE IF NOT EXISTS faq (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  question varchar(100) DEFAULT NULL,
  reponse varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO faq (question, reponse) VALUES
( 'Comment contacter les administrateurs du site ? ', 'L''onglet ''Contact'' est là pour vous aider ! Remplissez le formulaire et nous vous répondrons dès que possible. Si votre question est pertinente pour les autres utilisateurs, elle apparaitra dans notre FAQ.'),
('A quoi correspondent les notifications ?','Les notifications indiquent qu''une action a été effectuée.'),
('Quelle sorte de contrat puis-je déposer sur le site ?','Vous pouvez déposer tous les contrats que vous jugez utiles selon vos besoins.');

