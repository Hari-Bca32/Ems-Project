-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2025 at 04:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newems`
--

-- --------------------------------------------------------

--
-- Table structure for table `alogin`
--

CREATE TABLE `alogin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `alogin`
--

INSERT INTO `alogin` (`id`, `email`, `password`) VALUES
(1, 'admin', '$2y$10$.UP5EjEnBqa72/LfhGjoyOKeuHY8jKVYl.iDeCyJA7WHl40ETXfpO');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `nid` int(20) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `dept` varchar(100) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `pic` text NOT NULL,
  `points` int(11) DEFAULT 0,
  `subdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `firstName`, `lastName`, `email`, `password`, `birthday`, `gender`, `contact`, `nid`, `address`, `dept`, `degree`, `pic`, `points`, `subdate`) VALUES
(103, 'Steven', 'Wilson', 'wilson@xyz.corp', '1234', '1990-02-02', 'Male', '5252', 6262, 'Thames, UK', 'Creative', 'MSc', 'images/sw-google.png', 0, NULL),
(104, 'Guthrie', 'Govan', 'guthrie@xyz.corp', '1234', '1971-12-01', 'Male', '9595', 5959, 'Chemsford, USA', 'Creative', 'MSc', 'images/test.jpg', 0, NULL),
(105, 'Elon', 'Musk', 'elon@spacex.com', '1234', '1971-06-28', 'Male', '8585', 5858, 'LA, USA', 'SpaceTech', 'BSc', 'images/330px-Elon_Musk_Royal_Society.jpg', 0, NULL),
(107, 'Wonder ', 'Woman', 'woman@xyz.corp', '1234', '1993-03-03', 'Female', '4545', 5454, 'USA', 'Defense ', 'MS', 'images/no.jpg', 0, NULL),
(108, 'Andrew', ' Ng', 'andrew@xyz.corp', '1234', '1976-04-16', 'Male', '758758', 857857, 'USA', 'AI', 'PhD', 'images/download.jpeg', 0, NULL),
(109, 'Ian ', 'Goodfellow', 'ian@xyz.corp', '1234', '1985-01-01', 'Male', '852852', 258258, 'USA', 'AI', 'PhD', 'images/1-5.jpg', 0, NULL),
(110, 'Christopher ', 'Manning', 'christopher@xyz.corp', '1234', '1965-09-18', 'Male', '147147', 741741, 'USA', 'NLP', 'PhD', 'images/download (1).jpeg', 0, NULL),
(111, 'Jon', 'Snow', 'john@xyz.corp', '1234', '2011-02-01', 'Male', '0187282', 112233, 'Winterfell', 'Management', 'BSc.', 'images/jon-snow.jpg', 0, NULL),
(112, 'hari', 'haran', 'hari@gmail.com', '1234', '2004-11-16', 'Male', '09047331800', 0, 'dsfsfdsf', 'hr', 'mca', 'images/Screenshot 2025-02-04 050447.png', 0, NULL),
(114, 'Hari', 'haran m', 'hari1@gmail.com', '1234', '2004-11-16', 'Male', '9543737208', 0, 'Virudhunagar', 'Hr', '', 'images/2a9a80f2b57ae32cb3befc962e307af7.jpg', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave`
--

CREATE TABLE `employee_leave` (
  `id` int(11) DEFAULT NULL,
  `token` int(11) NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `reason` char(100) DEFAULT NULL,
  `status` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee_leave`
--

INSERT INTO `employee_leave` (`id`, `token`, `start`, `end`, `reason`, `status`) VALUES
(103, 306, '2019-04-08', '2019-04-08', 'Concert Tour', 'Cancelled'),
(105, 308, '2019-04-26', '2019-04-30', 'Launching Tesla Model Y', 'Cancelled'),
(111, 309, '2019-04-09', '2019-04-13', 'Visit to Kings Landing', 'Cancelled'),
(104, 310, '2019-04-08', '2019-04-09', 'Emergency Leave', 'Approved'),
(112, 311, '2025-03-18', '2025-04-03', '', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `pid` int(11) NOT NULL,
  `eid` int(11) DEFAULT NULL,
  `pname` varchar(100) DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `subdate1` date DEFAULT NULL,
  `mark` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `subdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`pid`, `eid`, `pname`, `duedate`, `subdate1`, `mark`, `status`, `subdate`) VALUES
(215, 105, 'Tesla Model Y', '2019-04-19', '2019-04-06', 10, 'Submitted', NULL),
(217, 111, 'Do Nothing', '2019-04-02', '2019-04-01', 8, 'Submitted', NULL),
(218, 105, 'Tesla Model X', '2019-04-03', '2019-04-03', 10, 'Submitted', NULL),
(220, 110, 'Data Analysis', '2019-04-16', '2019-04-04', 8, 'Submitted', NULL),
(221, 110, 'Data Analysis', '2019-04-16', '2019-04-04', 7, 'Submitted', NULL),
(222, 103, 'Statistical', '2019-04-19', '2019-04-04', 6, 'Submitted', NULL),
(223, 108, 'Software Scema', '2019-04-09', '2019-04-02', 3, 'Submitted', NULL),
(224, 107, 'Security Check', '2019-04-26', '2019-04-05', 9, 'Submitted', NULL),
(225, 109, 'ML', '2019-04-03', '2019-04-04', 6, 'Submitted', NULL),
(233, 103, 'sfsdfsddfdfdsfdsfdsfsfshariu', '2025-03-05', NULL, 1, 'Due', NULL),
(239, 112, 'ems', '2025-03-27', NULL, 10, 'Submitted', '2025-03-27'),
(240, 112, 'ems1', '2025-03-27', NULL, 0, 'Submitted', '2025-03-28'),
(241, 112, 'ems2', '2025-03-03', NULL, 0, 'Due', NULL),
(242, 112, 'ems2', '2025-03-13', NULL, 0, 'Due', NULL),
(243, 114, 'Bill Software', '2025-04-26', NULL, 0, 'Submitted', '2025-04-07'),
(244, 114, 'FingerPrint Login ', '2025-05-30', NULL, 0, 'Submitted', '2025-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `eid` int(11) NOT NULL,
  `points` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`eid`, `points`) VALUES
(103, 37),
(104, 0),
(105, 20),
(107, 9),
(108, 3),
(109, 6),
(110, 15),
(111, 8),
(112, 10),
(114, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `base` int(11) NOT NULL,
  `bonus` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `base`, `bonus`, `total`) VALUES
(103, 65000, 37, 89050),
(104, 78000, 0, 78000),
(105, 105000, 20, 126000),
(107, 77000, 9, 83930),
(108, 50000, 3, 51500),
(109, 85000, 6, 90100),
(110, 47000, 15, 54050),
(111, 45000, 8, 48600),
(112, 500000, 10, 550000),
(114, 45000, 0, 45000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alogin`
--
ALTER TABLE `alogin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employee_leave`
--
ALTER TABLE `employee_leave`
  ADD PRIMARY KEY (`token`),
  ADD KEY `employee_leave_ibfk_1` (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `project_ibfk_1` (`eid`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alogin`
--
ALTER TABLE `alogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `employee_leave`
--
ALTER TABLE `employee_leave`
  MODIFY `token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_leave`
--
ALTER TABLE `employee_leave`
  ADD CONSTRAINT `employee_leave_ibfk_1` FOREIGN KEY (`id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rank`
--
ALTER TABLE `rank`
  ADD CONSTRAINT `rank_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
