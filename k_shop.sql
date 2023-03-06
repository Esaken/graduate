-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2014 at 07:23 AM
-- Server version: 5.6.12
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `k_shop`
--
CREATE DATABASE IF NOT EXISTS `k_shop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `k_shop`;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `units` int(5) NOT NULL,
  `total` int(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`product_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `qty`, `price`) VALUES

(16, 'BOLT16', 'boot', ' Colorado boots are built with nubuck uppers that are great for all weather and aspen sole allwing easy transition between the outdoor and indoor settings.', 'boot1.png', 7, '2000.00'),

(17, 'BOLT17', 'flats', 'Greek inspired and named after the great Greek God, Zeus. This pair definitely demands attention', 'shoe2.png', 7, '2000.00'),

(4, 'BOLT4', 'boots', 'Boots are efficient during the rainy season and also suitable for modern fashion.', 'shoe3.png', 7, '2000.00'),

(5, 'BOLT5', 'Boots', 'Boots are efficient during the rainy season also suitable for modern fashion.', 'shoe4.png', 7, '2000.00'),

(6, 'BOLT6', 'Flats', 'We understand that busy lifestyles call for practical yet stylish shoes, like these Giorgia sandals.', 'shoe5.png', 7, '2000.00'),

(8, 'BOLT8', 'Flats', 'A twisted bow adds feminine dimension to the simple slide silhouette.', 'shoe 6.png', 7, '2500.00'),

(9, 'BOLT9', 'Pumps', 'Keep things effortless this season with these classic pumps. For everyday wear, whether thats heading to the office or for lunch, or a function, or date night, the sandals are easy to slide on in a rush. They have a simple, classy and easy design that can be versatile for many outfits. ', 'shoe7.png', 7, '2400.00'),

(10, 'BOLT10', 'Socks', 'Vibrant Afro-pop sheer socks', 'socks.png', 7, '500.00'),

(11, 'BOLT11', 'Socks', 'Vibrant Afro-pop sheer socks,
Instant shoe lift,
ONE SIZE US women 5-12,
65% nylon 32% cotton & 3% elastane.', 'sock2.png', 7, '700.00'),

(12, 'BOLT12', 'Boot', 'Boots are efficient during the rainy season and also suitable for modern fashion', 'shoe10.png', 9, '4500.00'),

(13, 'BOLT13', 'Boot', 'Boots are efficient during the rainy season and also suitable for modern fashion', 'shoe11.png', 7, '2500.00'),

(14, 'BOLT14', 'flats', 'DURABLE – Serves you for a long term without wearing out. Featured with flexible, supportive sole and cushioned foot bed.
Water resistant – allows you to be comfortable in all type of weather..', 'shoe12.png', 7, '2500.00'),

(15, 'BOLT15', 'Sports Band', 'The Sports Band collection features highly polished stainless steel and space black stainless steel cases. The display is protected by sapphire crystal. And there is a choice of three different leather bands.', 'sports_band.jpg', 34, '1000.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pin` int(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `address`, `city`, `pin`, `email`, `password`, `type`) VALUES
(1, 'Steve', 'Jobs', 'Infinite Loop', 'California', 95014, 'sjobs@apple.com', 'steve', 'admin');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
