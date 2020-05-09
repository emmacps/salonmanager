-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 09, 2020 at 03:04 AM
-- Server version: 5.7.23
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salon`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoint`
--

DROP TABLE IF EXISTS `appoint`;
CREATE TABLE IF NOT EXISTS `appoint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salon_id` int(99) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `select_service` varchar(255) NOT NULL,
  `service_mode` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appoint`
--

INSERT INTO `appoint` (`id`, `salon_id`, `fname`, `number`, `email`, `select_service`, `service_mode`, `date`, `status`) VALUES
(1, 9, 'john', '0045064', 'emmacps001@gmail.com', '5', 'Home Service', NULL, 0),
(2, 12, 'Yaw', '099887', 'emmacps001@gmail.com', '6', 'Walk-in Service', NULL, 0),
(3, 12, 'Yaw', 'rerre', 'emmacps001@gmail.com', '7', 'Walk-in Service', NULL, 0),
(4, 11, 'Emmanuel', '060670786', 'emmasco20032003@yahoo.com', '7', 'Home Service', '2020-05-19', 0),
(5, 15, 'Cercy', '0246377670', 'cercyakowuah16@gmail.com', '8', 'Home Service', '2020-05-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expire_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_des` varchar(255) NOT NULL,
  `service_price` varchar(255) NOT NULL,
  `service_active` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `service_name`, `service_des`, `service_price`, `service_active`) VALUES
(1, 0, 'fdgf', 'ggfgf', 'gsgs', ''),
(2, 0, 'tytyt', 'tryhy', 'tdhd', ''),
(3, 0, 'utyt', 'ityuityu', 'ityyuiti', ''),
(4, 9, 'yuy11', 'yuyu1', '265', '1'),
(5, 9, 'wig', 'natual wig', 'Ghc200', '1'),
(6, 12, 'yy', 'jgd', 'fg', '1'),
(7, 11, 'Washing', 'hair washing', 'ghc10', '1'),
(8, 15, 'Nails Polish', 'Polish your nails', 'Ghc200', '1');

-- --------------------------------------------------------

--
-- Table structure for table `trash`
--

DROP TABLE IF EXISTS `trash`;
CREATE TABLE IF NOT EXISTS `trash` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `user_id` int(6) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(99) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(255) NOT NULL,
  `des` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `activated` enum('0','1') NOT NULL DEFAULT '1',
  `avatar` varchar(255) DEFAULT 'uploads/default.png',
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `shop_name`, `des`, `username`, `password`, `email`, `activated`, `avatar`, `join_date`) VALUES
(15, 'Lizzy Perfect Salon', 'Come try us                ', 'emmasco2003', '$2y$10$CrXxqGyxTvYb/i2vjFSDVOQkNwLVxumSD1wQuUrm9EcTL9trdQN8u', 'emmasco20032003@yahoo.com', '1', 'uploads/emmasco2003bf68c6b6af34bc799de19eb8295b7bc6.jpg', '2020-05-09 02:32:11'),
(9, 'tech home salon 22', '                                                                              Testing this box   for salon description                                                                  ', 'samuel001', '$2y$10$1Gn2gK3xYY5qT1jKZGUmJ.OV7I.BP3pRjU8NjhFcW9CwsdxFXOmD.', 'samuelasare0001@gmail.com', '1', 'uploads/samuelb8b61ef66cff7ab1555d28a29dcc86a6.jpg', '2020-04-15 04:06:32'),
(12, 'Waves Salons', 'A beautiful salon for u                                           ', 'zandy001', '$2y$10$GNpEKhXjwvPl0XV0PHNCne6sDHeJkpBavWOeaMn2Ahcaop2f2QJo6', 'samuelas001@yahoo.com', '1', 'uploads/zandy0015e639f5d1fd69e44030a1c9371842eb1.jpg', '2020-04-16 02:09:07'),
(17, 'What a Salon', 'Come lets make you a model                ', 'randy111', '$2y$10$z3MLabUDQmiqj79gaIcbI.BMCJnFFJJmcCtUximhDvCb23U4DVaUi', 'cercyakowuah16@gmail.com', '1', 'uploads/randy11168da582c821cba716a3b7e288c08ac77.jpeg', '2020-05-09 03:03:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
