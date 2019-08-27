-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2018 at 04:19 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sambiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`) VALUES
(15, 'BDH'),
(16, 'Borosilicate'),
(17, 'SigmaAldrich'),
(18, 'GFS'),
(19, 'Fluka'),
(20, 'Fischer'),
(21, 'Pyrex'),
(22, 'May &amp; Baker'),
(23, 'Loba Chemie'),
(24, 'Whatmann'),
(25, 'J.T Baker');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `items` text COLLATE utf8_unicode_ci NOT NULL,
  `expire_date` datetime NOT NULL,
  `paid` tinyint(4) NOT NULL DEFAULT '0',
  `shipped` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `items`, `expire_date`, `paid`, `shipped`) VALUES
(1, '[{\"id\":\"13\",\"size\":\"2.5L\",\"quantity\":\"1\"},{\"id\":\"11\",\"size\":\"12.5cm\",\"quantity\":\"2\"}]', '2018-05-11 13:14:59', 1, 0),
(2, '[{\"id\":\"11\",\"size\":\"12.5cm\",\"quantity\":1}]', '2018-05-11 14:01:37', 1, 0),
(3, '[{\"id\":\"14\",\"size\":\"Dozen\",\"quantity\":1}]', '2018-05-11 18:32:06', 1, 0),
(4, '[{\"id\":\"10\",\"size\":\"Small\",\"quantity\":\"1\"}]', '2018-05-12 15:01:00', 1, 0),
(5, '[{\"id\":\"11\",\"size\":\"12.5cm\",\"quantity\":\"1\"},{\"id\":\"14\",\"size\":\"Dozen\",\"quantity\":\"1\"}]', '2018-05-13 17:46:04', 1, 0),
(8, '[{\"id\":\"13\",\"size\":\"2.5L\",\"quantity\":\"1\"}]', '2018-05-16 23:01:00', 1, 0),
(9, '[{\"id\":\"14\",\"size\":\"Dozen\",\"quantity\":\"03\"},{\"id\":\"13\",\"size\":\"2.5L\",\"quantity\":\"1\"},{\"id\":\"10\",\"size\":\"Small\",\"quantity\":\"1\"}]', '2018-05-17 00:06:51', 1, 0),
(10, '[{\"id\":\"11\",\"size\":\"12.5cm\",\"quantity\":\"3\"},{\"id\":\"10\",\"size\":\"Small\",\"quantity\":\"4\"}]', '2018-05-17 00:11:06', 1, 0),
(11, '[{\"id\":\"10\",\"size\":\"Small\",\"quantity\":\"1\"}]', '2018-05-17 00:01:00', 1, 0),
(12, '[{\"id\":\"17\",\"size\":\"Small\",\"quantity\":\"3\"},{\"id\":\"10\",\"size\":\"Medium\",\"quantity\":\"1\"}]', '2018-05-17 00:48:52', 1, 1),
(13, '[{\"id\":\"19\",\"size\":\"Blue\",\"quantity\":\"4\"},{\"id\":\"18\",\"size\":\"14 inches\",\"quantity\":\"1\"},{\"id\":\"13\",\"size\":\"2.5L\",\"quantity\":\"1\"},{\"id\":\"10\",\"size\":\"Medium\",\"quantity\":\"2\"}]', '2018-05-17 02:09:45', 1, 1),
(14, '[{\"id\":\"17\",\"size\":\"Medium\",\"quantity\":\"3\"},{\"id\":\"10\",\"size\":\"Small\",\"quantity\":\"1\"}]', '2018-05-17 13:01:44', 1, 1),
(15, '[{\"id\":\"15\",\"size\":\"Jug\",\"quantity\":\"1\"},{\"id\":\"19\",\"size\":\"White\",\"quantity\":\"2\"},{\"id\":\"18\",\"size\":\"15 inches\",\"quantity\":\"2\"},{\"id\":\"10\",\"size\":\"Medium\",\"quantity\":\"2\"}]', '2018-05-17 16:21:10', 1, 1),
(16, '[{\"id\":\"10\",\"size\":\"Medium\",\"quantity\":\"3\"}]', '2018-05-17 16:01:00', 1, 1),
(17, '[{\"id\":\"13\",\"size\":\"2.5L\",\"quantity\":\"1\"}]', '2018-05-17 21:01:00', 1, 1),
(18, '[{\"id\":\"11\",\"size\":\"12.5cm\",\"quantity\":\"3\"},{\"id\":\"10\",\"size\":\"Small\",\"quantity\":\"2\"}]', '2018-05-17 23:01:56', 1, 0),
(19, '[{\"id\":\"11\",\"size\":\"11cm\",\"quantity\":\"02\"}]', '2018-05-20 15:01:00', 1, 0),
(20, '[{\"id\":\"13\",\"size\":\"2.5L\",\"quantity\":\"1\"}]', '2018-05-20 15:01:00', 1, 0),
(21, '[{\"id\":\"13\",\"size\":\"2.5L\",\"quantity\":\"1\"},{\"id\":\"15\",\"size\":\"Jug\",\"quantity\":\"1\"}]', '2018-05-20 17:21:13', 1, 0),
(23, '[{\"id\":\"10\",\"size\":\"Small\",\"quantity\":\"1\"}]', '2018-05-30 13:01:00', 0, 0),
(24, '[{\"id\":\"10\",\"size\":\"Medium\",\"quantity\":\"2\"}]', '2018-06-16 15:01:00', 1, 0),
(25, '[{\"id\":\"11\",\"size\":\"11cm\",\"quantity\":\"1\"}]', '2018-06-16 15:01:00', 1, 0),
(26, '[{\"id\":\"11\",\"size\":\"11cm\",\"quantity\":\"2\"}]', '2018-06-21 15:01:00', 1, 0),
(27, '[{\"id\":\"14\",\"size\":\"Dozen\",\"quantity\":\"1\"}]', '2018-06-25 18:01:00', 1, 0),
(28, '[{\"id\":\"14\",\"size\":\"Dozen\",\"quantity\":\"1\"}]', '2018-06-26 22:01:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `parent`) VALUES
(1, 'Featured Products', 0),
(5, 'Acids & Bases', 1),
(6, 'Catalysis & Inorganics', 1),
(7, 'Chemical Synthesis', 1),
(14, 'CHROMATOGRAPHY', 1),
(15, 'Analytical Standards', 1),
(16, 'Gas Chromatography', 1),
(17, 'Spectroscopy', 1),
(18, 'Titration & Karl Fischer', 1),
(19, 'Sample Prep & Purification', 1),
(20, 'Heterocyclic Building Blocks', 1),
(21, 'Organic Building Blocks', 1),
(22, 'Organometallics', 1),
(23, 'Salts', 1),
(34, 'Filter Paper', 1),
(35, 'Petri Dish', 1),
(41, 'Web Development', 38),
(46, 'CHEMISTRY', 1);

-- --------------------------------------------------------

--
-- Table structure for table `custom_goods`
--

CREATE TABLE `custom_goods` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(175) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `custom_goods`
--

INSERT INTO `custom_goods` (`id`, `title`, `price`, `image`, `description`, `email`, `phone_number`, `address`, `featured`, `deleted`) VALUES
(1, 'Android', '16.00', '/SamBiz/assets/img/67686ebaf9aaa8500e8d44f140da128a.jpg', 'a smart phone', 'ogunsusitemitayo99@gmail.com', '09056932322', 'Ile-ife', 1, 0),
(2, 'Coffee', '35.00', '/SamBiz/assets/img/77e5f250f3721cc8603920e1fe08e8f4.jpg', 'A nice coffee with great taste', 'majogoolowo@gmail.com', '08060081236', '61, Fajuyi Road.', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `list_price` decimal(10,2) NOT NULL,
  `brand` int(11) NOT NULL,
  `categories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `sizes` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `list_price`, `brand`, `categories`, `image`, `description`, `featured`, `sizes`, `deleted`) VALUES
