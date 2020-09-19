-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2020 at 01:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `os-banquanao`
--

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `Id` int(11) NOT NULL,
  `Size` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Color` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `Id` int(11) NOT NULL,
  `Email` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Payment_Method` int(11) NOT NULL,
  `Shipping_Method` int(11) NOT NULL,
  `Total` float NOT NULL,
  `Date` datetime NOT NULL,
  `Status` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billing_detail`
--

CREATE TABLE `billing_detail` (
  `Id_Billing` int(11) NOT NULL,
  `Id_Product` int(11) NOT NULL,
  `Count` int(11) NOT NULL,
  `Price_Buy` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `Id` int(11) NOT NULL,
  `Name` varchar(500) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Logo` varchar(500) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Description` varchar(500) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Id` int(11) NOT NULL,
  `Name` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Image` varchar(500) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Description` longtext COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ParentCategory` int(11) DEFAULT NULL,
  `Count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Email` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Name` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Phone` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Country` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `City` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Address` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `Id` int(11) NOT NULL,
  `Name` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `Name` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Image` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Brand` int(11) NOT NULL,
  `SKU` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Attribute` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Sale_Price` float NOT NULL,
  `Description` longtext COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Visibility` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_cate`
--

CREATE TABLE `product_cate` (
  `Id_Category` int(11) NOT NULL,
  `Id_Product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_method`
--

CREATE TABLE `shipping_method` (
  `Id` int(11) NOT NULL,
  `Name` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statistical`
--

CREATE TABLE `statistical` (
  `Id_Product` int(11) NOT NULL,
  `View` int(11) DEFAULT NULL,
  `Purchase` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `Id_Product` int(11) NOT NULL,
  `Price_In` float NOT NULL,
  `Count` int(11) NOT NULL DEFAULT 0,
  `Stock` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `billing_detail`
--
ALTER TABLE `billing_detail`
  ADD PRIMARY KEY (`Id_Billing`,`Id_Product`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `product_cate`
--
ALTER TABLE `product_cate`
  ADD PRIMARY KEY (`Id_Category`,`Id_Product`);

--
-- Indexes for table `shipping_method`
--
ALTER TABLE `shipping_method`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `statistical`
--
ALTER TABLE `statistical`
  ADD PRIMARY KEY (`Id_Product`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`Id_Product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_method`
--
ALTER TABLE `shipping_method`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
