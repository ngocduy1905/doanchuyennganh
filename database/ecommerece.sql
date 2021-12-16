-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 14, 2021 at 02:24 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerece`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `getcat`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcat` (IN `cid` INT)  SELECT * FROM categories WHERE cat_id=cid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

DROP TABLE IF EXISTS `admin_info`;
CREATE TABLE IF NOT EXISTS `admin_info` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `admin_email` varchar(300) CHARACTER SET latin1 NOT NULL,
  `admin_password` varchar(300) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_username`, `admin_name`, `admin_email`, `admin_password`) VALUES
(13, 'admin', 'Tran Nhat Ban', 'bant835@gmail.com', '1234567'),
(16, 'admin1', 'Nguyen Ngoc Duy', 'duynguyen@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(100) NOT NULL AUTO_INCREMENT,
  `brand_title` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`brand_id`),
  KEY `brand_id` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Gucci'),
(2, 'Chanel'),
(3, 'Mango'),
(7, 'Levis');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) CHARACTER SET latin1 NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(6, 26, '::1', 4, 1),
(9, 10, '::1', 7, 1),
(10, 11, '::1', 7, 1),
(11, 45, '::1', 7, 1),
(44, 5, '::1', 3, 0),
(46, 2, '::1', 3, 0),
(48, 72, '::1', 3, 0),
(49, 60, '::1', 8, 1),
(50, 61, '::1', 8, 1),
(51, 1, '::1', 8, 1),
(52, 5, '::1', 9, 1),
(53, 2, '::1', 14, 1),
(54, 3, '::1', 14, 1),
(55, 5, '::1', 14, 1),
(56, 1, '::1', 9, 1),
(57, 2, '::1', 9, 1),
(71, 61, '127.0.0.1', -1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(100) NOT NULL AUTO_INCREMENT,
  `cat_title` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`cat_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Clothes'),
(2, 'Women\'s clothing'),
(3, 'Men clothes'),
(4, 'Men\'s jackets'),
(5, 'Men\'s vest'),
(6, 'Men\'s shirts'),
(7, 'Men T-Shirt');

-- --------------------------------------------------------

--
-- Table structure for table `email_info`
--

