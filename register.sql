-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2020 at 02:15 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoint`
--

DROP TABLE IF EXISTS `appoint`;
CREATE TABLE IF NOT EXISTS `appoint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(99) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `select_service` varchar(255) NOT NULL,
  `service_mode` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appoint`
--

INSERT INTO `appoint` (`id`, `user_id`, `fname`, `number`, `email`, `select_service`, `service_mode`) VALUES
(1, 9, 'john', '0045064', 'emmacps001@gmail.com', '5', 'Home Service'),
(2, 12, 'Yaw', '099887', 'emmacps001@gmail.com', '6', 'Walk-in Service'),
(3, 12, 'Yaw', 'rerre', 'emmacps001@gmail.com', '7', 'Walk-in Service');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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
(7, 11, 'Washing', 'hair washing', 'ghc10', '1');

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
  `avatar` varchar(255) DEFAULT 'uploads/default.jpg',
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `shop_name`, `des`, `username`, `password`, `email`, `activated`, `avatar`, `join_date`) VALUES
(13, 'Your Shop Name', 'Short Description', 'candy001', '$2y$10$JW8brnqmNwLwMyZvhR01t.rOBrryqY0PQWpOKgInpnvYEbfGPxzUK', 'cercyakowuah16@gmail.com', '1', 'uploads/default.jpg', '2020-04-20 01:19:36'),
(9, 'tech home salon 22', '                                                                              Testing this box   for salon description                                                                  ', 'samuel001', '$2y$10$1Gn2gK3xYY5qT1jKZGUmJ.OV7I.BP3pRjU8NjhFcW9CwsdxFXOmD.', 'samuelasare0001@gmail.com', '1', 'uploads/samuelb8b61ef66cff7ab1555d28a29dcc86a6.jpg', '2020-04-15 04:06:32'),
(12, 'Waves Salons', 'A beautiful salon for u                                           ', 'zandy001', '$2y$10$GNpEKhXjwvPl0XV0PHNCne6sDHeJkpBavWOeaMn2Ahcaop2f2QJo6', 'samuelas001@yahoo.com', '1', 'uploads/zandy0015e639f5d1fd69e44030a1c9371842eb1.jpg', '2020-04-16 02:09:07'),
(11, 'Your Shop Name', 'Short Description', 'kanny001', '$2y$10$6.zXyPpD9bXBCiMfCDII8OB1EfUBmqs2CHVAGJq7kgSQ.1y.4AXjC', 'emmasco20032003@gmail.com', '1', 'uploads/kanny001bbe214d030f804d4696658da718f5484.jpg', '2020-04-19 22:21:16'),
(14, 'Your Shop Name', 'Short Description', 'ganny001', '$2y$10$d2j4Lpp/xxHG5cnTtltE2.9n4UkVSqPYEur5I5tgv/r8xcZGFFTe.', 'emmacps001@gmail.com', '1', 'uploads/default.jpg', '2020-04-20 01:59:08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
