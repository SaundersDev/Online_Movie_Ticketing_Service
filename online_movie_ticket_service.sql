-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2018 at 06:22 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_movie_ticket_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Fname` char(255) DEFAULT NULL,
  `Lname` char(255) DEFAULT NULL,
  `Street` char(255) DEFAULT NULL,
  `City` char(255) DEFAULT NULL,
  `PostalCode` char(7) DEFAULT NULL,
  `Username` char(85) NOT NULL,
  `Password` char(255) NOT NULL,
  `PhoneNumber` bigint(10) DEFAULT NULL,
  `Email` char(255) DEFAULT NULL,
  `CCnum` bigint(16) NOT NULL,
  `CCexpiryMonth` tinyint(2) NOT NULL,
  `CCexpiryYear` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Fname`, `Lname`, `Street`, `City`, `PostalCode`, `Username`, `Password`, `PhoneNumber`, `Email`, `CCnum`, `CCexpiryMonth`, `CCexpiryYear`) VALUES
('El', 'Duderino', '11 Munchkins Drive', 'Oz', 'K1S 0A2', 'duder', 'dude', 19998887777, 'dude@email.com', 9923451029384444, 11, 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Username` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
