-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 16 jan. 2018 à 11:13
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `compa_banque`
--

-- --------------------------------------------------------

--
-- Structure de la table `banque`
--

CREATE TABLE `banque` (
  `idbanque` int(20) NOT NULL,
  `nombanque` varchar(20) NOT NULL,
  `nomcomplet` varchar(200) NOT NULL,
  `adrbanque` varchar(250) NOT NULL,
  `telbanque` varchar(30) NOT NULL,
  `faxbanque` varchar(50) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `banque`
--

INSERT INTO `banque` (`idbanque`, `nombanque`, `nomcomplet`, `adrbanque`, `telbanque`, `faxbanque`, `logo`) VALUES
(1, 'amir', 'Ã©Ã©Ã©Ã©Ã©Ã©Ã©Ã©Ã©Ã©Ã©Ã©Ã©Ã©  dfsfsdfsdf', '48, Rue des freres Bouadou, Bir Mourad Rais - Alger', '021 56 25 70', '021 56 30 50 / 56 51 54', 'images/bea.jpg'),
(2, 'BNA', 'BANQUE NATIONALE D ALGERIE', '8, Boulevard Ernesto Che Guevara, Alger', '021 43 99 98', '021 43 4 94', 'images/bna.png'),
(3, 'BADR ', 'BANQUE DE L AGRICULTURE ET DU DEVELOPPEMENT RURAL', '17, Boulevard Colonel Amirouche, Alger', '021 64 26 70 / 63 38 78', '021 63 51 46 / 64 34 44', 'images/badr.gif'),
(4, ' BDL ', 'BANQUE DE DEVELOPPEMENT LOCAL', '5, rue Gaci Amar, Staoueli, Alger', '021 39 34 89 /39 52 15', '021 39 37 57', 'images/bdl.jpg');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `banque_data`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `banque_data` (
`idbanque` int(20)
,`nombanque` varchar(20)
,`nomcomplet` varchar(200)
,`adrbanque` varchar(250)
,`telbanque` varchar(30)
,`faxbanque` varchar(50)
,`logo` varchar(100)
,`g_total` decimal(41,0)
,`o_total` decimal(41,0)
,`m_total` decimal(41,0)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `banque_data1`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `banque_data1` (
`idbanque` int(20)
,`nombanque` varchar(20)
,`nomcomplet` varchar(200)
,`adrbanque` varchar(250)
,`telbanque` varchar(30)
,`faxbanque` varchar(50)
,`logo` varchar(100)
,`num` int(20)
,`g_banque` int(11)
,`g_frais` int(20)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `banque_data_m`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `banque_data_m` (
`idbanque` int(20)
,`nombanque` varchar(20)
,`nomcomplet` varchar(200)
,`adrbanque` varchar(250)
,`telbanque` varchar(30)
,`faxbanque` varchar(50)
,`logo` varchar(100)
,`num` int(10)
,`m_frais` int(20)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `banque_data_o`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `banque_data_o` (
`idbanque` int(20)
,`nombanque` varchar(20)
,`nomcomplet` varchar(200)
,`adrbanque` varchar(250)
,`telbanque` varchar(30)
,`faxbanque` varchar(50)
,`logo` varchar(100)
,`num` int(20)
,`o_frais` int(20)
);

-- --------------------------------------------------------

--
-- Structure de la table `gestion`
--

CREATE TABLE `gestion` (
  `idgestion` int(11) NOT NULL,
  `num` int(20) NOT NULL,
  `GESTION ET TENUE DE COMPTE` varchar(200) DEFAULT NULL,
  `COMMISSION / FRAIS HT` varchar(100) DEFAULT NULL,
  `g_frais` int(20) NOT NULL,
  `g_banque` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gestion`
--

INSERT INTO `gestion` (`idgestion`, `num`, `GESTION ET TENUE DE COMPTE`, `COMMISSION / FRAIS HT`, `g_frais`, `g_banque`) VALUES
(11, 1, 'Ouverture de compte et delivrance chequier', 'GRATUIT', 0, 1),
(12, 2, 'Frais de tenue de compte courant', '1 000 DA/AN', 1000, 1),
(13, 3, 'Frais de tenue de compte professionnel', '1 000 DA/AN', 1000, 1),
(14, 4, 'Frais de tenue de compte cheque', '500 DA/AN', 500, 1),
(15, 5, 'Frais de tenue de compte sur livret', 'GRATUIT', 0, 1),
(16, 6, 'Tenue de compte en devise', 'GRATUIT', 0, 1),
(17, 7, 'Fermeture compte courant', '1 000 DA/AN', 1000, 1),
(18, 8, 'Fermeture compte cheque', 'GRATUIT', 0, 1),
(19, 9, 'Fermeture compte sur livret', 'GRATUIT', 0, 1),
(21, 1, 'Ouverture de compte et delivrance chequier', '500 DA/AN', 500, 2),
(22, 2, 'Frais de tenue de compte courant', 'GRATUIT', 0, 2),
(23, 3, 'Frais de tenue de compte professionnel', 'GRATUIT', 0, 2),
(24, 4, 'Frais de tenue de compte cheque', '1 000 DA/AN', 1100, 2),
(25, 5, 'Frais de tenue de compte sur livret', 'GRATUIT', 0, 2),
(26, 6, 'Tenue de compte en devise', '500 DA/AN', 500, 2),
(27, 7, 'Fermeture compte courant', 'GRATUIT', 0, 2),
(28, 8, 'Fermeture compte cheque', 'GRATUIT', 0, 2),
(29, 9, 'Fermeture compte sur livret', '2 000 DA', 2000, 2),
(31, 1, 'Ouverture de compte et delivrance chequier', '1 000 DA/AN', 1000, 3),
(32, 2, 'Frais de tenue de compte courant', 'GRATUIT', 0, 3),
(33, 3, 'Frais de tenue de compte professionnel', 'GRATUIT', 0, 3),
(34, 4, 'Frais de tenue de compte cheque', '1 200 DA/AN', 1200, 3),
(35, 5, 'Frais de tenue de compte sur livret', 'GRATUIT', 0, 3),
(36, 6, 'Tenue de compte en devise', '2 000 DA/AN', 2000, 3),
(37, 7, 'Fermeture compte courant', 'GRATUIT', 0, 3),
(38, 8, 'Fermeture compte cheque', 'GRATUIT', 0, 3),
(39, 9, 'Fermeture compte sur livret', 'GRATUIT', 0, 3),
(41, 1, 'Ouverture de compte et delivrance chequier', 'GRATUIT', 0, 4),
(42, 2, 'Frais de tenue de compte courant', '1 200 DA/AN', 1200, 4),
(43, 3, 'Frais de tenue de compte professionnel', '1 200 DA/AN', 1200, 4),
(44, 4, 'Frais de tenue de compte cheque', '400 DA/AN', 400, 4),
(45, 5, 'Frais de tenue de compte sur livret', '1 100 DA/AN', 1100, 4),
(46, 6, 'Tenue de compte en devise', '1 300 DA/AN', 1300, 4),
(47, 7, 'Fermeture compte courant', '1 000 DA/AN', 1000, 4),
(48, 8, 'Fermeture compte cheque', 'GRATUIT', 0, 4),
(49, 9, 'Fermeture compte sur livret', 'GRATUIT', 0, 4),
(110, 10, 'Fermeture compte devise', '2 000 DA', 2000, 1),
(210, 10, 'Fermeture compte devise', 'GRATUIT', 0, 2),
(310, 10, 'Fermeture compte devise', '2 500 DA/AN', 2500, 3),
(410, 10, 'Fermeture compte devise', '2 000 DA', 2000, 4);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `g_banque`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `g_banque` (
`idbanque` int(20)
,`nombanque` varchar(20)
,`nomcomplet` varchar(200)
,`adrbanque` varchar(250)
,`telbanque` varchar(30)
,`faxbanque` varchar(50)
,`logo` varchar(100)
,`idgestion` int(11)
,`num` int(20)
,`GESTION ET TENUE DE COMPTE` varchar(200)
,`COMMISSION / FRAIS HT` varchar(100)
,`g_frais` int(20)
,`g_banque` int(11)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `g_total`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `g_total` (
`g_banque` int(11)
,`g_total` decimal(41,0)
);

-- --------------------------------------------------------

--
-- Structure de la table `monetique`
--

CREATE TABLE `monetique` (
  `idmonetique` int(11) NOT NULL,
  `num` int(10) NOT NULL,
  `DESIGNATION` varchar(200) DEFAULT NULL,
  `COMMISSION / FRAIS` varchar(100) DEFAULT NULL,
  `m_frais` int(20) NOT NULL,
  `m_banque` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `monetique`
--

INSERT INTO `monetique` (`idmonetique`, `num`, `DESIGNATION`, `COMMISSION / FRAIS`, `m_frais`, `m_banque`) VALUES
(111, 1, 'Emission de la première carte', '1 000 DA', 1000, 1),
(112, 2, 'Renouvelement', 'GRATUIT', 0, 1),
(113, 3, 'Reconfection', 'GRATUIT', 0, 1),
(114, 4, 'Reedition du code secret', 'GRATUIT', 0, 1),
(115, 5, 'Comission de retrait Sur DAB de la banque', 'GRATUIT', 0, 1),
(116, 6, 'Comission de retrait Sur DAB confrere', '28 DA TTC', 28, 1),
(117, 7, 'Commission de paiement sur TPE/Client', 'GRATUIT', 0, 1),
(118, 8, 'Commission de paiement sur TPE/Commerçant', 'GRATUIT', 0, 1),
(121, 9, 'Octroi', '1 500 DA', 1500, 1),
(122, 10, 'Mise en opposition', '700 DA', 700, 1),
(123, 11, 'Re-confection', '2 500 DA', 2500, 1),
(124, 12, 'Reedition du code secret', '1 000 DA', 1000, 1),
(125, 13, 'Changement de code PIN', 'GRATUIT', 0, 1),
(211, 1, 'Emission de la première carte', 'GRATUIT', 0, 2),
(212, 2, 'Renouvelement', 'GRATUIT', 0, 2),
(213, 3, 'Reconfection', '4000 DA', 4000, 2),
(214, 4, 'Reedition du code secret', 'GRATUIT', 0, 2),
(215, 5, 'Comission de retrait Sur DAB de la banque', '1300 DA', 1300, 2),
(216, 6, 'Comission de retrait Sur DAB confrere', '20 DA TTC', 20, 2),
(217, 7, 'Commission de paiement sur TPE/Client', 'GRATUIT', 0, 2),
(218, 8, 'Commission de paiement sur TPE/Commerçant', '6 DA', 6, 2),
(221, 9, 'Octroi', '500 DA', 500, 2),
(222, 10, 'Mise en opposition', '5000 DA', 5000, 2),
(223, 11, 'Re-confection', '2 000 DA', 2000, 2),
(224, 12, 'Reedition du code secret', '1 000 DA', 1000, 2),
(225, 13, 'Changement de code PIN', 'GRATUIT', 0, 2),
(311, 1, 'Emission de la première carte', 'GRATUIT', 0, 3),
(312, 2, 'Renouvelement', '2500 DA', 2500, 3),
(313, 3, 'Reconfection', 'GRATUIT', 0, 3),
(314, 4, 'Reedition du code secret', 'GRATUIT', 0, 3),
(315, 5, 'Comission de retrait Sur DAB de la banque', '400 DA', 400, 3),
(316, 6, 'Comission de retrait Sur DAB confrere', '4 DA TTC', 4, 3),
(317, 7, 'Commission de paiement sur TPE/Client', 'GRATUIT', 0, 3),
(318, 8, 'Commission de paiement sur TPE/Commerçant', '2 DA', 2, 3),
(321, 9, 'Octroi', '900 DA', 900, 3),
(322, 10, 'Mise en opposition', '500 DA', 500, 3),
(323, 11, 'Re-confection', '3 000 DA', 3000, 3),
(324, 12, 'Reedition du code secret', '2 000 DA', 2000, 3),
(325, 13, 'Changement de code PIN', 'GRATUIT', 0, 3),
(411, 1, 'Emission de la premiere carte', '1000 DA', 1000, 4),
(412, 2, 'Renouvelement', 'GRATUIT', 0, 4),
(413, 3, 'Reconfection', 'GRATUIT', 0, 4),
(414, 4, 'Reedition du code secret', 'GRATUIT', 0, 4),
(415, 5, 'Comission de retrait Sur DAB de la banque', '500 DA', 500, 4),
(416, 6, 'Comission de retrait Sur DAB confrere', '29.25 DA TTC', 29, 4),
(417, 7, 'Commission de paiement sur TPE/Client', 'GRATUIT', 0, 4),
(418, 8, 'Commission de paiement sur TPE/Commercant', '2 DA', 2, 4),
(421, 9, 'Octroi', '10 000 DA', 10000, 4),
(422, 10, 'Mise en opposition', '500 DA', 500, 4),
(423, 11, 'Re-confection', '2 000 DA', 2000, 4),
(424, 12, 'Reedition du code secret', '1 000 DA', 1000, 4),
(425, 13, 'Changement de code PIN', 'GRATUIT', 0, 4);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `m_banque`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `m_banque` (
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `m_total`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `m_total` (
`m_banque` int(11)
,`m_total` decimal(41,0)
);

-- --------------------------------------------------------

--
-- Structure de la table `operation`
--

CREATE TABLE `operation` (
  `idoperation` int(11) NOT NULL,
  `num` int(20) NOT NULL,
  `OPERATIONS AU CREDIT DU COMPTE DINARS/ DEVISES` varchar(200) DEFAULT NULL,
  `COMMISSION / FRAIS HT` varchar(100) DEFAULT NULL,
  `o_frais` int(20) NOT NULL,
  `o_banque` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `operation`
--

INSERT INTO `operation` (`idoperation`, `num`, `OPERATIONS AU CREDIT DU COMPTE DINARS/ DEVISES`, `COMMISSION / FRAIS HT`, `o_frais`, `o_banque`) VALUES
(11, 1, 'Versement espèces (Client agence)', 'GRATUIT', 0, 1),
(12, 2, 'Versement especes (Tiers))', 'GRATUIT', 0, 1),
(13, 3, 'Versement especes deplace (Client autre agence)', 'GRATUIT', 0, 1),
(14, 4, 'Virement reçu d un compte de la meme agence', 'GRATUIT', 0, 1),
(15, 5, 'Virement reçu d un compte d une autre agence de la meme banque', 'GRATUIT', 0, 1),
(16, 6, 'Virement devise reçu de l etranger', '500 DA', 0, 1),
(17, 7, 'Rertait especes', 'GRATUIT', 0, 1),
(18, 8, 'Retrait especes aux guichets d une autre agence', 'GRATUIT', 0, 1),
(19, 9, 'Emission de cheque de banque', '500 DA', 500, 1),
(21, 1, 'Versement espèces (Client agence)', 'GRATUIT', 0, 2),
(22, 2, 'Versement especes (Tiers))', 'GRATUIT', 0, 2),
(23, 3, 'Versement especes deplace (Client autre agence)', 'GRATUIT', 0, 2),
(24, 4, 'Virement reçu d un compte de la meme agence', '1000 DA', 1000, 2),
(25, 5, 'Virement reçu d un compte d une autre agence de la meme banque', 'GRATUIT', 0, 2),
(26, 6, 'Virement devise reçu de l etranger', '500 DA', 0, 2),
(27, 7, 'Rertait especes', 'GRATUIT', 0, 2),
(28, 8, 'Retrait especes aux guichets d une autre agence', '3000 DA', 3000, 2),
(29, 9, 'Emission de cheque de banque', '500 DA', 500, 2),
(31, 1, 'Versement espèces (Client agence)', 'GRATUIT', 0, 3),
(32, 2, 'Versement especes (Tiers))', 'GRATUIT', 0, 3),
(33, 3, 'Versement especes deplace (Client autre agence)', 'GRATUIT', 0, 3),
(34, 4, 'Virement reçu d un compte de la meme agence', 'GRATUIT', 0, 3),
(35, 5, 'Virement reçu d un compte d une autre agence de la meme banque', '2000 DA', 2000, 3),
(36, 6, 'Virement devise reçu de l etranger', '500 DA', 500, 3),
(37, 7, 'Rertait especes', 'GRATUIT', 0, 3),
(38, 8, 'Retrait especes aux guichets d une autre agence', 'GRATUIT', 0, 3),
(39, 9, 'Emission de cheque de banque', '500 DA', 500, 3),
(41, 1, 'Versement especes (Client agence)', 'GRATUIT', 0, 4),
(42, 2, 'Versement especes (Tiers))', '1000 DA', 1000, 4),
(43, 3, 'Versement especes deplace (Client autre agence)', 'GRATUIT', 0, 4),
(44, 4, 'Virement recu d un compte de la meme agence', 'GRATUIT', 0, 4),
(45, 5, 'Virement recu d un compte d une autre agence de la meme banque', 'GRATUIT', 0, 4),
(46, 6, 'Virement devise recu de l etranger', '550 DA', 550, 4),
(47, 7, 'Rertait especes', 'GRATUIT', 0, 4),
(48, 8, 'Retrait especes aux guichets d une autre agence', 'GRATUIT', 0, 4),
(49, 9, 'Emission de cheque de banque', '100 DA', 100, 4),
(110, 10, 'Emission Cheque de banque deplace', '5 000 DA', 5000, 1),
(111, 11, 'Annulation de cheque de banque (Client)', '500 DA', 500, 1),
(112, 12, 'Virement de compte a compte (meme agence)', 'GRATUIT', 0, 1),
(113, 13, 'Virement ordonne en faveur client d une autre agence', '1500 DA', 1500, 1),
(210, 10, 'Emission Cheque de banque deplace', '5 000 DA', 5000, 2),
(211, 11, 'Annulation de cheque de banque (Client)', '1500 DA', 1500, 2),
(212, 12, 'Virement de compte a compte (meme agence)', 'GRATUIT', 0, 2),
(213, 13, 'Virement ordonne en faveur client d une autre agence', '50 DA', 50, 2),
(310, 10, 'Emission Cheque de banque deplace', '3 000 DA', 3000, 3),
(311, 11, 'Annulation de cheque de banque (Client)', '500 DA', 500, 3),
(312, 12, 'Virement de compte a compte (meme agence)', 'GRATUIT', 0, 3),
(313, 13, 'Virement ordonne en faveur client d une autre agence', '70 DA', 70, 3),
(410, 10, 'Emission Cheque de banque deplace', '5 000 DA', 5000, 4),
(411, 11, 'Annulation de cheque de banque (Client)', 'GRATUIT', 0, 4),
(412, 12, 'Virement de compte a compte (meme agence)', 'GRATUIT', 0, 4),
(413, 13, 'Virement ordonne en faveur client d une autre agence', '50 DA', 50, 4);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `o_banque`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `o_banque` (
`idbanque` int(20)
,`nombanque` varchar(20)
,`nomcomplet` varchar(200)
,`adrbanque` varchar(250)
,`telbanque` varchar(30)
,`faxbanque` varchar(50)
,`logo` varchar(100)
,`idoperation` int(11)
,`num` int(20)
,`OPERATIONS AU CREDIT DU COMPTE DINARS/ DEVISES` varchar(200)
,`COMMISSION / FRAIS HT` varchar(100)
,`o_frais` int(20)
,`o_banque` int(11)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `o_total`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `o_total` (
`o_banque` int(11)
,`o_total` decimal(41,0)
);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la vue `banque_data`
--
DROP TABLE IF EXISTS `banque_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `banque_data`  AS  select `banque`.`idbanque` AS `idbanque`,`banque`.`nombanque` AS `nombanque`,`banque`.`nomcomplet` AS `nomcomplet`,`banque`.`adrbanque` AS `adrbanque`,`banque`.`telbanque` AS `telbanque`,`banque`.`faxbanque` AS `faxbanque`,`banque`.`logo` AS `logo`,`g_total`.`g_total` AS `g_total`,`o_total`.`o_total` AS `o_total`,`m_total`.`m_total` AS `m_total` from (((`banque` join `g_total`) join `o_total`) join `m_total`) where ((`banque`.`idbanque` = `g_total`.`g_banque`) and (`banque`.`idbanque` = `o_total`.`o_banque`) and (`banque`.`idbanque` = `m_total`.`m_banque`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `banque_data1`
--
DROP TABLE IF EXISTS `banque_data1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `banque_data1`  AS  select `banque`.`idbanque` AS `idbanque`,`banque`.`nombanque` AS `nombanque`,`banque`.`nomcomplet` AS `nomcomplet`,`banque`.`adrbanque` AS `adrbanque`,`banque`.`telbanque` AS `telbanque`,`banque`.`faxbanque` AS `faxbanque`,`banque`.`logo` AS `logo`,`gestion`.`num` AS `num`,`gestion`.`g_banque` AS `g_banque`,`gestion`.`g_frais` AS `g_frais` from (`banque` join `gestion`) where (`banque`.`idbanque` = `gestion`.`g_banque`) ;

-- --------------------------------------------------------

--
-- Structure de la vue `banque_data_m`
--
DROP TABLE IF EXISTS `banque_data_m`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `banque_data_m`  AS  select `banque`.`idbanque` AS `idbanque`,`banque`.`nombanque` AS `nombanque`,`banque`.`nomcomplet` AS `nomcomplet`,`banque`.`adrbanque` AS `adrbanque`,`banque`.`telbanque` AS `telbanque`,`banque`.`faxbanque` AS `faxbanque`,`banque`.`logo` AS `logo`,`monetique`.`num` AS `num`,`monetique`.`m_frais` AS `m_frais` from (`banque` join `monetique`) where (`banque`.`idbanque` = `monetique`.`m_banque`) ;

-- --------------------------------------------------------

--
-- Structure de la vue `banque_data_o`
--
DROP TABLE IF EXISTS `banque_data_o`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `banque_data_o`  AS  select `banque`.`idbanque` AS `idbanque`,`banque`.`nombanque` AS `nombanque`,`banque`.`nomcomplet` AS `nomcomplet`,`banque`.`adrbanque` AS `adrbanque`,`banque`.`telbanque` AS `telbanque`,`banque`.`faxbanque` AS `faxbanque`,`banque`.`logo` AS `logo`,`operation`.`num` AS `num`,`operation`.`o_frais` AS `o_frais` from (`banque` join `operation`) where (`banque`.`idbanque` = `operation`.`o_banque`) ;

-- --------------------------------------------------------

--
-- Structure de la vue `g_banque`
--
DROP TABLE IF EXISTS `g_banque`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `g_banque`  AS  select `banque`.`idbanque` AS `idbanque`,`banque`.`nombanque` AS `nombanque`,`banque`.`nomcomplet` AS `nomcomplet`,`banque`.`adrbanque` AS `adrbanque`,`banque`.`telbanque` AS `telbanque`,`banque`.`faxbanque` AS `faxbanque`,`banque`.`logo` AS `logo`,`gestion`.`idgestion` AS `idgestion`,`gestion`.`num` AS `num`,`gestion`.`GESTION ET TENUE DE COMPTE` AS `GESTION ET TENUE DE COMPTE`,`gestion`.`COMMISSION / FRAIS HT` AS `COMMISSION / FRAIS HT`,`gestion`.`g_frais` AS `g_frais`,`gestion`.`g_banque` AS `g_banque` from (`banque` join `gestion`) where (`banque`.`idbanque` = `gestion`.`g_banque`) ;

-- --------------------------------------------------------

--
-- Structure de la vue `g_total`
--
DROP TABLE IF EXISTS `g_total`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `g_total`  AS  select `gestion`.`g_banque` AS `g_banque`,sum(`gestion`.`g_frais`) AS `g_total` from `gestion` group by `gestion`.`g_banque` ;

-- --------------------------------------------------------

--
-- Structure de la vue `m_banque`
--
DROP TABLE IF EXISTS `m_banque`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `m_banque`  AS  select `banque`.`idbanque` AS `idbanque`,`banque`.`nombanque` AS `nombanque`,`banque`.`nomcomplet` AS `nomcomplet`,`banque`.`adrbanque` AS `adrbanque`,`banque`.`telbanque` AS `telbanque`,`banque`.`faxbanque` AS `faxbanque`,`banque`.`logo` AS `logo`,`monetique`.`idoperation` AS `idoperation`,`monetique`.`num` AS `num`,`monetique`.`DESIGNATION` AS `DESIGNATION`,`monetique`.`COMMISSION / FRAIS` AS `COMMISSION / FRAIS`,`monetique`.`m_frais` AS `m_frais`,`monetique`.`m_banque` AS `m_banque` from (`banque` join `monetique`) where (`banque`.`idbanque` = `monetique`.`m_banque`) ;

-- --------------------------------------------------------

--
-- Structure de la vue `m_total`
--
DROP TABLE IF EXISTS `m_total`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `m_total`  AS  select `monetique`.`m_banque` AS `m_banque`,sum(`monetique`.`m_frais`) AS `m_total` from `monetique` group by `monetique`.`m_banque` ;

-- --------------------------------------------------------

--
-- Structure de la vue `o_banque`
--
DROP TABLE IF EXISTS `o_banque`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `o_banque`  AS  select `banque`.`idbanque` AS `idbanque`,`banque`.`nombanque` AS `nombanque`,`banque`.`nomcomplet` AS `nomcomplet`,`banque`.`adrbanque` AS `adrbanque`,`banque`.`telbanque` AS `telbanque`,`banque`.`faxbanque` AS `faxbanque`,`banque`.`logo` AS `logo`,`operation`.`idoperation` AS `idoperation`,`operation`.`num` AS `num`,`operation`.`OPERATIONS AU CREDIT DU COMPTE DINARS/ DEVISES` AS `OPERATIONS AU CREDIT DU COMPTE DINARS/ DEVISES`,`operation`.`COMMISSION / FRAIS HT` AS `COMMISSION / FRAIS HT`,`operation`.`o_frais` AS `o_frais`,`operation`.`o_banque` AS `o_banque` from (`banque` join `operation`) where (`banque`.`idbanque` = `operation`.`o_banque`) ;

-- --------------------------------------------------------

--
-- Structure de la vue `o_total`
--
DROP TABLE IF EXISTS `o_total`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `o_total`  AS  select `operation`.`o_banque` AS `o_banque`,sum(`operation`.`o_frais`) AS `o_total` from `operation` group by `operation`.`o_banque` ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `banque`
--
ALTER TABLE `banque`
  ADD PRIMARY KEY (`idbanque`);

--
-- Index pour la table `gestion`
--
ALTER TABLE `gestion`
  ADD PRIMARY KEY (`idgestion`),
  ADD KEY `banque` (`g_banque`);

--
-- Index pour la table `monetique`
--
ALTER TABLE `monetique`
  ADD PRIMARY KEY (`idmonetique`),
  ADD KEY `banque` (`m_banque`);

--
-- Index pour la table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`idoperation`),
  ADD KEY `banque` (`o_banque`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `banque`
--
ALTER TABLE `banque`
  MODIFY `idbanque` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `gestion`
--
ALTER TABLE `gestion`
  MODIFY `idgestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=411;

--
-- AUTO_INCREMENT pour la table `monetique`
--
ALTER TABLE `monetique`
  MODIFY `idmonetique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=426;

--
-- AUTO_INCREMENT pour la table `operation`
--
ALTER TABLE `operation`
  MODIFY `idoperation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=414;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `gestion`
--
ALTER TABLE `gestion`
  ADD CONSTRAINT `gestion_ibfk_1` FOREIGN KEY (`g_banque`) REFERENCES `banque` (`idbanque`);

--
-- Contraintes pour la table `monetique`
--
ALTER TABLE `monetique`
  ADD CONSTRAINT `monetique_ibfk_1` FOREIGN KEY (`m_banque`) REFERENCES `banque` (`idbanque`);

--
-- Contraintes pour la table `operation`
--
ALTER TABLE `operation`
  ADD CONSTRAINT `operation_ibfk_1` FOREIGN KEY (`o_banque`) REFERENCES `banque` (`idbanque`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
