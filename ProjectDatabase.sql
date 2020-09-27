-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 27, 2020 at 03:01 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdetail`
--
CREATE DATABASE IF NOT EXISTS `userdetail` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `userdetail`;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `pid` varchar(10) NOT NULL,
  `ptitle` varchar(30) NOT NULL,
  `pdesc` varchar(500) NOT NULL,
  `viewlink` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `pid`, `ptitle`, `pdesc`, `viewlink`) VALUES
(1, 'p1', 'HTML Tutorial', 'This is the course, from where you can learn so many things. and it will help you much more.\r\n\r\nyou can access the course after the purchase.', 'https://www.w3schools.com/html/'),
(2, 'p2', 'SQL Tutorial', 'This is the course, from where you can learn so many things. and it will help you much more.\r\n\r\nyou can access the course after the purchase.', 'https://www.w3schools.com/sql/'),
(3, 'p3', 'Python Tutorial', 'This is the course, from where you can learn so many things. and it will help you much more.\r\n\r\nyou can access the course after the purchase.', 'https://www.w3schools.com/python/'),
(4, 'p4', 'CSS Tutorial', 'This is the course, from where you can learn so many things. and it will help you much more.\r\n\r\nyou can access the course after the purchase.', 'https://www.w3schools.com/css/'),
(5, 'p5', 'JavaScript Tutorial', 'This is the course, from where you can learn so many things. and it will help you much more.\r\n\r\nyou can access the course after the purchase.', 'https://www.w3schools.com/js/DEFAULT.asp'),
(6, 'p6', 'PHP Tutorial', 'This is the course, from where you can learn so many things. and it will help you much more. you can access the course after the purchase.', 'https://www.w3schools.com/php/DEFAULT.asp'),
(7, 'p7', 'XML Tutorial', 'This the course, from where you can learn so many things. and it will help you much more. you can access the course after the purchase.', 'https://www.w3schools.com/xml/default.asp'),
(8, 'p8', 'Learn Bootstrap', 'This the code from where you can learn so many things. and it will help you much more. you can access the code after the purchase.', 'https://www.w3schools.com/bootstrap/bootstrap_ver.asp');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE IF NOT EXISTS `purchase` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `uid` varchar(30) NOT NULL,
  `pid` varchar(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `pw` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `sq` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
