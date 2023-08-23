-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 23 août 2023 à 12:18
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
-- Base de données : `echanges`
--
CREATE DATABASE IF NOT EXISTS `echanges` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `echanges`;

-- --------------------------------------------------------

--
-- Structure de la table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(60) NOT NULL,
  `number` varchar(10) NOT NULL,
  `city` varchar(60) NOT NULL,
  `municipalitie` varchar(60) DEFAULT NULL,
  `postal_code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `addresses`
--

INSERT INTO `addresses` (`id`, `street`, `number`, `city`, `municipalitie`, `postal_code`) VALUES
(1, 'Jack', '7', 'Vilvorde', '', '1800'),
(2, 'rue Albert', '458', 'Bruxelles', 'Scharbeek', '1030'),
(3, 'rue de la joix', '48', 'Bruxelles', 'Scharbeek', '1030'),
(4, 'Sammuel', '78', 'Bruxelles', 'Anderlecht', '1070'),
(5, 'Rue des Lilas', '10', 'Bruxelles', 'Anderlecht', '1070'),
(6, 'Avenue du Parc', '45', 'Bruxelles', 'Ixelles', '1050'),
(7, 'Rue de la Paix', '20', 'Namur', 'Namur', '5000'),
(8, 'Boulevard Léopold III', '98', 'Bruxelles', 'Woluwe-Saint-Lambert', '1200'),
(9, 'Rue de l\'Eglise', '7', 'Liège', 'Liège', '4000'),
(10, 'Avenue Louise', '123', 'Bruxelles', 'Ixelles', '1050'),
(11, 'Rue du Marché', '30', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(12, 'Chaussée de Charleroi', '55', 'Bruxelles', 'Saint-Gilles', '1060'),
(13, 'Rue de la Gare', '15', 'Bruges', 'Bruges', '8000'),
(14, 'Avenue de la Liberté', '5', 'Charleroi', 'Charleroi', '6000'),
(15, 'Rue de la Station', '40', 'Liège', 'Liège', '4000'),
(16, 'Boulevard Anspach', '70', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(17, 'Rue du Commerce', '12', 'Namur', 'Namur', '5000'),
(18, 'Rue du Commerce', '12', 'Namur', 'Namur', '5000'),
(19, 'Avenue des Champs', '8', 'Bruxelles', 'Etterbeek', '1040'),
(20, 'Rue de l\'Université', '25', 'Louvain-la-Neuve', 'Ottignies-Louvain-la-Neuve', '1348'),
(21, 'Chaussée de Waterloo', '60', 'Bruxelles', 'Uccle', '1180'),
(22, 'Rue Royale', '90', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(23, 'Avenue de la Toison d\'Or', '15', 'Bruxelles', 'Ixelles', '1050'),
(24, 'Rue du Midi', '35', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(25, 'Rue des Bouchers', '22', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(26, 'Avenue Louise', '200', 'Bruxelles', 'Ixelles', '1050'),
(27, 'Rue de la Loi', '155', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(28, 'Chaussée de Louvain', '80', 'Bruxelles', 'Schaerbeek', '1030'),
(29, 'Rue du Bailli', '50', 'Bruxelles', 'Ixelles', '1050'),
(30, 'Boulevard de la Sauvenière', '59', 'Bruxelles', 'Ixelles', '1050'),
(31, 'Rue de la Sauvenière', '14', 'Liège', 'Liège', '4000'),
(32, 'Rue de la Bourse', '17', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(33, 'Avenue de la Gare', '23', 'Liège', 'Liège', '4000'),
(34, 'Rue Neuve', '6', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(35, 'Avenue de l\'Exposition', '40', 'Charleroi', 'Charleroi', '6000'),
(36, 'Rue des Carmes', '8', 'Liège', 'Liège', '4000'),
(37, 'Boulevard Adolphe Max', '92', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(38, 'Rue de Flandre', '55', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(39, 'Chaussée de Mons', '120', 'Bruxelles', 'Anderlecht', '1070'),
(40, 'Rue de la Montagne', '11', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(41, 'Avenue de Tervueren', '68', 'Bruxelles', 'Woluwe-Saint-Pierre', '1150'),
(42, 'Rue des Bons Enfants', '33', 'Liège', 'Liège', '4000'),
(43, 'Boulevard du Jardin Botanique', '31', 'Liège', 'Liège', '4000'),
(44, 'Boulevard du Jardin Botanique', '18', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(45, 'Rue du Midi', '28', 'Charleroi', 'Charleroi', '6000'),
(46, 'Avenue de la Couronne', '9', 'Bruxelles', 'Ixelles', '1050'),
(47, 'Rue de la Casquette', '13', 'Liège', 'Liège', '4000'),
(48, 'Boulevard Anspach', '80', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(49, 'Rue du Marché aux Poulets', '25', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(50, 'Avenue Louise', '300', 'Bruxelles', 'Ixelles', '1050'),
(51, 'Rue du Bailli', '70', 'Bruxelles', 'Ixelles', '1050'),
(52, 'Chaussée de Louvain', '120', 'Bruxelles', 'Schaerbeek', '1030'),
(53, 'Rue des Fripiers', '21', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(54, 'Avenue de la Liberté', '40', 'Namur', 'Namur', '5000'),
(55, 'Rue de la Collégiale', '6', 'Liège', 'Liège', '4000'),
(56, 'Boulevard de Waterloo', '80', 'Bruxelles', 'Bruxelle-Ville', '1000'),
(57, 'Boulevard de Waterloo', '80', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(58, 'Rue du Pot d\'Or', '15', 'Bruxelles', 'Saint-Josse-ten-Noode', '1210'),
(59, 'Rue de la Paix', '10', 'Bruxelles', 'Anderlecht', '1070'),
(60, 'Avenue des Champs-Élysées', '25', 'Bruxelles', 'Etterbeek', '1040'),
(61, 'Rue de la Station', '15', 'Namur', 'Namur', '5000'),
(62, 'Boulevard Léopold', '98', 'Liège', 'Liège', '4000'),
(63, 'Avenue Louise', '150', 'Bruxelles', 'Ixelles', '1050'),
(64, 'Rue de la Libération', '30', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(65, 'Chaussée de Charleroi', '55', 'Bruxelles', 'Saint-Gilles', '1060'),
(66, 'Rue de la Gare', '20', 'Bruges', 'Bruges', '8000'),
(67, 'Avenue de la Liberté', '5', 'Charleroi', 'Charleroi', '6000'),
(68, 'Rue de l\'Université', '25', 'Louvain-la-Neuve', 'Ottignies-Louvain-la-Neuve', '1348'),
(69, 'Boulevard Anspach', '70', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(70, 'Rue du Commerce', '12', 'Namur', 'Namur', '5000'),
(71, 'Avenue du Parc', '162', 'Namur', 'Namur', '5000'),
(72, 'Avenue du Parc', '30', 'Bruxelles', 'Ixelles', '1050'),
(73, 'Rue des Écoles', '8', 'Liège', 'Liège', '4000'),
(74, 'Boulevard Baudouin Ier', '55', 'Bruxelles', 'Woluwe-Saint-Lambert', '1200'),
(75, 'Rue de la Justice', '7', 'Bruxelles', 'Uccle', '1180'),
(76, 'Avenue de la Toison d\'Or', '15', 'Bruxelles', 'Ixelles', '1050'),
(77, 'Rue du Midi', '35', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(78, 'Rue des Bouchers', '22', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(79, 'Avenue Louise', '200', 'Bruxelles', 'Ixelles', '1050'),
(80, 'Rue de la Loi', '155', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(81, 'Chaussée de Louvain', '80', 'Bruxelles', 'Schaerbeek', '1030'),
(82, 'Rue du Bailli', '50', 'Bruxelles', 'Ixelles', '1050'),
(83, 'Boulevard de la Sauvenière', '14', 'Liège', 'Liège', '4000'),
(84, 'Rue de la Bourse', '17', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(85, 'Rue de la Bourse', '17', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(86, 'Avenue de la Gare', '23', 'Liège', 'Liège', '4000'),
(87, 'Rue Neuve', '6', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(88, 'Avenue de l\'Exposition', '40', 'Charleroi', 'Charleroi', '6000'),
(89, 'Rue des Carmes', '8', 'Liège', 'Liège', '4000'),
(90, 'Boulevard Adolphe Max', '92', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(91, 'Rue de Flandre', '55', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(92, 'Chaussée de Mons', '120', 'Bruxelles', 'Anderlecht', '1070'),
(93, 'Rue de la Montagne', '11', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(94, 'Avenue de Tervueren', '68', 'Bruxelles', 'Woluwe-Saint-Pierre', '1150'),
(95, 'Rue des Bons Enfants', '33', 'Liège', 'Liège', '4000'),
(96, 'Boulevard du Jardin Botanique', '18', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(97, 'Rue du Midi', '18', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(98, 'Rue du Midi', '28', 'Charleroi', 'Charleroi', '6000'),
(99, 'Avenue de la Couronne', '9', 'Bruxelles', 'Ixelles', '1050'),
(100, 'Rue de la Casquette', '13', 'Liège', 'Liège', '4000'),
(101, 'Boulevard Anspach', '80', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(102, 'Rue du Marché aux Poulets', '25', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(103, 'Avenue Louise', '300', 'Bruxelles', 'Ixelles', '1050'),
(104, 'Rue du Bailli', '70', 'Bruxelles', 'Ixelles', '1050'),
(105, 'Chaussée de Louvain', '120', 'Bruxelles', 'Schaerbeek', '1030'),
(106, 'Rue des Fripiers', '21', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(107, 'Avenue de la Liberté', '40', 'Namur', 'Namur', '5000'),
(108, 'Rue de la Collégiale', '6', 'Liège', 'Liège', '4000'),
(109, 'Boulevard de Waterloo', '80', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(110, 'Rue du Pot d\'Or', '15', 'Bruxelles', 'Saint-Josse-ten-Noode', '1210'),
(111, 'Rue du Pot d\'Or', '15', 'Bruxelles', 'Saint-Josse-ten-Noode', '1210'),
(112, 'Avenue du Parc', '50', 'Bruxelles', 'Ixelles', '1050'),
(113, 'Rue du Canal', '7', 'Namur', 'Namur', '5000'),
(114, 'Boulevard de l\'Empereur', '65', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(115, 'Rue de la Madeleine', '22', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(116, 'Avenue des Arts', '12', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(117, 'Rue de la Putterie', '35', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(118, 'Chaussée de Wavre', '75', 'Bruxelles', 'Ixelles', '1050'),
(119, 'Rue de l\'Évêque', '18', 'Liège', 'Liège', '4000'),
(120, 'Avenue de la Basilique', '28', 'Bruxelles', 'Koekelberg', '1081'),
(121, 'Rue des Martyrs', '9', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(122, 'Boulevard du Régent', '38', 'Bruxelles', 'Ixelles', '1000'),
(123, 'Rue de la Ferme', '14', 'Namur', 'Namur', '5000'),
(124, 'Avenue de la Woluwe', '22', 'Bruxelles', 'Woluwe-Saint-Lambert', '1200'),
(125, 'Rue de l\'Église', '25', 'Liège', 'Liège', '4000'),
(126, 'Boulevard de l\'Albert Ier', '60', 'Bruxelles', 'Laeken', '1020'),
(127, 'Rue de la Régence', '10', 'Bruxelles', 'Ixelles', '1000'),
(128, 'Avenue de la Paix', '32', 'Charleroi', 'Charleroi', '6000'),
(129, 'Rue des Palais', '20', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(130, 'Chaussée de Bruxelles', '45', 'Liège', 'Liège', '4000'),
(131, 'Rue de la Gendarmerie', '5', 'Namur', 'Namur', '5000'),
(132, 'Avenue des Palais', '42', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(133, 'Rue de l\'Esplanade', '16', 'Charleroi', 'Charleroi', '6000'),
(134, 'Boulevard du Midi', '75', 'Bruxelles', 'Anderlecht', '1070'),
(135, 'Rue de la Station', '12', 'Namur', 'Namur', '5000'),
(136, 'Avenue de la Libération', '28', 'Bruxelles', 'Molenbeek-Saint-Jean', '1080'),
(137, 'Rue de l\'Université', '14', 'Liège', 'Liège', '4000'),
(138, 'Boulevard Émile Bockstael', '40', 'Bruxelles', 'Laeken', '1020'),
(139, 'Rue de la Loi', '165', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(140, 'Avenue de la Couronne', '20', 'Ixelles', 'Ixelles', '1050'),
(141, 'Rue du Marché aux Herbes', '10', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(142, 'Boulevard de l\'Empire', '30', 'Charleroi', 'Charleroi', '6000'),
(143, 'Rue du Luxembourg', '8', 'Namur', 'Namur', '5000'),
(144, 'Avenue de la Reine', '18', 'Bruxelles', 'Ixelles', '1050'),
(145, 'Rue des Carmes', '6', 'Liège', 'Liège', '4000'),
(146, 'Boulevard Adolphe Max', '80', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(147, 'Rue de Flandre', '45', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(148, 'Chaussée de Gand', '60', 'Bruxelles', 'Molenbeek-Saint-Jean', '1080'),
(149, 'Rue Neuve', '10', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(150, 'Avenue de Tervueren', '88', 'Bruxelles', 'Woluwe-Saint-Pierre', '1150'),
(151, 'Rue de la Bourse', '25', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(152, 'Boulevard Anspach', '65', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(153, 'Rue de la Loi', '175', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(154, 'Avenue Louise', '250', 'Bruxelles', 'Ixelles', '1050'),
(155, 'Rue du Bailli', '90', 'Bruxelles', 'Ixelles', '1050'),
(156, 'Chaussée de Louvain', '160', 'Bruxelles', 'Schaerbeek', '1030'),
(157, 'Rue des Fripiers', '28', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(158, 'Avenue de la Liberté', '60', 'Namur', 'Namur', '5000'),
(159, 'Rue de la Collégiale', '24', 'Liège', 'Liège', '4000'),
(160, 'Boulevard du Midi', '90', 'Bruxelles', 'Anderlecht', '1070'),
(161, 'Rue de la Station', '18', 'Namur', 'Namur', '5000'),
(162, 'Avenue de la Paix', '40', 'Charleroi', 'Charleroi', '6000'),
(163, 'Rue des Palais', '30', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(164, 'Chaussée de Bruxelles', '55', 'Liège', 'Liège', '4000'),
(165, 'Rue de la Gendarmerie', '7', 'Namur', 'Namur', '5000'),
(166, 'Avenue des Palais', '48', 'Bruxelles', 'Bruxelles-Ville', '1000'),
(167, 'Rue de l\'Esplanade', '22', 'Charleroi', 'Charleroi', '6000'),
(168, 'Boulevard du Midi', '95', 'Bruxelles', 'Anderlecht', '1070'),
(169, 'Rue de la Station', '20', 'Namur', 'Namur', '5000'),
(170, 'Avenue de la Libération', '45', 'Bruxelles', 'Molenbeek-Saint-Jean', '1080');

-- --------------------------------------------------------

--
-- Structure de la table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `deleted_at`) VALUES
(1, 1, '2023-08-22 12:36:30'),
(2, 1, '2023-08-22 23:54:13'),
(3, 1, '2023-08-22 23:56:07'),
(4, 1, '2023-08-23 00:00:59'),
(5, 1, '2023-08-23 07:52:49');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) NOT NULL,
  `score` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `comment`, `score`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Tres bon produit', NULL, '2023-08-22 21:49:48', NULL),
(2, 1, 1, 'Parfait', NULL, '2023-08-22 21:49:48', NULL),
(3, 1, 1, 'La livraison à eu du retard', NULL, '2023-08-22 21:49:48', NULL),
(4, 1, 1, 'j\'adore', NULL, '2023-08-22 21:49:48', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `amount` decimal(8,2) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `billing_date` datetime NOT NULL,
  `details` text DEFAULT NULL,
  `invoice_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `invoices`
