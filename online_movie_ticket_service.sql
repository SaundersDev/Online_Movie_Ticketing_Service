-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2018 at 07:40 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `Title` char(255) NOT NULL,
  `RunningTime` int(3) DEFAULT NULL,
  `Rating` char(5) DEFAULT NULL,
  `Director` char(255) DEFAULT NULL,
  `ProductionCompany` char(255) DEFAULT NULL,
  `SupplierName` char(255) DEFAULT NULL,
  `PlotSynopsis` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`Title`, `RunningTime`, `Rating`, `Director`, `ProductionCompany`, `SupplierName`, `PlotSynopsis`) VALUES
('Goldfish', 110, 'PG', 'Nutjob Mcgee', NULL, 'Big Deal Productions', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `movie_supplier`
--

CREATE TABLE `movie_supplier` (
  `Name` char(255) NOT NULL,
  `PhoneNum` bigint(10) DEFAULT NULL,
  `ContactFName` char(255) DEFAULT NULL,
  `ContactLName` char(255) DEFAULT NULL,
  `Street` char(255) DEFAULT NULL,
  `City` char(255) DEFAULT NULL,
  `PostalCode` char(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_supplier`
--

INSERT INTO `movie_supplier` (`Name`, `PhoneNum`, `ContactFName`, `ContactLName`, `Street`, `City`, `PostalCode`) VALUES
('Big Deal Productions', 987654321, 'Talking', 'Head', '100 Money Drive', 'Big City', '2E2 0A3');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `NumTixReserved` int(4) NOT NULL,
  `Username` char(255) NOT NULL,
  `ShowingID` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`NumTixReserved`, `Username`, `ShowingID`) VALUES
(6, 'duder', 10000001);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `Text` char(255) NOT NULL,
  `Score` int(255) DEFAULT NULL,
  `ReviewerMovieTitle` char(255) DEFAULT NULL,
  `ReviewerName` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`Text`, `Score`, `ReviewerMovieTitle`, `ReviewerName`) VALUES
('Pretty bubbly', NULL, 'Goldfish', 'duder');

-- --------------------------------------------------------

--
-- Table structure for table `showing`
--

CREATE TABLE `showing` (
  `ID` int(9) NOT NULL,
  `StartTime` timestamp NULL DEFAULT NULL,
  `ComplexName` char(255) DEFAULT NULL,
  `TheaterNumber` tinyint(3) DEFAULT NULL,
  `NumSeatsAvailable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `showing`
--

INSERT INTO `showing` (`ID`, `StartTime`, `ComplexName`, `TheaterNumber`, `NumSeatsAvailable`) VALUES
(10000001, '2018-03-19 21:00:00', 'Popcorn', 1, 300);

-- --------------------------------------------------------

--
-- Table structure for table `theater`
--

CREATE TABLE `theater` (
  `ComplexName` char(255) NOT NULL,
  `TheaterNumber` tinyint(3) DEFAULT NULL,
  `MaxSeats` smallint(4) DEFAULT NULL,
  `ScreenSize` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theater`
--

INSERT INTO `theater` (`ComplexName`, `TheaterNumber`, `MaxSeats`, `ScreenSize`) VALUES
('Popcorn', 1, 300, 80);

-- --------------------------------------------------------

--
-- Table structure for table `theatercomplex_movie_showing`
--

CREATE TABLE `theatercomplex_movie_showing` (
  `TheaterComplexName` char(255) DEFAULT NULL,
  `MovieTitle` char(255) DEFAULT NULL,
  `ShowingID` int(9) DEFAULT NULL,
  `StartDate` timestamp NULL DEFAULT NULL,
  `EndDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theatercomplex_movie_showing`
--

INSERT INTO `theatercomplex_movie_showing` (`TheaterComplexName`, `MovieTitle`, `ShowingID`, `StartDate`, `EndDate`) VALUES
('Popcorn', 'Goldfish', 10000001, '2018-03-18 04:00:00', '2018-04-08 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `theater_complex`
--

CREATE TABLE `theater_complex` (
  `Name` char(255) NOT NULL,
  `Street` char(255) DEFAULT NULL,
  `City` char(255) DEFAULT NULL,
  `PostalCode` char(7) DEFAULT NULL,
  `PhoneNumber` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theater_complex`
--

INSERT INTO `theater_complex` (`Name`, `Street`, `City`, `PostalCode`, `PhoneNumber`) VALUES
('Popcorn', '99 Street Drive', 'Big City', '101 A1B', 1234567890);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`Title`),
  ADD KEY `SupplierName` (`SupplierName`);

--
-- Indexes for table `movie_supplier`
--
ALTER TABLE `movie_supplier`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`NumTixReserved`),
  ADD KEY `Username` (`Username`),
  ADD KEY `ShowingID` (`ShowingID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`Text`),
  ADD KEY `ReviewerMovieTitle` (`ReviewerMovieTitle`),
  ADD KEY `ReviewerName` (`ReviewerName`);

--
-- Indexes for table `showing`
--
ALTER TABLE `showing`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ComplexName` (`ComplexName`);

--
-- Indexes for table `theater`
--
ALTER TABLE `theater`
  ADD KEY `ComplexName` (`ComplexName`);

--
-- Indexes for table `theatercomplex_movie_showing`
--
ALTER TABLE `theatercomplex_movie_showing`
  ADD KEY `TheaterComplexName` (`TheaterComplexName`),
  ADD KEY `MovieTitle` (`MovieTitle`),
  ADD KEY `ShowingID` (`ShowingID`);

--
-- Indexes for table `theater_complex`
--
ALTER TABLE `theater_complex`
  ADD PRIMARY KEY (`Name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`SupplierName`) REFERENCES `movie_supplier` (`Name`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `customer` (`Username`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`ShowingID`) REFERENCES `showing` (`ID`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`ReviewerMovieTitle`) REFERENCES `movie` (`Title`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`ReviewerName`) REFERENCES `customer` (`Username`);

--
-- Constraints for table `showing`
--
ALTER TABLE `showing`
  ADD CONSTRAINT `showing_ibfk_1` FOREIGN KEY (`ComplexName`) REFERENCES `theater_complex` (`Name`);

--
-- Constraints for table `theater`
--
ALTER TABLE `theater`
  ADD CONSTRAINT `theater_ibfk_1` FOREIGN KEY (`ComplexName`) REFERENCES `theater_complex` (`Name`);

--
-- Constraints for table `theatercomplex_movie_showing`
--
ALTER TABLE `theatercomplex_movie_showing`
  ADD CONSTRAINT `theatercomplex_movie_showing_ibfk_1` FOREIGN KEY (`TheaterComplexName`) REFERENCES `theater_complex` (`Name`),
  ADD CONSTRAINT `theatercomplex_movie_showing_ibfk_2` FOREIGN KEY (`MovieTitle`) REFERENCES `movie` (`Title`),
  ADD CONSTRAINT `theatercomplex_movie_showing_ibfk_3` FOREIGN KEY (`TheaterComplexName`) REFERENCES `theater_complex` (`Name`),
  ADD CONSTRAINT `theatercomplex_movie_showing_ibfk_4` FOREIGN KEY (`MovieTitle`) REFERENCES `movie` (`Title`),
  ADD CONSTRAINT `theatercomplex_movie_showing_ibfk_5` FOREIGN KEY (`MovieTitle`) REFERENCES `movie` (`Title`),
  ADD CONSTRAINT `theatercomplex_movie_showing_ibfk_6` FOREIGN KEY (`ShowingID`) REFERENCES `showing` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
