-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: db-mysql-sgp1-01735-do-user-7518064-0.b.db.ondigitalocean.com:25060
-- Generation Time: Jan 05, 2021 at 02:23 PM
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
CREATE DATABASE IF NOT EXISTS `traffic_enforcement_assistance_system` DEFAULT CHARACTER SET utf8mb4 ;
USE `traffic_enforcement_assistance_system`;

-- --------------------------------------------------------

--
-- Table structure for table `camera`
--

CREATE TABLE `camera` (
  `CameraID` tinyint NOT NULL,
  `Location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

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
  `OffenseName` varchar(50) CHARACTER SET utf8mb4  NOT NULL,
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
  `Amount` int NOT NULL,
  `PaymentMethod` tinyint(1) NOT NULL COMMENT '0 is cash, 1 is credit/debit card',
  `PaymentDateTime` datetime NOT NULL,
  `StaffID` varchar(15) CHARACTER SET utf8mb4  NOT NULL
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`RecordID`, `CameraID`, `EntryDateTime`, `ExitDateTime`, `LicensePlate`) VALUES
(1, 1, '2020-12-02 22:56:49', '2020-12-30 14:23:21', 'BEH9873'),
(2, 3, '2020-12-01 22:56:49', NULL, 'WRS6725'),
(3, 1, '2020-12-01 23:32:34', NULL, 'WEH0132'),
(12, 1, '2020-12-15 00:16:23', NULL, 'WHG3645'),
(13, 1, '2020-12-01 22:38:47', NULL, 'WHA1234'),
(14, 1, '2020-12-01 16:37:03', NULL, 'WEA0192');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` varchar(15) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `PhoneNo` varchar(115) NOT NULL,
  `Class` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 is staff, 1 is officer, 2 is commander',
  `Password` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `LoginAttempt` tinyint(1) NOT NULL DEFAULT '0',
  `AccountStatus` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `Name`, `PhoneNo`, `Class`, `Password`, `LoginAttempt`, `AccountStatus`) VALUES
('00001', 'Ahmmad', '0923245632', 2, '$2y$10$ehuwk8e.r1JdLpvof5LFuuKGTpGBrGBwENPhGEYmqNioJ4UQTLvZe', 0, 1),
('00002', 'Abababa', '7364758673', 1, '$2y$10$ozf/7r9l69KiDYe0i.MN.ubs5HMnOc584z6JDR0BL/M0MvutsALum', 0, 1),
('00003', 'Abibi', '12856923', 1, '$2y$10$neJeRCXYYT7Iv0ZV08feSevyzSgfGJzZRZwGAMV.oqlIYJFBu/7Fu', 0, 1),
('00004', 'Shiva', '0101234567', 2, '$2y$10$nEV4MrvDaOeU0pmdPMRihOIIYbrjGm7HIY6hzC/ZmHrQdQ9JAZz.W', 0, 1),
('00005', 'asd', '7821649', 1, '$2y$10$b2xA5.CGqyugKihoSNzQNuBfEZSo.suzTJohZIw1CaDKU3Ek19qPW', 0, 1),
('00011', 'Undefined', 'Undefined', 0, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sticker`
--

CREATE TABLE `sticker` (
  `StickerID` int NOT NULL,
  `Type` tinyint(1) NOT NULL COMMENT '1 for staff, 2 for inside student, 3 for outside student',
  `IssueDate` date NOT NULL,
  `LicensePlate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `sticker`
--

INSERT INTO `sticker` (`StickerID`, `Type`, `IssueDate`, `LicensePlate`) VALUES
(1, 2, '2020-12-01', 'WEH0192'),
(3, 3, '2020-12-01', 'WEH0132'),
(4, 1, '2020-12-01', 'WHA1234'),
(5, 3, '2020-12-01', 'WEA0192');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` varchar(15) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `PhoneNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `Name`, `PhoneNo`) VALUES
('B000000000', 'Abu', '0876543218'),
('B000000001', 'Akau', '0192837465'),
('B000000003', 'Chin', '1234132213'),
('B000000034', 'Undefined', 'Undefined'),
('B000000987', 'Undefined', 'Undefined'),
('B102938475', 'Undefined', 'Undefined');

-- --------------------------------------------------------

--
-- Table structure for table `summon`
--

