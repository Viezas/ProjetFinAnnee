-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 20 juin 2020 à 20:52
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `e-shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`) VALUES
(1, 'DECK DE STRUCTURE', 'Catégorie des deck de structure', '7.jpg'),
(2, 'DECK DE DÉMARRAGE', 'Catégorie des deck de démarrage', ''),
(3, 'BOOSTER', 'Catégorie des boosters', ''),
(4, 'TINBOX', 'Catégorie des tinbox', ''),
(12, 'Protège Cartes', 'Accesoires pour cartes', '12.jpg'),
(13, 'Classeurs', 'Classeur pour ranger ses cartes', '13.jpg'),
(14, 'Deck Case', 'Une petite pochette afin de ranger son deck ', '14.jpg'),
(15, 'Tapi de jeu', 'Tapi de jeu afin de ne pas salir ses cartes :)', '15.jpg'),
(16, 'Figurines', 'Figurines', '16.jpg'),
(17, 'Bijou', 'Bijou', '17.jpg'),
(18, 'Duel Disk', 'Disque de duel', '18.jpg'),
(19, 'Porte Clé', 'porte clé', '19.jpg'),
(20, 'Tasse', 'Tasse', '20.jpg'),
(21, 'Monstre (Normal)', 'Monstre normaux sans effets particulier ', '21.jpg'),
(22, 'Monstre (effets)', 'Monstres à effets', '22.jpg'),
(23, 'Magie', 'Cartes magie', NULL),
(24, 'Pièges ', 'Carte piège', NULL),
(25, 'Rituel', 'Carte Rituel', NULL),
(26, 'Fusion', 'Carte Fusion', NULL),
(27, 'Synchro', 'Carte Synchro', NULL),
(28, 'XYZ', 'Carte XYZ', NULL),
(29, 'Pendulum', 'Carte Pendulum', NULL),
(30, 'Link', 'Carte Link', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `delivery_adress` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `last_name`, `first_name`, `delivery_adress`, `date`) VALUES
(14, 24, '  Ngauv', '  Victor  ', '  3 Rue Pierre et Marie Curie  ', '2020-06-18 13:13:06'),
(17, 22, 'User', 'User', '42 Rue des épines marne la valley', '2020-06-18 16:03:22'),
(18, 24, '  Ngauv', '  Victor  ', '  3 Rue Pierre et Marie Curie  ', '2020-06-18 19:32:55'),
(32, 24, '  Ngauv', '  Victor  ', '  3 Rue Pierre et Marie Curie  ', '2020-06-18 19:42:13'),
(44, 24, '  Ngauv', '  Victor  ', '  3 Rue Pierre et Marie Curie  ', '2020-06-18 19:49:01');

-- --------------------------------------------------------

