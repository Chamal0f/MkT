-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 13 Décembre 2016 à 12:47
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mkt`
--

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `mot_de_passe` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`nom`, `prenom`, `pseudo`, `mail`, `mot_de_passe`) VALUES
('a', 'a', 'a', '', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8'),
('Tournier', 'Quentin', 'Chamal0f', 'qa.tournier@hotmail.fr', '3a2fa6f00139b45550fc1e2c5ff0734c104272a1'),
('Degand', 'Antoine ', 'Mnemosyne', '', '7a85f4764bbd6daf1c3545efbbf0f279a6dc0beb');

-- --------------------------------------------------------

--
-- Structure de la table `minichat`
--

CREATE TABLE `minichat` (
  `id` int(10) UNSIGNED NOT NULL,
  `pseudo` varchar(20) DEFAULT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `minichat`
--

INSERT INTO `minichat` (`id`, `pseudo`, `message`) VALUES
(645, 'mnemosyne', 'Salut \n'),
(646, 'Chamal0f', 'Hey \n'),
(647, 'mnemosyne', 'pas mal ton chat \n'),
(648, 'Chamal0f', 'j\'ai tellement galéré'),
(649, NULL, 'mais il claque ! ;) '),
(650, 'mnemosyne', 'ça avance bien c\'est cool');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`pseudo`);

--
-- Index pour la table `minichat`
--
ALTER TABLE `minichat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pseudo` (`pseudo`);
ALTER TABLE `minichat` ADD FULLTEXT KEY `message` (`message`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `minichat`
--
ALTER TABLE `minichat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=651;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `minichat`
--
ALTER TABLE `minichat`
  ADD CONSTRAINT `fk_pseudo` FOREIGN KEY (`pseudo`) REFERENCES `membre` (`pseudo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
