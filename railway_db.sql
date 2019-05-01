-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2017 at 01:24 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `railway_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uid` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uid`, `username`, `password`) VALUES
(1, 'fnb', 'fnb'),
(2, 'sk', 'sk');

-- --------------------------------------------------------

--
-- Table structure for table `available_seats`
--

CREATE TABLE `available_seats` (
  `lid` int(32) NOT NULL,
  `date` date NOT NULL,
  `available` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `lid` int(32) NOT NULL,
  `typeid` int(3) NOT NULL,
  `departure_sid` int(4) NOT NULL,
  `arrival_sid` int(4) NOT NULL,
  `departure_scheduled_time` time NOT NULL,
  `arrival_scheduled_time` time NOT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`lid`, `typeid`, `departure_sid`, `arrival_sid`, `departure_scheduled_time`, `arrival_scheduled_time`, `price`) VALUES
(1, 1, 1, 2, '07:00:00', '12:10:00', 788),
(2, 2, 1, 2, '15:00:00', '00:00:21', 788);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `post_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `post_text` text NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`post_id`, `date`, `post_text`, `uid`) VALUES
(2, '2017-08-13 16:46:47', 'Welcome to our service!', 2),
(5, '2017-08-13 23:25:24', 'hello 1st', 1),
(6, '2017-08-14 13:52:08', 'hello 2nd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `uid` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`uid`, `name`, `phone`) VALUES
(1, 'Faisal Noor', '01fnb'),
(2, 'Shadhin Khan', '01sk');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `rid` int(11) NOT NULL,
  `customer_name` varchar(32) NOT NULL,
  `phon_no` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `number_of_seats` int(5) NOT NULL,
  `lid` int(32) NOT NULL,
  `cancelation_code` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `sid` int(3) NOT NULL,
  `sname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`sid`, `sname`) VALUES
(13, 'Borimari'),
(14, 'Chandpur'),
(18, 'Chilahati'),
(1, 'Chittagong'),
(11, 'Dewangong'),
(2, 'Dhaka'),
(24, 'Dhaka Cantt'),
(5, 'Dinajpur'),
(23, 'Faridpur'),
(19, 'Goalonda Ghat'),
(4, 'Khulna'),
(9, 'Kishorgonj'),
(16, 'Lalmonirhat'),
(17, 'Mohangonj'),
(10, 'Mymensingh'),
(7, 'Noakhali'),
(22, 'Rajbari'),
(6, 'Rajshahi'),
(8, 'Rangpur'),
(12, 'Santahar'),
(20, 'Sirajgonj'),
(3, 'Sylhet'),
(15, 'Tarakandi'),
(21, 'Vatiapara Ghat');

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `tid` int(3) NOT NULL,
  `tname` char(32) NOT NULL,
  `offday` char(10) DEFAULT NULL,
  `total_seats` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`tid`, `tname`, `offday`, `total_seats`) VALUES
(1, 'Subarna Express', 'Monday', 1000),
(2, 'Ekota Express', 'Tuesday', 850),
(3, 'Tista Express', 'Monday', 900),
(4, 'Parabat Express', 'Tuesday', 1100),
(5, 'Upukol Express', 'Wednesday', 900),
(6, 'Karutoa Express', NULL, 1000),
(7, 'Joyantika Express', 'Thursday', 1000),
(8, 'Paharika Express', 'Saturday', 1150);

-- --------------------------------------------------------

--
-- Table structure for table `train_type`
--

CREATE TABLE `train_type` (
  `typeid` int(3) NOT NULL,
  `type` varchar(32) DEFAULT NULL,
  `tid` int(3) DEFAULT NULL,
  `seats` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train_type`
--

INSERT INTO `train_type` (`typeid`, `type`, `tid`, `seats`) VALUES
(1, 'AC', 1, 900),
(2, 'AC', 2, 300),
(3, 'AC', 3, 150),
(4, 'AC', 4, 150),
(5, 'AC', 5, 250),
(6, 'NON_AC', 1, 100),
(7, 'NON_AC', 2, 550),
(8, 'NON_AC', 3, 750),
(9, 'NON_AC', 4, 950),
(10, 'NON_AC', 5, 650),
(11, 'NON_AC', 6, 1000),
(12, 'NON_AC', 7, 1000),
(13, 'NON_AC', 8, 1150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`lid`),
  ADD UNIQUE KEY `typeid` (`typeid`,`departure_scheduled_time`),
  ADD KEY `departure_sid` (`departure_sid`),
  ADD KEY `arrival_sid` (`arrival_sid`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `sname` (`sname`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`tid`),
  ADD UNIQUE KEY `tname` (`tname`);

--
-- Indexes for table `train_type`
--
ALTER TABLE `train_type`
  ADD PRIMARY KEY (`typeid`),
  ADD UNIQUE KEY `type` (`type`,`tid`),
  ADD KEY `tid` (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `lid` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `sid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `trains`
--
ALTER TABLE `trains`
  MODIFY `tid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `train_type`
--
ALTER TABLE `train_type`
  MODIFY `typeid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`typeid`) REFERENCES `train_type` (`typeid`),
  ADD CONSTRAINT `log_ibfk_2` FOREIGN KEY (`departure_sid`) REFERENCES `station` (`sid`),
  ADD CONSTRAINT `log_ibfk_3` FOREIGN KEY (`arrival_sid`) REFERENCES `station` (`sid`);

--
-- Constraints for table `notice`
--
ALTER TABLE `notice`
  ADD CONSTRAINT `notice_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `admin` (`uid`);

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `admin` (`uid`);

--
-- Constraints for table `train_type`
--
ALTER TABLE `train_type`
  ADD CONSTRAINT `train_type_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `trains` (`tid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
