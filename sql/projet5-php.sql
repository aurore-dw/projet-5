-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 09 jan. 2023 à 10:09
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet5-php`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(45) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `moderation` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `author`, `comment`, `comment_date`, `moderation`) VALUES
(12, 9, '5', 'Sed non risus.', '2023-01-09 10:07:51', 0),
(13, 8, '5', 'Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.', '2023-01-09 10:08:06', 0),
(14, 7, '5', 'Cras elementum ultrices diam.', '2023-01-09 10:08:19', 0),
(15, 6, '5', 'Fusce vulputate sem at sapien.', '2023-01-09 10:08:30', 0),
(16, 5, '5', 'Fusce varius, ligula non tempus aliquam, nunc turpis ullamcorper nibh, in tempus sapien eros vitae ligula. Pellentesque rhoncus nunc et augue.', '2023-01-09 10:08:44', 0),
(17, 4, '5', 'Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. ', '2023-01-09 10:08:57', 0),
(18, 9, '4', 'Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. ', '2023-01-09 10:10:50', 0),
(19, 8, '4', 'Cras elementum ultrices diam. ', '2023-01-09 10:11:00', 0),
(20, 7, '4', 'Sed non risus.', '2023-01-09 10:11:14', 0),
(21, 6, '4', 'Aliquam convallis sollicitudin purus', '2023-01-09 10:11:27', 0),
(22, 5, '4', 'Ut velit mauris, egestas sed, gravida nec, ornare ut, mi', '2023-01-09 10:11:38', 0),
(23, 4, '4', 'Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. ', '2023-01-09 10:11:53', 0);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `chapo` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `title`, `chapo`, `content`, `creation_date`) VALUES
(4, 3, 'Post 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit.</p>', '2023-01-09 09:54:27'),
(5, 3, 'Post 2', 'Ut velit mauris, egestas sed, gravida nec, ornare ut, mi', '<p>Aenean ut orci vel massa suscipit pulvinar. Nulla sollicitudin. Fusce varius, ligula non tempus aliquam, nunc turpis ullamcorper nibh, in tempus sapien eros vitae ligula. Pellentesque rhoncus nunc et augue. Integer id felis. Curabitur aliquet pellentesque diam. Integer quis metus vitae elit lobortis egestas. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi vel erat non mauris convallis vehicula. Nulla et sapien. Integer tortor tellus, aliquam faucibus, convallis id, congue eu, quam. Mauris ullamcorper felis vitae erat. Proin feugiat, augue non elementum posuere, metus purus iaculis lectus, et tristique ligula justo vitae magna.</p>', '2023-01-09 09:55:17'),
(6, 3, 'Post 3', 'Aliquam convallis sollicitudin purus', '<p>Praesent aliquam, enim at fermentum mollis, ligula massa adipiscing nisl, ac euismod nibh nisl eu lectus. Fusce vulputate sem at sapien. Vivamus leo. Aliquam euismod libero eu enim. Nulla nec felis sed leo placerat imperdiet. Aenean suscipit nulla in justo. Suspendisse cursus rutrum augue. Nulla tincidunt tincidunt mi. Curabitur iaculis, lorem vel rhoncus faucibus, felis magna fermentum augue, et ultricies lacus lorem varius purus. Curabitur eu amet.</p>', '2023-01-09 09:57:07'),
(7, 3, 'Post 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '<p>Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit.</p>', '2023-01-09 10:03:03'),
(8, 3, 'Post 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '<p>Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit.</p>', '2023-01-09 10:03:29');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `droits` varchar(45) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `mail`, `password`, `droits`) VALUES
(4, 'Admin', 'admin@hotmail.fr', '$2y$10$gAMNi9ryEKePTq4jU0aiXOBtC5Q7jO57jx8S4asooK2UH.tK1LH36', '1'),
(2, 'Test', 'test@hotmail.fr', '$2y$10$8E4aw3WBtHz0U1Ez6mqxIO/WPU/61qLQvbLy3P/Fz5gQHyEUjiIIO', '0'),
(3, 'Aurore', 'aurorecorvest@hotmail.fr', '$2y$10$eQuBhAjAWaAvTGCH2hv5nuKWhNtuh6Ko9QGEWIuxJNyhZdYBIuvdm', '1'),
(5, 'User', 'user@hotmail.fr', '$2y$10$hCy8gMHG8UIuCx.70NV2A.m5IjK31CGG8F4rglj8U68SjkXdQ1BK.', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
