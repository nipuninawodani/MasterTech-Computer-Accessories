-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 15, 2021 at 02:58 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mastertech`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `Address1` varchar(20) NOT NULL,
  `Address2` varchar(20) NOT NULL,
  `City` varchar(20) NOT NULL,
  `PostCode` varchar(6) NOT NULL,
  `userID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Address1`,`Address2`,`City`,`userID`),
  KEY `userID` (`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `OrderID` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Status` varchar(10) NOT NULL,
  `UserID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `UserID` (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
CREATE TABLE IF NOT EXISTS `order_product` (
  `OrderedPrice` int NOT NULL,
  `Qty` int NOT NULL,
  `OrderID` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ProductID` varchar(10) NOT NULL,
  PRIMARY KEY (`OrderID`,`ProductID`),
  KEY `ProductID` (`ProductID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_options`
--

DROP TABLE IF EXISTS `payment_options`;
CREATE TABLE IF NOT EXISTS `payment_options` (
  `Cardnumber` varchar(16) NOT NULL,
  `Expiry` varchar(6) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Ccv` varchar(3) NOT NULL,
  `UserID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Cardnumber`,`UserID`),
  KEY `UserID` (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `ProductID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `Catagory` varchar(20) NOT NULL,
  `Price` int NOT NULL,
  `NumInStock` int NOT NULL,
  `Description` text NOT NULL,
  `Brand` varchar(20) NOT NULL,
  `Warranty` int NOT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Product_Name`, `Catagory`, `Price`, `NumInStock`, `Description`, `Brand`, `Warranty`) VALUES
('', 'Logitec Optical Mouse', 'Mouse', 950, 100, 'Logitec Optical Mouse 300dpi', 'Logitec', 6);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `Rating` int NOT NULL,
  `Review` text NOT NULL,
  `ProductID` varchar(10) NOT NULL,
  `UserID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`ProductID`,`UserID`),
  KEY `UserID` (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `Mobile` varchar(12) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Status` varchar(10) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `First_Name`, `Last_Name`, `Email`, `Password`, `Mobile`, `Gender`, `Type`, `Status`) VALUES
('0000000000', 'Admin', '1', 'admin1@mastertech.com', 'dcca2ed1630582435afa9d42ce361eb4', '+94774396812', 'Other', 'Admin', 'Active'),
('0000000100', 'Mahela', 'Dissanayake', 'maheladissanayake@gmail.com', 'e1aa512c96b6eb0678c5483c481e463f', '0774396812', 'Male', 'User', 'Active'),
('0000000101', 'Nirmal', 'Samod', 'Nirmal123@gmail.com', 'c24551c36bb9ee0d31b1030877cfbb4d', '+94775685956', 'Male', 'User', 'Active'),
('0000000102', 'Isuruni', 'Divyanjalee', 'Isuruni123@gmail.com', 'ddab0c2335e4fb28e66dcac64f9c4b1b', '+94775632875', 'Female', 'User', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `UserID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ProductID` varchar(10) NOT NULL,
  PRIMARY KEY (`UserID`,`ProductID`),
  KEY `ProductID` (`ProductID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
