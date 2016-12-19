-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 19, 2016 at 03:25 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mkt`
--

-- --------------------------------------------------------

--
-- Table structure for table `fichier_upload`
--

CREATE TABLE `fichier_upload` (
  `id` int(10) NOT NULL,
  `pseudo` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `name_file` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_name_file` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `message` text COLLATE utf8_bin,
  `date_upload` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `fichier_upload`
--

INSERT INTO `fichier_upload` (`id`, `pseudo`, `name_file`, `new_name_file`, `message`, `date_upload`) VALUES
(30, 'Chamal0f', 'txt.PNG', 'fichier30.PNG', 'test de texte', '2016-12-19 11:43:01'),
(31, 'Chamal0f', 'Sans titre.png', 'fichier31.png', 'hihi j\'espere que c\'est ok ', '2016-12-19 12:05:24'),
(32, 'Chamal0f', 'Jinx.jpg', 'fichier32.jpg', 'ok voyons ça ! ', '2016-12-19 12:53:45'),
(34, 'Chamal0f', 'god no.mp4', 'fichier33.mp4', 'ceci est le test video', '2016-12-19 13:19:17'),
(35, 'Chamal0f', 'boum headshot.mp4', 'fichier35.mp4', 'ok test pls work ', '2016-12-19 13:31:00'),
(36, 'Chamal0f', 'zed_dive.mp4', 'fichier36.mp4', 'ok pls fonctionne', '2016-12-19 13:47:38'),
(37, 'Chamal0f', 'test2.mp4', 'fichier37.mp4', 'alllllllerrrrr!!', '2016-12-19 14:32:41'),
(38, 'Chamal0f', 'Zed Dive.mp4', 'fichier38.mp4', NULL, '2016-12-19 14:34:03'),
(39, 'Chamal0f', 'Maroon 5 - Sugar.mp3', 'fichier39.mp3', NULL, '2016-12-19 14:34:39');

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE `membre` (
  `nom` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `prenom` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `pseudo` varchar(20) COLLATE utf8_bin NOT NULL,
  `mail` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `mot_de_passe` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`nom`, `prenom`, `pseudo`, `mail`, `mot_de_passe`) VALUES
('Tournier', 'Quentin', 'Chamal0f', 'qa.tournier@hotmail.fr', '3a2fa6f00139b45550fc1e2c5ff0734c104272a1'),
('Degand', 'Antoine ', 'Mnemosyne', '', '7a85f4764bbd6daf1c3545efbbf0f279a6dc0beb'),
('a', 'a', 'a', '', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8');

-- --------------------------------------------------------

--
-- Table structure for table `minichat`
--

CREATE TABLE `minichat` (
  `id` int(10) UNSIGNED NOT NULL,
  `pseudo` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `message` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `minichat`
--

INSERT INTO `minichat` (`id`, `pseudo`, `message`) VALUES
(645, 'mnemosyne', 'Salut \n'),
(646, 'Chamal0f', 'Hey \n'),
(647, 'mnemosyne', 'pas mal ton chat \n'),
(648, 'Chamal0f', 'j\'ai tellement galéré'),
(649, NULL, 'mais il claque ! ;) '),
(650, 'mnemosyne', 'ça avance bien c\'est cool'),
(651, 'Chamal0f', 'ddddddddddd'),
(652, NULL, 'dddddddddddd'),
(653, NULL, 'ccccccc'),
(654, NULL, 'sssssss'),
(655, NULL, 'zzzzzzzzzz'),
(656, NULL, 'sssssssssssss'),
(657, NULL, 'vvvvvvvvvvv'),
(658, NULL, 'eeeeee'),
(659, NULL, 'eeeeeeee'),
(660, NULL, 'ffffffff'),
(661, NULL, 'cccc'),
(662, NULL, 'cccc'),
(663, NULL, ' vvvvvvvvvv');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fichier_upload`
--
ALTER TABLE `fichier_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`pseudo`);

--
-- Indexes for table `minichat`
--
ALTER TABLE `minichat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pseudo` (`pseudo`);
ALTER TABLE `minichat` ADD FULLTEXT KEY `message` (`message`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fichier_upload`
--
ALTER TABLE `fichier_upload`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `minichat`
--
ALTER TABLE `minichat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=664;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `minichat`
--
ALTER TABLE `minichat`
  ADD CONSTRAINT `fk_pseudo` FOREIGN KEY (`pseudo`) REFERENCES `membre` (`pseudo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
