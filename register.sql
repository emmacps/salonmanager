-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 01, 2020 at 01:51 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `shop_name`, `username`, `password`, `email`, `activated`, `avatar`, `join_date`) VALUES
(7, '', 'emmacps', '$2y$10$VcYrUSUqgMJPC9PKjN2hW.XiMKYaq.mPxw1g.u4N2BdNdDnk4ePoq', 'emmacps001@gmail.com', '1', 'uploads/emmacpse9fe98669149a422981e5c1a96d7fd09.jpg', '2020-02-19 23:10:21'),
(8, '', 'wandy', '$2y$10$EueMpHmUbPubWRFD7wCFj.Z1QEdjv6svAPwJEP8XkTAV1pVvUu8lm', 'wandy@gmail.com', '1', 'uploads/wandy2f95e6a98d5ec6657dbbd30f6ae0331b.png', '2020-03-05 03:52:54'),
(9, 'tech home', 'samuel001', '$2y$10$1Gn2gK3xYY5qT1jKZGUmJ.OV7I.BP3pRjU8NjhFcW9CwsdxFXOmD.', 'samuelasare0001@gmail.com', '1', 'uploads/samuelb8b61ef66cff7ab1555d28a29dcc86a6.jpg', '2020-03-31 02:10:43'),
(10, '', 'festus', '$2y$10$cDA/qlNb9ybGoQVyRM22L.4oHUPr5gOnMOpVS/XiH/cuGqfmRe.iW', 'festus001@gmail.com', '0', 'uploads/default.jpg', '2020-03-14 03:21:57');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
