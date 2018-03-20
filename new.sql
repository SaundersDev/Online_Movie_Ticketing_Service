SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*
CREATE TABLE `theater_complex` (
  `Name` char(255) NOT NULL PRIMARY KEY,
  `Street` char(255) DEFAULT NULL,
  `City` char(255) DEFAULT NULL,
  `PostalCode` char(7) DEFAULT NULL,
  `PhoneNumber` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
*/
CREATE TABLE `theater` (
  `ComplexName` char(255) NOT NULL,
  `TheaterNumber` tinyint(3) DEFAULT NULL,
  `MaxSeats` smallint(4) DEFAULT NULL,
  `ScreenSize` tinyint(3) DEFAULT NULL,
  foreign key (`ComplexName`) references `theater_complex`(`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Table structure for table `movie`
--
/*
CREATE TABLE `reviews` (
  `Text` char(255) NOT NULL,
  `Score` int(3) DEFAULT NULL,
  `ReviewerMovieTitle` char(255) DEFAULT NULL,
  `ReviewerName` char(255) DEFAULT NULL,
  FOREIGN KEY (`ReviewerMovieTitle`) REFERENCES `movie` (`Title`),
  FOREIGN KEY (`ReviewerName`) REFERENCES `customer` (`Username`)
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `movie` (
  `Title` char(255) NOT NULL PRIMARY KEY,
  `RunningTime` int(3) DEFAULT NULL,
  `Rating` char(5) DEFAULT NULL,
  `Director` char(255) DEFAULT NULL,
  `ProductionCompany` char(255) DEFAULT NULL,
  `SupplierName` char(255) DEFAULT NULL,
  `PlotSynopsis` blob,
  foreign key (`SupplierName`) references `movie_supplier`(`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`Title`, `RunningTime`, `Rating`, `Director`, `ProductionCompany`, `SupplierName`, `PlotSynopsis`) VALUES
('Goldfish', 110, 'PG', 'Nutjob Mcgee', NULL, 'Big Deal Productions', NULL);
*/



INSERT INTO `theater_complex` (`Name`, `Street`, `City`, `PostalCode`, `PhoneNumber`) VALUES
('Popcorn', '99 Street Drive', 'Big City', '101 A1B', 1234567890);
