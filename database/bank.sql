-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 10, 2021 at 04:35 PM
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
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `cid` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `balance` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cid`, `name`, `email`, `balance`) VALUES
(10001, 'Harry', 'harry@gmail.com', 1038),
(10002, 'James', 'james@gmail.com', 588),
(10003, 'Nikhil', 'nikhil@gmail.com', 788),
(10004, 'Sachin', 'sachin@gmail.com', 788),
(10005, 'Rohit', 'rohit@gmail.com', 688),
(10006, 'Robert', 'robert@gmail.com', 788),
(10007, 'Priya', 'priya@gmail.com', 788),
(10008, 'Priti', 'priti@gmail.com', 738),
(10009, 'Nikita', 'nikita@gmail.com', 788),
(10010, 'Loyd', 'loyd@gmail.com', 788),
(10011, 'Shivam', 'shivam@gmail.com', 788);

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

DROP TABLE IF EXISTS `transfers`;
CREATE TABLE IF NOT EXISTS `transfers` (
  `tid` int NOT NULL,
  `time` datetime NOT NULL,
  `balance` int NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `beneficiary_id` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`tid`, `time`, `balance`, `customer_id`, `beneficiary_id`) VALUES
(1, '2021-10-10 16:15:54', 200, '10001', '10002'),
(2, '2021-10-10 16:25:35', 50, '10008', '10001');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
