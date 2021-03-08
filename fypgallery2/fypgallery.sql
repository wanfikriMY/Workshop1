-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2021 at 06:52 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fypgallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `availabletitle`
--

CREATE TABLE `availabletitle` (
  `availabeID` int(255) NOT NULL,
  `svID` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `projectType` varchar(255) NOT NULL,
  `projectCategory` varchar(30) NOT NULL,
  `project` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `availabletitle`
--

INSERT INTO `availabletitle` (`availabeID`, `svID`, `title`, `description`, `projectType`, `projectCategory`, `project`) VALUES
(3, 5664, 'FYP Dashboard 1.0 (Mobile Application)', 'FYP Dash 1.0 is a continuity of FYP Dashboard for Students and Supervisors. Currently the dashboard is designed for desktop web application. Most of the proposed features will extend or enhance the current features of the dashboard.', 'Group', 'System Development', 'BIT');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `evaluation` int(11) NOT NULL,
  `projectID` int(255) NOT NULL,
  `evaluatorID1` int(10) DEFAULT NULL,
  `evaluatorID2` int(10) DEFAULT NULL,
  `evaluatorID3` int(10) DEFAULT NULL,
  `mark1` int(11) DEFAULT NULL,
  `mark2` int(11) DEFAULT NULL,
  `mark3` int(11) DEFAULT NULL,
  `reportMark2` int(10) DEFAULT NULL,
  `totalMark` int(11) DEFAULT NULL,
  `comment` text NOT NULL,
  `reportMark3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`evaluation`, `projectID`, `evaluatorID1`, `evaluatorID2`, `evaluatorID3`, `mark1`, `mark2`, `mark3`, `reportMark2`, `totalMark`, `comment`, `reportMark3`) VALUES
(6, 76, 5680, 5677, 5631, NULL, 9, 7, 55, NULL, 'good', 45);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projectID` int(255) NOT NULL,
  `projectName` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `projectType` varchar(20) NOT NULL,
  `year` int(10) NOT NULL,
  `department` varchar(10) NOT NULL,
  `major` varchar(50) NOT NULL,
  `studentId1` int(15) NOT NULL,
  `studentId2` int(15) DEFAULT NULL,
  `studentId3` int(15) DEFAULT NULL,
  `svID` int(10) NOT NULL,
  `imgDir` varchar(255) NOT NULL,
  `fileDir` varchar(255) NOT NULL,
  `abstract` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectID`, `projectName`, `description`, `projectType`, `year`, `department`, `major`, `studentId1`, `studentId2`, `studentId3`, `svID`, `imgDir`, `fileDir`, `abstract`) VALUES
(76, 'WISDOM OF FAITH', 'This project is about bla bla bla', 'Multimedia', 2020, 'BIT', 'INFO4994', 1627133, 1717405, NULL, 6431, '360120.png', '52509.pdf', 'This is a project about bla bla bla'),
(77, 'CAR RENT', 'This project is about bla bla bla', 'System Development', 2020, 'BIT', 'INFO4994', 1710801, 1711652, NULL, 5677, '409921.png', '760623.pdf', 'This project is about bla bla bla'),
(78, 'BABY SHARK', 'This project is about bla bla bla', 'Multimedia', 2020, 'BIT', 'INFO4994', 1713650, NULL, NULL, 5680, '203785.png', '491407.pdf', 'This project is about bla bla bla'),
(79, 'FAST RIDE', 'This project is about bla bla bla', 'Multimedia', 2020, 'BIT', 'INFO4994', 1718685, NULL, NULL, 5664, '711077.png', '269970.pdf', 'This project is about bla bla bla'),
(80, 'SCHEDULING SYSTEM', 'This project is about bla bla bla', 'System Development', 2020, 'BCS', 'CSC4994', 1723091, 1715167, NULL, 9444, '951932.png', '176128.pdf', 'This project is about bla bla bla'),
(81, 'STUDY ON ROBOT', 'This project is about bla bla bla', 'Research', 2020, 'BCS', 'CSC4994', 1711652, NULL, NULL, 9441, '652362.png', '378875.pdf', 'This project is about bla bla bla'),
(82, 'STUDY ON MACHINE LEARNING', 'This project is about bla bla bla', 'Research', 2020, 'BCS', 'CSC4994', 1715656, NULL, NULL, 0, '829277.png', '468881.pdf', 'This project is about bla bla bla'),
(83, 'KNOW BETTER', 'This project is about bla bla bla', 'System Development', 2020, 'BCS', 'CSC4994', 1710065, NULL, NULL, 0, '744361.png', '308765.pdf', 'This project is about bla bla bla'),
(84, 'rt', 'erq', 'System Development', 2015, 'BIT', 'INFO4993', 1710065, NULL, NULL, 5631, '565534.jpg', '760704.pdf', 'rt');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `department` varchar(5) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `roomNo` varchar(30) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `sectionNo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `type`, `department`, `email`, `phone`, `roomNo`, `specialization`, `sectionNo`) VALUES
(1000, 'admin', '1', 'admin', '', 'admin@mail.com', '123', '', '', ''),
(5677, ' NOOR HAYANI BINTI ABD RAHIM', '5677', 'lecturer', 'BIT', 'noorhayani@iium.edu.my', '0111113333', 'C3-22', 'System Development', '15'),
(5680, 'HAZWANI BT MOHD MOHADIS', '5680', 'lecturer', 'BIT', 'hazwanimohadis@iium.edu.my', '0111116666', 'C3-33', 'Multimedia', '13'),
(6431, 'SUHAILA BINTI SAMSURI', '6431', 'lecturer', 'BIT', 'suhailasamsuri@iium.edu.my', '0111115555', 'C3-08', 'Multimedia', '3'),
(9443, 'MAZNAH BT AHMAD', '9443', 'lecturer', 'BCS', 'amaznah@iium.edu.my', '0177774444', 'C4-33', 'System Development', '11'),
(9445, 'HAFIZAH BINTI MANSOR', '9442', 'lecturer', 'BCS', 'hafizahmansor@iium.edu.my', '0177773333', 'C4-22', 'System Development', '9'),
(1710065, 'ASRUL AIQAL MOHAMMAD NOR ZAINI', 'asrul', 'student', 'BCS', 'asrul@gmail.com', '0177771111', '', '', ''),
(1710801, 'TUAN AHMAD BAZZLI BIN TUAN ABDULLAH', 'tuan', 'student', 'BIT', 'tuanbazzli@gmail.com', '0111222333', '', '', ''),
(1711652, 'MARYAM BINTI ROSLAN', 'mary', 'student', 'BCS', 'maryam@gmail.com', '0111333222', '', '', ''),
(1713650, 'SYAZWANA IZZATI BINTI AZADDIN', 'syaz', 'student', 'BIT', 'syazwana@gmail.com', '0111222444', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availabletitle`
--
ALTER TABLE `availabletitle`
  ADD PRIMARY KEY (`availabeID`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`evaluation`),
  ADD UNIQUE KEY `projectID` (`projectID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `availabletitle`
--
ALTER TABLE `availabletitle`
  MODIFY `availabeID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `evaluation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `projectID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
