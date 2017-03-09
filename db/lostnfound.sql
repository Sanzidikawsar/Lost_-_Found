-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2015 at 08:10 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lostnfound`
--

-- --------------------------------------------------------

--
-- Table structure for table `guidelines`
--

CREATE TABLE IF NOT EXISTS `guidelines` (
  `id` int(45) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `example` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(45) NOT NULL,
  `modified_by` int(45) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `product_code` varchar(255) NOT NULL,
  `product_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `title`, `description`, `product_code`, `product_picture`) VALUES
(2, 2, 'Maximusa', 'This is the first mobile of Shobuj', '562baf91511e7', NULL),
(3, 5, 'vanity bag', 'vanity bag with a lot of cosmetics ', '562bdd60148fc', NULL),
(4, 5, 'Beautiful Bag ', 'Description of Beautiful bag ', '562bddb638658', NULL),
(5, 5, 'Sharee', '3 Sharee', '562bdfe3769ac', NULL),
(6, 5, 'My Samsung Mobile', 'Yes this is My Samsung Mobile', '562be0747cb5d', NULL),
(7, 5, 'sfsdfsdf', 'sdfsdfsdf', '562be0e6d9328', NULL),
(8, 5, 'Testing', 'Testing Description', '562be7c2db412', NULL),
(9, 5, 'fsfs', 'fsfsfs', '562be7f499424', NULL),
(10, 5, 'sfdsdfs', 'sdfsdfs', '562be83e786de', NULL),
(11, 5, 'sdfsdf', 'sdfsdfs', '562be85d1a28c', NULL),
(12, 5, 'again', 'test', '562beaae3bcf6', NULL),
(13, 7, 'Apple macbook ', 'This is about apple macbook ', '562c7cdc6d629', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip_code` varchar(16) NOT NULL,
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `first_name`, `last_name`, `password`, `mobile_number`, `address`, `zip_code`, `city`, `district`, `status`, `created`, `created_by`, `modified`, `modified_by`, `deleted_at`, `profile_picture`) VALUES
(1, 58, '', '', '25121990', '', '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '2015-10-24 16:15:33', ''),
(2, 1, 'Mubin', 'Ahamed', '25121990', '01717 613327', '', '', 'Gazipur', '', 0, '0000-00-00 00:00:00', 0, '2015-10-24 20:37:09', 0, '2015-10-24 18:37:13', ''),
(3, 2, 'Shobuj', 'Ahamed', '25121990', '01972927572', 'Joydebpur, Gaizpur, Dhaka, Bangladesh', '1700', '', '', 0, '0000-00-00 00:00:00', 0, '2015-10-24 18:20:06', 0, '2015-10-24 16:20:41', ''),
(4, 3, 'BITM', 'BASIS', '25121990', '01717-61332728', 'Dhaka, Bangladesh', '23424', 'Kushtia', 'Dhaka', 0, '0000-00-00 00:00:00', 0, '2015-10-24 20:32:52', 0, '2015-10-24 18:32:57', ''),
(5, 4, 'Sumon', 'Mahmud', '25121990', '', 'Kushtia', '3424', 'Gazipur', 'Gazipur', 0, '0000-00-00 00:00:00', 0, '2015-10-24 20:23:47', 0, '2015-10-24 18:23:54', ''),
(6, 5, 'Mukta', 'Mahmud', '25121990', '01717-61332728', 'Dhaka, Bangladesh', '25242', 'Kushtia', 'Bangladesh', 0, '0000-00-00 00:00:00', 0, '2015-10-25 07:24:53', 0, '2015-10-25 06:25:01', ''),
(7, 6, '', '', '25121990', '', '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '2015-10-24 21:05:21', ''),
(8, 7, '', '', '25121990', '', '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '2015-10-25 06:29:21', ''),
(9, 8, '', '', '25121990', '', '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '2015-10-25 06:41:45', ''),
(10, 9, '', '', '25121990', '', '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '2015-10-25 06:46:51', ''),
(11, 10, '', '', '25121990', '', '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '2015-10-25 06:48:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(4) NOT NULL,
  `username` varchar(63) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_admin`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'mubin', 'mubin@gmail.com', '25121990', 1, '2015-10-24 18:16:58', NULL, NULL, NULL),
(2, 'shobuj', 'shobuj@google.com', '25121990', 0, '2015-10-24 18:18:32', NULL, NULL, NULL),
(3, 'bitm', 'bitm@bitm.com', '25121990', 1, '2015-10-24 19:48:03', NULL, NULL, NULL),
(4, 'sumonmhd', 'sumonmhd@gmail.com', '25121990', 1, '2015-10-24 19:49:17', NULL, NULL, NULL),
(5, 'muktamhd', 'muktamhd@mukta.com', '25121990', 0, '2015-10-24 20:33:08', NULL, NULL, NULL),
(6, 'sumonmhd', 'sumonmhd@gmail.com', '25121990', 0, '2015-10-24 23:05:03', NULL, NULL, NULL),
(7, 'apple', 'apple@apple.com', '25121990', 0, '2015-10-25 07:29:02', NULL, NULL, NULL),
(8, 'dsfsdfsf', 'muktamhd@fsfsdf.om', '25121990', 0, '2015-10-25 07:41:25', NULL, NULL, NULL),
(9, 'gooduser', 'gooduser@gmail.com', '25121990', 0, '2015-10-25 07:46:26', NULL, NULL, NULL),
(10, 'bestuser', 'bestuser@google.com', '25121990', 0, '2015-10-25 07:47:20', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guidelines`
--
ALTER TABLE `guidelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
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
-- AUTO_INCREMENT for table `guidelines`
--
ALTER TABLE `guidelines`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
