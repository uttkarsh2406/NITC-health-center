-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 06:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesses`
--

CREATE TABLE `accesses` (
  `date` date NOT NULL,
  `time` time NOT NULL,
  `medicine` varchar(9) NOT NULL,
  `pharmID` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accesses`
--

INSERT INTO `accesses` (`date`, `time`, `medicine`, `pharmID`) VALUES
('2021-12-01', '19:31:05', 'M12345678', 'P12345678');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `type` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aptID` varchar(9) NOT NULL,
  `createdby` varchar(9) NOT NULL,
  `patient` varchar(9) NOT NULL,
  `doctor` varchar(9) NOT NULL,
  `prescriptionID` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`type`, `timestamp`, `aptID`, `createdby`, `patient`, `doctor`, `prescriptionID`) VALUES
('fresh', '2021-12-01 14:00:53', 'A12345678', 'R12345678', 'B190773CS', 'D12345678', 'P1234678');

-- --------------------------------------------------------

--
-- Table structure for table `contains`
--

CREATE TABLE `contains` (
  `prescriptionID` varchar(9) NOT NULL,
  `medicineID` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contains`
--

INSERT INTO `contains` (`prescriptionID`, `medicineID`) VALUES
('P1234678', 'M12345678');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `name` varchar(50) NOT NULL,
  `docID` varchar(9) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `qualification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`name`, `docID`, `address`, `password`, `phone`, `qualification`) VALUES
('doctor1', 'D12345678', 'nitc', 'd1', 1234567890, 'mbbs');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `expiry` date NOT NULL,
  `drugID` varchar(9) NOT NULL,
  `drugname` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`expiry`, `drugID`, `drugname`, `quantity`) VALUES
('2021-12-15', 'M12345678', 'crocin', 100);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `name` varchar(50) NOT NULL,
  `pharmID` varchar(9) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`name`, `pharmID`, `password`, `phone`) VALUES
('pharmacist1', 'P12345678', 'p1', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `date` date NOT NULL,
  `pID` varchar(9) NOT NULL,
  `diagnosis` varchar(100) NOT NULL,
  `pharmacist` varchar(9) NOT NULL,
  `PT` varchar(9) NOT NULL,
  `DR` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`date`, `pID`, `diagnosis`, `pharmacist`, `PT`, `DR`) VALUES
('2021-12-01', 'P1234678', 'advav', 'P12345678', 'B190773CS', 'D12345678');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `name` varchar(50) NOT NULL,
  `repID` varchar(9) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`name`, `repID`, `password`, `phone`) VALUES
('receptionist1', 'R12345678', 'r1', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `name` varchar(50) NOT NULL,
  `rollno` varchar(9) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `g_phone` bigint(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `rollno`, `dob`, `address`, `password`, `phone`, `g_phone`, `email`) VALUES
('rahul', 'B190773CS', '2001-09-28', 'nashik', 'dbms', 1234567890, 1234567890, 'rahul@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesses`
--
ALTER TABLE `accesses`
  ADD PRIMARY KEY (`date`,`time`,`medicine`,`pharmID`),
  ADD KEY `medicine_fk` (`medicine`),
  ADD KEY `pharmID_fk` (`pharmID`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`aptID`),
  ADD KEY `createdby_fk` (`createdby`),
  ADD KEY `patient_fk` (`patient`),
  ADD KEY `doctor_fk` (`doctor`),
  ADD KEY `PID_FK` (`prescriptionID`) USING BTREE;

--
-- Indexes for table `contains`
--
ALTER TABLE `contains`
  ADD PRIMARY KEY (`prescriptionID`,`medicineID`),
  ADD KEY `drugID_fk` (`medicineID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`docID`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`drugID`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`pharmID`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`pID`),
  ADD KEY `pharmacist_fk` (`pharmacist`),
  ADD KEY `DFK` (`DR`),
  ADD KEY `PFK` (`PT`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`repID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`rollno`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accesses`
--
ALTER TABLE `accesses`
  ADD CONSTRAINT `medicine_fk` FOREIGN KEY (`medicine`) REFERENCES `medicine` (`drugID`),
  ADD CONSTRAINT `pharmID_fk` FOREIGN KEY (`pharmID`) REFERENCES `pharmacist` (`pharmID`);

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `createdby_fk` FOREIGN KEY (`createdby`) REFERENCES `receptionist` (`repID`),
  ADD CONSTRAINT `doctor_fk` FOREIGN KEY (`doctor`) REFERENCES `doctor` (`docID`),
  ADD CONSTRAINT `gargtgsrgh` FOREIGN KEY (`prescriptionID`) REFERENCES `prescription` (`pID`),
  ADD CONSTRAINT `patient_fk` FOREIGN KEY (`patient`) REFERENCES `student` (`rollno`);

--
-- Constraints for table `contains`
--
ALTER TABLE `contains`
  ADD CONSTRAINT `drugID_fk` FOREIGN KEY (`medicineID`) REFERENCES `medicine` (`drugID`),
  ADD CONSTRAINT `pID_fk` FOREIGN KEY (`prescriptionID`) REFERENCES `prescription` (`pID`);

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `DFK` FOREIGN KEY (`DR`) REFERENCES `doctor` (`docID`),
  ADD CONSTRAINT `PFK` FOREIGN KEY (`PT`) REFERENCES `student` (`rollno`),
  ADD CONSTRAINT `pharmacist_fk` FOREIGN KEY (`pharmacist`) REFERENCES `pharmacist` (`pharmID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
