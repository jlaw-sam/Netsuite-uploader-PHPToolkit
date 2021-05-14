-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 06:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netsuite`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `internalId` varchar(255) NOT NULL,
  `acctNumber` varchar(255) NOT NULL,
  `acctName` varchar(255) NOT NULL,
  `acctType` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `subsidiary` varchar(255) NOT NULL,
  `parent` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `internalId`, `acctNumber`, `acctName`, `acctType`, `description`, `currency`, `subsidiary`, `parent`, `updated_at`) VALUES
(7, '0', '2', 'Balance  Pay Card Holding Account ', 'Bank', 'Pay Card Holding Account ', '0', 'IHS Holding', '2434', '2021-04-08 16:04:00'),
(8, '0', '3', 'Balance Prepaid Ad Valorem Taxes ', 'Other Asset', 'Prepaid Ad Valorem Taxes ', '0', 'IHS Holding : Commercial Property Investments', '2434', '2021-04-08 16:04:00'),
(9, '0', '4', 'Balance Prepaid Ada Parking - GBS ', 'Other Asset', 'Prepaid Ada Parking - GBS ', '0', 'IHS Holding : Commercial Property Investments', '2434', '2021-04-08 16:04:00'),
(10, '0', '2', 'Balance  Pay Card Holding Account ', 'Bank', 'Pay Card Holding Account ', '0', 'IHS Holding', '2434', '2021-04-08 16:26:44'),
(11, '0', '3', 'Balance Prepaid Ad Valorem Taxes ', 'Other Asset', 'Prepaid Ad Valorem Taxes ', '0', 'IHS Holding : Commercial Property Investments', '2434', '2021-04-08 16:26:44'),
(12, '0', '4', 'Balance Prepaid Ada Parking - GBS ', 'Other Asset', 'Prepaid Ada Parking - GBS ', '0', 'IHS Holding : Commercial Property Investments', '2434', '2021-04-08 16:26:44'),
(13, '0', '2', 'Balance  Pay Card Holding Account ', 'Bank', 'Pay Card Holding Account ', '0', 'IHS Holding', '2343', '2021-04-08 16:30:30'),
(14, '0', '3', 'Balance Prepaid Ad Valorem Taxes ', 'Other Asset', 'Prepaid Ad Valorem Taxes ', '0', 'IHS Holding : Commercial Property Investments', '2343', '2021-04-08 16:30:30'),
(15, '0', '4', 'Balance Prepaid Ada Parking - GBS ', 'Other Asset', 'Prepaid Ada Parking - GBS ', '0', 'IHS Holding : Commercial Property Investments', '2343', '2021-04-08 16:30:30'),
(16, '0', '2', 'Balance  Pay Card Holding Account ', 'Bank', 'Pay Card Holding Account ', '0', 'IHS Holding', '2434', '2021-04-08 16:33:36'),
(17, '0', '3', 'Balance Prepaid Ad Valorem Taxes ', 'Other Asset', 'Prepaid Ad Valorem Taxes ', '0', 'IHS Holding : Commercial Property Investments', '2434', '2021-04-08 16:33:36'),
(18, '0', '4', 'Balance Prepaid Ada Parking - GBS ', 'Other Asset', 'Prepaid Ada Parking - GBS ', '0', 'IHS Holding : Commercial Property Investments', '2434', '2021-04-08 16:33:36'),
(19, '0', '2', 'Balance  Pay Card Holding Account ', 'Bank', 'Pay Card Holding Account ', '0', 'IHS Holding', '2343', '2021-04-08 16:42:40'),
(20, '0', '3', 'Balance Prepaid Ad Valorem Taxes ', 'Other Asset', 'Prepaid Ad Valorem Taxes ', '0', 'IHS Holding : Commercial Property Investments', '2343', '2021-04-08 16:42:40'),
(21, '0', '4', 'Balance Prepaid Ada Parking - GBS ', 'Other Asset', 'Prepaid Ada Parking - GBS ', '0', 'IHS Holding : Commercial Property Investments', '2343', '2021-04-08 16:42:40'),
(22, '0', '2', 'Balance  Pay Card Holding Account ', 'Bank', 'Pay Card Holding Account ', '0', 'IHS Holding', '2343', '2021-04-08 16:43:42'),
(23, '0', '3', 'Balance Prepaid Ad Valorem Taxes ', 'Other Asset', 'Prepaid Ad Valorem Taxes ', '0', 'IHS Holding : Commercial Property Investments', '2343', '2021-04-08 16:43:42'),
(24, '0', '4', 'Balance Prepaid Ada Parking - GBS ', 'Other Asset', 'Prepaid Ada Parking - GBS ', '0', 'IHS Holding : Commercial Property Investments', '2343', '2021-04-08 16:43:42'),
(25, '0', '2', 'Balance  Pay Card Holding Account ', 'Bank', 'Pay Card Holding Account ', '0', 'IHS Holding', '2343', '2021-04-08 16:44:34'),
(26, '0', '3', 'Balance Prepaid Ad Valorem Taxes ', 'Other Asset', 'Prepaid Ad Valorem Taxes ', '0', 'IHS Holding : Commercial Property Investments', '2343', '2021-04-08 16:44:34'),
(27, '0', '4', 'Balance Prepaid Ada Parking - GBS ', 'Other Asset', 'Prepaid Ada Parking - GBS ', '0', 'IHS Holding : Commercial Property Investments', '2343', '2021-04-08 16:44:34'),
(28, '0', '2', 'Balance  Pay Card Holding Account ', 'Bank', 'Pay Card Holding Account ', '0', 'IHS Holding', '2343', '2021-04-08 16:46:59'),
(29, '0', '3', 'Balance Prepaid Ad Valorem Taxes ', 'Other Asset', 'Prepaid Ad Valorem Taxes ', '0', 'IHS Holding : Commercial Property Investments', '2343', '2021-04-08 16:46:59'),
(30, '0', '4', 'Balance Prepaid Ada Parking - GBS ', 'Other Asset', 'Prepaid Ada Parking - GBS ', '0', 'IHS Holding : Commercial Property Investments', '2343', '2021-04-08 16:46:59'),
(31, '0', '2', 'Balance  Pay Card Holding Account ', 'Bank', 'Pay Card Holding Account ', '0', 'IHS Holding', '2343', '2021-04-08 16:48:27'),
(32, '0', '3', 'Balance Prepaid Ad Valorem Taxes ', 'Other Asset', 'Prepaid Ad Valorem Taxes ', '0', 'IHS Holding : Commercial Property Investments', '2343', '2021-04-08 16:48:27'),
(33, '0', '4', 'Balance Prepaid Ada Parking - GBS ', 'Other Asset', 'Prepaid Ada Parking - GBS ', '0', 'IHS Holding : Commercial Property Investments', '2343', '2021-04-08 16:48:27'),
(34, '0', '2', 'Balance  Pay Card Holding Account ', 'Bank', 'Pay Card Holding Account ', '0', 'IHS Holding', '2343', '2021-04-08 16:50:19'),
(35, '0', '3', 'Balance Prepaid Ad Valorem Taxes ', 'Other Asset', 'Prepaid Ad Valorem Taxes ', '0', 'IHS Holding : Commercial Property Investments', '2343', '2021-04-08 16:50:19'),
(36, '0', '4', 'Balance Prepaid Ada Parking - GBS ', 'Other Asset', 'Prepaid Ada Parking - GBS ', '0', 'IHS Holding : Commercial Property Investments', '2343', '2021-04-08 16:50:19'),
(37, '0', '2', 'Balance  Pay Card Holding Account ', 'Bank', 'Pay Card Holding Account ', '0', 'IHS Holding', '0', '2021-04-08 16:52:27'),
(38, '0', '3', 'Balance Prepaid Ad Valorem Taxes ', 'Other Asset', 'Prepaid Ad Valorem Taxes ', '0', 'IHS Holding : Commercial Property Investments', '0', '2021-04-08 16:52:27'),
(39, '0', '4', 'Balance Prepaid Ada Parking - GBS ', 'Other Asset', 'Prepaid Ada Parking - GBS ', '0', 'IHS Holding : Commercial Property Investments', '0', '2021-04-08 16:52:27'),
(40, '0', '2', 'Balance  Pay Card Holding Account ', 'Bank', 'Pay Card Holding Account ', '0', 'IHS Holding', '0', '2021-04-08 16:55:07'),
(41, '0', '3', 'Balance Prepaid Ad Valorem Taxes ', 'Other Asset', 'Prepaid Ad Valorem Taxes ', '0', 'IHS Holding : Commercial Property Investments', '0', '2021-04-08 16:55:07'),
(42, '0', '4', 'Balance Prepaid Ada Parking - GBS ', 'Other Asset', 'Prepaid Ada Parking - GBS ', '0', 'IHS Holding : Commercial Property Investments', '0', '2021-04-08 16:55:07'),
(43, '0', '2', 'Balance  Pay Card Holding Account ', 'Bank', 'Pay Card Holding Account ', '0', 'IHS Holding', '0', '2021-04-08 17:12:54'),
(44, '0', '3', 'Balance Prepaid Ad Valorem Taxes ', 'Other Asset', 'Prepaid Ad Valorem Taxes ', '0', 'IHS Holding : Commercial Property Investments', '0', '2021-04-08 17:12:54'),
(45, '0', '4', 'Balance Prepaid Ada Parking - GBS ', 'Other Asset', 'Prepaid Ada Parking - GBS ', '0', 'IHS Holding : Commercial Property Investments', '0', '2021-04-08 17:12:54'),
(46, '0', '2', 'Balance  Pay Card Holding Account ', 'Bank', 'Pay Card Holding Account ', '0', 'IHS Holding', '0', '2021-04-08 17:36:48'),
(47, '0', '3', 'Balance Prepaid Ad Valorem Taxes ', 'Other Asset', 'Prepaid Ad Valorem Taxes ', '0', 'IHS Holding : Commercial Property Investments', '0', '2021-04-08 17:36:48'),
(48, '0', '4', 'Balance Prepaid Ada Parking - GBS ', 'Other Asset', 'Prepaid Ada Parking - GBS ', '0', 'IHS Holding : Commercial Property Investments', '0', '2021-04-08 17:36:48'),
(49, '0', '2', 'Balance  Pay Card Holding Account ', 'Bank', '0', '0', 'IHS Holding', '0', '2021-04-08 17:40:44'),
(50, '0', '3', 'Balance Prepaid Ad Valorem Taxes ', 'Other Asset', '0', '0', 'IHS Holding : Commercial Property Investments', '0', '2021-04-08 17:40:44'),
(51, '0', '4', 'Balance Prepaid Ada Parking - GBS ', 'Other Asset', '0', '0', 'IHS Holding : Commercial Property Investments', '0', '2021-04-08 17:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `accountsinternalid`
--

CREATE TABLE `accountsinternalid` (
  `id` int(11) NOT NULL,
  `internalId` varchar(255) NOT NULL,
  `acctNumber` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accountsinternalid`
--
ALTER TABLE `accountsinternalid`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `accountsinternalid`
--
ALTER TABLE `accountsinternalid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
