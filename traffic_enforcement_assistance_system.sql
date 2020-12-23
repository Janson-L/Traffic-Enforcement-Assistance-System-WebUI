-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: db-mysql-sgp1-01735-do-user-7518064-0.b.db.ondigitalocean.com:25060
-- Generation Time: Dec 23, 2020 at 12:55 PM
-- Server version: 8.0.20
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traffic_enforcement_assistance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `camera`
--

CREATE TABLE `camera` (
  `CameraID` tinyint NOT NULL,
  `Location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `camera`
--

INSERT INTO `camera` (`CameraID`, `Location`) VALUES
(1, 'Satria'),
(3, 'Lestari');

-- --------------------------------------------------------

--
-- Table structure for table `offense`
--

CREATE TABLE `offense` (
  `OffenseID` int NOT NULL,
  `OffenseName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `CompoundRate` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offense`
--

INSERT INTO `offense` (`OffenseID`, `OffenseName`, `CompoundRate`) VALUES
(1, 'Sticker Misuse', 100),
(2, 'Illegal Parking', 50);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int NOT NULL,
  `PaymentMethod` tinyint(1) NOT NULL,
  `PaymentDateTime` datetime NOT NULL,
  `SummonID` int NOT NULL,
  `StaffID` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `RecordID` int NOT NULL,
  `CameraID` tinyint NOT NULL,
  `EntryDateTime` datetime NOT NULL,
  `ExitDateTime` datetime DEFAULT NULL,
  `LicensePlate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`RecordID`, `CameraID`, `EntryDateTime`, `ExitDateTime`, `LicensePlate`) VALUES
(1, 1, '2020-12-02 22:56:49', NULL, 'BEH9873'),
(2, 3, '2020-12-01 22:56:49', NULL, 'WRS6725'),
(3, 1, '2020-12-01 23:32:34', NULL, 'WEH0132'),
(12, 1, '2020-12-15 00:16:23', '2020-12-16 00:16:23', 'WHG3645'),
(13, 1, '2020-12-01 22:38:47', NULL, 'WHA1234');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` varchar(15) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `PhoneNo` varchar(115) NOT NULL,
  `Class` tinyint(1) NOT NULL COMMENT '0 is staff, 1 is officer, 2 is commander',
  `Password` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `LoginAttempt` tinyint(1) NOT NULL DEFAULT '0',
  `AccountStatus` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `Name`, `PhoneNo`, `Class`, `Password`, `LoginAttempt`, `AccountStatus`) VALUES
('00001', 'Ahmad', '0928394759374', 2, 'abc', 0, 1),
('00002', 'Ababa', '7364758673', 1, 'abc', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sticker`
--

CREATE TABLE `sticker` (
  `StickerID` int NOT NULL,
  `Type` tinyint(1) NOT NULL COMMENT '1 for staff, 2 for inside student, 3 for outside student',
  `IssueDate` date NOT NULL,
  `LicensePlate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sticker`
--

INSERT INTO `sticker` (`StickerID`, `Type`, `IssueDate`, `LicensePlate`) VALUES
(1, 2, '2020-12-01', 'WEH0192'),
(3, 3, '2020-12-01', 'WEH0132'),
(4, 1, '2020-12-01', 'WHA1234');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` varchar(15) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `PhoneNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `Name`, `PhoneNo`) VALUES
('B000000000', 'Abu', '0876543218'),
('B000000001', 'Akau', '0192837465');

-- --------------------------------------------------------

--
-- Table structure for table `summon`
--

CREATE TABLE `summon` (
  `SummonID` int NOT NULL,
  `SummonTime` datetime NOT NULL,
  `PhotoDirectory` varchar(100) NOT NULL,
  `OffenseID` int NOT NULL,
  `LicensePlate` varchar(10) NOT NULL,
  `StaffID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `summon`
--

INSERT INTO `summon` (`SummonID`, `SummonTime`, `PhotoDirectory`, `OffenseID`, `LicensePlate`, `StaffID`) VALUES
(1, '2020-12-17 10:30:06', '1', 2, 'WEH0132', '00001');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `LicensePlate` varchar(10) NOT NULL,
  `Model` varchar(20) NOT NULL,
  `Year` int NOT NULL,
  `StaffID` varchar(15) DEFAULT NULL,
  `StudentID` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`LicensePlate`, `Model`, `Year`, `StaffID`, `StudentID`) VALUES
('WEH0132', 'KIa Ria', 1998, NULL, 'B000000001'),
('WEH0192', 'Proton Saga', 1995, NULL, 'B000000000'),
('WHA1234', 'Perodua Myvi', 2008, '00001', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camera`
--
ALTER TABLE `camera`
  ADD PRIMARY KEY (`CameraID`);

--
-- Indexes for table `offense`
--
ALTER TABLE `offense`
  ADD PRIMARY KEY (`OffenseID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `fk_staffID_payment` (`StaffID`),
  ADD KEY `fk_summonID_payment` (`SummonID`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`RecordID`),
  ADD KEY `LicensePlate` (`LicensePlate`),
  ADD KEY `fk_cameraID_record` (`CameraID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `sticker`
--
ALTER TABLE `sticker`
  ADD PRIMARY KEY (`StickerID`),
  ADD KEY `LicensePlate` (`LicensePlate`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `summon`
--
ALTER TABLE `summon`
  ADD PRIMARY KEY (`SummonID`),
  ADD KEY `OffenseID` (`OffenseID`),
  ADD KEY `LicensePlate` (`LicensePlate`),
  ADD KEY `StaffID` (`StaffID`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`LicensePlate`),
  ADD KEY `StaffID` (`StaffID`),
  ADD KEY `StudentID` (`StudentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `camera`
--
ALTER TABLE `camera`
  MODIFY `CameraID` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `offense`
--
ALTER TABLE `offense`
  MODIFY `OffenseID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `RecordID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sticker`
--
ALTER TABLE `sticker`
  MODIFY `StickerID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `summon`
--
ALTER TABLE `summon`
  MODIFY `SummonID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_staffID_payment` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`),
  ADD CONSTRAINT `fk_summonID_payment` FOREIGN KEY (`SummonID`) REFERENCES `summon` (`SummonID`);

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `fk_cameraID_record` FOREIGN KEY (`CameraID`) REFERENCES `camera` (`CameraID`);

--
-- Constraints for table `sticker`
--
ALTER TABLE `sticker`
  ADD CONSTRAINT `fk_licensePlate_sticker` FOREIGN KEY (`LicensePlate`) REFERENCES `vehicle` (`LicensePlate`);

--
-- Constraints for table `summon`
--
ALTER TABLE `summon`
  ADD CONSTRAINT `fk_licensePlate_summon` FOREIGN KEY (`LicensePlate`) REFERENCES `vehicle` (`LicensePlate`),
  ADD CONSTRAINT `fk_offenseID_summon` FOREIGN KEY (`OffenseID`) REFERENCES `offense` (`OffenseID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_staffID_summon` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `fk_staffID_vehicle` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`),
  ADD CONSTRAINT `fk_studentID_vehicle` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
