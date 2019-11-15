-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 26, 2019 at 09:14 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kenabecha`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_name`, `admin_contact`, `Role`, `admin_pass`) VALUES
(1, 'amanullah.bcse@gmail.com', 'amanullah aman', '01756007000', 'Admin', '123456'),
(2, 'abc@gmail.com', 'edwin', '01756007000', 'Admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Mobile'),
(2, 'PC & Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_orders_ad_id` int(11) NOT NULL,
  `payment_orders_user_id` int(11) NOT NULL,
  `payments_orders_receive_id` int(11) NOT NULL,
  `payment_con_admin_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `payment_orders_ad_id` (`payment_orders_ad_id`),
  KEY `payment_orders_user_id` (`payment_orders_user_id`),
  KEY `payments_orders_receive_id` (`payments_orders_receive_id`),
  KEY `payment_con_admin_id` (`payment_con_admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_orders_ad_id`, `payment_orders_user_id`, `payments_orders_receive_id`, `payment_con_admin_id`, `payment_date`, `payment_status`) VALUES
(1, 13, 7, 37, 1, '2019-09-11', 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_user_email` varchar(255) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_price` varchar(255) NOT NULL,
  `post_contact` varchar(255) NOT NULL,
  `post_condition` varchar(255) NOT NULL,
  `post_category` varchar(255) NOT NULL,
  `post_location` varchar(255) NOT NULL,
  `post_image` text NOT NULL,
  `post_details` text NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_user_email`, `post_title`, `post_price`, `post_contact`, `post_condition`, `post_category`, `post_location`, `post_image`, `post_details`) VALUES
(19, 'angkon@gmail.com', 'Acer One 14', '40000', '017xxxxxxxx', 'New', 'PC_Laptop', 'mirpur 6', 'Aspire_One_14_Z1_402_34M3_L_1.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.'),
(20, 'angkon@gmail.com', 'Oppo Realme 2', '17000/-', '017xxxxxxxx', 'Used', 'Mobile', 'Gazipur,Dhaka.', 'Oppo-Realme-2.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_photo` text NOT NULL,
  `user_role` varchar(255) DEFAULT NULL,
  `user_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`,`user_email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_name`, `user_phone`, `user_photo`, `user_role`, `user_pass`) VALUES
(1, 'saji@dfnkvnd.com', 'Kazol bissas', '01748164443', '70166916_2434404413550272_3288170487292624896_o.jpg', 'Buyer', '$2y$12$EuRrL7yf4RlMoBMvo3j64uKgqalwzbLnHTZRx.y9tVIXeYpK1f.J2'),
(2, 'angkon@gmail.com', 'angkon', '01751426293', 'Screenshot_2017-12-22-19-55-14-1.png', 'Seller', '$2y$12$NTvjep4fCBABTOVqDpGYZ.nYV79pHq9KgD0n/393aHC8O6BKTI0hC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
