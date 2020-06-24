-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2020 at 07:17 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`) VALUES
(1, 'Abytech', '5f4dcc3b5aa765d61d8327deb882cf99', 'Aby', 'Tech', 'Logo-01.png', '2019-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `position_id`, `firstname`, `lastname`, `photo`) VALUES
(18, 9, 'Josh ', 'Brolin', 'thanossmile.jpg'),
(24, 8, 'Tom', 'Vaughan', 'ebony.jpg'),
(25, 9, 'Mark', 'Doe', 'mask.jpg'),
(26, 8, 'Adam', 'Abdallah', 'Opi51c74ead38850.png'),
(27, 9, 'Abdul', 'Basit', 'photo2.jpg'),
(28, 10, 'Mohammed Habib', 'Ibrahim', 'photo3.jpg'),
(29, 10, 'Yahuza', 'Nurideen', 'photo1.jpg'),
(30, 11, 'Mohammed ', 'Yussif', 'WhatsApp Image 2019-10-02 at 10.18.26 AM (2).jpeg'),
(31, 8, 'Vote', 'No', ''),
(32, 9, 'Vote', 'No', ''),
(34, 10, 'Vote', 'No', ''),
(35, 11, 'Vote', 'No', '');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `max_vote` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `description`, `max_vote`, `priority`) VALUES
(8, 'President', 1, 1),
(9, 'P. R. O.', 1, 3),
(10, 'Entertainment Secratary', 1, 2),
(11, 'Financial Secretary (FO)', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `password`, `photo`) VALUES
(2, 'Mahfuz', 'welcome', 'photo1.jpg'),
(3, 'user', 'user', 'photo1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `indexnumber` varchar(15) NOT NULL,
  `userip` varchar(16) NOT NULL,
  `loginTime` varchar(255) NOT NULL,
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `indexnumber`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, '08170985', '::1', '', '07-01-2020 08:57:32 PM', 1),
(2, '08170985', '::1', '07-01-2020 09:02:24 PM', '07-01-2020 09:10:42 PM', 1),
(3, '08170985', '::1', '16-01-2020 06:54:44 PM', '19-01-2020 11:03:29 PM', 1),
(4, '08160111', '::1', '19-03-2020 10:27:07 PM', '', 1),
(5, '08190147', '::1', '02-04-2020 11:18:04 AM', '02-04-2020 11:29:53 AM', 1),
(6, '08190147', '::1', '02-04-2020 11:38:25 AM', '02-04-2020 12:29:29 PM', 1),
(7, '08190148', '::1', '02-04-2020 12:30:08 PM', '02-04-2020 12:36:43 PM', 1),
(8, '08190149', '::1', '03-04-2020 12:45:36 AM', '03-04-2020 01:35:12 AM', 1),
(9, '08190148', '::1', '03-04-2020 01:35:42 AM', '03-04-2020 01:57:39 AM', 1),
(10, '08190148', '::1', '04-04-2020 03:08:17 PM', '', 1),
(11, '08190148', '::1', '10-04-2020 06:51:04 PM', '11-04-2020 12:51:50 AM', 1),
(12, '08190148', '::1', '11-04-2020 01:07:34 AM', '11-04-2020 10:22:46 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `password` varchar(8) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `indexnumber` varchar(8) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `msgStatus` int(11) NOT NULL DEFAULT '0',
  `smsDtime` varchar(25) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `password`, `firstname`, `lastname`, `indexnumber`, `phoneNumber`, `status`, `msgStatus`, `smsDtime`) VALUES
(1, 'RDPOT5CL', 'Ali', 'Adam', '08170213', '0241234325', 'Unvoted', 1, '11-04 (09:14:52 PM)'),
(2, 'ZPLYGA2J', 'Abdl', 'Kadir', '08170214', '0241234326', 'Unvoted', 0, '-'),
(3, '9ZWY41R5', 'Hakim', 'Halid', '08170215', '0241234327', 'Unvoted', 0, '-'),
(4, 'P8TG4JH9', 'Salim', 'Mohammed', '08170216', '0241234328', 'Unvoted', 0, '-'),
(5, '6E1GPMW5', 'Andy', 'Iddrisu', '08170217', '0241234329', 'Unvoted', 0, '-');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `voters_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password` (`password`,`indexnumber`,`phoneNumber`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