(10, 'Multimeter', '30.00', '45.00', 19, '15', '/SamBiz/assets/img/68d25cfa6dda1596feab959adab3ef40.jpg', 'Perfect for testing voltages, current and other measurable electrical quantities', 1, 'Small:0:,Medium:3:,Large:1:', 0),
(11, 'Filter Paper', '15.00', '25.00', 23, '34', '/SamBiz/assets/img/d2a7f41669cb72df7bcce69fe75815c6.jpg', 'A small piece of paper for collecting solutes from solution.', 1, '11cm:0:,12.5cm:5:,15cm:3:', 0),
(13, 'Ethyl Acetate', '35.00', '45.00', 15, '7', '/SamBiz/assets/img/fe5b8ec732c2412eba5ec52f5c9c9f8f.jpg', 'An inflammable solvent', 1, '2.5L:6:2,5L:4:2', 0),
(14, 'Petri Dish', '25.00', '25.00', 21, '35', '/SamBiz/assets/img/44f2dad45ecc6212349987f8ea1d8d5d.jpg', 'A transparent container for collecting specimens. ', 1, 'Dozen:10:,Carton:80:', 0),
(15, 'Coffee', '10.00', '15.00', 25, '21', '/SamBiz/assets/img/cc95f776e179d8136abf553874c7fd32.jpg', 'Delicious and Tasty Coffee', 1, 'Mug:9:2,Jug:5:2', 0),
(16, 'Volkswagen 6464', '1000.00', '1200.00', 19, '17', '/SamBiz/assets/img/61390b6ad853e5261c88043b6601e44d.jpg', 'A beautiful and comfortable car', 1, 'Black:9:2,Blue:7:2', 0),
(17, 'Doughnuts', '20.00', '22.00', 24, '7', '/SamBiz/assets/img/6b461e39dc9feaefd9653b04823239df.jpg', 'Delicious doughnuts with or without sugar tastes the same', 1, 'Small:8:2,Medium:9:2,Large:6:2', 0),
(18, 'Mac book Air', '600.00', '650.00', 22, '20', '/SamBiz/assets/img/537d2d23cfff87d56c98f4c562a4cd12.jpg', 'Mac Book Air with 1 Terabyte HDD Hard disk\r\n12Gb Ram.', 1, '15 inches:6:2,14 inches:5:2', 0),
(19, 'i Phone 6', '500.00', '550.00', 19, '19', '/SamBiz/assets/img/8c7892694bac32c51e7c266a9623a0fe.jpg', 'A nice phone with quality selfie', 1, 'Blue:5:2,White:5:2,Gold:3:2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(175) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(175) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `full_name`, `email`, `password`, `last_login`) VALUES
(102, 'Jane Doe', 'code@school.com', '$2y$10$5hDsWFF/iUvX5XDOSSTmKe/ZgNfxkuj.43NPJO2eUAEk071O7996G', '2018-05-20 19:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `charge_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cart_id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(175) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(175) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(175) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(175) COLLATE utf8_unicode_ci NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `txn_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txn_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `charge_id`, `cart_id`, `full_name`, `email`, `street`, `street2`, `city`, `state`, `zip_code`, `country`, `sub_total`, `tax`, `grand_total`, `description`, `txn_type`, `txn_date`) VALUES
(43, 'WRereWR123EWRt3W', 12, 'Ogunsusi Temitayo', 'ogunsusitemitayo99@gmail.com', 'Awolumate', 'Opa', 'Ile-ife', 'Osun', '4566', 'Nigeria', '90.00', '7.83', '97.83', '4 items from Majog Nigeria.', 'charged', '2018-04-16 23:50:24'),
(44, 'WRereWR123EWRt3W', 13, 'Ogunsusi Temitayo', 'ogunsusitemitayo99@gmail.com', 'Zone 2, Awolumate ', 'Opa', 'Ile-ife', 'Osun', '5454', 'Nigeria', '2695.00', '234.47', '2929.47', '8 items from Majog Nigeria.', 'charged', '2018-04-17 01:11:32'),
(45, 'WRereWR123EWRt3W', 13, 'Ogunsusi Temitayo', 'ogunsusitemitayo99@gmail.com', 'Zone 2, Awolumate ', 'Opa', 'Ile-ife', 'Osun', '5454', 'Nigeria', '2695.00', '234.47', '2929.47', '8 items from Majog Nigeria.', 'charged', '2018-04-17 01:12:06'),
(46, 'WRereWR123EWRt3W', 14, 'Ajayi Joshua', 'ajajoshblessing@gmail.com', 'Seminary', 'Opa', 'Ile-ife', 'Osun', '4545', 'Nigeria', '90.00', '7.83', '97.83', '4 items from Majog Nigeria.', 'charged', '2018-04-17 12:03:21'),
(47, 'WRereWR123EWRt3W', 15, 'Samuel Timilehin', 'samtaylek@gmail.com', 'Fajuyi', 'Opa', 'Ile-ife', 'Osun', '5453', 'Nigeria', '2270.00', '197.49', '2467.49', '7 items from Majog Nigeria.', 'charged', '2018-04-17 15:24:03'),
(48, 'WRereWR123EWRt3W', 16, 'Samuel Timilehin', 'codes@school.com', 'sgd', 'ss', 'sdd', 'o', '3456', 'e', '90.00', '7.83', '97.83', '3 items from Majog Nigeria.', 'charged', '2018-04-17 15:32:01'),
(49, 'WRereWR123EWRt3W', 17, 'Ogunsusi Yomi', 'majogolowo@yahoo.co.uk', 'Awolumate', 'Opa', 'Ile-ife', 'Osun', '4354', 'Nigeria', '35.00', '3.05', '38.05', '1 item from Majog Nigeria.', 'charged', '2018-04-17 20:37:20'),
(50, 'WRereWR123EWRt3W', 18, 'Temitayo', 'samtaylek@gmail.com', 'A', 'sh', 'a', 'ssss', '4343', 's', '105.00', '9.14', '114.14', '5 items from Majog Nigeria.', 'charged', '2018-04-17 22:03:13'),
(51, 'WRereWR123EWRt3W', 19, 'Ogunsusi Temitayo', 'ogunsusitemitayo99@gmail.com', 'Orafidodo', 'Fajuyi Rd', 'Ile-ife', 'Osun', '54545', 'Nigeria', '30.00', '2.61', '32.61', '2 items from Majog Nigeria.', 'charged', '2018-04-20 14:50:12'),
(52, 'WRereWR123EWRt3W', 20, 'Ogunsusi Temitayo', '', '61, Fajuyi Rd', '', 'I', '', '', '', '35.00', '3.05', '38.05', '1 item from Majog Nigeria.', 'charged', '2018-04-20 14:52:29'),
(53, 'WRereWR123EWRt3W', 21, 'Ogunsusi Temitayo', 'samtaylek@gmail.com', 'Fajuyi', '', 'Ile-ife', 'Osun', '5454', 'Nigeria', '45.00', '3.92', '48.92', '2 items from Majog Nigeria.', 'charged', '2018-04-20 16:22:35'),
(54, 'WRereWR123EWRt3W', 24, 'Raqeeb', 'raqeeb@gmail.com', 'Fajuyi Hall', '', 'Ife', 'Osun', '54657', 'Nigeria', '60.00', '5.22', '65.22', '2 items from Majog Nigeria.', 'charged', '2018-05-17 14:35:13'),
(55, 'WRereWR123EWRt3W', 0, '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '', 'charged', '2018-05-17 14:36:54'),
(56, 'WRereWR123EWRt3W', 25, 'Jane Doe', 'code@school.com', 'Fajuyi', '', 'Ife', 'Osun', '45674', 'Nigeria', '15.00', '1.31', '16.31', '1 item from Majog Nigeria.', 'charged', '2018-05-17 14:39:16'),
(57, 'WRereWR123EWRt3W', 0, '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', '', 'charged', '2018-05-17 15:13:20'),
(58, 'charge_id', 26, 'Ogunsusi Temitayo', '', '', '', '', '', '', '', '30.00', '2.61', '32.61', '2 items from Majog Nigeria.', 'charged', '2018-05-26 17:38:23'),
(59, 'charge_id', 27, 'Ogunsusi Temitayo', 'samtaylek@gmail.com', 'Opa', '', 'Ife', 'Osun', '3455', 'Nigeria', '25.00', '2.18', '27.18', '1 item from Majog Nigeria.', 'charged', '2018-05-26 17:40:22'),
(60, 'charge_id', 28, 'Ogunsusi Temitayo', 'code@school.com', 'Opa', '', 'Ife', 'Osun', '4566', 'Nigeria', '25.00', '2.18', '27.18', '1 item from Majog Nigeria.', 'charged', '2018-05-27 21:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(175) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime NOT NULL,
  `permissions` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `join_date`, `last_login`, `permissions`) VALUES
(1, 'Ogunsusi Temitayo', 'samtaylek@gmail.com', '$2y$10$9M65FfXDPFe5BKB77S51uuWU9JpSysI9JELDt9FUq.P7IvPt2yA/K', '2018-04-03 10:55:54', '2018-05-27 22:22:32', 'admin,editor'),
(3, 'Test Testerson', 'test@cuticles.com', '$2y$10$NQcfRj0HFFMraK1D5gFzquaqbhy2655I9VTI1da60ckHVQmlKO44m', '2018-04-04 22:10:27', '2018-04-04 23:19:42', 'editor'),
(18, 'Peter Peterson', 'coding@developing.com', '$2y$10$Pa83jMPzNB7/q/v65ZSPuueHYyMqSKqis8wCWvP6gRzpRrnz1vKli', '2018-04-05 21:09:30', '2018-04-05 22:20:08', 'editor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_goods`
--
ALTER TABLE `custom_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `custom_goods`
--
ALTER TABLE `custom_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