--

INSERT INTO `invoices` (`id`, `order_id`, `payment_id`, `amount`, `currency`, `billing_date`, `details`, `invoice_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'ch_3Nhvh2J56xvhFsNb1tAco9xT', 22.46, 'eur', '2023-08-22 14:36:28', 'Détails de la facture', 'public/fonts/1.pdf', NULL, NULL),
(2, 3, 'ch_3Ni6GuJ56xvhFsNb1CHFejqp', 22.46, 'eur', '2023-08-23 01:54:11', 'Détails de la facture', 'public/fonts/2.pdf', NULL, NULL),
(3, 4, 'ch_3Ni6ImJ56xvhFsNb1XK6XBaw', 22.46, 'eur', '2023-08-23 01:56:07', 'Détails de la facture', 'public/fonts/3.pdf', NULL, NULL),
(4, 5, 'ch_3Ni6NVJ56xvhFsNb1bQtkzKK', 22.46, 'eur', '2023-08-23 02:00:59', 'Détails de la facture', 'public/fonts/4.pdf', NULL, NULL),
(5, 6, 'ch_3NiDjxJ56xvhFsNb064DefFJ', 22.46, 'eur', '2023-08-23 09:52:42', 'Détails de la facture', 'public/fonts/5.pdf', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_07_05_233009_create_addresses_table', 1),
(2, '2014_07_12_014455_create_roles_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_07_13_233059_create_types_table', 1),
(8, '2023_07_14_233239_create_products_table', 1),
(9, '2023_07_18_005105_create_comments_table', 1),
(10, '2023_07_23_230032_create_carts_table', 1),
(11, '2023_07_24_180125_create_orders_table', 1),
(12, '2023_07_26_203647_create_product_cart_table', 1),
(13, '2023_08_11_231525_create_invoices_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` double NOT NULL,
  `order_date` datetime NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `shipping_cost` decimal(8,2) NOT NULL DEFAULT 6.99,
  `weight` double NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `cart_id`, `total_price`, `order_date`, `delivery_address`, `shipping_cost`, `weight`, `order_status`, `deleted_at`) VALUES
(1, 1, 1, 22.46, '2023-08-22 14:36:09', 'Hello 45 1000 Bruxelles', 7.46, 525, 'paid', NULL),
(2, 1, 2, 22.46, '2023-08-23 00:11:59', 'Hello 45 1000 Bruxelles', 7.46, 525, 'pending', NULL),
(3, 1, 2, 22.46, '2023-08-23 01:48:21', 'Hello 45 1000 Bruxelles', 7.46, 525, 'paid', NULL),
(4, 1, 3, 22.46, '2023-08-23 01:55:12', 'Hello 45 1000 Bruxelles', 7.46, 525, 'paid', NULL),
(5, 1, 4, 22.46, '2023-08-23 02:00:42', 'Hello 45 1000 Bruxelles', 7.46, 525, 'paid', NULL),
(6, 1, 5, 22.46, '2023-08-23 09:52:18', 'Hello 45 1000 Bruxelles', 7.46, 525, 'paid', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `edition` varchar(60) NOT NULL,
  `weight` double NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `condition` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default_image.png',
  `type_transaction` varchar(60) NOT NULL,
  `isAvailable` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `edition`, `weight`, `user_id`, `type_id`, `condition`, `image`, `type_transaction`, `isAvailable`, `created_at`, `updated_at`) VALUES
