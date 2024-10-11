-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 11 avr. 2024 à 16:19
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chalet_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `chalet` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `title`, `chalet`, `description`, `status`, `email`, `create_at`, `update_at`) VALUES
(2, 'Rencontrer un problème', 'chalet 4 - snowhome', 'je rencontre une problème pour envoyer un message', 'En attente', 'gonzalezlouis1981@gmail.com', '2024-03-11 15:35:26', '2024-03-11 15:35:26'),
(6, 'Poser une question', 'chalet 5 - lakehome', 'J\'aimerais réussi cette factorisation, mais comment faire ?', 'En attente', 'gonzalezlouis1981@gmail.com', '2024-03-12 13:50:55', '2024-03-12 13:50:55'),
(11, 'Rencontrer un problème', 'chalet 5 - lakehome', 'Problème de clim dans la chambre bleu royal au chalet du Lac !', 'En attente', 'gonzalezlouis1981@gmail.com', '2024-03-25 16:38:32', '2024-03-25 16:38:32');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `zip` int(20) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `duration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `who` varchar(255) NOT NULL,
  `chalet` varchar(255) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`id`, `title`, `description`, `duration`, `who`, `chalet`, `status`, `create_at`, `update_at`) VALUES
(2, 'Nettoyage du jacuzzi', 'Le jacuzzi à un problème d\'algue !', 'Très urgent', 'Marc - piscinist', 'chalet 6 - plainHome', 'En attente', '2024-03-08 14:13:33', '2024-03-25 16:10:36'),
(3, 'Faire bien attention à la synthaxe', 'Cela permet d\'éviter de perdre du temps', 'Long terme', 'Adam', '', 'Termine', '2024-03-08 14:14:02', '2024-03-12 16:06:24'),
(4, 'faire de la veille informatique', 'Rester en alerte des dernières nouveautés sur le domaine PHP', 'Long terme', 'Thomas', '', 'Termine', '2024-03-08 15:04:50', '2024-03-14 15:16:05'),
(11, 'Retravailler son javascript', 'Il faut faire de temps  à autre un peu de javasrcipt pour ne pas le perdre.', '--Please choose an option--', '--Please choose an option--', '--Please choose an option--', 'Termine', '2024-03-08 16:21:14', '2024-03-25 10:20:08'),
(12, 'Préparation des dossiers pour l\'examen', 'Présentation personnelle, présentation de l\'entreprise et présentation du projet', 'Court terme', 'Louis', '', 'En cours', '2024-03-08 16:27:06', '2024-03-14 15:15:40'),
(14, 'test à update', 'pépépépépép', 'Court terme', 'Julien', '', 'Termine', '2024-03-11 09:13:41', '2024-03-12 10:32:22'),
(16, 'test ajout refactorisé', 'héhéhé', 'Court terme', 'Adam', '', 'En cours', '2024-03-11 16:52:32', '2024-03-12 10:32:16'),
(18, 'test ajout assignation d\'une tache à une personne', 'je donne la tâche à Cédric', 'Court terme', 'Cédric', '', 'Termine', '2024-03-12 10:20:11', '2024-03-14 15:15:47'),
(19, 'test de status par defaut', 'fkjfkldjflkmdjfklsdjflkjù', 'Court terme', 'Louis', '', 'En attente', '2024-03-12 10:42:00', '2024-03-12 10:43:08'),
(20, 'test modification de status automatique à en attente', 'test modification de status automatique à en attente', 'Court terme', 'Thomas', '', 'En cours', '2024-03-12 10:45:46', '2024-03-22 16:23:07'),
(21, 'Relaxation', 'Massage de bien-être du dos en duo !', 'Urgent', 'Victoria - special service', 'chalet 4 - snowHome', 'En cours', '2024-03-12 10:48:33', '2024-03-25 16:10:30'),
(22, 'Plinthe décollé dans le sallon pricipal du 3ème étage', 'La plinthe le long du côté de terrasse sud et à moitié décollée dans le challet snow', 'Urgent', '--Please choose an option--', 'chalet 4 - snowHome', 'En cours', '2024-03-12 10:51:34', '2024-03-25 16:10:25'),
(23, 'Changer les ampoules grillées dans le challet 3', 'Faire le tour du challet 3, pour remplacement des de toutes les ampoules, particulièrement la terrasse au deuxième étages.', 'Très urgent', '--Please choose an option--', 'chalet 3 - triangleHome', 'En attente', '2024-03-12 14:05:33', '2024-03-25 16:10:20'),
(24, 'Problème de chauffage, les raidaiteurs du Rdc', 'Tous les radiateurs du challet 4, sont froid au rdc.', 'Très urgent', 'Cédric - plumber', 'chalet 1 - hauntedHome', 'En cours', '2024-03-22 16:48:02', '2024-03-25 16:10:14'),
(25, 'Rencontrer un problème', 'je rencontre une problème pour envoyer un message', 'Urgent', 'Adam - electricity', '', 'En attente', '2024-03-25 16:07:56', '2024-03-25 16:07:56'),
(31, 'Rencontrer un problème', 'J\'ai un problème avec le mini-bar ! Il ne refroidit plus les boissons .', 'Très Urgent', 'Adam - electricity', 'chalet 5 - lakehome', 'En attente', '2024-03-25 16:19:16', '2024-03-25 16:19:16'),
(32, 'Demander un service spécial', 'J\'aurais besoin d\'un nouveau costume pour dans 3 jours !', 'Très Urgent', 'Victoria - special service', 'chalet 6 - plainhome', 'En attente', '2024-03-25 16:21:30', '2024-03-25 16:21:30'),
(33, 'Demander un service spécial', 'Nous vendrions avoir une présentation de sac à main  !', 'Urgent', 'Victoria - special service', '', 'En attente', '2024-03-25 16:23:17', '2024-03-25 16:23:17'),
(34, 'Demander un service spécial', 'Nous voudrions pouvoir déjeuner en plein milieu de la forêt  !', 'Très Urgent', 'Victoria - special service', 'chalet 2 - foresthome', 'Termine', '2024-03-25 16:48:52', '2024-03-25 16:56:14'),
(35, 'Rencontrer un problème', 'Fuite à la douche', 'Très Urgent', 'Cédric - plumber', 'chalet 4 - snowhome', 'En attente', '2024-03-25 16:57:09', '2024-03-25 16:57:09');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
