-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 09, 2020 at 12:53 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

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
  `salon_id` int(11) NOT NULL,
  `fname` varchar(80) NOT NULL,
  `number` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `select_service` varchar(200) NOT NULL,
  `service_mode` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appoint`
--

INSERT INTO `appoint` (`id`, `salon_id`, `fname`, `number`, `email`, `select_service`, `service_mode`, `date`, `status`) VALUES
(1, 7, 'Kofi Nkansah', '0515050205', 'kay233@dispostable.com', '4', 'Home Service', '2020-04-09', 3),
(2, 7, 'Kofi Nkansah', '0515050205', 'testuser@dispostable.com', '4', 'Home Service', '2020-04-14', 1),
(3, 7, 'Isaac Bonney', '0241666507', 'kay233@dispostable.com', '4', 'Home Service', '2020-05-19', 2);

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
  `service_name` text NOT NULL,
  `service_des` text NOT NULL,
  `service_price` decimal(10,2) NOT NULL,
  `service_active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `service_name`, `service_des`, `service_price`, `service_active`) VALUES
(1, 11, 'Nail Polish', 'This is a service to polish your nails', '25.00', 1),
(2, 11, 'Hair Braids', 'New Braiding styles', '35.25', 0),
(3, 11, 'Rasta', 'Women Rasta', '45.00', 0),
(4, 7, 'New Nail Polish', 'This is a service to polish your nails', '35.00', 1);

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
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `activated` enum('0','1') NOT NULL DEFAULT '0',
  `avatar` varchar(255) DEFAULT 'uploads/default.jpg',
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `shop_name`, `username`, `password`, `email`, `activated`, `avatar`) VALUES
(7, 'Tech Salon', 'emmacps', '$2y$10$pJzIx5kSVvfDI1Ojtf2j7.QP7XRArbB3jy9YN4N63g0nAuqAnYM1y', 'emmacps001@gmail.com', '1', 'uploads/emmacpse9fe98669149a422981e5c1a96d7fd09.jpg'),
(8, '', 'wandy', '$2y$10$EueMpHmUbPubWRFD7wCFj.Z1QEdjv6svAPwJEP8XkTAV1pVvUu8lm', 'wandy@gmail.com', '1', 'uploads/wandy2f95e6a98d5ec6657dbbd30f6ae0331b.png'),
(9, 'tech home', 'samuel001', '$2y$10$1Gn2gK3xYY5qT1jKZGUmJ.OV7I.BP3pRjU8NjhFcW9CwsdxFXOmD.', 'samuelasare0001@gmail.com', '1', 'uploads/samuelb8b61ef66cff7ab1555d28a29dcc86a6.jpg'),
(10, '', 'festus', '$2y$10$pJzIx5kSVvfDI1Ojtf2j7.QP7XRArbB3jy9YN4N63g0nAuqAnYM1y', 'festus001@gmail.com', '1', 'uploads/default.jpg'),
(11, '', 'kay233', '$2y$10$pJzIx5kSVvfDI1Ojtf2j7.QP7XRArbB3jy9YN4N63g0nAuqAnYM1y', 'kay@dispostable.com', '1', 'uploads/kay233570cb2f4d675607d16325858eb7e1b3c.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
