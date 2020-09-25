-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 06:14 AM
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

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`Id`, `Size`, `Color`) VALUES
(1, 'S', 'Đen'),
(2, 'M', 'Đen'),
(3, 'L', 'Đen'),
(4, 'XL', 'Đen'),
(5, 'S', 'Trắng'),
(6, 'M', 'Trắng'),
(7, 'L', 'Trắng'),
(8, 'XL', 'Trắng'),
(9, 'S', 'Đỏ'),
(10, 'M', 'Đỏ'),
(11, 'L', 'Đỏ'),
(12, 'XL', 'Đỏ'),
(13, 'S', 'Xanh dương'),
(14, 'M', 'Xanh dương'),
(15, 'L', 'Xanh dương'),
(16, 'XL', 'Xanh dương'),
(17, 'S', 'Vàng'),
(18, 'M', 'Vàng'),
(19, 'L', 'Vàng'),
(20, 'XL', 'Vàng'),
(21, 'S', 'Cam'),
(22, 'M', 'Cam'),
(23, 'L', 'Cam'),
(24, 'XL', 'Cam'),
(25, 'S', 'Xám'),
(26, 'M', 'Xám'),
(27, 'L', 'Xám'),
(28, 'XL', 'Xám'),
(29, 'S', 'Xanh lá cây'),
(30, 'M', 'Xanh lá cây'),
(31, 'L', 'Xanh lá cây'),
(32, 'XL', 'Xanh lá cây');

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

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`Id`, `Name`, `Logo`, `Description`) VALUES
(1, 'Gucci', 'LogoImage', 'Đây là thương hiệu của Gucci'),
(2, 'Louis Vuitton', 'LogoImage', 'Đây là thương hiệu của Louis Vuitton'),
(3, 'Chanel', 'LogoImage', 'Đây là thương hiệu của Chanel'),
(4, 'Dior', 'LogoImage', 'Đây là thương hiệu của Dior'),
(5, 'Hermes', 'LogoImage', 'Đây là thương hiệu của Hermes');

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

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id`, `Name`, `Image`, `Description`, `ParentCategory`, `Count`) VALUES
(1, 'Áo thun', 'Image', 'Đây là áo thun', NULL, 0),
(2, 'Áo thun tay ngắn', 'Image', 'Đây là áo thun tay ngắn', 1, 0),
(3, 'Áo thun tay dài', 'Image', 'Đây là áo thun tay dài', 1, 0),
(4, 'Áo sơ mi', 'Image', 'Đây là áo sơ mi', NULL, 0),
(5, 'Áo sơ mi tay ngắn', 'Image', 'Đây là sơ mi tay ngắn', 4, 0),
(6, 'Áo sơ mi tay dài', 'Image', 'Đây là áo sơ mi tay dài', 4, 0);

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
  `Name` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Status` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
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

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `Name`, `Image`, `Brand`, `SKU`, `Attribute`, `Price`, `Sale_Price`, `Description`, `Visibility`, `Date`) VALUES
(193, 'Áo thun tay ngắn Gucci 1', 'Image', 1, 'G1', 1, 200, 190, 'Đây là áo thun tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(194, 'Áo thun tay ngắn Gucci 1', 'Image', 1, 'G1', 2, 200, 190, 'Đây là áo thun tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(195, 'Áo thun tay ngắn Gucci 1', 'Image', 1, 'G1', 3, 200, 190, 'Đây là áo thun tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(196, 'Áo thun tay ngắn Gucci 1', 'Image', 1, 'G1', 4, 200, 190, 'Đây là áo thun tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(197, 'Áo thun tay ngắn Gucci 2', 'Image', 1, 'G2', 5, 210, 190, 'Đây là áo thun tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(198, 'Áo thun tay ngắn Gucci 2', 'Image', 1, 'G2', 6, 210, 190, 'Đây là áo thun tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(199, 'Áo thun tay ngắn Gucci 2', 'Image', 1, 'G2', 7, 210, 190, 'Đây là áo thun tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(200, 'Áo thun tay ngắn Gucci 2', 'Image', 1, 'G2', 8, 210, 190, 'Đây là áo thun tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(201, 'Áo thun tay ngắn Gucci 3', 'Image', 1, 'G3', 9, 200, 200, 'Đây là áo thun tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(202, 'Áo thun tay ngắn Gucci 3', 'Image', 1, 'G3', 10, 200, 200, 'Đây là áo thun tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(203, 'Áo thun tay ngắn Gucci 3', 'Image', 1, 'G3', 11, 200, 200, 'Đây là áo thun tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(204, 'Áo thun tay ngắn Gucci 3', 'Image', 1, 'G3', 12, 200, 200, 'Đây là áo thun tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(205, 'Áo thun tay dài Gucci 1', 'Image', 1, 'G4', 1, 250, 190, 'Đây là áo thun tay dài của Gucci', 'Pulish', '2020-09-18'),
(206, 'Áo thun tay dài Gucci 1', 'Image', 1, 'G4', 2, 250, 190, 'Đây là áo thun tay dài của Gucci', 'Pulish', '2020-09-18'),
(207, 'Áo thun tay dài Gucci 1', 'Image', 1, 'G4', 3, 250, 190, 'Đây là áo thun tay dài của Gucci', 'Pulish', '2020-09-18'),
(208, 'Áo thun tay dài Gucci 1', 'Image', 1, 'G4', 4, 250, 190, 'Đây là áo thun tay dài của Gucci', 'Pulish', '2020-09-18'),
(209, 'Áo thun tay dài Gucci 2', 'Image', 1, 'G5', 5, 270, 190, 'Đây là áo thun tay dài của Gucci', 'Pulish', '2020-09-18'),
(210, 'Áo thun tay dài Gucci 2', 'Image', 1, 'G5', 6, 270, 190, 'Đây là áo thun tay dài của Gucci', 'Pulish', '2020-09-18'),
(211, 'Áo thun tay dài Gucci 2', 'Image', 1, 'G5', 7, 270, 190, 'Đây là áo thun tay dài của Gucci', 'Pulish', '2020-09-18'),
(212, 'Áo thun tay dài Gucci 2', 'Image', 1, 'G5', 8, 270, 190, 'Đây là áo thun tay dài của Gucci', 'Pulish', '2020-09-18'),
(213, 'Áo thun tay dài Gucci 3', 'Image', 1, 'G6', 9, 250, 200, 'Đây là áo thun tay dài của Gucci', 'Pulish', '2020-09-18'),
(214, 'Áo thun tay dài Gucci 3', 'Image', 1, 'G6', 10, 250, 200, 'Đây là áo thun tay dài của Gucci', 'Pulish', '2020-09-18'),
(215, 'Áo thun tay dài Gucci 3', 'Image', 1, 'G6', 11, 250, 200, 'Đây là áo thun tay dài của Gucci', 'Pulish', '2020-09-18'),
(216, 'Áo thun tay dài Gucci 3', 'Image', 1, 'G6', 12, 250, 200, 'Đây là áo thun tay dài của Gucci', 'Pulish', '2020-09-18'),
(217, 'Áo sơ mi tay ngắn Gucci 1', 'Image', 1, 'G7', 1, 200, 190, 'Đây là áo sơ mi tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(218, 'Áo sơ mi tay ngắn Gucci 1', 'Image', 1, 'G7', 2, 200, 190, 'Đây là áo sơ mi tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(219, 'Áo sơ mi tay ngắn Gucci 1', 'Image', 1, 'G7', 3, 200, 190, 'Đây là áo sơ mi tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(220, 'Áo sơ mi tay ngắn Gucci 1', 'Image', 1, 'G7', 4, 200, 190, 'Đây là áo sơ mi tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(221, 'Áo sơ mi tay ngắn Gucci 2', 'Image', 1, 'G8', 5, 210, 190, 'Đây là áo sơ mi tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(222, 'Áo sơ mi tay ngắn Gucci 2', 'Image', 1, 'G8', 6, 210, 190, 'Đây là áo sơ mi tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(223, 'Áo sơ mi tay ngắn Gucci 2', 'Image', 1, 'G8', 7, 210, 190, 'Đây là áo sơ mi tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(224, 'Áo sơ mi tay ngắn Gucci 2', 'Image', 1, 'G8', 8, 210, 190, 'Đây là áo sơ mi tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(225, 'Áo sơ mi tay ngắn Gucci 3', 'Image', 1, 'G9', 9, 200, 200, 'Đây là áo sơ mi tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(226, 'Áo sơ mi tay ngắn Gucci 3', 'Image', 1, 'G9', 10, 200, 200, 'Đây là áo sơ mi tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(227, 'Áo sơ mi tay ngắn Gucci 3', 'Image', 1, 'G9', 11, 200, 200, 'Đây là áo sơ mi tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(228, 'Áo sơ mi tay ngắn Gucci 3', 'Image', 1, 'G9', 12, 200, 200, 'Đây là áo sơ mi tay ngắn của Gucci', 'Pulish', '2020-09-18'),
(229, 'Áo sơ mi tay dài Gucci 1', 'Image', 1, 'G10', 1, 250, 190, 'Đây là áo sơ mi tay dài của Gucci', 'Pulish', '2020-09-18'),
(230, 'Áo sơ mi tay dài Gucci 1', 'Image', 1, 'G10', 2, 250, 190, 'Đây là áo sơ mi tay dài của Gucci', 'Pulish', '2020-09-18'),
(231, 'Áo sơ mi tay dài Gucci 1', 'Image', 1, 'G10', 3, 250, 190, 'Đây là áo sơ mi tay dài của Gucci', 'Pulish', '2020-09-18'),
(232, 'Áo sơ mi tay dài Gucci 1', 'Image', 1, 'G10', 4, 250, 190, 'Đây là áo sơ mi tay dài của Gucci', 'Pulish', '2020-09-18'),
(233, 'Áo sơ mi tay dài Gucci 2', 'Image', 1, 'G11', 5, 270, 190, 'Đây là áo sơ mi tay dài của Gucci', 'Pulish', '2020-09-18'),
(234, 'Áo sơ mi tay dài Gucci 2', 'Image', 1, 'G11', 6, 270, 190, 'Đây là áo sơ mi tay dài của Gucci', 'Pulish', '2020-09-18'),
(235, 'Áo sơ mi tay dài Gucci 2', 'Image', 1, 'G11', 7, 270, 190, 'Đây là áo sơ mi tay dài của Gucci', 'Pulish', '2020-09-18'),
(236, 'Áo sơ mi tay dài Gucci 2', 'Image', 1, 'G11', 8, 270, 190, 'Đây là áo sơ mi tay dài của Gucci', 'Pulish', '2020-09-18'),
(237, 'Áo sơ mi tay dài Gucci 3', 'Image', 1, 'G12', 9, 250, 200, 'Đây là áo sơ mi tay dài của Gucci', 'Pulish', '2020-09-18'),
(238, 'Áo sơ mi tay dài Gucci 3', 'Image', 1, 'G12', 10, 250, 200, 'Đây là áo sơ mi tay dài của Gucci', 'Pulish', '2020-09-18'),
(239, 'Áo sơ mi tay dài Gucci 3', 'Image', 1, 'G12', 11, 250, 200, 'Đây là áo sơ mi tay dài của Gucci', 'Pulish', '2020-09-18'),
(240, 'Áo sơ mi tay dài Gucci 3', 'Image', 1, 'G12', 12, 250, 200, 'Đây là áo sơ mi tay dài của Gucci', 'Pulish', '2020-09-18'),
(241, 'Áo thun tay ngắn Louis Vuitton 1', 'Image', 1, 'LV1', 1, 200, 190, 'Đây là áo thun tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(242, 'Áo thun tay ngắn Louis Vuitton 1', 'Image', 1, 'LV1', 2, 200, 190, 'Đây là áo thun tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(243, 'Áo thun tay ngắn Louis Vuitton 1', 'Image', 1, 'LV1', 3, 200, 190, 'Đây là áo thun tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(244, 'Áo thun tay ngắn Louis Vuitton 1', 'Image', 1, 'LV1', 4, 200, 190, 'Đây là áo thun tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(245, 'Áo thun tay ngắn Louis Vuitton 2', 'Image', 1, 'LV2', 5, 210, 190, 'Đây là áo thun tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(246, 'Áo thun tay ngắn Louis Vuitton 2', 'Image', 1, 'LV2', 6, 210, 190, 'Đây là áo thun tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(247, 'Áo thun tay ngắn Louis Vuitton 2', 'Image', 1, 'LV2', 7, 210, 190, 'Đây là áo thun tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(248, 'Áo thun tay ngắn Louis Vuitton 2', 'Image', 1, 'LV2', 8, 210, 190, 'Đây là áo thun tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(249, 'Áo thun tay ngắn Louis Vuitton 3', 'Image', 1, 'LV3', 9, 200, 200, 'Đây là áo thun tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(250, 'Áo thun tay ngắn Louis Vuitton 3', 'Image', 1, 'LV3', 10, 200, 200, 'Đây là áo thun tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(251, 'Áo thun tay ngắn Louis Vuitton 3', 'Image', 1, 'LV3', 11, 200, 200, 'Đây là áo thun tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(252, 'Áo thun tay ngắn Louis Vuitton 3', 'Image', 1, 'LV3', 12, 200, 200, 'Đây là áo thun tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(253, 'Áo thun tay dài Louis Vuitton 1', 'Image', 1, 'LV4', 1, 250, 190, 'Đây là áo thun tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(254, 'Áo thun tay dài Louis Vuitton 1', 'Image', 1, 'LV4', 2, 250, 190, 'Đây là áo thun tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(255, 'Áo thun tay dài Louis Vuitton 1', 'Image', 1, 'LV4', 3, 250, 190, 'Đây là áo thun tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(256, 'Áo thun tay dài Louis Vuitton 1', 'Image', 1, 'LV4', 4, 250, 190, 'Đây là áo thun tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(257, 'Áo thun tay dài Louis Vuitton 2', 'Image', 1, 'LV5', 5, 270, 190, 'Đây là áo thun tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(258, 'Áo thun tay dài Louis Vuitton 2', 'Image', 1, 'LV5', 6, 270, 190, 'Đây là áo thun tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(259, 'Áo thun tay dài Louis Vuitton 2', 'Image', 1, 'LV5', 7, 270, 190, 'Đây là áo thun tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(260, 'Áo thun tay dài Louis Vuitton 2', 'Image', 1, 'LV5', 8, 270, 190, 'Đây là áo thun tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(261, 'Áo thun tay dài Louis Vuitton 3', 'Image', 1, 'LV6', 9, 250, 200, 'Đây là áo thun tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(262, 'Áo thun tay dài Louis Vuitton 3', 'Image', 1, 'LV6', 10, 250, 200, 'Đây là áo thun tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(263, 'Áo thun tay dài Louis Vuitton 3', 'Image', 1, 'LV6', 11, 250, 200, 'Đây là áo thun tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(264, 'Áo thun tay dài Louis Vuitton 3', 'Image', 1, 'LV6', 12, 250, 200, 'Đây là áo thun tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(265, 'Áo sơ mi tay ngắn Louis Vuitton 1', 'Image', 1, 'LV7', 1, 200, 190, 'Đây là áo sơ mi tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(266, 'Áo sơ mi tay ngắn Louis Vuitton 1', 'Image', 1, 'LV7', 2, 200, 190, 'Đây là áo sơ mi tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(267, 'Áo sơ mi tay ngắn Louis Vuitton 1', 'Image', 1, 'LV7', 3, 200, 190, 'Đây là áo sơ mi tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(268, 'Áo sơ mi tay ngắn Louis Vuitton 1', 'Image', 1, 'LV7', 4, 200, 190, 'Đây là áo sơ mi tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(269, 'Áo sơ mi tay ngắn Louis Vuitton 2', 'Image', 1, 'LV8', 5, 210, 190, 'Đây là áo sơ mi tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(270, 'Áo sơ mi tay ngắn Louis Vuitton 2', 'Image', 1, 'LV8', 6, 210, 190, 'Đây là áo sơ mi tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(271, 'Áo sơ mi tay ngắn Louis Vuitton 2', 'Image', 1, 'LV8', 7, 210, 190, 'Đây là áo sơ mi tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(272, 'Áo sơ mi tay ngắn Louis Vuitton 2', 'Image', 1, 'LV8', 8, 210, 190, 'Đây là áo sơ mi tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(273, 'Áo sơ mi tay ngắn Louis Vuitton 3', 'Image', 1, 'LV9', 9, 200, 200, 'Đây là áo sơ mi tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(274, 'Áo sơ mi tay ngắn Louis Vuitton 3', 'Image', 1, 'LV9', 10, 200, 200, 'Đây là áo sơ mi tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(275, 'Áo sơ mi tay ngắn Louis Vuitton 3', 'Image', 1, 'LV9', 11, 200, 200, 'Đây là áo sơ mi tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(276, 'Áo sơ mi tay ngắn Louis Vuitton 3', 'Image', 1, 'LV9', 12, 200, 200, 'Đây là áo sơ mi tay ngắn của Louis Vuitton', 'Pulish', '2020-09-18'),
(277, 'Áo sơ mi tay dài Louis Vuitton 1', 'Image', 1, 'LV10', 1, 250, 190, 'Đây là áo sơ mi tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(278, 'Áo sơ mi tay dài Louis Vuitton 1', 'Image', 1, 'LV10', 2, 250, 190, 'Đây là áo sơ mi tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(279, 'Áo sơ mi tay dài Louis Vuitton 1', 'Image', 1, 'LV10', 3, 250, 190, 'Đây là áo sơ mi tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(280, 'Áo sơ mi tay dài Louis Vuitton 1', 'Image', 1, 'LV10', 4, 250, 190, 'Đây là áo sơ mi tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(281, 'Áo sơ mi tay dài Louis Vuitton 2', 'Image', 1, 'LV11', 5, 270, 190, 'Đây là áo sơ mi tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(282, 'Áo sơ mi tay dài Louis Vuitton 2', 'Image', 1, 'LV11', 6, 270, 190, 'Đây là áo sơ mi tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(283, 'Áo sơ mi tay dài Louis Vuitton 2', 'Image', 1, 'LV11', 7, 270, 190, 'Đây là áo sơ mi tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(284, 'Áo sơ mi tay dài Louis Vuitton 2', 'Image', 1, 'LV11', 8, 270, 190, 'Đây là áo sơ mi tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(285, 'Áo sơ mi tay dài Louis Vuitton 3', 'Image', 1, 'LV12', 9, 250, 200, 'Đây là áo sơ mi tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(286, 'Áo sơ mi tay dài Louis Vuitton 3', 'Image', 1, 'LV12', 10, 250, 200, 'Đây là áo sơ mi tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(287, 'Áo sơ mi tay dài Louis Vuitton 3', 'Image', 1, 'LV12', 11, 250, 200, 'Đây là áo sơ mi tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(288, 'Áo sơ mi tay dài Louis Vuitton 3', 'Image', 1, 'LV12', 12, 250, 200, 'Đây là áo sơ mi tay dài của Louis Vuitton', 'Pulish', '2020-09-18'),
(289, 'Áo thun tay ngắn Chanel 1', 'Image', 1, 'C1', 1, 200, 190, 'Đây là áo thun tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(290, 'Áo thun tay ngắn Chanel 1', 'Image', 1, 'C1', 2, 200, 190, 'Đây là áo thun tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(291, 'Áo thun tay ngắn Chanel 1', 'Image', 1, 'C1', 3, 200, 190, 'Đây là áo thun tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(292, 'Áo thun tay ngắn Chanel 1', 'Image', 1, 'C1', 4, 200, 190, 'Đây là áo thun tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(293, 'Áo thun tay ngắn Chanel 2', 'Image', 1, 'C2', 5, 210, 190, 'Đây là áo thun tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(294, 'Áo thun tay ngắn Chanel 2', 'Image', 1, 'C2', 6, 210, 190, 'Đây là áo thun tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(295, 'Áo thun tay ngắn Chanel 2', 'Image', 1, 'C2', 7, 210, 190, 'Đây là áo thun tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(296, 'Áo thun tay ngắn Chanel 2', 'Image', 1, 'C2', 8, 210, 190, 'Đây là áo thun tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(297, 'Áo thun tay ngắn Chanel 3', 'Image', 1, 'C3', 9, 200, 200, 'Đây là áo thun tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(298, 'Áo thun tay ngắn Chanel 3', 'Image', 1, 'C3', 10, 200, 200, 'Đây là áo thun tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(299, 'Áo thun tay ngắn Chanel 3', 'Image', 1, 'C3', 11, 200, 200, 'Đây là áo thun tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(300, 'Áo thun tay ngắn Chanel 3', 'Image', 1, 'C3', 12, 200, 200, 'Đây là áo thun tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(301, 'Áo thun tay dài Chanel 1', 'Image', 1, 'C4', 1, 250, 190, 'Đây là áo thun tay dài của Chanel', 'Pulish', '2020-09-18'),
(302, 'Áo thun tay dài Chanel 1', 'Image', 1, 'C4', 2, 250, 190, 'Đây là áo thun tay dài của Chanel', 'Pulish', '2020-09-18'),
(303, 'Áo thun tay dài Chanel 1', 'Image', 1, 'C4', 3, 250, 190, 'Đây là áo thun tay dài của Chanel', 'Pulish', '2020-09-18'),
(304, 'Áo thun tay dài Chanel 1', 'Image', 1, 'C4', 4, 250, 190, 'Đây là áo thun tay dài của Chanel', 'Pulish', '2020-09-18'),
(305, 'Áo thun tay dài Chanel 2', 'Image', 1, 'C5', 5, 270, 190, 'Đây là áo thun tay dài của Chanel', 'Pulish', '2020-09-18'),
(306, 'Áo thun tay dài Chanel 2', 'Image', 1, 'C5', 6, 270, 190, 'Đây là áo thun tay dài của Chanel', 'Pulish', '2020-09-18'),
(307, 'Áo thun tay dài Chanel 2', 'Image', 1, 'C5', 7, 270, 190, 'Đây là áo thun tay dài của Chanel', 'Pulish', '2020-09-18'),
(308, 'Áo thun tay dài Chanel 2', 'Image', 1, 'C5', 8, 270, 190, 'Đây là áo thun tay dài của Chanel', 'Pulish', '2020-09-18'),
(309, 'Áo thun tay dài Chanel 3', 'Image', 1, 'C6', 9, 250, 200, 'Đây là áo thun tay dài của Chanel', 'Pulish', '2020-09-18'),
(310, 'Áo thun tay dài Chanel 3', 'Image', 1, 'C6', 10, 250, 200, 'Đây là áo thun tay dài của Chanel', 'Pulish', '2020-09-18'),
(311, 'Áo thun tay dài Chanel 3', 'Image', 1, 'C6', 11, 250, 200, 'Đây là áo thun tay dài của Chanel', 'Pulish', '2020-09-18'),
(312, 'Áo thun tay dài Chanel 3', 'Image', 1, 'C6', 12, 250, 200, 'Đây là áo thun tay dài của Chanel', 'Pulish', '2020-09-18'),
(313, 'Áo sơ mi tay ngắn Chanel 1', 'Image', 1, 'C7', 1, 200, 190, 'Đây là áo sơ mi tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(314, 'Áo sơ mi tay ngắn Chanel 1', 'Image', 1, 'C7', 2, 200, 190, 'Đây là áo sơ mi tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(315, 'Áo sơ mi tay ngắn Chanel 1', 'Image', 1, 'C7', 3, 200, 190, 'Đây là áo sơ mi tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(316, 'Áo sơ mi tay ngắn Chanel 1', 'Image', 1, 'C7', 4, 200, 190, 'Đây là áo sơ mi tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(317, 'Áo sơ mi tay ngắn Chanel 2', 'Image', 1, 'C8', 5, 210, 190, 'Đây là áo sơ mi tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(318, 'Áo sơ mi tay ngắn Chanel 2', 'Image', 1, 'C8', 6, 210, 190, 'Đây là áo sơ mi tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(319, 'Áo sơ mi tay ngắn Chanel 2', 'Image', 1, 'C8', 7, 210, 190, 'Đây là áo sơ mi tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(320, 'Áo sơ mi tay ngắn Chanel 2', 'Image', 1, 'C8', 8, 210, 190, 'Đây là áo sơ mi tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(321, 'Áo sơ mi tay ngắn Chanel 3', 'Image', 1, 'C9', 9, 200, 200, 'Đây là áo sơ mi tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(322, 'Áo sơ mi tay ngắn Chanel 3', 'Image', 1, 'C9', 10, 200, 200, 'Đây là áo sơ mi tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(323, 'Áo sơ mi tay ngắn Chanel 3', 'Image', 1, 'C9', 11, 200, 200, 'Đây là áo sơ mi tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(324, 'Áo sơ mi tay ngắn Chanel 3', 'Image', 1, 'C9', 12, 200, 200, 'Đây là áo sơ mi tay ngắn của Chanel', 'Pulish', '2020-09-18'),
(325, 'Áo sơ mi tay dài Chanel 1', 'Image', 1, 'C10', 1, 250, 190, 'Đây là áo sơ mi tay dài của Chanel', 'Pulish', '2020-09-18'),
(326, 'Áo sơ mi tay dài Chanel 1', 'Image', 1, 'C10', 2, 250, 190, 'Đây là áo sơ mi tay dài của Chanel', 'Pulish', '2020-09-18'),
(327, 'Áo sơ mi tay dài Chanel 1', 'Image', 1, 'C10', 3, 250, 190, 'Đây là áo sơ mi tay dài của Chanel', 'Pulish', '2020-09-18'),
(328, 'Áo sơ mi tay dài Chanel 1', 'Image', 1, 'C10', 4, 250, 190, 'Đây là áo sơ mi tay dài của Chanel', 'Pulish', '2020-09-18'),
(329, 'Áo sơ mi tay dài Chanel 2', 'Image', 1, 'C11', 5, 270, 190, 'Đây là áo sơ mi tay dài của Chanel', 'Pulish', '2020-09-18'),
(330, 'Áo sơ mi tay dài Chanel 2', 'Image', 1, 'C11', 6, 270, 190, 'Đây là áo sơ mi tay dài của Chanel', 'Pulish', '2020-09-18'),
(331, 'Áo sơ mi tay dài Chanel 2', 'Image', 1, 'C11', 7, 270, 190, 'Đây là áo sơ mi tay dài của Chanel', 'Pulish', '2020-09-18'),
(332, 'Áo sơ mi tay dài Chanel 2', 'Image', 1, 'C11', 8, 270, 190, 'Đây là áo sơ mi tay dài của Chanel', 'Pulish', '2020-09-18'),
(333, 'Áo sơ mi tay dài Chanel 3', 'Image', 1, 'C12', 9, 250, 200, 'Đây là áo sơ mi tay dài của Chanel', 'Pulish', '2020-09-18'),
(334, 'Áo sơ mi tay dài Chanel 3', 'Image', 1, 'C12', 10, 250, 200, 'Đây là áo sơ mi tay dài của Chanel', 'Pulish', '2020-09-18'),
(335, 'Áo sơ mi tay dài Chanel 3', 'Image', 1, 'C12', 11, 250, 200, 'Đây là áo sơ mi tay dài của Chanel', 'Pulish', '2020-09-18'),
(336, 'Áo sơ mi tay dài Chanel 3', 'Image', 1, 'C12', 12, 250, 200, 'Đây là áo sơ mi tay dài của Chanel', 'Pulish', '2020-09-18'),
(337, 'Áo thun tay ngắn Dior 1', 'Image', 1, 'D1', 1, 200, 190, 'Đây là áo thun tay ngắn của Dior', 'Pulish', '2020-09-18'),
(338, 'Áo thun tay ngắn Dior 1', 'Image', 1, 'D1', 2, 200, 190, 'Đây là áo thun tay ngắn của Dior', 'Pulish', '2020-09-18'),
(339, 'Áo thun tay ngắn Dior 1', 'Image', 1, 'D1', 3, 200, 190, 'Đây là áo thun tay ngắn của Dior', 'Pulish', '2020-09-18'),
(340, 'Áo thun tay ngắn Dior 1', 'Image', 1, 'D1', 4, 200, 190, 'Đây là áo thun tay ngắn của Dior', 'Pulish', '2020-09-18'),
(341, 'Áo thun tay ngắn Dior 2', 'Image', 1, 'D2', 5, 210, 190, 'Đây là áo thun tay ngắn của Dior', 'Pulish', '2020-09-18'),
(342, 'Áo thun tay ngắn Dior 2', 'Image', 1, 'D2', 6, 210, 190, 'Đây là áo thun tay ngắn của Dior', 'Pulish', '2020-09-18'),
(343, 'Áo thun tay ngắn Dior 2', 'Image', 1, 'D2', 7, 210, 190, 'Đây là áo thun tay ngắn của Dior', 'Pulish', '2020-09-18'),
(344, 'Áo thun tay ngắn Dior 2', 'Image', 1, 'D2', 8, 210, 190, 'Đây là áo thun tay ngắn của Dior', 'Pulish', '2020-09-18'),
(345, 'Áo thun tay ngắn Dior 3', 'Image', 1, 'D3', 9, 200, 200, 'Đây là áo thun tay ngắn của Dior', 'Pulish', '2020-09-18'),
(346, 'Áo thun tay ngắn Dior 3', 'Image', 1, 'D3', 10, 200, 200, 'Đây là áo thun tay ngắn của Dior', 'Pulish', '2020-09-18'),
(347, 'Áo thun tay ngắn Dior 3', 'Image', 1, 'D3', 11, 200, 200, 'Đây là áo thun tay ngắn của Dior', 'Pulish', '2020-09-18'),
(348, 'Áo thun tay ngắn Dior 3', 'Image', 1, 'D3', 12, 200, 200, 'Đây là áo thun tay ngắn của Dior', 'Pulish', '2020-09-18'),
(349, 'Áo thun tay dài Dior 1', 'Image', 1, 'D4', 1, 250, 190, 'Đây là áo thun tay dài của Dior', 'Pulish', '2020-09-18'),
(350, 'Áo thun tay dài Dior 1', 'Image', 1, 'D4', 2, 250, 190, 'Đây là áo thun tay dài của Dior', 'Pulish', '2020-09-18'),
(351, 'Áo thun tay dài Dior 1', 'Image', 1, 'D4', 3, 250, 190, 'Đây là áo thun tay dài của Dior', 'Pulish', '2020-09-18'),
(352, 'Áo thun tay dài Dior 1', 'Image', 1, 'D4', 4, 250, 190, 'Đây là áo thun tay dài của Dior', 'Pulish', '2020-09-18'),
(353, 'Áo thun tay dài Dior 2', 'Image', 1, 'D5', 5, 270, 190, 'Đây là áo thun tay dài của Dior', 'Pulish', '2020-09-18'),
(354, 'Áo thun tay dài Dior 2', 'Image', 1, 'D5', 6, 270, 190, 'Đây là áo thun tay dài của Dior', 'Pulish', '2020-09-18'),
(355, 'Áo thun tay dài Dior 2', 'Image', 1, 'D5', 7, 270, 190, 'Đây là áo thun tay dài của Dior', 'Pulish', '2020-09-18'),
(356, 'Áo thun tay dài Dior 2', 'Image', 1, 'D5', 8, 270, 190, 'Đây là áo thun tay dài của Dior', 'Pulish', '2020-09-18'),
(357, 'Áo thun tay dài Dior 3', 'Image', 1, 'D6', 9, 250, 200, 'Đây là áo thun tay dài của Dior', 'Pulish', '2020-09-18'),
(358, 'Áo thun tay dài Dior 3', 'Image', 1, 'D6', 10, 250, 200, 'Đây là áo thun tay dài của Dior', 'Pulish', '2020-09-18'),
(359, 'Áo thun tay dài Dior 3', 'Image', 1, 'D6', 11, 250, 200, 'Đây là áo thun tay dài của Dior', 'Pulish', '2020-09-18'),
(360, 'Áo thun tay dài Dior 3', 'Image', 1, 'D6', 12, 250, 200, 'Đây là áo thun tay dài của Dior', 'Pulish', '2020-09-18'),
(361, 'Áo sơ mi tay ngắn Dior 1', 'Image', 1, 'D7', 1, 200, 190, 'Đây là áo sơ mi tay ngắn của Dior', 'Pulish', '2020-09-18'),
(362, 'Áo sơ mi tay ngắn Dior 1', 'Image', 1, 'D7', 2, 200, 190, 'Đây là áo sơ mi tay ngắn của Dior', 'Pulish', '2020-09-18'),
(363, 'Áo sơ mi tay ngắn Dior 1', 'Image', 1, 'D7', 3, 200, 190, 'Đây là áo sơ mi tay ngắn của Dior', 'Pulish', '2020-09-18'),
(364, 'Áo sơ mi tay ngắn Dior 1', 'Image', 1, 'D7', 4, 200, 190, 'Đây là áo sơ mi tay ngắn của Dior', 'Pulish', '2020-09-18'),
(365, 'Áo sơ mi tay ngắn Dior 2', 'Image', 1, 'D8', 5, 210, 190, 'Đây là áo sơ mi tay ngắn của Dior', 'Pulish', '2020-09-18'),
(366, 'Áo sơ mi tay ngắn Dior 2', 'Image', 1, 'D8', 6, 210, 190, 'Đây là áo sơ mi tay ngắn của Dior', 'Pulish', '2020-09-18'),
(367, 'Áo sơ mi tay ngắn Dior 2', 'Image', 1, 'D8', 7, 210, 190, 'Đây là áo sơ mi tay ngắn của Dior', 'Pulish', '2020-09-18'),
(368, 'Áo sơ mi tay ngắn Dior 2', 'Image', 1, 'D8', 8, 210, 190, 'Đây là áo sơ mi tay ngắn của Dior', 'Pulish', '2020-09-18'),
(369, 'Áo sơ mi tay ngắn Dior 3', 'Image', 1, 'D9', 9, 200, 200, 'Đây là áo sơ mi tay ngắn của Dior', 'Pulish', '2020-09-18'),
(370, 'Áo sơ mi tay ngắn Dior 3', 'Image', 1, 'D9', 10, 200, 200, 'Đây là áo sơ mi tay ngắn của Dior', 'Pulish', '2020-09-18'),
(371, 'Áo sơ mi tay ngắn Dior 3', 'Image', 1, 'D9', 11, 200, 200, 'Đây là áo sơ mi tay ngắn của Dior', 'Pulish', '2020-09-18'),
(372, 'Áo sơ mi tay ngắn Dior 3', 'Image', 1, 'D9', 12, 200, 200, 'Đây là áo sơ mi tay ngắn của Dior', 'Pulish', '2020-09-18'),
(373, 'Áo sơ mi tay dài Dior 1', 'Image', 1, 'D10', 1, 250, 190, 'Đây là áo sơ mi tay dài của Dior', 'Pulish', '2020-09-18'),
(374, 'Áo sơ mi tay dài Dior 1', 'Image', 1, 'D10', 2, 250, 190, 'Đây là áo sơ mi tay dài của Dior', 'Pulish', '2020-09-18'),
(375, 'Áo sơ mi tay dài Dior 1', 'Image', 1, 'D10', 3, 250, 190, 'Đây là áo sơ mi tay dài của Dior', 'Pulish', '2020-09-18'),
(376, 'Áo sơ mi tay dài Dior 1', 'Image', 1, 'D10', 4, 250, 190, 'Đây là áo sơ mi tay dài của Dior', 'Pulish', '2020-09-18'),
(377, 'Áo sơ mi tay dài Dior 2', 'Image', 1, 'D11', 5, 270, 190, 'Đây là áo sơ mi tay dài của Dior', 'Pulish', '2020-09-18'),
(378, 'Áo sơ mi tay dài Dior 2', 'Image', 1, 'D11', 6, 270, 190, 'Đây là áo sơ mi tay dài của Dior', 'Pulish', '2020-09-18'),
(379, 'Áo sơ mi tay dài Dior 2', 'Image', 1, 'D11', 7, 270, 190, 'Đây là áo sơ mi tay dài của Dior', 'Pulish', '2020-09-18'),
(380, 'Áo sơ mi tay dài Dior 2', 'Image', 1, 'D11', 8, 270, 190, 'Đây là áo sơ mi tay dài của Dior', 'Pulish', '2020-09-18'),
(381, 'Áo sơ mi tay dài Dior 3', 'Image', 1, 'D12', 9, 250, 200, 'Đây là áo sơ mi tay dài của Dior', 'Pulish', '2020-09-18'),
(382, 'Áo sơ mi tay dài Dior 3', 'Image', 1, 'D12', 10, 250, 200, 'Đây là áo sơ mi tay dài của Dior', 'Pulish', '2020-09-18'),
(383, 'Áo sơ mi tay dài Dior 3', 'Image', 1, 'D12', 11, 250, 200, 'Đây là áo sơ mi tay dài của Dior', 'Pulish', '2020-09-18'),
(384, 'Áo sơ mi tay dài Dior 3', 'Image', 1, 'D12', 12, 250, 200, 'Đây là áo sơ mi tay dài của Dior', 'Pulish', '2020-09-18');

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
  `Cost` float NOT NULL,
  `Status` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- AUTO_INCREMENT for table `shipping_method`
--
ALTER TABLE `shipping_method`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