(1, 'Goku n°615', 'Les Pop! Vinyl de Funko sont des figurines de collection produites sous licence officielle qui représentent une énorme gamme de franchises et séries issues de la culture populaire.', 15, 0, 'funko pop', 525, 1, 1, 'Parfait', 'images/2.jpg', 'Vente', 0, '2023-08-22 21:49:48', '2023-08-23 00:00:59'),
(3, 'Super sayan Goku n°14', 'Les Pop! Vinyl de Funko sont des figurines de collection produites sous licence officielle qui représentent une énorme gamme de franchises et séries issues de la culture populaire.', 15, 0, 'funko pop', 525, 1, 1, 'Moyen', 'images/4.jpg', 'Vente', 0, '2023-08-22 21:49:48', '2023-08-23 07:52:42'),
(4, 'Super sayan Goku first apparance n°860', 'Les Pop! Vinyl de Funko sont des figurines de collection produites sous licence officielle qui représentent une énorme gamme de franchises et séries issues de la culture populaire.', 15, 4, 'funko pop', 525, 1, 1, 'Très bon', 'images/1.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(5, 'Super sayan Goku with kamehameha n°948', 'Les Pop! Vinyl de Funko sont des figurines de collection produites sous licence officielle qui représentent une énorme gamme de franchises et séries issues de la culture populaire.', 20, 1, 'funko pop', 525, 1, 1, 'Très Mauvais', 'images/5.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(6, 'Goku ultra instinct sign n°1232', 'Les Pop! Vinyl de Funko sont des figurines de collection produites sous licence officielle qui représentent une énorme gamme de franchises et séries issues de la culture populaire.', 18, 2, 'funko pop', 525, 1, 1, 'Mauvais', 'images/6.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(7, 'Goku ultra instinct n°386', 'Les Pop! Vinyl de Funko sont des figurines de collection produites sous licence officielle qui représentent une énorme gamme de franchises et séries issues de la culture populaire.', 15, 9, 'funko pop', 525, 1, 1, 'Neuf', 'images/7.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(8, 'Goku black n°314', 'Les Pop! Vinyl de Funko sont des figurines de collection produites sous licence officielle qui représentent une énorme gamme de franchises et séries issues de la culture populaire.', 15, 1, 'funko pop', 525, 1, 1, 'Très Mauvais', 'images/8.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(9, 'Raditz n°616', 'Les Pop! Vinyl de Funko sont des figurines de collection produites sous licence officielle qui représentent une énorme gamme de franchises et séries issues de la culture populaire.', 15, 1, 'funko pop', 525, 1, 1, 'Mauvais', 'images/9.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(10, 'Prince Vegeta n°863', 'Les Pop! Vinyl de Funko sont des figurines de collection produites sous licence officielle qui représentent une énorme gamme de franchises et séries issues de la culture populaire.', 15, 2, 'funko pop', 525, 1, 1, 'Mauvais', 'images/10.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(11, 'Vegeta n°614', 'Les Pop! Vinyl de Funko sont des figurines de collection produites sous licence officielle qui représentent une énorme gamme de franchises et séries issues de la culture populaire.', 15, 2, 'funko pop', 525, 1, 1, 'Neuf', 'images/11.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(12, 'Nappa n°613', 'Les Pop! Vinyl de Funko sont des figurines de collection produites sous licence officielle qui représentent une énorme gamme de franchises et séries issues de la culture populaire.', 15, 2, 'funko pop', 525, 1, 1, 'Neuf', 'images/12.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(13, 'Vegeta n°10', 'Les Pop! Vinyl de Funko sont des figurines de collection produites sous licence officielle qui représentent une énorme gamme de franchises et séries issues de la culture populaire.', 15, 2, 'funko pop', 525, 1, 1, 'Bon', 'images/13.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(14, 'Android 16 n°708', 'Les Pop! Vinyl de Funko sont des figurines de collection produites sous licence officielle qui représentent une énorme gamme de franchises et séries issues de la culture populaire.', 15, 2, 'funko pop', 525, 1, 1, 'Moyen', 'images/14.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(15, 'Gohan n°813', 'Les Pop! Vinyl de Funko sont des figurines de collection produites sous licence officielle qui représentent une énorme gamme de franchises et séries issues de la culture populaire.', 15, 2, 'funko pop', 525, 1, 1, 'Très Mauvais', 'images/15.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(16, 'Master Roshi n°382', 'Les Pop! Vinyl de Funko sont des figurines de collection produites sous licence officielle qui représentent une énorme gamme de franchises et séries issues de la culture populaire.', 15, 2, 'funko pop', 525, 1, 1, 'Bon', 'images/16.jpg', 'Echange', 1, '2023-08-22 21:49:48', NULL),
(17, 'Silent Hill', 'Silent Hill est un jeu vidéo de type survival horror développé par Konami CE Tokyo et édité par Konami en 1999 sur PlayStation. Réputé pour avoir révolutionné le jeu d\'horreur par son approche psychologique de la peur, le titre de Keiichiro Toyama a connu un succès international.', 75, 2, 'Konami', 347, 1, 2, 'Bon', 'images/17.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(18, 'Lego Harry Potter Years 1-7 PS4, Ps4', 'Décoctions, potions, puzzles, leçons, duels et un jeu amusant plein de sorts, potions, puzzles et amusant pour les personnes de tous âges, familles et amis à jouer ensemble.', 20, 3, 'Warner Bros', 120, 1, 2, 'Très bon', 'images/60.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(19, 'Super Marıo 3D All Stars, Nıntendo Swıtch ', 'Vaporisez des adhésifs ressemblant à de la peinture avec l\'aide de votre ami FLUDD, qui pulvérise de l\'eau dans le jeu Super Mario Sunshine Voyage de planète en planète', 1200, 2, 'Nintendo Switch', 73, 1, 2, 'Neuf', 'images/18.jpg', 'Echange', 1, '2023-08-22 21:49:48', NULL),
(20, 'TEKKEN 7', 'Rejoignez le dernier chapitre du voyage légendaire du clan Mishima, découvrez la vérité derrière chaque étape de leurs batailles sans fin. vous pouvez faire des duellos incroyables.', 22, 2, 'BANDAI NAMCO Studios', 75, 1, 2, 'Très Mauvais', 'images/20.jpg', 'Echange', 1, '2023-08-22 21:49:48', NULL),
(21, 'Call Of Duty Black Ops 3 PS3', 'Black Ops 3 emmène les joueurs dans un futur où le nouveau genre militaire Black Ops, qui a émergé grâce à la biotechnologie, joue le rôle principal. Les joueurs seront constamment connectés au réseau de renseignement et aux autres soldats pendant la guerre. ils apprendront les techniques de combat.', 11, 5, 'Activision', 68, 1, 2, 'Très bon', 'images/21.jpg', 'Echange', 1, '2023-08-22 21:49:48', NULL),
(22, 'Game Boy Color - Limited Pokemon Edition - Yellow', 'Tous les articles de cette liste sont en très bon état. tous les jeux fonctionnent et sauvegardent la progression. La console a quelques petites rayures légères sur l\'écran. à peine perceptible. Pokemon Rouge, Bleu, Jaune, Cristal, Argent, Or, Défi de puzzle Pokemon et Jeux de cartes à collectionner Pokemon tous inclus avec des livrets d\'instructions pour chacun et des étuis de jeu en plastique dur assortis.', 350, 1, 'Nintendo', 68.03, 1, 5, 'Mauvais', 'images/22.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(23, 'Game Boy Advance Console - Orange', 'Orange clair Game Boy Advance. Couverture et coque d\'écran flambant neuves.', 100, 1, 'Nintendo', 141, 1, 5, 'Très bon', 'images/23.jpg', 'Echange', 1, '2023-08-22 21:49:48', NULL),
(24, 'Pokemon: Yellow Version - Special Pikachu Edition', 'Si vous n\'avez jamais joué à aucun des jeux Pokémon auparavant, Pokémon Jaune est le meilleur endroit pour commencer. Mais alors que les Pokémaniaques adoreront les nouvelles fonctionnalités du Jaune, les vétérans moins enthousiastes du Rouge et du Bleu ne trouveront peut-être pas les extras aussi spéciaux.', 75, 1, 'Everyone- Nintendo', 96, 1, 2, 'Mauvais', 'images/24.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(25, 'Game Boy Color Super Mario Bros. Deluxe', 'Retrouvez la magie du Super Mario Bros original dans cette exclusivité Game Boy Color. Partez au combat avec Bowser et l\'équipage de Koopa dans une course contre la montre pour sauver la princesse emprisonnée. Profitez de toutes nouvelles options et fonctionnalités bonus. Guidez Mario à travers 8 mondes regorgeant de fleurs secrètes et de toutes sortes de surprises derrière des blocs cassables. Vous pouvez même imprimer des autocollants spéciaux avec l\'imprimante Game Boy. la compétition à 2 joueurs est possible avec le câble Game Link.', 245, 1, 'Nintendo', 38, 1, 2, 'Parfait', 'images/25.jpg', 'Echange', 1, '2023-08-22 21:49:48', NULL),
(26, 'The Legend of Zelda: Four Swords Adventures - Nintendo Gamecube (Renewed)', 'La Légende de Zelda: Aventures aux Quatre Épées', 1500, 2, 'GameCube- Everyone', 90, 1, 2, 'Parfait', 'images/26.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(27, 'Pokemon Center Pokémon TCG: XY—Flashfire Sleeved Booster Pack (10 Cards)', 'Contains 10 cards per pack', 67, 2, 'Pokemon', 9, 1, 3, 'Neuf', 'images/28.jpg', 'Echange', 1, '2023-08-22 21:49:48', NULL),
(28, 'PlayStation 5', 'La PlayStation 5, dernière-née de Sony, offre des graphismes époustouflants et des temps de chargement ultra rapides.', 499, 1, 'Sony', 4512, 1, 5, 'Neuf', 'images/30.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(29, 'Xbox Series X', 'La console la plus puissante de Microsoft à ce jour, la Xbox Series X est le fleuron du jeu de nouvelle génération.', 499, 1, 'Microsoft', 4441, 1, 5, 'Neuf', 'images/31.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(30, 'Nintendo Switch', 'Une console hybride qui peut être utilisée à la maison ou en déplacement.', 299, 1, 'Nintendo', 413, 1, 5, 'Neuf', 'images/32.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(31, 'PlayStation 4 Pro', 'Version améliorée de la PlayStation 4, offrant des graphismes 4K et une meilleure performance.', 399, 1, 'Sony', 3300, 1, 5, 'Neuf', 'images/33.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(32, 'Xbox One X', 'Version premium de la Xbox One, offrant une résolution en 4K.', 499, 1, '1TB', 4400, 1, 5, 'Neuf', 'images/34.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(33, 'Nintendo Switch Lite', 'Version exclusivement portable de la Nintendo Switch.', 199, 1, 'Nintendo', 275, 1, 5, 'Neuf', 'images/35.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(34, 'PlayStation 4', 'Console de huitième génération de Sony, précédant la PS5.', 299, 1, 'Sony', 2804, 1, 5, 'Neuf', 'images/36.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(35, 'Super Mario Bros Nes', 'Le jeu de plateforme qui a introduit Mario au monde, sorti sur NES.', 426, 1, 'Original', 130, 1, 2, 'Bon', 'images/37.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(36, 'The Legend of Zelda', 'Un jeu d’aventure épique sur NES mettant en vedette Link dans sa quête pour sauver la princesse Zelda.', 758, 1, 'Original', 102, 1, 2, 'Très bon', 'images/38.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(37, 'Pac-Man', 'Le jeu d’arcade classique où le joueur contrôle Pac-Man à travers un labyrinthe, mangeant des pac-dots.', 54, 1, 'Original Arcade', 120, 1, 2, 'Bon', 'images/38.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(38, 'Tetris', 'Jeu de puzzle où les joueurs doivent empiler des blocs géométriques pour former des lignes.', 46, 1, 'Nintendo', 80, 1, 2, 'Très bon', 'images/51.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(39, 'Space Invaders', 'Un des premiers jeux de tir où les joueurs doivent défendre la Terre contre des hordes d’aliens.', 965, 1, 'Original Arcade', 102, 1, 2, 'Bon', 'images/50.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(40, 'Dragon Ball Lot premier edition', 'L\'histoire de Goku, depuis son enfance jusqu\'à l\'âge adulte, alors qu\'il apprend les arts martiaux et découvre le monde.', 205, 1, 'Kana', 421, 1, 4, 'Bon', 'images/49.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(41, 'Astro Boy (Tetsuwan Atom)', 'Créé par Osamu Tezuka, c\'est l\'histoire d\'un robot garçon doté d\'une intelligence artificielle et d\'une force incroyable.', 150, 1, 'Original', 412, 1, 4, 'Parfait', 'images/47.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(42, 'Maison Ikkoku', 'Écrit par Rumiko Takahashi, c\'est une comédie romantique centrée sur les résidents d\'un immeuble d\'appartements et leur concierge.', 45, 1, 'Première édition', 362, 1, 4, 'Très bon', 'images/46.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(43, 'Fist of the North Star (Hokuto no Ken)', 'Un manga post-apocalyptique mettant en scène Kenshiro, maître du Hokuto Shinken, dans sa quête de justice.', 84, 1, 'Original', 420, 1, 4, 'Bon', 'images/45.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(44, 'Figurine Optimus Prime', 'Figurine transformable du leader des Autobots, Optimus Prime, issue de la série Transformers des années 80.', 150, 1, 'Original', 700, 1, 1, 'Très bon', 'images/44.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(45, 'Figurine He-Man', 'Figurine du héros emblématique de la série Maîtres de l\'Univers, He-Man.', 120, 1, 'Original', 500, 1, 1, 'Bon', 'images/42.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(46, 'Figurine Luke Skywalker', 'Figurine représentant Luke Skywalker avec son sabre laser, issue de la trilogie originale Star Wars.', 80, 1, 'Original', 462, 1, 1, 'Parfait', 'images/41.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(47, 'Figurine G.I. Joe - Snake Eyes', 'Figurine de Snake Eyes, membre emblématique de l\'équipe G.I. Joe.', 90, 1, 'Original', 452, 1, 1, 'Très bon', 'images/43.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL),
(48, 'Figurine Thundercats - Lion-O', 'Figurine du leader des Thundercats, Lion-O, avec l\'épée d\'Omens.', 110, 1, 'Original', 502, 1, 1, 'Bon', 'images/40.jpg', 'Vente', 1, '2023-08-22 21:49:48', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `product_cart`
--

CREATE TABLE `product_cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `unit_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product_cart`
--

INSERT INTO `product_cart` (`id`, `cart_id`, `product_id`, `quantity`, `unit_price`) VALUES
(1, 1, 1, 1, 15),
(2, 2, 1, 1, 15),
(3, 3, 3, 1, 15),
(4, 4, 1, 1, 15),
(5, 5, 3, 1, 15);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `role`, `name`) VALUES
(1, 'admin', 'Administrateur'),
(2, 'user', 'Utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `type`) VALUES
(1, 'figurine'),
(2, 'jeu video'),
(3, 'carte'),
(4, 'manga'),
(5, 'console');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(60) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `firstname`, `lastname`, `role_id`, `address_id`, `email`, `email_verified_at`, `password`, `phone`, `profile_image`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tom', 'Tom', 'Didier', 1, 134, 'tom@gmail.com', NULL, '$2y$10$.l81ZI27299JJKKOwqUXw.0O3hlf.XK7MkVQrcIkb6GOql9RmW3gm', '0412345678', 'images/default.jpg', 'oJPBDnJo5lijF6DhU5hdYAV1O8bqpfZXuuNx0GGhEkkBcaed6cFqxiKHVVB6', '2023-08-22 21:49:43', NULL, NULL),
(2, 'Marc', 'Marc', 'Mettio', 2, 27, 'marc@gmail.com', NULL, '$2y$10$wV3VuVKM58OyzqK/EJE/AO0CSvnEVHcUztQ0/T8B0KSkaRvu28FXS', '0475189642', 'images/default.jpg', NULL, '2023-08-22 21:49:43', NULL, NULL),
(3, 'Philip', 'Philip', 'Pilihp', 2, 85, 'philip@gmail.com', NULL, '$2y$10$Hkqn1K4Lp/blWa1Dh7M19uIRV6LhzeFsZCWnEIUxoIWxO4gbEZe3K', '0436184275', 'images/default.jpg', NULL, '2023-08-22 21:49:43', NULL, NULL),
(4, 'Eric', 'Eric', 'Krik', 2, 147, 'eric@gmail.com', NULL, '$2y$10$kpF.hCn0XUNkW3VUGrPbSefttJfdlNRCT5Oyc3g0NJzSZE4C5ZNaq', '0464891587', 'images/default.jpg', NULL, '2023-08-22 21:49:43', NULL, NULL),
(5, 'Mathieu', 'Mathieu', 'Laubo', 2, 156, 'mathieu@gmail.com', NULL, '$2y$10$mnhaIJuwTyx31Vlk4rx5GuWWIzu/8urQ3r1egss0chS08du8o0CXC', '0441574157', 'images/default.jpg', NULL, '2023-08-22 21:49:43', NULL, NULL),
(6, 'Enrico', 'Enrico', 'Paco', 2, 22, 'enrico@gmail.com', NULL, '$2y$10$T/aqZ8y61HpfwNkP0CKwZu0IyfHmZN8jqp.ANm/dir2URcflqf5X6', '0465412348', 'images/default.jpg', NULL, '2023-08-22 21:49:43', NULL, NULL),
(7, 'yhessel', 'Madaline', 'Bergnaum', 2, 19, 'trent.cormier@example.com', NULL, '$2y$10$Ugt/d4ppSXOrSfKTW4dVUufYf2r5qLMupSH4NbZ80Qxexo5jVamqK', '1-347-302-4030', 'images/default.jpg', NULL, '2023-08-22 21:49:43', NULL, NULL),
(8, 'jrenner', 'Walter', 'Stracke', 2, 112, 'jamar.kunde@example.net', NULL, '$2y$10$tm5E2o1e32E2auPu7mP5j.8SlC9kX3GA.IrySQ6mAE.ZCziHadbPa', '1-984-477-5009', 'images/default.jpg', NULL, '2023-08-22 21:49:43', NULL, NULL),
(9, 'barbara88', 'London', 'Nitzsche', 2, 53, 'marlee.kirlin@example.net', NULL, '$2y$10$aggluKVAe2ADkkjyikm9ZOwl3Rh89mw34q8G0t.QYHdUPTiAbjN6G', '531-257-6650', 'images/default.jpg', NULL, '2023-08-22 21:49:43', NULL, NULL),
(10, 'osinski.charlotte', 'Ambrose', 'Treutel', 2, 125, 'prudence.mcclure@example.org', NULL, '$2y$10$eajuqTNkLtVjvDNgx9nCy.gQ1G.JpCxRifGQiFlL2KA2TxF91z5a6', '+1-580-983-4989', 'images/default.jpg', NULL, '2023-08-22 21:49:43', NULL, NULL),
(11, 'cbode', 'Reva', 'Funk', 2, 116, 'bartoletti.thurman@example.org', NULL, '$2y$10$iB6GHdai9t/tmVyGnzOeIuWjCopyIBz6gCJuXbHSuQE8jpv2HTXOu', '(641) 593-4066', 'images/default.jpg', NULL, '2023-08-22 21:49:43', NULL, NULL),
(12, 'nwalsh', 'Vivianne', 'Beatty', 2, 151, 'rowe.cecelia@example.org', NULL, '$2y$10$ZQiawvUsJThxjn45v66mPOMRXHYQp55DZlBBJUsuhOljITktm1wG2', '+1-870-859-1433', 'images/default.jpg', NULL, '2023-08-22 21:49:43', NULL, NULL),
(13, 'lenora.ohara', 'Amara', 'Pacocha', 2, 51, 'grant.clarissa@example.org', NULL, '$2y$10$lLSqE0tBNiErEpgQbRJDyuZibpkUSjSyTIAIbSpv/NqaX5wx.5x22', '+1 (678) 909-8151', 'images/default.jpg', NULL, '2023-08-22 21:49:43', NULL, NULL),
(14, 'fredrick.hamill', 'Lois', 'Nienow', 2, 125, 'jana31@example.com', NULL, '$2y$10$kDZ63mV5DLTFj5DSfCZ9wej3C9d7jAxd/oHxi02cNzeSq0zBGIky6', '(251) 475-4265', 'images/default.jpg', NULL, '2023-08-22 21:49:43', NULL, NULL),
(15, 'kacie.cormier', 'Bertha', 'Ullrich', 2, 51, 'mellie.franecki@example.org', NULL, '$2y$10$vsTg.Hwbz1zwMe0oN0b9U./pFiFAAWwaabDBtvP.s9wNlhGLHujLO', '1-623-436-9093', 'images/default.jpg', NULL, '2023-08-22 21:49:44', NULL, NULL),
(16, 'kip99', 'Gloria', 'Gusikowski', 2, 52, 'zryan@example.net', NULL, '$2y$10$KgyAiE5IMy8ZR.6Ql05sMOGDok.Zl7WK5YfJ0TQ1U5.KizQPot.4y', '559-603-3831', 'images/default.jpg', NULL, '2023-08-22 21:49:44', NULL, NULL),
(17, 'timmothy.cremin', 'Brown', 'Gleichner', 2, 94, 'tatyana.rolfson@example.net', NULL, '$2y$10$mM1xxAVTRJnCWncI1VeQY.Ntw7IOPygtggyryb3jWUxAx4dkYFz9C', '(985) 794-1337', 'images/default.jpg', NULL, '2023-08-22 21:49:44', NULL, NULL),
(18, 'amoen', 'Jacynthe', 'Cormier', 2, 26, 'iolson@example.org', NULL, '$2y$10$x4/IfFjpqUGTz7cRUaCp5OfWuTUqdFun7.q6IADGQcRFLNI1VuK5y', '1-986-953-2748', 'images/default.jpg', NULL, '2023-08-22 21:49:44', NULL, NULL),
(19, 'becker.chance', 'Madilyn', 'Rutherford', 2, 47, 'jarrod.kuvalis@example.net', NULL, '$2y$10$vC9zP8lXBNbRk87r1PrwwOpRKRTM1kmkwFQRISbqWWbQPLE1QIxrG', '804.789.6386', 'images/default.jpg', NULL, '2023-08-22 21:49:44', NULL, NULL),
(20, 'gerardo12', 'Beau', 'Hudson', 2, 144, 'ofarrell@example.org', NULL, '$2y$10$vlRCMdhylgDUvHlNv4BQuu6Kk8Jrz8Bid2Td5MJGwWo4idUlx/MIy', '(630) 543-1529', 'images/default.jpg', NULL, '2023-08-22 21:49:44', NULL, NULL),
(21, 'lavina38', 'Eriberto', 'Goyette', 2, 92, 'fidel13@example.net', NULL, '$2y$10$VAhTG1EhbmzX2X7hcy6ouO07gUEuCX202GKU6qmPK5qisP/nLqR2O', '+1 (283) 231-5804', 'images/default.jpg', NULL, '2023-08-22 21:49:44', NULL, NULL),
(22, 'aaron.hoppe', 'Reymundo', 'Stiedemann', 2, 102, 'jacquelyn.lowe@example.com', NULL, '$2y$10$sFsEBgLSFt7IlNzEHLcqEuMDSdgv8YEXSr/GaikbAczgtjzoryw2S', '(515) 317-1188', 'images/default.jpg', NULL, '2023-08-22 21:49:44', NULL, NULL),
(23, 'zachariah26', 'Iliana', 'Schumm', 2, 41, 'general85@example.org', NULL, '$2y$10$liQF4L.6Xv3VeYFc3a2qOuNdBJYJqzRIBvzZ5okirS.owxOR.BwRS', '719-513-0493', 'images/default.jpg', NULL, '2023-08-22 21:49:44', NULL, NULL),
(24, 'lue47', 'Geovany', 'Franecki', 2, 159, 'harvey.carrie@example.net', NULL, '$2y$10$pYgL9J20QZ2il.nTZd9qDemjDkD96NI5xSe1NufwcBXvLHoOyGhG2', '(773) 408-9389', 'images/default.jpg', NULL, '2023-08-22 21:49:44', NULL, NULL),
(25, 'heidenreich.marvin', 'Andres', 'Homenick', 2, 63, 'ricardo.dietrich@example.com', NULL, '$2y$10$n5bXu8TEeBiorlv1aKWUrOdpQwpfJWVZXXDA7I9R6nhTL1XQOLUnC', '1-412-201-3710', 'images/default.jpg', NULL, '2023-08-22 21:49:44', NULL, NULL),
(26, 'katelyn17', 'Beatrice', 'Boyle', 2, 47, 'easter.satterfield@example.net', NULL, '$2y$10$cpEb89Jqr1dXT0q8J1DF4OsCTAOYdwv4oFOs0RyS16G0DLR5EPb1C', '501-788-3536', 'images/default.jpg', NULL, '2023-08-22 21:49:44', NULL, NULL),
(27, 'mstehr', 'Kendrick', 'Nienow', 2, 107, 'asa.wiza@example.org', NULL, '$2y$10$d7BgWip/7/0pIK9opZWfmeJeJPb04PxapImvuwIOhs4bPQqW04eh2', '1-816-277-2029', 'images/default.jpg', NULL, '2023-08-22 21:49:44', NULL, NULL),
(28, 'mitchell.darrell', 'Dora', 'Ryan', 2, 96, 'badams@example.org', NULL, '$2y$10$rTlwMJCLH7b1boO.pTSGn.tTtlMLdpcm2yohlpuqsdO0Le/7vCC86', '+1-540-632-2559', 'images/default.jpg', NULL, '2023-08-22 21:49:44', NULL, NULL),
(29, 'schowalter.dayna', 'Bradly', 'Stokes', 2, 95, 'polly.beahan@example.org', NULL, '$2y$10$NlHg.RqUexgWLpsdWFBZnuX8ZOjGN1KpFm.j2BR4.f/v69ZiNDkom', '1-256-709-1633', 'images/default.jpg', NULL, '2023-08-22 21:49:44', NULL, NULL),
(30, 'landen.gleason', 'Carlos', 'Rolfson', 2, 85, 'ike.morar@example.com', NULL, '$2y$10$vV9MimhJ22P79FvCMF5keOiQFSrvQJt62WL6kdF50PPHOwtYGukqO', '573-777-5935', 'images/default.jpg', NULL, '2023-08-22 21:49:44', NULL, NULL),
(31, 'waters.lenny', 'Dulce', 'Heaney', 2, 138, 'xcremin@example.org', NULL, '$2y$10$lreo6HzgoHyX5/M8aGfrS.Q8Wm8W57/2/N50rQiEf8jiv.R08O6ni', '+15155244254', 'images/default.jpg', NULL, '2023-08-22 21:49:44', NULL, NULL),
(32, 'kaleigh45', 'Elta', 'Dare', 2, 57, 'jo86@example.net', NULL, '$2y$10$b9CHKvY/2sFfXw6Cff.kkOR0aJyxSDrQlj5Ra5GQ/YEKsCbjyZW0u', '+1.248.438.4375', 'images/default.jpg', NULL, '2023-08-22 21:49:44', NULL, NULL),
(33, 'alfonso.bernier', 'Vivian', 'Haag', 2, 149, 'waldo.wuckert@example.com', NULL, '$2y$10$pKJ3NazIqMSt2vUlkeiggObR5biFBMwMU.g56O.imlCnYczQ4Qubm', '+1-567-897-1416', 'images/default.jpg', NULL, '2023-08-22 21:49:44', NULL, NULL),
(34, 'meredith.veum', 'Diego', 'O\'Hara', 2, 34, 'orie32@example.org', NULL, '$2y$10$MHWu06T8JWZB6x833KXAPu/KBikwxlfHVgbxwEYBW7tZu9XHkzkgO', '+1-229-648-3450', 'images/default.jpg', NULL, '2023-08-22 21:49:44', NULL, NULL),
(35, 'ressie11', 'Waylon', 'Hirthe', 2, 154, 'lrosenbaum@example.com', NULL, '$2y$10$SKcRE6lQGRm.x0ieuvziFOoiGMGbxeLu2bxJSH0QSQGeZ3lJKix4G', '(872) 328-1754', 'images/default.jpg', NULL, '2023-08-22 21:49:44', NULL, NULL),
(36, 'ritchie.mariah', 'George', 'Bartell', 2, 47, 'wilma16@example.org', NULL, '$2y$10$CeIqnNaI.0L7LkoLXclPQerqVO8XjriddcwBamTvtgIeQ6EmkeuN2', '(754) 754-8532', 'images/default.jpg', NULL, '2023-08-22 21:49:45', NULL, NULL),
(37, 'west.noah', 'Aleen', 'Bahringer', 2, 52, 'keagan88@example.net', NULL, '$2y$10$Dyj9BHbMnb2eTPIuxPXuDO209xTvyYwAH7ZgWj9ouVg9xOkO3U3T2', '1-909-877-3057', 'images/default.jpg', NULL, '2023-08-22 21:49:45', NULL, NULL),
(38, 'deshawn.jenkins', 'Blaze', 'Flatley', 2, 12, 'rherzog@example.net', NULL, '$2y$10$vu2qzNegYAU5Pkr75ws0gO22HFD.OsQlem/Uh5s1bn5mXLm5S8IpS', '(856) 275-1444', 'images/default.jpg', NULL, '2023-08-22 21:49:45', NULL, NULL),
(39, 'ohansen', 'Kirstin', 'Davis', 2, 84, 'braden.howell@example.org', NULL, '$2y$10$6xbyoT6d0QTqQwifpMAW/eqpqsmrBouDhgz6m.KOL0T7vVMRh9W9y', '1-517-828-4448', 'images/default.jpg', NULL, '2023-08-22 21:49:45', NULL, NULL),
(40, 'jordan82', 'Lindsay', 'Macejkovic', 2, 113, 'cole.lamont@example.org', NULL, '$2y$10$BPy8IXYXKSDLgs7tFis0ju7pjjGMvVw0.Roqf152hC.sJD7ziUFBW', '1-743-964-8897', 'images/default.jpg', NULL, '2023-08-22 21:49:45', NULL, NULL),
(41, 'sawayn.harley', 'Declan', 'Crooks', 2, 84, 'coconner@example.net', NULL, '$2y$10$Os8CweBZ2uNC3VIPRsQE4.lgEOK30Eb8aI0QWllCoQ1xJaBoJ9kU.', '+1 (262) 916-0158', 'images/default.jpg', NULL, '2023-08-22 21:49:45', NULL, NULL),
(42, 'isabelle05', 'Rosemary', 'Hettinger', 2, 133, 'moen.garnet@example.net', NULL, '$2y$10$Oo6WDUhCBFeGxlUBNNDISOfIrd695y7kKnjMqHqU3X9/ehwZfwxbG', '240-696-8525', 'images/default.jpg', NULL, '2023-08-22 21:49:45', NULL, NULL),
(43, 'hmedhurst', 'Jaiden', 'Labadie', 2, 120, 'johathan29@example.net', NULL, '$2y$10$xVA4UY5NVstj87Ccz6y5Gum25IjAV.O2Z2kDc7uwzW0/hi1R1yexm', '+1.929.570.9983', 'images/default.jpg', NULL, '2023-08-22 21:49:45', NULL, NULL),
(44, 'camren09', 'Noemie', 'Schamberger', 2, 25, 'tboyle@example.net', NULL, '$2y$10$M3pTRMHWgcA89qHBodRNw.sMn9z4iBcfSVgBOSyhq7MURKCQJQbhG', '1-283-868-8991', 'images/default.jpg', NULL, '2023-08-22 21:49:45', NULL, NULL),
(45, 'florence47', 'Elwin', 'Bergnaum', 2, 121, 'david06@example.com', NULL, '$2y$10$PBkKSXxatCvoyzRASypfsedBkbvvzePd7KWNVLPYvvh1jb/GHCQz2', '620.521.1821', 'images/default.jpg', NULL, '2023-08-22 21:49:45', NULL, NULL),
(46, 'irving.monahan', 'Vern', 'O\'Hara', 2, 110, 'mante.oliver@example.org', NULL, '$2y$10$NusRCgMtU8T0OT0lRV9gA.imnqI1pfr5tVJzBpbirGWg6eKVNe8V.', '+1-323-396-9301', 'images/default.jpg', NULL, '2023-08-22 21:49:45', NULL, NULL),
(47, 'rosalee.rice', 'Mason', 'Cassin', 2, 151, 'kunde.melba@example.com', NULL, '$2y$10$d5EnmnGMDAKr8sNfnEgmb.igdQmtuTPc31qWE2T8GRGxOC31U7/0q', '+1.786.368.8737', 'images/default.jpg', NULL, '2023-08-22 21:49:45', NULL, NULL),
(48, 'giovanny.graham', 'Sheldon', 'Hyatt', 2, 160, 'assunta87@example.net', NULL, '$2y$10$rGNDtN7NeEIqGy8/A.IKUuU6UHYq2c6BFCFTpFpS58nGljWT743VW', '360.487.9692', 'images/default.jpg', NULL, '2023-08-22 21:49:45', NULL, NULL),
(49, 'hortense.parisian', 'Colt', 'O\'Connell', 2, 165, 'schowalter.toni@example.com', NULL, '$2y$10$D73RvtxS2PP8Alpq0PdzDu0DIL8H7pLGnjfjWe.4efiTlZiyTdaOO', '228-859-7588', 'images/default.jpg', NULL, '2023-08-22 21:49:45', NULL, NULL),
(50, 'kilback.wilma', 'Gardner', 'Kuhn', 2, 60, 'karli74@example.org', NULL, '$2y$10$OZJFHlvnswTx1kbuAuNqau7el5ig6xfW5vcpjDAIu6Fa4WJOsIv4O', '1-304-377-2359', 'images/default.jpg', NULL, '2023-08-22 21:49:45', NULL, NULL),
(51, 'williamson.twila', 'Duane', 'Reilly', 2, 39, 'celia58@example.net', NULL, '$2y$10$sAAIhyiPkKuHx0tIJ.B84uiGtZV.GyL6fyb3JWZz1st1VBN/ahiF2', '+17752953266', 'images/default.jpg', NULL, '2023-08-22 21:49:45', NULL, NULL),
(52, 'istokes', 'Clyde', 'Stracke', 2, 86, 'ariane.crooks@example.net', NULL, '$2y$10$83pZNv0UORhExZJ.OOUd6.yCAvtHmqq5wSHS6Xg0pxVGNevdWeUsi', '+1-864-210-3356', 'images/default.jpg', NULL, '2023-08-22 21:49:45', NULL, NULL),
(53, 'sean.mosciski', 'Rupert', 'O\'Keefe', 2, 115, 'charity.schroeder@example.net', NULL, '$2y$10$ySo8NxEKwlL09Fsgv/tW/.Z5vodLtgHZM4OswnDnTN3KxU4oFuJo.', '(364) 634-6965', 'images/default.jpg', NULL, '2023-08-22 21:49:45', NULL, NULL),
(54, 'wdoyle', 'Coby', 'Parisian', 2, 141, 'titus.brekke@example.com', NULL, '$2y$10$D2REZ.9AYzxs/P.amRfoxuX8I6F7.SgE/5KgLEbk29BfS8CedcB4G', '+1-858-816-4610', 'images/default.jpg', NULL, '2023-08-22 21:49:45', NULL, NULL),
(55, 'lexus.becker', 'Caterina', 'Dach', 2, 78, 'micaela.turcotte@example.com', NULL, '$2y$10$7kuHv006IjNWtbhsHbGYTeZNMYTqfHsBhpaK244c8DneLtCtczEka', '+1 (574) 485-5973', 'images/default.jpg', NULL, '2023-08-22 21:49:45', NULL, NULL),
(56, 'wbecker', 'Unique', 'Blick', 2, 65, 'upfannerstill@example.com', NULL, '$2y$10$pkU/2YKY3CalJH7sn865de8H03NodfjnQofIzjzdw2X6c/TRVQZni', '(430) 342-1454', 'images/default.jpg', NULL, '2023-08-22 21:49:45', NULL, NULL),
(57, 'quitzon.arlie', 'Betsy', 'Grimes', 2, 126, 'willis.lang@example.com', NULL, '$2y$10$HIaBL7WGFN2GmMv2pc7jO.X.jWyzCDu61jjlIfTGpoxt7XP2zLi6S', '1-640-785-7489', 'images/default.jpg', NULL, '2023-08-22 21:49:46', NULL, NULL),
(58, 'lhintz', 'Dakota', 'Hansen', 2, 105, 'macy.zieme@example.org', NULL, '$2y$10$onjiYQfLecVAR6zS3lGnhOABhF6Jg7hvOg09vKFwG4gEJqIVqoZp6', '1-212-253-3244', 'images/default.jpg', NULL, '2023-08-22 21:49:46', NULL, NULL),
(59, 'rfarrell', 'Marilou', 'Morissette', 2, 17, 'zoey.mccullough@example.com', NULL, '$2y$10$gq7XWOw1.IQaYi0hUmAoKe3stYzbqBZ0qMj1rK27KmObIcYuCunT2', '+15513738367', 'images/default.jpg', NULL, '2023-08-22 21:49:46', NULL, NULL),
(60, 'dulce03', 'Camille', 'Padberg', 2, 40, 'isaiah35@example.com', NULL, '$2y$10$VJOsUKggr2dTho9a5eFJPO93x2vVLhl0of/rYE3Ev5QhZM1nr/dme', '1-714-761-6749', 'images/default.jpg', NULL, '2023-08-22 21:49:46', NULL, NULL),
(61, 'emmerich.bill', 'Ramiro', 'Wolf', 2, 164, 'reynolds.marshall@example.net', NULL, '$2y$10$LYVdazZZkGcctcsyzhpBhezVsRAL6xi1nAyAXuZ.wOrSLWz/cZ9lK', '(757) 403-4830', 'images/default.jpg', NULL, '2023-08-22 21:49:46', NULL, NULL),
(62, 'okuhn', 'Ally', 'Beatty', 2, 104, 'hettinger.edwardo@example.com', NULL, '$2y$10$Ox/IcjlGIJgcmAsx5ahGq.GNLA1v2IILo6T/KW2cU3ajAz4rWe9YW', '731.242.7620', 'images/default.jpg', NULL, '2023-08-22 21:49:46', NULL, NULL),
(63, 'rowe.cyrus', 'Gideon', 'Champlin', 2, 14, 'robbie.bashirian@example.net', NULL, '$2y$10$2ulKvk5oDcxyX0e.PkRd7ujD3KoKudGsFxkdxMNNLyedEi8ZQuA8m', '573-203-8642', 'images/default.jpg', NULL, '2023-08-22 21:49:46', NULL, NULL),
(64, 'alba39', 'Santino', 'Weissnat', 2, 50, 'kristoffer.dubuque@example.com', NULL, '$2y$10$NU9209LU4qpFnZT9LpaYA.EAFCapXJZxGPIGZj.yN.GQOs/r7rTq.', '858-285-0208', 'images/default.jpg', NULL, '2023-08-22 21:49:46', NULL, NULL),
(65, 'ellen10', 'Charlene', 'Romaguera', 2, 116, 'kyra.welch@example.net', NULL, '$2y$10$C5WuSuGsFfG5P1lAi./.7uk0YsNfENUNHcDnk3qWW8J7FuWSwfGp.', '337-402-2328', 'images/default.jpg', NULL, '2023-08-22 21:49:46', NULL, NULL),
(66, 'otorp', 'Ari', 'Altenwerth', 2, 100, 'jerod09@example.org', NULL, '$2y$10$7Kyb.C0Lx2eatTlCLQUOk.c/4xoTUHUUlpCo3kWxTfMe1bXIhTl4i', '304-946-0667', 'images/default.jpg', NULL, '2023-08-22 21:49:46', NULL, NULL),
(67, 'roselyn.mann', 'Edgar', 'Shields', 2, 98, 'carli05@example.net', NULL, '$2y$10$YVWSMDVjI6SfRm0EflMKr.NaEKbA24RyjsoKZR5sVkkvEKe0BABrW', '1-385-726-7701', 'images/default.jpg', NULL, '2023-08-22 21:49:46', NULL, NULL),
(68, 'ymayert', 'Flo', 'Johnson', 2, 60, 'jane87@example.org', NULL, '$2y$10$pw1WCVYbIHDusVw.6eu17uOWJGUHvCAxe/cWrQIMaSbFwD6JcdkQq', '1-952-722-3806', 'images/default.jpg', NULL, '2023-08-22 21:49:46', NULL, NULL),
(69, 'darren38', 'Rosemary', 'Von', 2, 111, 'bauch.andy@example.com', NULL, '$2y$10$ztn.nW/HhlAWYBomg9.a/ObAyEqt33lvN4.YomrC6EGaPdMZfC2Ui', '901-825-2354', 'images/default.jpg', NULL, '2023-08-22 21:49:46', NULL, NULL),
(70, 'schmeler.clemmie', 'Dahlia', 'O\'Hara', 2, 152, 'priscilla20@example.com', NULL, '$2y$10$MeRIG1ltjN/bkqtjUfuNGePwcF7j9Z/UFaHznKus56OgSR4OWwrmK', '463.930.1549', 'images/default.jpg', NULL, '2023-08-22 21:49:46', NULL, NULL),
(71, 'ledner.adele', 'Cameron', 'Russel', 2, 71, 'zkuhn@example.com', NULL, '$2y$10$HinUaCaoEpGsh4l8FNFTiORTuJjzh00319u3SAntj06E21LReBqsW', '706-666-9566', 'images/default.jpg', NULL, '2023-08-22 21:49:46', NULL, NULL),
(72, 'jones.maurine', 'Ryder', 'Buckridge', 2, 97, 'jefferey14@example.net', NULL, '$2y$10$d8egOoayNtwNoaokTdmo0OVIjHsthw5GTxMDleb9t4EDIz3prmWqq', '1-406-526-7202', 'images/default.jpg', NULL, '2023-08-22 21:49:46', NULL, NULL),
(73, 'ndaniel', 'Grayce', 'Ernser', 2, 46, 'shana84@example.com', NULL, '$2y$10$7VlkACmb.GEE8QReXOVSTOdM0qRfv7geQv1nQKtCobJrkCEhH1AZy', '+1-380-692-5756', 'images/default.jpg', NULL, '2023-08-22 21:49:46', NULL, NULL),
(74, 'trystan.beier', 'Janie', 'Schmidt', 2, 47, 'lokuneva@example.net', NULL, '$2y$10$diLt3I/px5x/d.lqGl8pT.s6VigWB5utJ069pI1MirAt5GNxknj8S', '1-934-358-4531', 'images/default.jpg', NULL, '2023-08-22 21:49:47', NULL, NULL),
(75, 'concepcion.farrell', 'Gwendolyn', 'Padberg', 2, 48, 'zieme.ima@example.com', NULL, '$2y$10$t1qRDDw2crNIsxPOmP8UrOp7S7UmtnBJh4t2Y/J4UTwQ3cSQ1XSLq', '1-667-781-8240', 'images/default.jpg', NULL, '2023-08-22 21:49:47', NULL, NULL),
(76, 'rhoda.bergstrom', 'Saige', 'Auer', 2, 16, 'crogahn@example.com', NULL, '$2y$10$QiWJB0GM6OeLn0OCJd.1RekFUfDUcTQyh327laV4C7Y7th6F.Cbdi', '1-952-383-7023', 'images/default.jpg', NULL, '2023-08-22 21:49:47', NULL, NULL),
(77, 'sbreitenberg', 'Mckenzie', 'Lehner', 2, 146, 'aaufderhar@example.com', NULL, '$2y$10$Ed4TwxqprwA2jtmPkxOFc.T.k.6Q2UeFtca64t1sMz1J6ajOAnuIi', '+1-940-459-6930', 'images/default.jpg', NULL, '2023-08-22 21:49:47', NULL, NULL),
(78, 'wrohan', 'Myriam', 'Bailey', 2, 39, 'sandy95@example.com', NULL, '$2y$10$2mOgdBN0KLgZu5lowZt7zuyY8ybAVgB7a5Oi8bg8Z88tuCHwf59Ne', '+1.602.438.7350', 'images/default.jpg', NULL, '2023-08-22 21:49:47', NULL, NULL),
(79, 'tiffany27', 'Grace', 'Dickinson', 2, 84, 'smitham.carlie@example.com', NULL, '$2y$10$DJeYkSB5jso.TObt2zty.eXvVha/BY.obDuD.QRkvsyvKszk4Ip1y', '(847) 895-6351', 'images/default.jpg', NULL, '2023-08-22 21:49:47', NULL, NULL),
(80, 'laurie.hettinger', 'Melyna', 'Leannon', 2, 6, 'blair21@example.org', NULL, '$2y$10$AJVs6TVE30pGGHcZVzd86umWNHtl4EvaiBIhBB6oG4KP9JxqxuDMi', '520.905.7689', 'images/default.jpg', NULL, '2023-08-22 21:49:47', NULL, NULL),
(81, 'celestine97', 'Katlyn', 'Witting', 2, 67, 'adams.harry@example.net', NULL, '$2y$10$1KX1Bu61bVy84aGGVQtNH.utQQ3m4GCqQTozM5G1pPtIO6EGi2J0K', '+1-205-584-0727', 'images/default.jpg', NULL, '2023-08-22 21:49:47', NULL, NULL),
(82, 'lennie.nitzsche', 'Gonzalo', 'Schinner', 2, 74, 'nolan.pedro@example.net', NULL, '$2y$10$lIbHAwZTs9jC73FMVPZWkOwTOp.VgiJYIhQ3OXbHxBmTfWvgdNxau', '1-850-342-3435', 'images/default.jpg', NULL, '2023-08-22 21:49:47', NULL, NULL),
(83, 'maxine.mayert', 'Wilford', 'Mante', 2, 55, 'conn.royal@example.net', NULL, '$2y$10$Com8IyzUYZJP/1WVEZbt3.RyfxTuUgEqbImihvYtIqMYNmovHt5We', '(878) 350-6739', 'images/default.jpg', NULL, '2023-08-22 21:49:47', NULL, NULL),
(84, 'stoltenberg.jaime', 'Hugh', 'Muller', 2, 114, 'rippin.maxime@example.com', NULL, '$2y$10$THB7gcHsXRCaFEIKzkqOHOJZYIao7DqSkwPcTlM53vlY5/hOeTRvq', '+1-564-409-1881', 'images/default.jpg', NULL, '2023-08-22 21:49:47', NULL, NULL),
(85, 'okuneva.zachariah', 'Libbie', 'Daugherty', 2, 107, 'russel.macejkovic@example.net', NULL, '$2y$10$tKDfp8oFl/Rxl80ho36v5eCPYS0js12FM8uDS63GL6JCCRiVoNhjK', '+18066648924', 'images/default.jpg', NULL, '2023-08-22 21:49:47', NULL, NULL),
(86, 'kozey.evert', 'Ethan', 'Veum', 2, 143, 'hschumm@example.net', NULL, '$2y$10$ReMtp9puxoSERHAk.55Gm.9rcjGzmoZpGJu6rRt3YVbw3rz8gvy0W', '+1 (228) 398-6447', 'images/default.jpg', NULL, '2023-08-22 21:49:47', NULL, NULL),
(87, 'trystan.gislason', 'Alford', 'Hegmann', 2, 170, 'gbednar@example.com', NULL, '$2y$10$RkWW6xJeNtKTnqFyeuwZgeQjMRvU71orGam8VGkmvr6hXgB8d/6sS', '(707) 797-2404', 'images/default.jpg', NULL, '2023-08-22 21:49:47', NULL, NULL),
(88, 'koch.shanie', 'Deborah', 'Wiegand', 2, 61, 'lubowitz.carol@example.net', NULL, '$2y$10$6vLdQnQZgYFB1HgwX5N1lOmUaVTFjwd3HNKQbljbJGZanb9ZWXVGi', '770-825-1894', 'images/default.jpg', NULL, '2023-08-22 21:49:47', NULL, NULL),
(89, 'vheller', 'America', 'Jerde', 2, 128, 'kuphal.jeremy@example.org', NULL, '$2y$10$JwkYAkoH7cZ229AMBXHI0us3L4/dIo5LzO56JFNGGTIqFZtjqgeyq', '458.625.7384', 'images/default.jpg', NULL, '2023-08-22 21:49:47', NULL, NULL),
(90, 'jtillman', 'Jarrell', 'Carroll', 2, 84, 'scartwright@example.net', NULL, '$2y$10$NosZdtOKYsYp36ranDJubuTHvPAYstk3FGABYYVvsRgmBo0vqr1YO', '(631) 812-8202', 'images/default.jpg', NULL, '2023-08-22 21:49:47', NULL, NULL),
(91, 'uschaefer', 'Reyna', 'Murazik', 2, 105, 'brooks.luettgen@example.org', NULL, '$2y$10$bGxesCd8VEq4BXTu4wpite.UvSWFI9idcMtRvzP2HNMA7iegVDAs.', '1-980-900-1601', 'images/default.jpg', NULL, '2023-08-22 21:49:47', NULL, NULL),
(92, 'melisa00', 'Cassidy', 'Raynor', 2, 158, 'johathan97@example.net', NULL, '$2y$10$Atp61ppwKwGOnFHZp0RCSuBaRzkTXzXXe4d4WhUv3Au.9l78/s9ty', '(856) 802-0595', 'images/default.jpg', NULL, '2023-08-22 21:49:47', NULL, NULL),
(93, 'crist.marquise', 'Derrick', 'Beatty', 2, 102, 'kuhic.stevie@example.org', NULL, '$2y$10$uk9CqcZf3531U95S7wLgd.JymjowScBXwhrTqVGLI8AafHW7BIxNK', '458.215.2207', 'images/default.jpg', NULL, '2023-08-22 21:49:47', NULL, NULL),
(94, 'jamey.lowe', 'Melissa', 'Koch', 2, 97, 'curt.kub@example.net', NULL, '$2y$10$PYir2wVKgQyRAqlYbbxngeNKgPo9dN39h46dpdEd/k560a/ZGGU5G', '1-949-246-2094', 'images/default.jpg', NULL, '2023-08-22 21:49:48', NULL, NULL),
(95, 'erdman.chet', 'Golda', 'Smith', 2, 129, 'vesta.spinka@example.com', NULL, '$2y$10$YCmqmpmfRbXL/0NGkGMw6en2wDhDsD/1juD7E9TW6CVqCC40V.aWa', '+1-669-397-0693', 'images/default.jpg', NULL, '2023-08-22 21:49:48', NULL, NULL),
(96, 'sabina.brown', 'Harmony', 'Lebsack', 2, 167, 'camden.morissette@example.net', NULL, '$2y$10$XjGooLqw.X039btRURHtEucwBf4Fky0sCxTzYPVvQ6rbPR4QG5kAO', '938-314-1916', 'images/default.jpg', NULL, '2023-08-22 21:49:48', NULL, NULL),
(97, 'lolita88', 'Kellen', 'Streich', 2, 83, 'sanford.linwood@example.com', NULL, '$2y$10$qYnU6Yxzl6gksoTYqUZ5/OvUBwCg3sTT.yuG1SP/lKvKUjjh7UCZm', '678.423.2132', 'images/default.jpg', NULL, '2023-08-22 21:49:48', NULL, NULL),
(98, 'lbartell', 'Alva', 'Lang', 2, 168, 'zprohaska@example.org', NULL, '$2y$10$2/tuHf.TAYqxeFFspu450ebhY6GvfAQ7ba7Qknoy1kMORD2aghVXm', '+1-830-207-3508', 'images/default.jpg', NULL, '2023-08-22 21:49:48', NULL, NULL),
(99, 'xbosco', 'Joey', 'Wilkinson', 2, 119, 'lucious93@example.org', NULL, '$2y$10$f1xfsNEAPc1VJn8LlSdvXe8VPkUh13plL1O13hK1M5A2pV6hJgvai', '(689) 568-0129', 'images/default.jpg', NULL, '2023-08-22 21:49:48', NULL, NULL),
(100, 'odeckow', 'Tracey', 'Marks', 2, 21, 'xkrajcik@example.com', NULL, '$2y$10$UvbHIgsWAolZjkMItjW.vOYnObhgcvDC2HMs..KhyxjVRYa33GhCK', '+18598282616', 'images/default.jpg', NULL, '2023-08-22 21:49:48', NULL, NULL),
(101, 'elta71', 'Wilbert', 'Bogan', 2, 20, 'moen.asha@example.net', NULL, '$2y$10$f7H7B2eyH3eutEBuox4sXOxhGBU4kbJyTWV2Z0KQUTGyRGZk7J/me', '1-341-372-9687', 'images/default.jpg', NULL, '2023-08-22 21:49:48', NULL, NULL),
(102, 'grimes.idell', 'Joany', 'Paucek', 2, 119, 'crystal.schiller@example.org', NULL, '$2y$10$W1iVsURKmSu2tNB8vCqcdu32.3QwfJslqfTN51R8wslNWYVS0psMK', '214-299-9508', 'images/default.jpg', NULL, '2023-08-22 21:49:48', NULL, NULL),
(103, 'macey95', 'Jazmin', 'Kertzmann', 2, 148, 'rutherford.marcelina@example.org', NULL, '$2y$10$VYqQzlrDnBI9LVTWhwZBmuuZGuWqSROAoO.VC.flF3pg0PtdIO5ju', '+1-808-738-6982', 'images/default.jpg', NULL, '2023-08-22 21:49:48', NULL, NULL),
(104, 'kassandra63', 'Luis', 'Bailey', 2, 7, 'hadley.torp@example.net', NULL, '$2y$10$Xcy5I6wuP0J4vq4y8GPjKueRFcWYv8HVv25v2yHxm25G5lkXXON/a', '240.658.3299', 'images/default.jpg', NULL, '2023-08-22 21:49:48', NULL, NULL),
(105, 'margarita.becker', 'Simone', 'Dickens', 2, 114, 'charlie31@example.org', NULL, '$2y$10$cL7vOlUneq9itqGE2RZg.uoTIaM0AbFNEQr2JhyMk15BVimhL7a26', '+1-517-882-4722', 'images/default.jpg', NULL, '2023-08-22 21:49:48', NULL, NULL),
(106, 'barry.lubowitz', 'Santino', 'Lakin', 2, 83, 'kira.steuber@example.net', NULL, '$2y$10$GcqW9wfmyyfb7pPuZehbm.p8Qtlhoj1Asg50XPA3cSEr4JQfPb1Pq', '870.987.4072', 'images/default.jpg', NULL, '2023-08-22 21:49:48', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_order_id_foreign` (`order_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_cart_id_foreign` (`cart_id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_type_id_foreign` (`type_id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Index pour la table `product_cart`
--
ALTER TABLE `product_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_cart_cart_id_foreign` (`cart_id`),
  ADD KEY `product_cart_product_id_foreign` (`product_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_login_unique` (`login`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_address_id_foreign` (`address_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT pour la table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `product_cart`
--
ALTER TABLE `product_cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`),
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `product_cart`
--
ALTER TABLE `product_cart`
  ADD CONSTRAINT `product_cart_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `product_cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
