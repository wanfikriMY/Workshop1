-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2020 at 03:24 PM
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
-- Database: `ecar`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `carid` int(255) NOT NULL,
  `user_id` varchar(12) NOT NULL,
  `plate` varchar(12) NOT NULL,
  `type` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`carid`, `user_id`, `plate`, `type`, `manufacturer`, `model`) VALUES
(1, '960603085997', 'WNR2577', 'Sedan', 'Proton', 'EXORA'),
(2, '960603085997', 'WNR2579', 'MPV', 'Honda', 'eqeq'),
(3, '960603085997', 'AKF3133', 'MPV', 'BMW', 'EXORA'),
(4, '960603085998', 'boweir', 'Sedan', 'Proton', 'satria turbo'),
(5, '960603085998', 'asdasd', 'MPV', 'BMW', 'EXORA');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservationid` int(5) NOT NULL,
  `user_id` varchar(12) NOT NULL,
  `centerid` int(255) NOT NULL,
  `carid` varchar(12) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `package` varchar(20) NOT NULL,
  `total` int(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `fileDir` varchar(255) NOT NULL,
  `deposit` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservationid`, `user_id`, `centerid`, `carid`, `date`, `start_time`, `package`, `total`, `status`, `fileDir`, `deposit`) VALUES
(22, '960603085997', 2, '0 ', '2019-12-10', '10:00:00', 'package B', 0, 'Pending', '', 0),
(23, '960603085997', 1, '0 ', '2019-12-19', '12:00:00', 'package A', 0, 'Pending', '', 0),
(27, '960603085997', 1, '1 ', '2019-12-10', '12:00:00', 'package C', 300, 'Approve', '', 45),
(28, '960603085997', 1, '2 ', '2019-12-26', '10:00:00', 'package C', 300, 'Approve', '250023.pdf', 150),
(30, '960603085997', 1, '2 ', '2019-12-20', '10:00:00', 'package C', 300, 'Approve', '230967.pdf', 150),
(31, '960603085997', 1, '3 ', '2020-01-31', '16:00:00', 'package C', 300, 'Approve', '1', 50),
(32, '960603085998', 2, '4 ', '2020-11-10', '16:00:00', 'package A', 500, 'Approve', '', 0),
(33, '960603085997', 4, '1 ', '2020-11-26', '10:00:00', 'package B', 250, 'Pending', '912182.pdf', 150),
(34, '960603085997', 2, '2 ', '2020-11-21', '10:00:00', 'package B', 400, 'Approve', '965995.pdf', 150),
(35, '960603085997', 3, '2 ', '2020-11-30', '16:00:00', 'package B', 250, 'Pending', '691956.pdf', 150);

-- --------------------------------------------------------

--
-- Table structure for table `servicecenter`
--

CREATE TABLE `servicecenter` (
  `centerid` int(255) NOT NULL,
  `distrinct` varchar(255) NOT NULL,
  `hangername` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicecenter`
--

INSERT INTO `servicecenter` (`centerid`, `distrinct`, `hangername`) VALUES
(1, 'AYER KEROH', 'WORKHSOP1 '),
(2, 'AYER KEROH', 'WORKHSOP2'),
(3, 'AYER KEROH', 'WORKHSOP3'),
(4, 'GRIK', 'WORKSHOP1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `level`) VALUES
('000000000000', 'admin', '4', 'admin@gmail.com', 'admin'),
('960603085997', 'Wan Fikri', '1', '1', 'user'),
('960603085998', 'qwe', '1', 'b031810056@student.utem.edu.my', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`carid`),
  ADD UNIQUE KEY `plate` (`plate`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservationid`);

--
-- Indexes for table `servicecenter`
--
ALTER TABLE `servicecenter`
  ADD PRIMARY KEY (`centerid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `carid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservationid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `servicecenter`
--
ALTER TABLE `servicecenter`
  MODIFY `centerid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
