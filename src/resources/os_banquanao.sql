-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 06:49 AM
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
-- Database: `os_banquanao`
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

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`Id`, `Email`, `Payment_Method`, `Shipping_Method`, `Total`, `Date`, `Status`) VALUES
(1, 'an.nt.techdev@gmail.com', 1, 1, 100000, '2020-09-23 11:47:07', 'New');

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

--
-- Dumping data for table `billing_detail`
--

INSERT INTO `billing_detail` (`Id_Billing`, `Id_Product`, `Count`, `Price_Buy`) VALUES
(1, 1, 2, 60000),
(1, 4, 1, 40000);

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

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Email`, `Name`, `Phone`, `Country`, `City`, `Address`) VALUES
('an.nt.techdev@gmail.com', 'Thien An Nguyen', '1234567890', 'Viet Nam', 'Ho Chi Minh', '240 Duong Quang Ham, Phuong 5'),
('ohwhynotme1999@gmail.com', 'Ba Khoa Tran', '0987654321', 'Viet Nam', 'Ho Chi Minh', '181 Le Duc Tho, Phuong 17');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `Id` int(11) NOT NULL,
  `Name` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Status` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`Id`, `Name`, `Status`) VALUES
(1, 'Thanh toán khi nhận hàng', 'active'),
(2, 'Thanh toán qua Momo', 'active'),
(3, 'Thanh toán qua Vnpay', 'inactive'),
(4, 'Thanh toán qua thẻ tín dụng quốc tế VISA/MASTER CARD', 'delete'),
(5, 'Thanh toán qua thẻ tín dụng nội địa', 'active');

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

--
-- Dumping data for table `shipping_method`
--

INSERT INTO `shipping_method` (`Id`, `Name`, `Cost`, `Status`) VALUES
(1, 'Giao hàng tiết kiệm', 10000, 'active'),
(2, 'Giao hàng nhanh', 30000, 'active'),
(3, 'Giao hàng bình thường', 20000, 'inactive'),
(4, 'Ninja Van', 5000, 'delete'),
(5, 'Nhận hàng tại cửa hàng', 0, 'active');

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_method`
--
ALTER TABLE `shipping_method`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
