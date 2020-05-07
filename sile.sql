-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2020 at 08:15 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sile`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `ID` int(10) NOT NULL,
  `Project_Topic` varchar(100) NOT NULL,
  `Program` varchar(100) NOT NULL,
  `Date_Added` varchar(100) NOT NULL,
  `Added_By` varchar(100) NOT NULL,
  `supervisor` varchar(100) NOT NULL,
  `Area_Of_Knowledge` varchar(100) NOT NULL,
  `Availability` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`ID`, `Project_Topic`, `Program`, `Date_Added`, `Added_By`, `supervisor`, `Area_Of_Knowledge`, `Availability`) VALUES
(2, 'good of you', 'MSC', '2020-Mar-Fri', 'segun', 'adeyemi', 'banking', 'False'),
(3, 'good of you ok', 'PGD', '2020-03-06', 'segun', 'adeyemi', 'banking', 'True'),
(5, 'Project allocation System', 'MSC', '2020-03-07', 'segun', 'Engr.Adekoya', 'school', 'False'),
(6, 'effect of cyber security on nigeria economy', 'MSC', '2020-03-07', 'segun', 'pro Akinlabi', 'cyber', 'False'),
(7, 'php my admin', 'PGD', '2020-03-07', 'segun', 'adeyemi', 'banking', 'False'),
(8, 'Project allocation System new', 'MSC', '2020-03-07', 'segun', 'Engr.Adekoya', 'school', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Matric_Number` varchar(100) NOT NULL,
  `Program` varchar(100) NOT NULL,
  `Date` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Project_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `Name`, `Matric_Number`, `Program`, `Date`, `Email`, `Project_Id`) VALUES
(4, 'babbatund eoluse', '090', 'MSC', '2020-03-07', 'babatundeolusegun@tahoo.com', 2),
(5, 'babatunde  olusegun OLANIYI', '09090990900', 'PGD', '2020-03-07', 'babatundeolusegun@tahoo.com', 7),
(6, 'adeyanju', '090909097', 'MSC', '2020-03-07', 'babatundeolusegun@tahoo.com', 5),
(7, 'BEATRICE C OLABIMITAN', '9090909', 'MSC', '2020-03-07', 'beclems2004@yahoo.com', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Last_Login` varchar(100) NOT NULL,
  `Role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Email`, `Password`, `Date`, `Name`, `Last_Login`, `Role`) VALUES
(1, 'beclems2004@yahoo.com', '000000', '', 'deji', '', 0),
(2, 'ad@jo.com', 'oooooo', '', 'babatunde', '', 0),
(3, 'admin@admin.com', 'admin', '', 'segun', 'Sat Mar 2020  09:50:21pm', 1),
(5, '1admin@admin.com', 'admin', '2020-03-07', 'bababtunse', 'Sat Mar 2020  09:22:41pm', 0),
(6, '2admin@admin.com', 'admin', '2020-03-07', 'omoleye', '', -1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`,`Matric_Number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
