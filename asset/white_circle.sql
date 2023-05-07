-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2023 at 06:29 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `white_circle`
--
CREATE DATABASE IF NOT EXISTS `white_circle` DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci;
USE `white_circle`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--
-- Creation: Apr 08, 2023 at 03:42 PM
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `Categories_ID` int(10) NOT NULL,
  `Categories_Name` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Categories_ID`, `Categories_Name`, `create_time`, `update_time`) VALUES
(1, 'bag 1', '2023-04-08 15:45:14', '2023-04-08 18:41:19'),
(6, 'bawang', '2023-04-10 08:58:28', '2023-04-12 10:39:56'),
(7, 'wewwewewewe', '2023-04-10 12:19:06', '2023-04-12 10:40:01');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--
-- Creation: Apr 16, 2023 at 12:43 PM
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `Product_ID` int(10) NOT NULL,
  `Categories_ID` int(10) NOT NULL,
  `Product_Name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `Product_Path` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `Product_Price` decimal(10,2) NOT NULL,
  `Product_Weight` decimal(10,2) NOT NULL,
  `Product_Thumbnail` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Product_Stock` int(11) NOT NULL,
  `Product_Description` text COLLATE utf8_czech_ci NOT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--
-- Creation: Apr 14, 2023 at 07:03 PM
--

DROP TABLE IF EXISTS `products_images`;
CREATE TABLE `products_images` (
  `ProductImages_ID` int(10) NOT NULL,
  `Product_ID` int(10) NOT NULL,
  `Product_Image` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Categories_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`ProductImages_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Categories_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `ProductImages_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
