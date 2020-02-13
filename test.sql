-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2020 at 08:25 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `ind` int(11) NOT NULL,
  `empno` int(11) NOT NULL,
  `name` text NOT NULL,
  `nic` text NOT NULL,
  `contact` int(11) NOT NULL,
  `dob` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`ind`, `empno`, `name`, `nic`, `contact`, `dob`, `time`) VALUES
(9, 2, 'Ayesh', '199734603588', 779389533, '2019/21/20', '2020-02-12 17:30:45'),
(10, 5, 'Poornima', '0303030303j', 93939393, '2019/21/20', '2020-02-12 17:43:57'),
(12, 2, 'Poornima', '199734603588', 779389533, '2019/21/21', '2020-02-12 17:44:11'),
(13, 2, 'Poornima', '199734603588', 779389533, '2019/21/21', '2020-02-12 17:44:13'),
(14, 2, 'Poornima', '199734603588', 779389533, '2019/21/21', '2020-02-12 17:44:14'),
(17, 21950, 'Ashok Pathirana', '1994202020V', 2147483647, '2019/02/20', '2020-02-13 19:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `indexno` int(11) NOT NULL,
  `empno` int(11) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`indexno`, `empno`, `salary`) VALUES
(3, 2, 4999),
(4, 2, 4999),
(6, 2, 4999),
(7, 5, 84848),
(8, 21950, 25500),
(9, 21950, 25500),
(10, 21950, 25500),
(11, 21950, 25500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `indexno` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`indexno`, `username`, `password`, `time`) VALUES
(1, 'admin', '83352ccdeab80542701701a40c1e4d2e', '2020-02-13 18:39:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`ind`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`indexno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`indexno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `ind` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `indexno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `indexno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
