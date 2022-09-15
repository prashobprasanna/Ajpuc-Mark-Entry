-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2022 at 06:32 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajpuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `feereceiptinfo`
--

CREATE TABLE `feereceiptinfo` (
  `feeId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `payDate` date NOT NULL,
  `payMethod` varchar(25) NOT NULL,
  `paidAmount` double NOT NULL,
  `invoiceNo` int(25) NOT NULL,
  `invoiceD/w` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feetable`
--

CREATE TABLE `feetable` (
  `feeId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `dueDate` date NOT NULL,
  `receiptBook` varchar(25) NOT NULL,
  `feeName` varchar(25) NOT NULL,
  `actualAmount` double NOT NULL,
  `outstandingAmount` double NOT NULL,
  `payingAmount` double NOT NULL,
  `fine` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parentId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `fImage` blob NOT NULL,
  `mImage` blob NOT NULL,
  `fName` varchar(50) NOT NULL,
  `mName` varchar(50) NOT NULL,
  `fEmail` varchar(25) NOT NULL,
  `fpNo` varchar(15) NOT NULL,
  `fEducation` varchar(25) NOT NULL,
  `fOccupation` varchar(25) NOT NULL,
  `fDesignation` varchar(25) NOT NULL,
  `mEmail` varchar(50) NOT NULL,
  `mpNo` varchar(15) NOT NULL,
  `mEducation` varchar(25) NOT NULL,
  `mOccupation` varchar(25) NOT NULL,
  `mDesignation` varchar(25) NOT NULL,
  `fOrganizationName` varchar(25) NOT NULL,
  `mOrganizationName` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `pincode` int(15) NOT NULL,
  `state` varchar(25) NOT NULL,
  `parentPreference` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schoolinfo`
--

CREATE TABLE `schoolinfo` (
  `affiliationNumber` varchar(25) NOT NULL,
  `curriculum` varchar(25) NOT NULL,
  `principal` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `pincode` int(11) NOT NULL,
  `state` varchar(25) NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `phone2` varchar(15) NOT NULL,
  `mobile1` varchar(15) NOT NULL,
  `mobile2` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `website` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentId` int(11) NOT NULL,
  `admissionNo` varchar(50) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `class` varchar(25) NOT NULL,
  `contactNo` varchar(15) NOT NULL,
  `bloodGroup` varchar(11) NOT NULL,
  `image` blob NOT NULL,
  `houseName` varchar(50) NOT NULL,
  `religion` varchar(25) NOT NULL,
  `caste` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `aadharNo` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `motherTongue` varchar(25) NOT NULL,
  `dateofJoining` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studentachievement`
--

CREATE TABLE `studentachievement` (
  `studentId` int(11) NOT NULL,
  `class` varchar(25) NOT NULL,
  `notes` varchar(25) NOT NULL,
  `files` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transportinfo`
--

CREATE TABLE `transportinfo` (
  `transportId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `pickupZone` varchar(25) NOT NULL,
  `pickupPoint` varchar(25) NOT NULL,
  `dropZone` varchar(25) NOT NULL,
  `dropPoint` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feereceiptinfo`
--
ALTER TABLE `feereceiptinfo`
  ADD KEY `feeId` (`feeId`),
  ADD KEY `studentId` (`studentId`);

--
-- Indexes for table `feetable`
--
ALTER TABLE `feetable`
  ADD PRIMARY KEY (`feeId`),
  ADD KEY `studentId` (`studentId`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parentId`),
  ADD KEY `studentId` (`studentId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `studentachievement`
--
ALTER TABLE `studentachievement`
  ADD KEY `studentId` (`studentId`);

--
-- Indexes for table `transportinfo`
--
ALTER TABLE `transportinfo`
  ADD PRIMARY KEY (`transportId`),
  ADD KEY `studentId` (`studentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feetable`
--
ALTER TABLE `feetable`
  MODIFY `feeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transportinfo`
--
ALTER TABLE `transportinfo`
  MODIFY `transportId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feereceiptinfo`
--
ALTER TABLE `feereceiptinfo`
  ADD CONSTRAINT `feereceiptinfo_ibfk_1` FOREIGN KEY (`feeId`) REFERENCES `feetable` (`feeId`),
  ADD CONSTRAINT `feereceiptinfo_ibfk_2` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`);

--
-- Constraints for table `feetable`
--
ALTER TABLE `feetable`
  ADD CONSTRAINT `feetable_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`);

--
-- Constraints for table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`);

--
-- Constraints for table `studentachievement`
--
ALTER TABLE `studentachievement`
  ADD CONSTRAINT `studentachievement_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`);

--
-- Constraints for table `transportinfo`
--
ALTER TABLE `transportinfo`
  ADD CONSTRAINT `transportinfo_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