DROP TABLE IF EXISTS `email_info`;
CREATE TABLE IF NOT EXISTS `email_info` (
  `email_id` int(100) NOT NULL AUTO_INCREMENT,
  `email` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `email_info`
--

INSERT INTO `email_info` (`email_id`, `email`) VALUES
(1, 'duy.dh51800394@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `action` varchar(50) CHARACTER SET latin1 NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `p_status` varchar(20) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`) VALUES
(1, 1, 86, 1, 'nhb', 'nhn'),
(2, 1, 86, 1, 'hyygb', 'ok'),
(3, 1, 86, 1, 'njn', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `orders_info`
--

DROP TABLE IF EXISTS `orders_info`;
CREATE TABLE IF NOT EXISTS `orders_info` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `f_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `city` varchar(255) CHARACTER SET latin1 NOT NULL,
  `state` varchar(255) CHARACTER SET latin1 NOT NULL,
  `zip` int(10) NOT NULL,
  `cardname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cardnumber` varchar(20) CHARACTER SET latin1 NOT NULL,
  `expdate` varchar(255) CHARACTER SET latin1 NOT NULL,
  `prod_count` int(15) DEFAULT NULL,
  `total_amt` int(15) DEFAULT NULL,
  `cvv` int(5) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `orders_info`
--

INSERT INTO `orders_info` (`order_id`, `user_id`, `f_name`, `email`, `address`, `city`, `state`, `zip`, `cardname`, `cardnumber`, `expdate`, `prod_count`, `total_amt`, `cvv`) VALUES
(1, 1, 'Ban Tran', 'bant835@gmail.com', 'TP.HCM', 'TPHCM', 'demo', 505284, 'demo', '151054848048084', '12/12', 2, 7000, 588),
(2, 1, 'Ban Tran', 'bant835@gmail.com', 'TP.HCM', 'TPHCM', 'demo', 505284, 'demo', '2084585084580458', '10/10', 2, 4000, 205),
(3, 1, 'Ban Tran', 'bant835@gmail.com', 'TP.HCM', 'TPHCM', 'demo', 505284, 'demo', '2558252525252525', '12/10', 2, 7000, 10),
(4, 1, 'Ban Tran', 'bant835@gmail.com', 'TP.HCM', 'TPHCM', 'demo', 505284, 'demo', '20480584507847', '10/10', 1, 5000, 4),
(5, 1, 'Ban Tran', 'bant835@gmail.com', 'TP.HCM', 'TPHCM', 'demo', 505284, 'demo', '4804 8048 74', '10/11', 1, 5000, 47);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
CREATE TABLE IF NOT EXISTS `order_products` (
  `order_pro_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(15) DEFAULT NULL,
  `amt` int(15) DEFAULT NULL,
  PRIMARY KEY (`order_pro_id`),
  KEY `order_products` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_pro_id`, `order_id`, `product_id`, `qty`, `amt`) VALUES
(1, 1, 86, 1, 5000),
(2, 1, 87, 1, 2000),
(3, 2, 87, 1, 2000),
(4, 2, 87, 1, 2000),
(5, 3, 86, 1, 5000),
(6, 3, 87, 1, 2000),
(7, 4, 86, 1, 5000),
(8, 5, 86, 1, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text COLLATE utf8_vietnamese_ci NOT NULL,
  `product_image` text COLLATE utf8_vietnamese_ci NOT NULL,
  `product_keywords` text COLLATE utf8_vietnamese_ci NOT NULL,
  `product_color` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `product_size` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_made_in` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `product_import_date` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_cat` (`product_cat`),
  KEY `product_brand` (`product_brand`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `product_color`, `product_size`, `product_quantity`, `product_made_in`, `product_import_date`) VALUES
(86, 3, 2, 'ao sÆ¡ mi', 5000, 'xanh', '1636895488_a595a3e9-d960-7700-100a-001819a4f166.jpg', 'ao sÆ¡ mi nam', 'xanh', 's', 20, 'thailan', '2019-01-01'),
(87, 2, 1, 'vÃ¡y', 2000, 'vÃ¡y dÃ i', '1636897031_7475-ladies-casual-dresses-summer-two-colors-pleated.jpg', 'quáº§n Ã¡o ná»¯', 'xanh', 'M', 1, 'trungquoc', '2021-01-01'),
(88, 4, 3, 'Ã¡o khoÃ¡c nam', 5000, 'Ã¡o khoÃ¡c', '1636897153_Winter-fashion-men-burst-sweater.png', 'Ã¡o khoÃ¡c nam', 'xanh', 'M', 1, 'trungquoc', '2020-01-02'),
(89, 5, 2, 'Ã¡o vest nam', 5000, 'Ã¡o vest', '1636897273_ms2.jpg', 'Ã¡o vest nam', 'Ä‘en', 'M', 2, 'thailan', '2020-01-01'),
(90, 6, 2, 'Ã¡o sÆ¡ mi nam', 5000, 'Ã¡o sÆ¡ mi nam', '1636897824_pm3.jpg', 'Ã¡o sÆ¡ mi nam', 'xanh', 'M', 2, 'thailan', '2020-01-02'),
(91, 7, 1, 'Ã¡o thun nam', 3000, 'Ã¡o thun nam', '1636898031_AP-2792N-0CA00-250K-500x500.jpg', 'Ã¡o thun nam', 'vÃ ng', 'M', 2, 'thailan', '2020-01-01'),
(92, 1, 1, 'vÃ¡y', 3000, 'vÃ¡y ná»¯', '1636898528_red dress.jpg', 'vÃ¡y ná»¯', 'Ä‘á»', 'M', 1, 'thailan', '2020-01-01'),
(93, 2, 1, 'vÃ¡y', 2000, 'vÃ¡y ná»¯', '1636898627_girl-walking.jpg', 'vÃ¡y ná»¯', 'vÃ ng', 'M', 2, 'thailan', '2019-02-02'),
(95, 5, 2, 'ao vest', 5000, 'ao vest nam', '1639447766_pm11.jpg', 'ao vest nam', 'Ä‘en', 'M', 1, 'thailan', '2020-01-02'),
(96, 5, 1, 'ao vest nam', 3000, 'ao vest nam', '1639448577_ms3.jpg', 'ao vest nam', 'Ä‘en', 'M', 1, 'thailan', '2020-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `email` varchar(300) CHARACTER SET latin1 NOT NULL,
  `password` varchar(300) CHARACTER SET latin1 NOT NULL,
  `mobile` varchar(10) CHARACTER SET latin1 NOT NULL,
  `address1` varchar(300) CHARACTER SET latin1 NOT NULL,
  `address2` varchar(11) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(1, 'Ban', 'Tran', 'bant835@gmail.com', '123456789B', '0978119952', 'TP.HCM', 'TPHCM');

--
-- Triggers `user_info`
--
DROP TRIGGER IF EXISTS `after_user_info_insert`;
DELIMITER $$
CREATE TRIGGER `after_user_info_insert` AFTER INSERT ON `user_info` FOR EACH ROW BEGIN 
INSERT INTO user_info_backup VALUES(new.user_id,new.first_name,new.last_name,new.email,new.password,new.mobile,new.address1,new.address2);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_info_backup`
--

DROP TABLE IF EXISTS `user_info_backup`;
CREATE TABLE IF NOT EXISTS `user_info_backup` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `email` varchar(300) CHARACTER SET latin1 NOT NULL,
  `password` varchar(300) CHARACTER SET latin1 NOT NULL,
  `mobile` varchar(10) CHARACTER SET latin1 NOT NULL,
  `address1` varchar(300) CHARACTER SET latin1 NOT NULL,
  `address2` varchar(11) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `user_info_backup`
--

INSERT INTO `user_info_backup` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(1, 'Ban', 'Tran', 'bant835@gmail.com', '123456789B', '0978119952', 'TP.HCM', 'TPHCM');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products` FOREIGN KEY (`order_id`) REFERENCES `orders_info` (`order_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_product_brands` FOREIGN KEY (`product_brand`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `FK_product_categories` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