--
-- Structure de la table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_products_order_id_link` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `name`, `price`, `quantity`) VALUES
(2, 14, 'Savage Strike', 5, 50),
(3, 14, 'Pack Etoile Vrains', 1.5, 6),
(8, 17, 'Symphonie XYZ', 60, 2),
(9, 18, 'Protèges Cartes Ash Blossom', 5, 20),
(10, 18, 'Deck Case Ash Blossom', 10, 5),
(11, 18, 'Classeur Ash Blossom', 5, 5),
(12, 32, 'Synchro Extreme', 50, 1),
(13, 44, 'Domination Pendule', 7, 5);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `is_activated` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `is_activated`) VALUES
(1, 'Savage Strike', 'Booster Savage Strike', 5, 50, 1),
(2, 'Sarcophage Doré', 'TinBox Sarcophage Doré Yu-Gi-Oh datant de l\'année 2019', 20, 15, 1),
(37, 'Pack Etoile Vrains', 'Booster pack étoile de la série Vrains', 1.5, 6, 1),
(39, 'Domination Pendule', 'Deck de structure Domination Pendule', 7, 10, 1),
(40, 'Symphonie XYZ', 'Deck de démarrage Symphonie XYZ', 5, 2, 1),
(46, 'Starter Deck Yu-Gi-Oh 5d\'s (2009)', 'Deck pour débutant de la série Yu-Gi-Oh 5d\'s de 2009', 70, 7, 1),
(47, 'SoulBurner', 'Deck de structure SoulBurner', 17, 6, 1),
(48, 'Yuya &amp; Declan', 'Deck de démarrage pour 2 personnes !', 30, 3, 1),
(49, 'Synchro Extreme', 'Deck de structure Synchro Extreme de la série Yu-Gi-Oh- 5d\'s !', 50, 7, 1),
(50, 'Collection Zexal', 'TinBox de la série Xezal', 70, 3, 1),
(51, 'Protèges Cartes Ash Blossom', 'Protèges cartes à l\'effigie d\'Ash Blossom *^*', 5, 60, 1),
(52, 'Protèges cartes (1)', 'Protèges cartes', 2, 80, 1),
(53, 'Classeur Golden Duelist', 'Classeur de carte ', 15, 10, 1),
(55, 'Classeur Ash Blossom', 'Classeur Ash Blossom', 5, 20, 1),
(56, 'Classeur Kaiba', 'Classeur kaiba', 9, 5, 1),
(57, 'Deck Case Ash Blossom', 'Deck case Ash Blossom', 10, 30, 1),
(60, 'Deck Case (1)', 'Deck Case', 4.21, 5, 1),
(61, 'Deck Case KC', 'Deck Case KC', 20, 41, 1),
(62, 'Tapis Golden Duelist', 'Tapis de jeu golden duelist', 9.99, 5, 1),
(63, 'Tapis (1)', 'Tapi', 2, 3, 1),
(67, 'Figurine Pop Kaiba', 'Figurine Pop à l’effigie de Kaiba', 20, 34, 1),
(68, 'Figurine Pop Atem', 'Figurine pop à l\'effigie d\'Atem !!', 20, 27, 1),
(69, 'Figurine pop Dark Magician Girl', 'Figurine pop à l\'effigie de Dark Magician Girl', 20, 6, 1),
(70, 'Puzzle du millénium', 'Collier puzzle du millénium de Yugi Muto', 50, 1, 1),
(71, 'Clé de l\'Empereur ', 'Collier : clé de l\'Empereur de Yuma', 50, 1, 1),
(72, 'Pendule', 'Pendule de Yuya', 50, 1, 1),
(73, 'Duel Disk', 'Duel disck de la génégration 5d\'s', 600, 1, 1),
(74, 'Duel Disk Obelisk bleu', 'Porte clé en forme de Duel Disk des élèves Obelisk bleu de Yu-Gi-Oh GX', 10, 5, 1),
(75, 'Tasse (1)', 'Tasse à café Yu-Gi-oh', 15, 10, 1),
(76, 'Tasse (2)', 'Tasse à café Yu-Gi-Oh', 15, 3, 1),
(77, 'Magicien Sombre', 'Le célèbre Magicien Sombre qui sauve toujours Atem dans des situation délicates !', 2, 30, 1),
(78, 'Mahad', 'Mahad ou l\'original Magicien Sombre !', 5, 30, 1),
(79, 'Monster Reborn', 'Carte magie largement connu par la communauté tellement elle est iconique ! Elle est si puissante qu\'elle figure dans la ban liste depuis un bon moment et son statut ne risque pas de changer !', 10, 26, 1),
(80, 'Force de Miroir', 'Force de Miroir une carte piège également très connus et encore utiliser aujourd\'hui ! Elle a su traverser les époques et s\'avère être un allié de poids afin de préparer un retournement de situation ! ', 2.68, 21, 1),
(81, 'Dragon Du Chaos MAX Aux Yeux Bleu', 'Monstre Rituel apparut dans le film Dark Side of Dimensions ! C\'est une carte extrêmement puissante permettant même de faire des One Turn Kill (OTK) ! ', 7.28, 6, 1),
(82, 'Z-ARC, Roi Suprême', 'Une vrai GALÈRE à invoquer mais une fois sur le terrain elle domine le champ de bataille !', 10, 5, 1),
(83, 'Dragon Synchro de l\'Aile de crystal', 'Monstre Synchro puissant et redoutable !', 5.36, 17, 1),
(84, 'Numéro 39 : Utopie', 'Monstre XYZ numéro 39 : Utopie !', 3, 25, 1),
(85, 'Dragon Pendule Aux Yeux Impairs', 'Dragon pendule aux yeux imparis', 4.7, 6, 1),
(86, 'Dragon Chargeborrelle', 'Dragon Chargeborrelle monstre link 4', 3.65, 30, 1);

-- --------------------------------------------------------

--
-- Structure de la table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_link` (`product_id`),
  KEY `category_link` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_id`, `product_id`) VALUES
(19, 4, 2),
(29, 3, 37),
(34, 1, 39),
(35, 2, 40),
(41, 2, 46),
(42, 1, 47),
(43, 2, 48),
(44, 1, 49),
(45, 4, 50),
(46, 12, 51),
(48, 12, 52),
(50, 13, 53),
(52, 13, 55),
(54, 13, 56),
(56, 13, 57),
(59, 14, 60),
(61, 14, 61),
(65, 15, 62),
(66, 3, 1),
(68, 15, 63),
(69, 16, 67),
(70, 16, 68),
(71, 16, 69),
(72, 17, 70),
(73, 17, 71),
(74, 17, 72),
(76, 19, 74),
(77, 20, 75),
(78, 20, 76),
(79, 18, 73),
(81, 21, 77),
(82, 22, 78),
(84, 23, 79),
(85, 24, 80),
(89, 26, 82),
(90, 22, 82),
(91, 29, 82),
(92, 22, 81),
(93, 25, 81),
(94, 22, 83),
(95, 27, 83),
(96, 22, 84),
(97, 28, 84),
(98, 22, 85),
(99, 29, 85),
(100, 30, 86),
(101, 22, 86);

-- --------------------------------------------------------

--
-- Structure de la table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `main_image` tinyint(1) NOT NULL DEFAULT 0,
  `is_activated` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `product_images_product_link` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product_images`
