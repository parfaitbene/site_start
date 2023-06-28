-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 28 juin 2023 à 22:21
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `start`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `views` bigint(20) DEFAULT '0',
  `updated_at` datetime NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `image_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  `bg_image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image_size` int(11) DEFAULT NULL,
  `bg_image_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  `is_published` tinyint(1) DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_23A0E6612469DE2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `category_id`, `name`, `text`, `create_date`, `update_date`, `views`, `updated_at`, `image_name`, `image_original_name`, `image_mime_type`, `image_size`, `image_dimensions`, `bg_image_name`, `bg_image_original_name`, `bg_image_mime_type`, `bg_image_size`, `bg_image_dimensions`, `is_published`, `slug`) VALUES
(1, 6, 'Bests techniques cachées FIFA 20', '<p>Some quick example text to build on the card title and make up the bulk of the card&#39;s content.</p>', '2021-04-01 17:24:22', '2021-04-01 17:42:31', 4, '2021-04-01 17:24:22', 'img-67-1-6065f3b6931a2051570641.jpg', 'img (67) (1).jpg', NULL, NULL, NULL, 'cover-fifa1800x700-6065f3b6993a4114192206.jpg', 'Cover_fifa1800x700.jpg', NULL, NULL, NULL, 1, 'best-techniques-cachees-fifa-20'),
(2, 4, 'Best techniques cachées FIFA 20', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />\r\n&nbsp;</p>', '2021-04-01 17:40:44', '2021-04-05 15:31:30', 0, '2021-04-01 17:40:44', 'img-67-1-6065f78ca2818131650329.jpg', 'img (67) (1).jpg', NULL, NULL, NULL, 'cover-mario1800x700-6065f78ca7e95498909447.jpg', 'Cover_mario1800x700.jpg', NULL, NULL, NULL, 1, 'best-techniques-cachees-fifa-20'),
(3, 5, 'Best techniques cachées FIFA 20', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', '2021-04-01 17:41:33', NULL, 0, '2021-04-01 17:41:33', 'img-67-1-6065f7bde7c15325671967.jpg', 'img (67) (1).jpg', NULL, NULL, NULL, 'cover-naruto1800x700-6065f7bdecbaf548341882.jpg', 'Cover_naruto1800x700.jpg', NULL, NULL, NULL, 1, 'best-techniques-cachees-fifa-20');

-- --------------------------------------------------------

--
-- Structure de la table `bonus`
--

DROP TABLE IF EXISTS `bonus`;
CREATE TABLE IF NOT EXISTS `bonus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bonus`
--

INSERT INTO `bonus` (`id`, `name`, `icon`, `sequence`, `active`) VALUES
(1, 'Bonus 1', 'fas fa-gamepad', 1, 1),
(2, 'Bonus 2', 'fas fa-cocktail', 2, 1),
(3, 'Bonus 3', 'fas fa-coffee', 3, 1),
(4, 'Bonus 4', 'fas fa-wifi', 4, 1),
(5, 'Bonus 5', 'fas fa-hamburger', 5, 1),
(6, 'Bonus 6', 'fas fa-utensils', 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `image_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `text`, `image_name`, `image_original_name`, `image_mime_type`, `image_size`, `image_dimensions`, `slug`) VALUES
(1, 'Jeux', NULL, NULL, NULL, NULL, NULL, NULL, 'jeux'),
(2, 'Materiel', NULL, 'img-67-1-6065ef8fed8e9486793960.jpg', 'img (67) (1).jpg', NULL, NULL, NULL, 'materiel'),
(3, 'Services', NULL, NULL, NULL, NULL, NULL, NULL, 'services'),
(4, 'Actualite', NULL, NULL, NULL, NULL, NULL, NULL, 'actualite'),
(5, 'Evenement', NULL, NULL, NULL, NULL, NULL, NULL, 'evenement'),
(6, 'Astuces', NULL, NULL, NULL, NULL, NULL, NULL, 'astuces');

-- --------------------------------------------------------

--
-- Structure de la table `console`
--

DROP TABLE IF EXISTS `console`;
CREATE TABLE IF NOT EXISTS `console` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `console`
--

INSERT INTO `console` (`id`, `name`, `sequence`, `active`) VALUES
(1, 'Playstation 4', 1, 1),
(2, 'XBOX One', 2, 1),
(3, 'Playstation 3', 3, 1),
(4, 'XBOX 360', 4, 1),
(5, 'Nintendo Wii', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact_form`
--

DROP TABLE IF EXISTS `contact_form`;
CREATE TABLE IF NOT EXISTS `contact_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `has_copy` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `subject`, `message`, `state`, `has_copy`) VALUES
(1, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Mon message ici', 'READ', NULL),
(2, 'P. BEN', 'emmanuelmanga0@gmail', 'TEST contact form', 'Message de contact', 'NOT_READ', NULL),
(3, 'P. BEN', 'emmanuelmanga0@gmail', 'TEST contact form', 'Message de contact', 'NOT_READ', NULL),
(4, 'P. BEN', 'emmanuelmanga0@gmail', 'TEST contact form', 'Message de contact', 'NOT_READ', NULL),
(5, 'P. BEN', 'emmanuelmanga0@gmail', 'TEST contact form', 'Message de contact', 'NOT_READ', NULL),
(6, 'P. BEN', 'emmanuelmanga0@gmail', 'TEST contact form', 'Message de contact', 'NOT_READ', NULL),
(7, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Message de contact', 'NOT_READ', NULL),
(8, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Message de contact', 'NOT_READ', NULL),
(9, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Message de contact', 'NOT_READ', NULL),
(10, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Mon message de contact', 'NOT_READ', NULL),
(11, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Mon message de contact', 'NOT_READ', NULL),
(12, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Mon message de contact', 'NOT_READ', NULL),
(13, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Mon message de contact', 'NOT_READ', NULL),
(14, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Mon message de contact', 'NOT_READ', NULL),
(15, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Mon message de contact', 'NOT_READ', NULL),
(16, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Mon message de contact', 'NOT_READ', NULL),
(17, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Mon message de contact', 'NOT_READ', NULL),
(18, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Mon message de contact', 'NOT_READ', NULL),
(19, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Mon message de contact', 'NOT_READ', NULL),
(20, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Mon message de contact', 'NOT_READ', NULL),
(21, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Mon message de contact', 'NOT_READ', NULL),
(22, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Mon message de contact', 'NOT_READ', NULL),
(23, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Message de contact', 'NOT_READ', NULL),
(24, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Message de contact', 'NOT_READ', NULL),
(25, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Message de contact', 'NOT_READ', NULL),
(26, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Message du formulaire de contact', 'NOT_READ', NULL),
(27, 'P. BEN', 'emmanuelmanga0@gmail.com', 'TEST contact form', 'Message du formulaire de contact', 'NOT_READ', NULL),
(28, 'B. Manga', 'emmanuelmanga0@gmail.com', 'Contact website', 'Bonjour l\'équipe START', 'NOT_READ', NULL),
(29, 'B. Manga', 'emmanuelmanga0@gmail.com', 'Contact website', 'Bonjour l\'équipe START', 'NOT_READ', 1),
(30, 'B. Manga', 'emmanuelmanga0@gmail.com', 'Contact website', 'Bonjour l\'équipe START', 'NOT_READ', 1),
(31, 'B. Manga', 'emmanuelmanga0@gmail.com', 'Contact website', 'Bonjour l\'équipe START', 'NOT_READ', 1),
(32, 'B. Manga', 'emmanuelmanga0@gmail.com', 'Contact website', 'Bonjour l\'équipe START', 'NOT_READ', 1),
(33, 'B. Manga', 'emmanuelmanga0@gmail.com', 'Contact website', 'Bonjour l\'équipe START', 'NOT_READ', 1),
(34, 'B. Manga', 'parfaitbene@yahoo.fr', 'Demande d\'infos - website START', 'J\'aimerai en savoir un peu plus sur votre entreprise.', 'NOT_READ', 1),
(35, 'B. Manga', 'parfaitbene@yahoo.fr', 'Demande d\'infos - website START', 'J\'aimerai en savoir un peu plus sur votre entreprise.', 'NOT_READ', 1),
(36, 'B. Manga', 'parfaitbene@yahoo.fr', 'Demande d\'infos - website START', 'J\'aimerai en savoir un peu plus sur votre entreprise.', 'NOT_READ', 1),
(37, 'B. Manga', 'parfaitbene@yahoo.fr', 'Demande d\'infos - website START', 'J\'aimerai en savoir un peu plus sur votre entreprise.', 'NOT_READ', 1),
(38, 'B. Manga', 'parfaitbene@yahoo.fr', 'Demande d\'infos - website START', 'J\'aimerai en savoir un peu plus sur votre entreprise.', 'NOT_READ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `formule`
--

DROP TABLE IF EXISTS `formule`;
CREATE TABLE IF NOT EXISTS `formule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci,
  `price` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `sequence` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `image_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  `bg_image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image_size` int(11) DEFAULT NULL,
  `bg_image_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fees` int(11) DEFAULT NULL,
  `can_reserve` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formule`
--

INSERT INTO `formule` (`id`, `name`, `text`, `price`, `active`, `sequence`, `updated_at`, `image_name`, `image_original_name`, `image_mime_type`, `image_size`, `image_dimensions`, `bg_image_name`, `bg_image_original_name`, `bg_image_mime_type`, `bg_image_size`, `bg_image_dimensions`, `slug`, `intro`, `fees`, `can_reserve`) VALUES
(1, 'Classique', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>', 1000, 1, 1, '2021-03-31 17:43:12', '83-6064a6a03ad99806589750.jpg', '83.jpg', NULL, NULL, NULL, 'featured-game-thumb04-1-6064a6a04088e837409533.jpg', 'featured_game_thumb04 (1).jpg', NULL, NULL, NULL, 'classique', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 500, 1),
(2, 'Reservation', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>', 1000, 1, 2, '2021-03-31 17:45:14', 'img-67-6064a71a4fecd643405164.jpg', 'img (67).jpg', NULL, NULL, NULL, 'featured-game-thumb04-1-6064a71a55c33388018527.jpg', 'featured_game_thumb04 (1).jpg', NULL, NULL, NULL, 'reservation', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', NULL, 1),
(3, 'Abonnement', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>', 10000, 1, 3, '2021-03-31 17:47:24', '83-6064a79c52b98915287394.jpg', '83.jpg', NULL, NULL, NULL, 'featured-game-thumb04-1-6064a79c57ec7995342013.jpg', 'featured_game_thumb04 (1).jpg', NULL, NULL, NULL, 'abonnement', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `formule_bonus`
--

DROP TABLE IF EXISTS `formule_bonus`;
CREATE TABLE IF NOT EXISTS `formule_bonus` (
  `formule_id` int(11) NOT NULL,
  `bonus_id` int(11) NOT NULL,
  PRIMARY KEY (`formule_id`,`bonus_id`),
  KEY `IDX_396FB6E32A68F4D1` (`formule_id`),
  KEY `IDX_396FB6E369545666` (`bonus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formule_bonus`
--

INSERT INTO `formule_bonus` (`formule_id`, `bonus_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6);

-- --------------------------------------------------------

--
-- Structure de la table `gallery_category`
--

DROP TABLE IF EXISTS `gallery_category`;
CREATE TABLE IF NOT EXISTS `gallery_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `gallery_category`
--

INSERT INTO `gallery_category` (`id`, `name`, `sequence`, `active`) VALUES
(1, 'Gaming 1', 1, 1),
(2, 'Gaming 2', 2, 1),
(3, 'Gaming 3', 3, 1),
(4, 'Gaming 4', 4, 1),
(5, 'Vidéos', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `gallery_media`
--

DROP TABLE IF EXISTS `gallery_media`;
CREATE TABLE IF NOT EXISTS `gallery_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `url_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_url_new_window` tinyint(1) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `sequence` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `pj_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pj_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pj_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pj_size` int(11) DEFAULT NULL,
  `pj_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_link` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_8EB1712F12469DE2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `gallery_media`
--

INSERT INTO `gallery_media` (`id`, `category_id`, `name`, `active`, `url_text`, `url`, `is_url_new_window`, `description`, `sequence`, `updated_at`, `pj_name`, `pj_original_name`, `pj_mime_type`, `pj_size`, `pj_dimensions`, `type`, `video_link`) VALUES
(1, 1, 'Média 1', 1, NULL, NULL, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', NULL, '2021-04-28 02:03:51', 'photo-1469286663112-f58a16c6f075-6088b477a2c9b828381963.jfif', 'photo-1469286663112-f58a16c6f075.jfif', 'image/jpeg', 62048, '416,623', 'MEDIA', NULL),
(2, 2, 'Média 2', 1, 'Lien url', 'https://unsplash.com', 1, 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', NULL, '2021-04-28 02:11:17', '416x283-6088b6352020c670793606.jfif', '416x283.jfif', 'image/jpeg', 39967, '416,283', 'MEDIA', NULL),
(3, 5, 'Vidéo externe', 1, 'Texte de l\'url ici', 'https://www.youtube.com/watch?v=EJbbEb3Cr_4&list=PLm6MXC0cHmeKik_c2cYxuYFvOvlofI1u6&index=12&ab_channel=Youssoupha', 0, 'cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '2021-04-28 02:30:50', 'photo-1523233164-6a0d50bd4618-6088bacae49af487570630.jfif', 'photo-1523233164-6a0d50bd4618.jfif', 'image/jpeg', 26433, '416,278', 'VIDEO_LINK', 'https://www.youtube.com/watch?v=AgR7kv4oJj0');

-- --------------------------------------------------------

--
-- Structure de la table `gaming_group`
--

DROP TABLE IF EXISTS `gaming_group`;
CREATE TABLE IF NOT EXISTS `gaming_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `link`
--

DROP TABLE IF EXISTS `link`;
CREATE TABLE IF NOT EXISTS `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` longtext COLLATE utf8mb4_unicode_ci,
  `sequence` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `IDX_36AC99F1CCD7E912` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `link`
--

INSERT INTO `link` (`id`, `menu_id`, `name`, `url`, `sequence`, `active`) VALUES
(1, 1, 'Accueil', 'http://localhost:8000', 0, 0),
(2, 1, 'Services', 'http://localhost:8000/services', 1, 0),
(3, 1, 'Contact', 'http://localhost:8000/contact', 2, 1),
(4, 1, 'Mon compte', 'http://#', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `marketing_block`
--

DROP TABLE IF EXISTS `marketing_block`;
CREATE TABLE IF NOT EXISTS `marketing_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `image_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  `sequence` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `marketing_block`
--

INSERT INTO `marketing_block` (`id`, `title1`, `title2`, `text`, `updated_at`, `image_name`, `image_original_name`, `image_mime_type`, `image_size`, `image_dimensions`, `sequence`, `active`, `icon`) VALUES
(1, 'Mark<span class=\"st-p-color\">eting</span>', '<strong>This is the card title</strong>', 'Lorem ipsum dolor sit amet, consectetur  ipsum dignissimos. Odit sed qui, dolorum!', '2021-04-05 15:46:39', 'img-14-606b22cf15851924673227.jpg', 'img (14).jpg', NULL, NULL, NULL, NULL, 1, 'fas fa-chart-pie'),
(2, 'Mark<span class=\"st-p-color\">eting</span>', '<strong>This is the card title</strong>', 'Lorem ipsum dolor sit amet, consectetur  ipsum dignissimos. Odit sed qui, dolorum!', '2021-04-05 15:13:28', 'img-14-606b1b08859e0526995810.jpg', 'img (14).jpg', NULL, NULL, NULL, NULL, 1, 'fas fa-chart-pie'),
(3, 'Mark<span class=\"st-p-color\">eting</span>', '<strong>This is the card title</strong>', 'Lorem ipsum dolor sit amet, consectetur  ipsum dignissimos. Odit sed qui, dolorum!', '2021-04-05 15:13:49', 'img-14-606b1b1dd2b85002694106.jpg', 'img (14).jpg', NULL, NULL, NULL, NULL, 1, 'fas fa-chart-pie'),
(4, 'Mark<span class=\"st-p-color\">eting</span>', '<strong>This is the card title</strong>', 'Lorem ipsum dolor sit amet, consectetur  ipsum dignissimos. Odit sed qui, dolorum!', '2021-04-05 15:14:09', 'img-14-606b1b3121365743490078.jpg', 'img (14).jpg', NULL, NULL, NULL, NULL, 0, 'fas fa-chart-pie');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `name`, `position`, `sequence`, `active`) VALUES
(1, 'Main menu', 'HEADER', 0, 1),
(2, 'Footer menu', 'FOOTER', 0, 1),
(3, 'Liens utiles', 'FOOTER', 1, 1),
(4, 'Communauté', 'FOOTER', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20210212114907', '2021-02-12 11:49:47'),
('20210212121813', '2021-02-12 12:19:21'),
('20210212122845', '2021-02-12 12:32:01');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id`, `name`, `sequence`, `active`, `position`, `type`) VALUES
(1, 'Module 1 - accueil (image + text + CTA)', 1, 1, 'HOME_TOP', 'MODULE1'),
(3, 'Image + Text | Accueil (1)', 2, 1, 'HOME_TOP', 'MODULE2'),
(4, 'Trois images + text + CTA', 3, 1, 'HOME_TOP', 'MODULE3'),
(5, 'Module 4 - Bloc Mission | Accueil', 4, 1, 'HOME_TOP', 'MODULE4'),
(6, 'Slider | Accueil', 5, 1, 'HOME_TOP', 'MODULE5'),
(7, 'Parallax | Accueil', 6, 1, 'HOME_TOP', 'MODULE_PARALLAX'),
(8, 'Liste des formules | accueil', 7, 1, 'HOME_TOP', 'MODULE_FORMULE'),
(9, 'Image + Text + Image | Accueil', 8, 1, 'HOME_TOP', 'MODULE6'),
(10, 'Liste d\'articles | accueil', 9, 1, 'HOME_TOP', 'MODULE_ARTICLE'),
(11, 'Blocs marketing accueil', 10, 1, 'HOME_TOP', 'MODULE_MARKETING_BLOCK'),
(12, 'Témoignages | Accueil', 11, 1, 'HOME_TOP', 'MODULE_TESTIMONIAL'),
(13, 'Liste des partenaires', 13, 1, 'HOME_TOP', 'MODULE_PARTNER');

-- --------------------------------------------------------

--
-- Structure de la table `module1`
--

DROP TABLE IF EXISTS `module1`;
CREATE TABLE IF NOT EXISTS `module1` (
  `id` int(11) NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_url_new_window` tinyint(1) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `image_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  `bg_image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image_size` int(11) DEFAULT NULL,
  `bg_image_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module1`
--

INSERT INTO `module1` (`id`, `text`, `button_text`, `button_url`, `is_url_new_window`, `updated_at`, `image_name`, `image_original_name`, `image_mime_type`, `image_size`, `image_dimensions`, `bg_image_name`, `bg_image_original_name`, `bg_image_mime_type`, `bg_image_size`, `bg_image_dimensions`) VALUES
(1, '<div class=\"font-weight-bold h3 my-2 sec-text text-left text-uppercase text-white\">\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p><span style=\"color:#3498db\">consectetur adipisicing</span></p>\r\n\r\n<p>voluptate velit esse</p>\r\n</div>', 'Poursuivre', '#', 0, '2021-03-30 14:38:21', 'naruto-by-kevintut-d3c2ol3-fullview-606329cd7e537623991549.png', 'naruto_by_kevintut_d3c2ol3-fullview.png', NULL, NULL, NULL, 'cover-start-606329cd8701b158235940.jpg', 'Cover_START.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `module2`
--

DROP TABLE IF EXISTS `module2`;
CREATE TABLE IF NOT EXISTS `module2` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `image_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module2`
--

INSERT INTO `module2` (`id`, `title`, `text`, `updated_at`, `image_name`, `image_original_name`, `image_mime_type`, `image_size`, `image_dimensions`) VALUES
(3, 'A propos <span class=\"st-p-color-d\">de nous</span>', '<div>Nous sommes un <strong>centre de loisirs</strong> spécialisé dans le domaine des jeux-vidéos. Nous mettons à votre disposition un espace convivial pour vous et vos proches (en couple, en famille, avec les ami-e-s, after-work...) afin que vous ayez une belle expérience et unique chez nous.</div>', '2021-03-30 15:26:51', 'start-pics-6063352b4e92e863738774.jpg', 'start_pics.jpg', NULL, NULL, NULL),
(5, 'Notre <span class=\"st-p-color-d\">mission</span>', '<p>Le monde du divertissement en g&eacute;n&eacute;ral et celui des jeux vid&eacute;os en particulier constituent une porte privil&eacute;gi&eacute;e vers l&#39;imagination et la cr&eacute;ativit&eacute;.</p>\r\n\r\n<p><strong>A START, nous positionnons ces derniers comme piliers de coh&eacute;sion sociale et de d&eacute;veloppement dans la convivialit&eacute;.</strong></p>', '2021-03-30 19:08:34', 'start-pics-606369222a6bd997612998.jpg', 'start_pics.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `module3`
--

DROP TABLE IF EXISTS `module3`;
CREATE TABLE IF NOT EXISTS `module3` (
  `id` int(11) NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_url_new_window` tinyint(1) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `image1_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1_size` int(11) DEFAULT NULL,
  `image1_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  `image2_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2_size` int(11) DEFAULT NULL,
  `image2_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  `image3_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3_size` int(11) DEFAULT NULL,
  `image3_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module3`
--

INSERT INTO `module3` (`id`, `text`, `button_text`, `button_url`, `is_url_new_window`, `updated_at`, `image1_name`, `image1_original_name`, `image1_mime_type`, `image1_size`, `image1_dimensions`, `image2_name`, `image2_original_name`, `image2_mime_type`, `image2_size`, `image2_dimensions`, `image3_name`, `image3_original_name`, `image3_mime_type`, `image3_size`, `image3_dimensions`) VALUES
(4, '<p><span style=\"font-size:36px\">Excepteur velit</span></p>\r\n\r\n<p><span style=\"font-size:36px\">voluptate</span></p>', 'Consulter', '#', 0, '2021-03-30 17:46:18', 'rooster-img-4-768x768-606355da2fceb208038498.jpg', 'rooster-img-4-768x768.jpg', NULL, NULL, NULL, 'p2-team-img-6-768x768-606355da51ef5147091979.jpg', 'p2-team-img-6-768x768.jpg', NULL, NULL, NULL, 'p2-team-img-3-768x768-606355da548ac969882470.jpg', 'p2-team-img-3-768x768.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `module4`
--

DROP TABLE IF EXISTS `module4`;
CREATE TABLE IF NOT EXISTS `module4` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module4`
--

INSERT INTO `module4` (`id`) VALUES
(5);

-- --------------------------------------------------------

--
-- Structure de la table `module5`
--

DROP TABLE IF EXISTS `module5`;
CREATE TABLE IF NOT EXISTS `module5` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module5`
--

INSERT INTO `module5` (`id`, `title`, `text`) VALUES
(6, 'dolor repn<span class=\"st-p-color-d\">derit anim</span>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt. dolor sit amet, consectetur adipisicing.</p>');

-- --------------------------------------------------------

--
-- Structure de la table `module6`
--

DROP TABLE IF EXISTS `module6`;
CREATE TABLE IF NOT EXISTS `module6` (
  `id` int(11) NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `image1_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1_size` int(11) DEFAULT NULL,
  `image1_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  `image2_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2_size` int(11) DEFAULT NULL,
  `image2_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_url_new_window` tinyint(1) DEFAULT NULL,
  `bg_image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image_size` int(11) DEFAULT NULL,
  `bg_image_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module6`
--

INSERT INTO `module6` (`id`, `text`, `updated_at`, `image1_name`, `image1_original_name`, `image1_mime_type`, `image1_size`, `image1_dimensions`, `image2_name`, `image2_original_name`, `image2_mime_type`, `image2_size`, `image2_dimensions`, `button_text`, `button_url`, `is_url_new_window`, `bg_image_name`, `bg_image_original_name`, `bg_image_mime_type`, `bg_image_size`, `bg_image_dimensions`) VALUES
(9, '<p><span style=\"font-size:26px\">Lorem ipsum dolor sit amet</span></p>\r\n\r\n<p><span style=\"font-size:26px\"><span style=\"color:#3498db\">consectetur adipisicing</span></span></p>\r\n\r\n<p><span style=\"font-size:26px\">voluptate velit esse</span></p>', '2021-04-01 12:49:04', '9-6065b33089fe9564069121.png', '9.png', NULL, NULL, NULL, 'naruto-by-kevintut-d3c2ol3-fullview-6065b33099a97440689803.png', 'naruto_by_kevintut_d3c2ol3-fullview.png', NULL, NULL, NULL, 'Reserver', '#', 0, 'cover-start-6065b3309c874767753755.jpg', 'Cover_START.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `module_article`
--

DROP TABLE IF EXISTS `module_article`;
CREATE TABLE IF NOT EXISTS `module_article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `article_nbr` int(11) DEFAULT '3',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module_article`
--

INSERT INTO `module_article` (`id`, `title`, `article_nbr`) VALUES
(10, 'Derniers <span class=\"st-p-color-d\">articles</span>', 3);

-- --------------------------------------------------------

--
-- Structure de la table `module_article_article`
--

DROP TABLE IF EXISTS `module_article_article`;
CREATE TABLE IF NOT EXISTS `module_article_article` (
  `module_article_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`module_article_id`,`article_id`),
  KEY `IDX_1252ED5BE771AD01` (`module_article_id`),
  KEY `IDX_1252ED5B7294869C` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module_article_article`
--

INSERT INTO `module_article_article` (`module_article_id`, `article_id`) VALUES
(10, 1),
(10, 2),
(10, 3);

-- --------------------------------------------------------

--
-- Structure de la table `module_formule`
--

DROP TABLE IF EXISTS `module_formule`;
CREATE TABLE IF NOT EXISTS `module_formule` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module_formule`
--

INSERT INTO `module_formule` (`id`, `title`) VALUES
(8, 'Nos formules de <span class=\"st-p-color-d\">produits et services</span>');

-- --------------------------------------------------------

--
-- Structure de la table `module_formule_formule`
--

DROP TABLE IF EXISTS `module_formule_formule`;
CREATE TABLE IF NOT EXISTS `module_formule_formule` (
  `module_formule_id` int(11) NOT NULL,
  `formule_id` int(11) NOT NULL,
  PRIMARY KEY (`module_formule_id`,`formule_id`),
  KEY `IDX_DFDDD6A2BF8DDF4C` (`module_formule_id`),
  KEY `IDX_DFDDD6A22A68F4D1` (`formule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module_formule_formule`
--

INSERT INTO `module_formule_formule` (`module_formule_id`, `formule_id`) VALUES
(8, 1),
(8, 2),
(8, 3);

-- --------------------------------------------------------

--
-- Structure de la table `module_marketing_block`
--

DROP TABLE IF EXISTS `module_marketing_block`;
CREATE TABLE IF NOT EXISTS `module_marketing_block` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module_marketing_block`
--

INSERT INTO `module_marketing_block` (`id`) VALUES
(11);

-- --------------------------------------------------------

--
-- Structure de la table `module_marketing_block_marketing_block`
--

DROP TABLE IF EXISTS `module_marketing_block_marketing_block`;
CREATE TABLE IF NOT EXISTS `module_marketing_block_marketing_block` (
  `module_marketing_block_id` int(11) NOT NULL,
  `marketing_block_id` int(11) NOT NULL,
  PRIMARY KEY (`module_marketing_block_id`,`marketing_block_id`),
  KEY `IDX_C34CCC49B2111FF1` (`module_marketing_block_id`),
  KEY `IDX_C34CCC499441F1E6` (`marketing_block_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module_marketing_block_marketing_block`
--

INSERT INTO `module_marketing_block_marketing_block` (`module_marketing_block_id`, `marketing_block_id`) VALUES
(11, 1),
(11, 2),
(11, 3),
(11, 4);

-- --------------------------------------------------------

--
-- Structure de la table `module_parallax`
--

DROP TABLE IF EXISTS `module_parallax`;
CREATE TABLE IF NOT EXISTS `module_parallax` (
  `id` int(11) NOT NULL,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci,
  `add_mask` tinyint(1) DEFAULT '1',
  `updated_at` datetime NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `image_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module_parallax`
--

INSERT INTO `module_parallax` (`id`, `title1`, `title2`, `text`, `add_mask`, `updated_at`, `image_name`, `image_original_name`, `image_mime_type`, `image_size`, `image_dimensions`) VALUES
(7, 'La partie commence ici...', '<strong>Toi aussi, prend en mains ton épanouissement et améliore ton bien-être. \"Ta vie c\'est toi qui la contrôle\".</strong>', '<p>&nbsp;A <strong>START</strong>, nous positionnons les jeux-vid&eacute;os comme piliers d&#39;&eacute;panouissement, d&#39;int&eacute;gration et de coh&eacute;sion sociale, mais aussi de d&eacute;veloppement.</p>', 1, '2021-03-31 15:14:55', 'cover-fifa2-1800x700-606483df09b58212385615.jpg', 'Cover_fifa2_1800x700.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `module_partner`
--

DROP TABLE IF EXISTS `module_partner`;
CREATE TABLE IF NOT EXISTS `module_partner` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module_partner`
--

INSERT INTO `module_partner` (`id`) VALUES
(13);

-- --------------------------------------------------------

--
-- Structure de la table `module_partner_partner`
--

DROP TABLE IF EXISTS `module_partner_partner`;
CREATE TABLE IF NOT EXISTS `module_partner_partner` (
  `module_partner_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  PRIMARY KEY (`module_partner_id`,`partner_id`),
  KEY `IDX_B7BFA81676D363` (`module_partner_id`),
  KEY `IDX_B7BFA819393F8FE` (`partner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module_partner_partner`
--

INSERT INTO `module_partner_partner` (`module_partner_id`, `partner_id`) VALUES
(13, 1),
(13, 2),
(13, 3),
(13, 4),
(13, 5),
(13, 6);

-- --------------------------------------------------------

--
-- Structure de la table `module_testimonial`
--

DROP TABLE IF EXISTS `module_testimonial`;
CREATE TABLE IF NOT EXISTS `module_testimonial` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module_testimonial`
--

INSERT INTO `module_testimonial` (`id`, `title`) VALUES
(12, 'Enim ad minim <span class=\"st-p-color-d\">adipisicing sed</span>');

-- --------------------------------------------------------

--
-- Structure de la table `module_testimonial_testimonial`
--

DROP TABLE IF EXISTS `module_testimonial_testimonial`;
CREATE TABLE IF NOT EXISTS `module_testimonial_testimonial` (
  `module_testimonial_id` int(11) NOT NULL,
  `testimonial_id` int(11) NOT NULL,
  PRIMARY KEY (`module_testimonial_id`,`testimonial_id`),
  KEY `IDX_9B0E3100C51036AB` (`module_testimonial_id`),
  KEY `IDX_9B0E31001D4EC6B1` (`testimonial_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module_testimonial_testimonial`
--

INSERT INTO `module_testimonial_testimonial` (`module_testimonial_id`, `testimonial_id`) VALUES
(12, 1),
(12, 2),
(12, 3);

-- --------------------------------------------------------

--
-- Structure de la table `newsletter_email`
--

DROP TABLE IF EXISTS `newsletter_email`;
CREATE TABLE IF NOT EXISTS `newsletter_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `newsletter_email`
--

INSERT INTO `newsletter_email` (`id`, `email`) VALUES
(1, 'emmanuelmanga0@gmail.com'),
(2, 'parfaitbene@yahoo.fr'),
(3, 'emmanuelmanga1@gmail.com'),
(4, 'emmanuelmanga2@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `partner`
--

DROP TABLE IF EXISTS `partner`;
CREATE TABLE IF NOT EXISTS `partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `sequence` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `image_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `partner`
--

INSERT INTO `partner` (`id`, `name`, `active`, `sequence`, `updated_at`, `image_name`, `image_original_name`, `image_mime_type`, `image_size`, `image_dimensions`, `url`) VALUES
(1, 'Partenaire', 1, NULL, '2021-04-05 21:20:01', 'h1-client-img-1-606b70f19f73f513587005.png', 'h1-client-img-1.png', NULL, NULL, NULL, 'http://#'),
(2, 'Partenaire', 1, NULL, '2021-04-05 21:20:20', 'h1-client-img-2-606b71040dded170870873.png', 'h1-client-img-2.png', NULL, NULL, NULL, 'http://#'),
(3, 'Partenaire', 1, NULL, '2021-04-05 21:21:20', 'h1-client-img-3-606b7140023e9704909565.png', 'h1-client-img-3.png', NULL, NULL, NULL, 'http://#'),
(4, 'Partenaire', 1, NULL, '2021-04-05 21:22:13', 'h1-client-img-4-606b717565e03107901996.png', 'h1-client-img-4.png', NULL, NULL, NULL, 'http://#'),
(5, 'Partenaire', 1, NULL, '2021-04-05 21:22:41', 'h1-client-img-5-606b71918a48e158924179.png', 'h1-client-img-5.png', NULL, NULL, NULL, NULL),
(6, 'Partenaire', 1, NULL, '2021-04-05 21:23:12', 'h1-client-img-6-606b71b0d7462798659386.png', 'h1-client-img-6.png', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `piece_jointe`
--

DROP TABLE IF EXISTS `piece_jointe`;
CREATE TABLE IF NOT EXISTS `piece_jointe` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `pj_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pj_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pj_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pj_size` int(11) DEFAULT NULL,
  `pj_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  `module5_id` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `url_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_url_new_window` tinyint(1) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `sequence` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AB5111D4DEA9DBA3` (`module5_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `piece_jointe`
--

INSERT INTO `piece_jointe` (`id`, `name`, `updated_at`, `pj_name`, `pj_original_name`, `pj_mime_type`, `pj_size`, `pj_dimensions`, `module5_id`, `active`, `url_text`, `url`, `is_url_new_window`, `description`, `sequence`) VALUES
(1, 'Photo 1', '2021-03-31 13:02:35', 'featured-game-thumb06-606464db15fd5409078246.jpg', 'featured game thumb06.jpg', 'image/jpeg', 113694, '380,540', 6, 1, 'Reserver 1', 'http://#', 1, NULL, 1),
(2, 'Photo 2', '2021-03-31 13:02:35', 'featured-game-thumb04-606464dae9622325380016.jpg', 'featured_game_thumb04.jpg', 'image/jpeg', 98116, '380,540', 6, 1, 'Reserver 2', 'http://#', 1, NULL, 2),
(3, 'Photo 3', '2021-03-31 13:02:35', '7-606464db00a15944080916.jpg', '7.jpg', 'image/jpeg', 192914, '708,1062', 6, 1, 'Reserver 3', 'http://#', 1, NULL, 3),
(4, 'Photo 4', '2021-03-31 13:09:54', '9-606466920992f882176439.jpg', '9.jpg', 'image/jpeg', 104730, '708,1062', 6, 1, 'Reserver 4', 'http://#', 0, NULL, 4);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `console_id` int(11) DEFAULT NULL,
  `formule_id` int(11) NOT NULL,
  `screen_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `hour` time NOT NULL,
  `duration` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `create_date` datetime NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_42C8495572F9DD9F` (`console_id`),
  KEY `IDX_42C849552A68F4D1` (`formule_id`),
  KEY `IDX_42C8495541A67722` (`screen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `console_id`, `formule_id`, `screen_id`, `name`, `date`, `hour`, `duration`, `phone`, `message`, `create_date`, `email`) VALUES
(1, 1, 2, 1, 'Ben', '2021-04-21', '19:17:00', 1, '+23711223344', NULL, '2021-04-21 19:23:01', NULL),
(2, 2, 2, 1, 'Ben 2', '2021-04-21', '19:38:00', 1, '+23711223344', NULL, '2021-04-21 19:38:53', NULL),
(3, 2, 2, 1, 'Ben 2', '2021-04-21', '19:38:00', 1, '+23711223344', NULL, '2021-04-21 19:41:53', NULL),
(4, 2, 2, 1, 'Ben 2', '2021-04-21', '19:38:00', 1, '+23711223344', NULL, '2021-04-21 19:48:12', NULL),
(5, 2, 2, 1, 'Ben 2', '2021-04-21', '19:38:00', 1, '+23711223344', NULL, '2021-04-21 19:48:55', NULL),
(6, 2, 2, 1, 'Ben 2', '2021-04-21', '19:38:00', 1, '+23711223344', NULL, '2021-04-21 20:14:58', NULL),
(7, 1, 2, 1, 'Ben 2', '2021-04-24', '12:35:00', 3, '+23711223344', NULL, '2021-04-21 20:18:12', NULL),
(8, 1, 2, 1, 'Ben 2', '2021-04-24', '12:35:00', 3, '+23711223344', NULL, '2021-04-21 20:46:21', NULL),
(9, 3, 2, 1, 'Ben 2', '2021-04-24', '16:30:00', 1, '+23711223344', 'Mon message de réservation', '2021-04-21 20:48:25', 'emmanuelmanga0@gmail.com'),
(10, 1, 2, 1, 'Ben', '2021-04-21', '19:17:00', 1, '+23711223344', NULL, '2021-04-22 00:25:59', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reset_password_request`
--

DROP TABLE IF EXISTS `reset_password_request`;
CREATE TABLE IF NOT EXISTS `reset_password_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_7CE748AA76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `screen`
--

DROP TABLE IF EXISTS `screen`;
CREATE TABLE IF NOT EXISTS `screen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `screen`
--

INSERT INTO `screen` (`id`, `name`, `sequence`, `active`, `price`) VALUES
(1, 'Grand écran (55\'\')', 1, 1, 1500),
(2, 'Moyen écran (40\'\')', 2, 1, 1000);

-- --------------------------------------------------------

--
-- Structure de la table `site_activity`
--

DROP TABLE IF EXISTS `site_activity`;
CREATE TABLE IF NOT EXISTS `site_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `site_activity`
--

INSERT INTO `site_activity` (`id`, `name`, `icon`, `sequence`, `active`) VALUES
(1, 'Jeux-Vidéos', 'fas fa-gamepad', 1, 1),
(2, 'E-Gaming', 'fas fa-headset', 2, 1),
(3, 'Restauration', 'fas fa-hamburger', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `site_config`
--

DROP TABLE IF EXISTS `site_config`;
CREATE TABLE IF NOT EXISTS `site_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `banner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_size` int(11) DEFAULT NULL,
  `banner_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  `contact_form_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_form_text` longtext COLLATE utf8mb4_unicode_ci,
  `contact_form_email_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_form_page_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_map` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `site_config`
--

INSERT INTO `site_config` (`id`, `name`, `slogan`, `description`, `localisation`, `contact`, `email`, `updated_at`, `banner_name`, `banner_original_name`, `banner_mime_type`, `banner_size`, `banner_dimensions`, `contact_form_title`, `contact_form_text`, `contact_form_email_to`, `contact_form_page_title`, `site_map`) VALUES
(1, 'START', 'THE GAME BEGINS HERE...', '<div>Centre de Gaming et de Loisirs situé</div>', 'Yaoundé - Cameroun | Avenue Biyem-Assi (Ecole BAMBIS)', '+237 6 90 96 31 50 / +237 6 82 38 77 15', 'contact@start237.com', '2021-03-20 17:19:51', 'lesgamersdukmer-banner-605620a74197b498024832.jpg', 'LesGamersDuKmer-banner.jpg', NULL, NULL, NULL, 'Ecrivez<span class=\"st-p-color-d\">-nous</span>', '<h4><strong>Formulaire de contact</strong></h4>\r\n\r\n<p>Some quick example text to build on the card title and make up the bulk of the card&#39;s content.</p>', 'contact@start237.com', 'FORMULAIRE DE CONTACT', '<iframe \r\n        src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3980.8312578783753!2d11.492026614313188!3d3.846373949544396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x108bcf3a3349114f%3A0x8eafb948b55adab0!2sSTART!5e0!3m2!1sfr!2scm!4v1591193252932!5m2!1sfr!2scm\" \r\n        width=\"100%\" \r\n        height=\"100%\" \r\n        frameborder=\"0\" \r\n        style=\"border:0;\" \r\n        allowfullscreen=\"\" \r\n        aria-hidden=\"false\" \r\n        tabindex=\"0\">\r\n</iframe>');

-- --------------------------------------------------------

--
-- Structure de la table `slide`
--

DROP TABLE IF EXISTS `slide`;
CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `image_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  `sequence` int(11) DEFAULT NULL,
  `is_url_new_window` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `IDX_72EFEE622CCC9638` (`slider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `slide`
--

INSERT INTO `slide` (`id`, `title1`, `title2`, `button_text`, `button_url`, `slider_id`, `updated_at`, `image_name`, `image_original_name`, `image_mime_type`, `image_size`, `image_dimensions`, `sequence`, `is_url_new_window`, `active`) VALUES
(1, 'Our support forum', 'Can help you', 'Support forum', 'http://#', 1, '2021-03-23 14:20:24', 'img17-6059eb17e6a3a330201560.jpg', 'img17.jpg', 'image/jpeg', 177561, '2500,1406', 1, 0, 1),
(2, 'Visit support forum', 'Our community can help', 'Support forum', 'http://#', 1, '2021-03-23 14:21:07', 'img9-6059eb430ab31909178459.jpg', 'img9.jpg', 'image/jpeg', 295483, '2500,1867', 2, 0, 1),
(3, 'Support forum', 'You with any question', 'Support forum', 'http://#', 1, '2021-03-23 14:21:58', 'img10-6059eb76cf6d3045915679.jpg', 'img10.jpg', 'image/jpeg', 237995, '2500,1349', 3, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `slider`
--

INSERT INTO `slider` (`id`, `name`, `active`) VALUES
(1, 'Home Slider', 1);

-- --------------------------------------------------------

--
-- Structure de la table `social_network`
--

DROP TABLE IF EXISTS `social_network`;
CREATE TABLE IF NOT EXISTS `social_network` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `social_network`
--

INSERT INTO `social_network` (`id`, `name`, `url`, `sequence`, `active`, `icon`) VALUES
(1, 'Facebook', 'https://facebook.com/start.237', 1, 1, 'fab fa-facebook-f'),
(2, 'Instagram', 'https://instagram.com/start.237', 2, 1, 'fab fa-instagram'),
(3, 'Twitter', 'https://twitter.com/start_237', 3, 1, 'fab fa-twitter'),
(4, 'WhatsApp', 'https://wa.me/message/C730VIEXW55VF1', 4, 1, 'fab fa-whatsapp');

-- --------------------------------------------------------

--
-- Structure de la table `store`
--

DROP TABLE IF EXISTS `store`;
CREATE TABLE IF NOT EXISTS `store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `is_published` tinyint(1) DEFAULT '0',
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `testimonial`
--

DROP TABLE IF EXISTS `testimonial`;
CREATE TABLE IF NOT EXISTS `testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `image_dimensions` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:simple_array)',
  `active` tinyint(1) DEFAULT '0',
  `sequence` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `testimonial`
--

INSERT INTO `testimonial` (`id`, `title1`, `title2`, `text`, `updated_at`, `image_name`, `image_original_name`, `image_mime_type`, `image_size`, `image_dimensions`, `active`, `sequence`) VALUES
(1, 'Anna Deynah', 'Founder at ET Company', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <br> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteudatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2021-04-05 20:34:30', 'img-1-606b6646b513d141818518.jpg', 'img (1).jpg', NULL, NULL, NULL, 1, NULL),
(2, 'Anna Deynah', 'Founder at ET Company', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br />\r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteudatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2021-04-05 20:35:05', 'img-1-606b6669af6e2305418414.jpg', 'img (1).jpg', NULL, NULL, NULL, 1, NULL),
(3, 'Anna Deynah', 'Founder at ET Company', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br />\r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteudatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2021-04-05 20:35:33', 'img-1-606b6685241ba726106443.jpg', 'img (1).jpg', NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `email`, `is_verified`) VALUES
(7, 'user', '[]', '$argon2id$v=19$m=65536,t=4,p=1$QkJPY0xIS2RXNzRoMEV0Yg$qhnR22v6a2AFGj/NIBz+DBuq5l8ginHaxaeFXyek1LA', 'test@gmail.com', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_23A0E6612469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `formule_bonus`
--
ALTER TABLE `formule_bonus`
  ADD CONSTRAINT `FK_396FB6E32A68F4D1` FOREIGN KEY (`formule_id`) REFERENCES `formule` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_396FB6E369545666` FOREIGN KEY (`bonus_id`) REFERENCES `bonus` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `gallery_media`
--
ALTER TABLE `gallery_media`
  ADD CONSTRAINT `FK_8EB1712F12469DE2` FOREIGN KEY (`category_id`) REFERENCES `gallery_category` (`id`);

--
-- Contraintes pour la table `link`
--
ALTER TABLE `link`
  ADD CONSTRAINT `FK_36AC99F1CCD7E912` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);

--
-- Contraintes pour la table `module1`
--
ALTER TABLE `module1`
  ADD CONSTRAINT `FK_B665636BBF396750` FOREIGN KEY (`id`) REFERENCES `module` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `module2`
--
ALTER TABLE `module2`
  ADD CONSTRAINT `FK_2F6C32D1BF396750` FOREIGN KEY (`id`) REFERENCES `module` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `module3`
--
ALTER TABLE `module3`
  ADD CONSTRAINT `FK_586B0247BF396750` FOREIGN KEY (`id`) REFERENCES `module` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `module4`
--
ALTER TABLE `module4`
  ADD CONSTRAINT `FK_C60F97E4BF396750` FOREIGN KEY (`id`) REFERENCES `module` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `module5`
--
ALTER TABLE `module5`
  ADD CONSTRAINT `FK_B108A772BF396750` FOREIGN KEY (`id`) REFERENCES `module` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `module6`
--
ALTER TABLE `module6`
  ADD CONSTRAINT `FK_2801F6C8BF396750` FOREIGN KEY (`id`) REFERENCES `module` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `module_article`
--
ALTER TABLE `module_article`
  ADD CONSTRAINT `FK_A941307FBF396750` FOREIGN KEY (`id`) REFERENCES `module` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `module_article_article`
--
ALTER TABLE `module_article_article`
  ADD CONSTRAINT `FK_1252ED5B7294869C` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_1252ED5BE771AD01` FOREIGN KEY (`module_article_id`) REFERENCES `module_article` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `module_formule`
--
ALTER TABLE `module_formule`
  ADD CONSTRAINT `FK_CB27A281BF396750` FOREIGN KEY (`id`) REFERENCES `module` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `module_formule_formule`
--
ALTER TABLE `module_formule_formule`
  ADD CONSTRAINT `FK_DFDDD6A22A68F4D1` FOREIGN KEY (`formule_id`) REFERENCES `formule` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_DFDDD6A2BF8DDF4C` FOREIGN KEY (`module_formule_id`) REFERENCES `module_formule` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `module_marketing_block`
--
ALTER TABLE `module_marketing_block`
  ADD CONSTRAINT `FK_1B93CE8CBF396750` FOREIGN KEY (`id`) REFERENCES `module` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `module_marketing_block_marketing_block`
--
ALTER TABLE `module_marketing_block_marketing_block`
  ADD CONSTRAINT `FK_C34CCC499441F1E6` FOREIGN KEY (`marketing_block_id`) REFERENCES `marketing_block` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C34CCC49B2111FF1` FOREIGN KEY (`module_marketing_block_id`) REFERENCES `module_marketing_block` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `module_parallax`
--
ALTER TABLE `module_parallax`
  ADD CONSTRAINT `FK_70CEF176BF396750` FOREIGN KEY (`id`) REFERENCES `module` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `module_partner`
--
ALTER TABLE `module_partner`
  ADD CONSTRAINT `FK_9A50000FBF396750` FOREIGN KEY (`id`) REFERENCES `module` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `module_partner_partner`
--
ALTER TABLE `module_partner_partner`
  ADD CONSTRAINT `FK_B7BFA81676D363` FOREIGN KEY (`module_partner_id`) REFERENCES `module_partner` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B7BFA819393F8FE` FOREIGN KEY (`partner_id`) REFERENCES `partner` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `module_testimonial`
--
ALTER TABLE `module_testimonial`
  ADD CONSTRAINT `FK_6896C725BF396750` FOREIGN KEY (`id`) REFERENCES `module` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `module_testimonial_testimonial`
--
ALTER TABLE `module_testimonial_testimonial`
  ADD CONSTRAINT `FK_9B0E31001D4EC6B1` FOREIGN KEY (`testimonial_id`) REFERENCES `testimonial` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9B0E3100C51036AB` FOREIGN KEY (`module_testimonial_id`) REFERENCES `module_testimonial` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `piece_jointe`
--
ALTER TABLE `piece_jointe`
  ADD CONSTRAINT `FK_AB5111D4DEA9DBA3` FOREIGN KEY (`module5_id`) REFERENCES `module5` (`id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_42C849552A68F4D1` FOREIGN KEY (`formule_id`) REFERENCES `formule` (`id`),
  ADD CONSTRAINT `FK_42C8495541A67722` FOREIGN KEY (`screen_id`) REFERENCES `screen` (`id`),
  ADD CONSTRAINT `FK_42C8495572F9DD9F` FOREIGN KEY (`console_id`) REFERENCES `console` (`id`);

--
-- Contraintes pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `slide`
--
ALTER TABLE `slide`
  ADD CONSTRAINT `FK_72EFEE622CCC9638` FOREIGN KEY (`slider_id`) REFERENCES `slider` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
