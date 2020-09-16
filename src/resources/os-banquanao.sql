-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2020 at 01:38 PM
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
  `Payment_Method` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Shipping_Method` int(11) NOT NULL,
  `Tax` float NOT NULL,
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
  `Brand` int(11) DEFAULT NULL,
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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `Name` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Image` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
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
-- Table structure for table `product_tag`
--

CREATE TABLE `product_tag` (
  `Id_Product` int(11) NOT NULL,
  `Id_Tag` int(11) NOT NULL
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
  `Rank` int(11) DEFAULT NULL,
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
  `Tax` float NOT NULL,
  `Stock` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `Id` int(11) NOT NULL,
  `Tag_Name` varchar(500) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
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
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Shipping_Method` (`Shipping_Method`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Payment_Method` (`Payment_Method`),
  ADD UNIQUE KEY `Status` (`Status`);

--
-- Indexes for table `billing_detail`
--
ALTER TABLE `billing_detail`
  ADD PRIMARY KEY (`Id_Billing`,`Id_Product`),
  ADD UNIQUE KEY `Count` (`Count`),
  ADD UNIQUE KEY `Price_Buy` (`Price_Buy`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD UNIQUE KEY `Brand` (`Brand`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Attribute` (`Attribute`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `product_cate`
--
ALTER TABLE `product_cate`
  ADD PRIMARY KEY (`Id_Category`,`Id_Product`);

--
-- Indexes for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD PRIMARY KEY (`Id_Product`,`Id_Tag`);

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
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`Id`);

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
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_method`
--
ALTER TABLE `shipping_method`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
