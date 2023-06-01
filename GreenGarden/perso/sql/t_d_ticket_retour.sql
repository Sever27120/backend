-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 01 juin 2023 à 15:11
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `greengarden`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_d_ticket_retour`
--

DROP TABLE IF EXISTS `t_d_ticket_retour`;
CREATE TABLE `t_d_ticket_retour` (
  `Id_ticket` int(11) NOT NULL,
  `date_ticket` datetime DEFAULT NULL,
  `id_statut` int(11) NOT NULL,
  `Id_Commande` int(11) NOT NULL,
  `Id_retour` int(11) NOT NULL,
  `Id_tech_SAV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_d_ticket_retour`
--

INSERT DELAYED IGNORE INTO `t_d_ticket_retour` (`Id_ticket`, `date_ticket`, `id_statut`, `Id_Commande`, `Id_retour`, `Id_tech_SAV`) VALUES
(1, '2023-05-31 15:37:40', 1, 1, 1, 20),
(2, '2023-05-31 15:37:41', 1, 1, 1, 20),
(3, '2023-05-31 15:38:04', 2, 6, 4, 20),
(4, '2023-05-31 15:44:48', 3, 3, 2, 20),
(5, '2023-05-31 15:46:40', 3, 2, 2, 20),
(6, '2023-05-31 15:47:08', 1, 4, 2, 20),
(7, '2023-05-31 15:47:34', 3, 2, 2, 20);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_d_ticket_retour`
--
ALTER TABLE `t_d_ticket_retour`
  ADD PRIMARY KEY (`Id_ticket`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_d_ticket_retour`
--
ALTER TABLE `t_d_ticket_retour`
  MODIFY `Id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