--

INSERT INTO `product_images` (`id`, `name`, `product_id`, `main_image`, `is_activated`) VALUES
(21, '2-21.png', 2, 1, 1),
(23, '37-23.jpg', 37, 1, 1),
(24, '39-24.jpg', 39, 1, 1),
(25, '40-25.jpg', 40, 1, 1),
(31, '46-31.jpg', 46, 1, 1),
(32, '47-32.jpg', 47, 1, 1),
(33, '48-33.jpg', 48, 1, 1),
(34, '49-34.jpg', 49, 1, 1),
(35, '50-35.jpg', 50, 1, 1),
(36, '51-36.jpg', 51, 1, 1),
(37, '53-37.jpg', 53, 1, 1),
(38, '56-38.jpg', 56, 1, 1),
(39, '57-39.jpg', 57, 1, 1),
(40, '60-40.jpg', 60, 1, 1),
(41, '61-41.jpg', 61, 1, 1),
(42, '62-42.jpg', 62, 1, 1),
(43, '63-43.jpg', 63, 1, 1),
(44, '52-44.jpg', 52, 1, 1),
(45, '55-45.jpg', 55, 1, 1),
(46, '67-46.jpg', 67, 1, 1),
(47, '68-47.jpg', 68, 1, 1),
(48, '69-48.jpg', 69, 1, 1),
(49, '70-49.jpg', 70, 1, 1),
(50, '71-50.jpg', 71, 1, 1),
(51, '72-51.jpg', 72, 1, 1),
(52, '73-52.jpg', 73, 1, 1),
(53, '74-53.jpg', 74, 1, 1),
(54, '75-54.jpg', 75, 1, 1),
(55, '76-55.jpg', 76, 1, 1),
(56, '77-56.jpg', 77, 1, 1),
(57, '79-57.jpg', 79, 1, 1),
(58, '80-58.jpg', 80, 1, 1),
(59, '81-59.jpg', 81, 1, 1),
(60, '82-60.jpg', 82, 1, 1),
(61, '83-61.jpg', 83, 1, 1),
(62, '84-62.jpg', 84, 1, 1),
(63, '85-63.jpg', 85, 1, 1),
(64, '86-64.jpg', 86, 1, 1),
(65, '78-65.jpg', 78, 1, 1),
(66, '1-66.png', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `last_name`, `first_name`, `adress`, `email`, `password`, `is_admin`) VALUES
(22, 'User', 'Normal', '86 plaine des pommiers', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 0),
(24, '  Ngauv', '  Victor  ', '  3 Rue Pierre et Marie Curie  ', 'dxviezas@gmail.com', 'b7657916ec6d64c38d37bc87213c775e', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_products_order_id_link` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `category_link` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `products_link` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_link` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
