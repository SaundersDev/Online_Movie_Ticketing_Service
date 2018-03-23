SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `customer` (
  `Fname` char(255) DEFAULT NULL,
  `Lname` char(255) DEFAULT NULL,
  `Street` char(255) DEFAULT NULL,
  `City` char(255) DEFAULT NULL,
  `PostalCode` char(7) DEFAULT NULL,
  `Username` char(85) NOT NULL PRIMARY KEY,
  `Password` char(255) NOT NULL,
  `PhoneNumber` bigint(10) DEFAULT NULL,
  `Email` char(255) DEFAULT NULL,
  `CCnum` bigint(16) NOT NULL,
  `CCexpiryMonth` tinyint(2) NOT NULL,
  `CCexpiryYear` tinyint(2) NOT NULL,
  `admin` boolean not null
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `movie_supplier` (
  `Name` char(255) NOT NULL PRIMARY KEY,
  `PhoneNum` bigint(10) DEFAULT NULL,
  `ContactFName` char(255) DEFAULT NULL,
  `ContactLName` char(255) DEFAULT NULL,
  `Street` char(255) DEFAULT NULL,
  `City` char(255) DEFAULT NULL,
  `PostalCode` char(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `theater_complex` (
  `Name` char(255) NOT NULL PRIMARY KEY,
  `Street` char(255) DEFAULT NULL,
  `City` char(255) DEFAULT NULL,
  `PostalCode` char(7) DEFAULT NULL,
  `PhoneNumber` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `movie` (
  `Title` char(255) NOT NULL PRIMARY KEY,
  `RunningTime` int(3) DEFAULT NULL,
  `Rating` enum ('G', 'PG', 'AA', '14A', 'R'),
  `Director` char(255) DEFAULT NULL,
  `ProductionCompany` char(255) DEFAULT NULL,
  `SupplierName` char(255) NOT NULL,
  `PlotSynopsis` blob,
  foreign key (`SupplierName`) references `movie_supplier`(`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `theater` (
  `ComplexName` char(255) DEFAULT NULL Unique KEY,
  `TheaterNumber` tinyint(3) NOT NULL PRIMARY KEY ,
  `MaxSeats` smallint(4) DEFAULT NULL,
  `ScreenSize` tinyint(3) DEFAULT NULL,
  foreign key (`ComplexName`) references `theater_complex`(`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `showing` (
  `ID` int(9) NOT NULL PRIMARY KEY,
  `StartTime` timestamp NULL DEFAULT NULL,
  `ComplexName` char(255) DEFAULT NULL UNIQUE KEY,
  `TheaterNumber` tinyint(3) NOT NULL UNIQUE KEY,
  `NumSeatsAvailable` int(11) NOT NULL,
   foreign key fkshow1 (`ComplexName`) REFERENCES `theater`(`ComplexName`),
   foreign key fkshow2 (`TheaterNumber`) REFERENCES `theater`(`TheaterNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `theatercomplex_movie_showing` (
  `TheaterComplexName` char(255) DEFAULT NULL, 
  `MovieTitle` char(255) DEFAULT NULL,
  `ShowingID` int(9) DEFAULT NULL,
  `StartDate` timestamp NULL DEFAULT NULL,
  `EndDate` timestamp NULL DEFAULT NULL,
   FOREIGN KEY (`TheaterComplexName`) REFERENCES `theater_complex`(`Name`),
   FOREIGN KEY(`TheaterComplexName`) REFERENCES `showing`(`ComplexName`), 
   FOREIGN KEY (`MovieTitle`) REFERENCES `movie`(`Title`),
   FOREIGN KEY (`ShowingID`) REFERENCES `showing`(`ID`)  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `reservations` (
  `NumTixReserved` int(4) NOT NULL,
  `Username` char(255) NOT NULL,
  `ShowingID` int(9) NOT NULL,
   FOREIGN KEY (`Username`) REFERENCES customer(`Username`),
   FOREIGN KEY (`ShowingID`) REFERENCES showing(`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `reviews` (
  `Text` char(255) NOT NULL,
  `Score` int(255) DEFAULT NULL,
  `ReviewerMovieTitle` char(255) DEFAULT NULL,
  `ReviewerName` char(255) DEFAULT NULL,
  FOREIGN KEY (`ReviewerMovieTitle`) REFERENCES `movie`(`Title`),
  FOREIGN KEY (`ReviewerName`) REFERENCES `customer`(`Username`)
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*create index `triIndex1` on `theatercomplex_movie_showing`(`TheaterComplexName`);
alter table `showing` add foreign key fkshow3 (`ComplexName`) REFERENCES `theater_movie_showing`(`TheaterComplexName`);
*/

INSERT INTO `customer` (`Fname`, `Lname`, `Street`, `City`, `PostalCode`, `Username`, `Password`, `PhoneNumber`, `Email`, `CCnum`, `CCexpiryMonth`, `CCexpiryYear`) VALUES
('El', 'Duderino', '11 Munchkins Drive', 'Oz', 'K1S 0A2', 'duder', 'dude', 19998887777, 'dude@email.com', 9923451029384444, 11, 19);

INSERT INTO `movie_supplier` (`Name`, `PhoneNum`, `ContactFName`, `ContactLName`, `Street`, `City`, `PostalCode`) VALUES
('Big Deal Productions', 987654321, 'Talking', 'Head', '100 Money Drive', 'Big City', '2E2 0A3');

INSERT INTO `movie` (`Title`, `RunningTime`, `Rating`, `Director`, `ProductionCompany`, `SupplierName`, `PlotSynopsis`) VALUES
('Goldfish', 110, 'PG', 'Nutjob Mcgee', NULL, 'Big Deal Productions', NULL);

INSERT INTO `theater_complex` (`Name`, `Street`, `City`, `PostalCode`, `PhoneNumber`) VALUES
('Popcorn', '99 Street Drive', 'Big City', '101 A1B', 1234567890);

INSERT INTO `theater` (`ComplexName`, `TheaterNumber`, `MaxSeats`, `ScreenSize`) VALUES
('Popcorn', 1, 300, 80);

INSERT INTO `showing` (`ID`, `StartTime`, `ComplexName`, `TheaterNumber`, `NumSeatsAvailable`) VALUES
(10000001, '2018-03-19 21:00:00', 'Popcorn', 1, 300);

INSERT INTO `theatercomplex_movie_showing` (`TheaterComplexName`, `MovieTitle`, `ShowingID`, `StartDate`, `EndDate`) VALUES
('Popcorn', 'Goldfish', 10000001, '2018-03-18 04:00:00', '2018-04-08 04:00:00');

INSERT INTO `reservations` (`NumTixReserved`, `Username`, `ShowingID`) VALUES
(6, 'duder', 10000001);

INSERT INTO `reviews` (`Text`, `Score`, `ReviewerMovieTitle`, `ReviewerName`) VALUES
('Pretty bubbly', NULL, 'Goldfish', 'duder');