CREATE TABLE `summon` (
  `SummonID` int NOT NULL,
  `SummonDateTime` datetime NOT NULL,
  `PhotoDirectory` varchar(100) NOT NULL,
  `OffenseID` int NOT NULL,
  `LicensePlate` varchar(10) NOT NULL,
  `StaffID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `summon`
--

INSERT INTO `summon` (`SummonID`, `SummonDateTime`, `PhotoDirectory`, `OffenseID`, `LicensePlate`, `StaffID`) VALUES
(2, '2020-12-27 16:39:00', '1', 2, 'WEH0192', '00001'),
(3, '2020-12-27 16:39:00', '1', 1, 'WEH0192', '00001'),
(9, '2020-12-29 16:45:35', '9_2020-12-29_16:45:35', 1, 'WEH0132', '00001'),
(12, '2020-12-29 18:17:22', '12_2020-12-29_18:17:22', 1, 'WEA0192', '00001'),
(13, '2020-12-29 18:20:57', '13_2020-12-29_18:20:57', 2, 'WEH0132', '00001'),
(15, '2020-12-29 19:01:24', '15_2020-12-29_19:01:24', 2, 'WEH0132', '00004'),
(16, '2020-12-29 20:55:23', '16_2020-12-29_20:55:23', 2, 'WEH0132', '00001'),
(17, '2020-12-29 22:14:26', '17_2020-12-29_22:14:26', 1, 'WEH0192', '00001'),
(18, '2020-12-29 22:18:22', '18_2020-12-29_22:18:22', 2, 'WEH0132', '00001'),
(19, '2020-12-29 22:43:03', '19_2020-12-29_22:43:03', 1, 'WEH0192', '00001'),
(20, '2020-12-29 23:32:47', '20_2020-12-29_23:32:47', 1, 'WEH0192', '00001'),
(21, '2020-12-29 23:38:55', '21_2020-12-29_23:38:55', 1, 'WEH0192', '00001'),
(22, '2020-12-30 00:08:12', '22_2020-12-30_00:08:12', 2, 'WEH0132', '00001'),
(24, '2020-12-29 18:17:22', '12_2020-12-29_18:17:22', 2, 'WEA0192', '00001'),
(25, '2020-12-30 01:19:14', '25_2020-12-30_01:19:14', 2, 'WEA0192', '00001'),
(26, '2020-12-30 14:19:26', '26_2020-12-30_14:19:26', 2, 'WEA0192', '00001'),
(27, '2020-12-30 14:22:11', '27_2020-12-30_14:22:11', 2, 'WEH0132', '00001'),
(30, '2020-01-01 14:33:39', '30_2020-01-01_14:33:39', 2, 'WEA0192', '00005'),
(33, '2021-01-03 23:38:35', '33_2021-01-03_23:38:35', 1, 'WEH0132', '00001'),
(34, '2021-01-03 23:46:58', '34_2021-01-03_23:46:58', 1, 'KCX8208', '00001'),
(35, '2021-01-04 16:07:28', '35_2021-01-04_16:07:28', 1, 'MCP8973', '00001'),
(36, '2021-01-04 18:52:15', '36_2021-01-04_18:52:15', 2, 'WEH0132', '00001'),
(37, '2021-01-05 16:32:27', '2', 1, 'WHA1234', '00001'),
(38, '2021-01-05 12:03:43', '38_2021-01-05_12:03:43', 1, 'MCM8799', '00001');

-- --------------------------------------------------------

--
-- Table structure for table `summon_payment`
--

CREATE TABLE `summon_payment` (
  `PaymentID` int NOT NULL,
  `SummonID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`LicensePlate`, `Model`, `Year`, `StaffID`, `StudentID`) VALUES
('KCX8208', 'Undefined', 0, NULL, 'B102938475'),
('MCM8799', 'Undefined', 0, NULL, 'B000000987'),
('MCP8973', 'Undefined', 0, NULL, 'B000000034'),
('WEA0192', 'Proton Saga', 1995, NULL, 'B000000003'),
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
  ADD KEY `fk_staffID_payment` (`StaffID`);

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
-- Indexes for table `summon_payment`
--
ALTER TABLE `summon_payment`
  ADD PRIMARY KEY (`PaymentID`,`SummonID`),
  ADD KEY `SummonID` (`SummonID`),
  ADD KEY `PaymentID` (`PaymentID`);

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
  MODIFY `PaymentID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `RecordID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sticker`
--
ALTER TABLE `sticker`
  MODIFY `StickerID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `summon`
--
ALTER TABLE `summon`
  MODIFY `SummonID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_staffID_payment` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`);

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
-- Constraints for table `summon_payment`
--
ALTER TABLE `summon_payment`
  ADD CONSTRAINT `summon_payment_ibfk_1` FOREIGN KEY (`PaymentID`) REFERENCES `payment` (`PaymentID`),
  ADD CONSTRAINT `summon_payment_ibfk_2` FOREIGN KEY (`SummonID`) REFERENCES `summon` (`SummonID`);

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
