-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 21, 2022 at 03:58 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_event`
--

DROP TABLE IF EXISTS `book_event`;
CREATE TABLE IF NOT EXISTS `book_event` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `e_type` varchar(50) DEFAULT NULL,
  `place` varchar(50) DEFAULT NULL,
  `no_guest` int(11) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `equip` varchar(50) DEFAULT NULL,
  `f_type` varchar(50) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `CustomerName` varchar(50) NOT NULL,
  `Paid` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_event`
--

INSERT INTO `book_event` (`Id`, `e_type`, `place`, `no_guest`, `date`, `equip`, `f_type`, `total`, `CustomerID`, `CustomerName`, `Paid`) VALUES
(52, '500.00', '5', 100, '2022-04-15', '400.00', 'Marriage', 1000, 1, 'TestU', 1),
(53, '200.00', '6', 150, '2022-04-14', '100.00', 'Family Function', 1300, 1, 'TestU', 1),
(54, '400.00', '7', 100, '2022-04-13', '400.00', 'Marriage', 3800, 1, 'TestU', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `Id` tinyint(4) DEFAULT NULL,
  `name` varchar(6) DEFAULT NULL,
  `addr` varchar(4) DEFAULT NULL,
  `mob` varchar(5) DEFAULT NULL,
  `email` varchar(6) DEFAULT NULL,
  `pass` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Id`, `name`, `addr`, `mob`, `email`, `pass`) VALUES
(1, 'TestU', 'aa', 'dfsdf', 'lahiru', 1234),
(2, '43453', '4343', '455', '1111', 1111);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `equip` varchar(6) DEFAULT NULL,
  `Price` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equip`, `Price`) VALUES
('Band', '400.00'),
('Lights', '100.00'),
('Nope', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `eventtype`
--

DROP TABLE IF EXISTS `eventtype`;
CREATE TABLE IF NOT EXISTS `eventtype` (
  `EventType` varchar(15) DEFAULT NULL,
  `Price` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventtype`
--

INSERT INTO `eventtype` (`EventType`, `Price`) VALUES
('Birthday', '400.00'),
('Family Function', '200.00'),
('Marriage', '500.00');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `FoodName` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `foodtype`
--

DROP TABLE IF EXISTS `foodtype`;
CREATE TABLE IF NOT EXISTS `foodtype` (
  `FoodType` varchar(9) DEFAULT NULL,
  `Price` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodtype`
--

INSERT INTO `foodtype` (`FoodType`, `Price`) VALUES
('FoodType1', '300.00'),
('FoodType2', '500.00');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `PaymentID` int(50) NOT NULL AUTO_INCREMENT,
  `EventID` varchar(50) DEFAULT NULL,
  `CardNo` varchar(50) NOT NULL,
  `CVV` varchar(50) NOT NULL,
  `Expiary` varchar(50) NOT NULL,
  `Amount` double(18,2) NOT NULL,
  PRIMARY KEY (`PaymentID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `EventID`, `CardNo`, `CVV`, `Expiary`, `Amount`) VALUES
(6, '1', '121212', '123', '10/03', 800.00),
(7, '14', '121212', '123', '10/03', 800.00),
(8, '15', '111', '123', '10/23', 100.00),
(9, '15', '111', '123', '10/23', 800.00),
(10, '17', '', '', '', 800.00),
(11, '18', '', '', '', 800.00);

-- --------------------------------------------------------

--
-- Table structure for table `sysdiagrams`
--

DROP TABLE IF EXISTS `sysdiagrams`;
CREATE TABLE IF NOT EXISTS `sysdiagrams` (
  `name` varchar(0) DEFAULT NULL,
  `principal_id` varchar(0) DEFAULT NULL,
  `diagram_id` varchar(0) DEFAULT NULL,
  `version` varchar(0) DEFAULT NULL,
  `definition` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

DROP TABLE IF EXISTS `venue`;
CREATE TABLE IF NOT EXISTS `venue` (
  `Id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `addr` varchar(20) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `capacity` int(6) DEFAULT NULL,
  `prefered` varchar(50) DEFAULT NULL,
  `money` int(6) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`Id`, `name`, `addr`, `phone`, `capacity`, `prefered`, `money`) VALUES
(5, 'New York', 'USA', 9126517289, 44, 'Birthday', 100),
(6, 'Chicago', 'USA', 9126517281, 1000, 'Marriage', 1000),
(7, 'Cleveland ', 'East superior avn', 2162131234, 500, 'All', 3000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
