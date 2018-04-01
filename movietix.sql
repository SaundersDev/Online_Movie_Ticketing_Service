-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2018 at 10:19 PM
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
-- Database: `movietix`
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
  `CCexpiryYear` tinyint(2) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Fname`, `Lname`, `Street`, `City`, `PostalCode`, `Username`, `Password`, `PhoneNumber`, `Email`, `CCnum`, `CCexpiryMonth`, `CCexpiryYear`, `admin`) VALUES
('admin', NULL, NULL, NULL, NULL, 'admin', 'password', NULL, NULL, 1111111111111111, 12, 99, 1),
('asdf', 'jkl;', '', '', '', 'j', '101', 0, '', 1011111111111, 10, 10, 0),
('Jon', 'Boi', '15 Oliver Twist', 'England', 'A1B 2C3', 'jboi', 'password', 12345678901, 'jboi@email.com', 2293456876543212, 11, 127, 0);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `Title` char(255) NOT NULL,
  `RunningTime` int(3) DEFAULT NULL,
  `Rating` enum('G','PG','AA','14A','R') DEFAULT NULL,
  `Director` char(255) DEFAULT NULL,
  `ProductionCompany` char(255) DEFAULT NULL,
  `SupplierName` char(255) NOT NULL,
  `PlotSynopsis` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`Title`, `RunningTime`, `Rating`, `Director`, `ProductionCompany`, `SupplierName`, `PlotSynopsis`) VALUES
('Black Panther', 140, '', 'Hirosimo Magasaki', 'Disney', 'Disney', 0x4d6f737420496e746572657374696e672073757065726865726f206d6f766965),
('Finding Nemo', 120, 'G', 'John Lasseter', 'Disney', 'Disney', 0x4669736820676574732061626475637465642c20646164207377696d732061667465722068696d),
('How aboot this', 10, 'G', 'owow', 'Disney', 'Disney', 0x506c6f742053796e6f70736973),
('jj', 10, '14A', '', 'Disney', '', 0x54686520706c6f74),
('Lion King', 110, 'PG', '', 'Disney', 'Disney', 0x4b6964206461642064696573),
('Long Muvie', 202, 'G', 'hehehe', 'Disney', 'Disney', 0x506c6f742053796e6f70736973),
('Toy Story', 81, 'PG', 'John Lasseter', 'Pixar', 'Disney', NULL),
('What about no', 30, '14A', 'Wakakaka', 'Disney', 'Disney', 0x506c6f742053796e6f70736973);

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
('Disney', 18555534763, 'Mickey', 'Mouse', 'Somewhere Dfive', 'Buena Vista', '1342');

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
(20, 'jboi', 100000000),
(200, 'jboi', 100000000),
(10, 'jboi', 10000005),
(100, 'jboi', 10000008),
(10, 'j', 10000005);

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
('It was good', 4, 'Finding Nemo', 'jboi');

-- --------------------------------------------------------

--
-- Table structure for table `showing`
--

CREATE TABLE `showing` (
  `ID` int(9) NOT NULL,
  `StartTime` timestamp NULL DEFAULT NULL,
  `ComplexName` char(255) DEFAULT NULL,
  `TheaterNumber` tinyint(3) NOT NULL,
  `NumSeatsAvailable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `showing`
--

INSERT INTO `showing` (`ID`, `StartTime`, `ComplexName`, `TheaterNumber`, `NumSeatsAvailable`) VALUES
(10000002, '2018-03-04 09:00:00', 'Fake Movies', 2, 200),
(10000005, '2018-04-07 04:00:00', 'Fake Movies', 2, 200),
(10000008, '2018-03-27 04:00:00', 'Fake Movies', 7, 300),
(100000000, '2018-03-22 21:00:00', 'Fake Movies', 1, 200);

-- --------------------------------------------------------

--
-- Table structure for table `theater`
--

CREATE TABLE `theater` (
  `ComplexName` char(255) DEFAULT NULL,
  `TheaterNumber` tinyint(3) NOT NULL,
  `MaxSeats` smallint(4) DEFAULT NULL,
  `ScreenSize` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theater`
--

INSERT INTO `theater` (`ComplexName`, `TheaterNumber`, `MaxSeats`, `ScreenSize`) VALUES
('Fake Movies', 1, 200, 40),
('Fake Movies', 2, 400, 100),
('Fake Movies', 4, 250, 60),
('Fake Movies', 5, 600, 90),
('Fake Movies', 7, 500, 20);

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
('Fake Movies', 'Finding Nemo', 100000000, '2018-03-19 08:00:00', '2018-03-29 14:00:00'),
('Fake Movies', 'Toy Story', 10000002, '2018-03-01 05:00:00', '2018-03-09 05:00:00'),
('Fake Movies', 'Finding Nemo', 10000005, NULL, NULL),
('Fake Movies', 'Toy Story', 10000008, '2018-03-26 04:00:00', '2018-03-30 04:00:00');

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
('Fake Movies', '1 False Street', 'Land of Make Believe', 'N0TR3L', 1111111111);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Username`);

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
  ADD KEY `reservations_ibfk_1` (`Username`),
  ADD KEY `reservations_ibfk_2` (`ShowingID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD KEY `reviews_ibfk_1` (`ReviewerMovieTitle`),
  ADD KEY `reviews_ibfk_2` (`ReviewerName`);

--
-- Indexes for table `showing`
--
ALTER TABLE `showing`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ComplexName` (`ComplexName`) USING BTREE,
  ADD KEY `TheaterNumber` (`TheaterNumber`) USING BTREE;

--
-- Indexes for table `theater`
--
ALTER TABLE `theater`
  ADD PRIMARY KEY (`TheaterNumber`),
  ADD KEY `ComplexName` (`ComplexName`) USING BTREE;

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
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `customer` (`Username`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`ShowingID`) REFERENCES `showing` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`ReviewerMovieTitle`) REFERENCES `movie` (`Title`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`ReviewerName`) REFERENCES `customer` (`Username`) ON DELETE CASCADE;

--
-- Constraints for table `showing`
--
ALTER TABLE `showing`
  ADD CONSTRAINT `fkshow1` FOREIGN KEY (`ComplexName`) REFERENCES `theater` (`ComplexName`),
  ADD CONSTRAINT `fkshow2` FOREIGN KEY (`TheaterNumber`) REFERENCES `theater` (`TheaterNumber`);

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
  ADD CONSTRAINT `theatercomplex_movie_showing_ibfk_2` FOREIGN KEY (`TheaterComplexName`) REFERENCES `showing` (`ComplexName`),
  ADD CONSTRAINT `theatercomplex_movie_showing_ibfk_3` FOREIGN KEY (`MovieTitle`) REFERENCES `movie` (`Title`),
  ADD CONSTRAINT `theatercomplex_movie_showing_ibfk_4` FOREIGN KEY (`ShowingID`) REFERENCES `showing` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
