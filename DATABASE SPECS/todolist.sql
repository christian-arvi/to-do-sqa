-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2019 at 09:48 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(240) NOT NULL,
  `password` varchar(240) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `firstname`, `lastname`, `gender`) VALUES
(1, 'arviboy', 'hello', 'Christian Arvi', 'Binanitan', 'M'),
(2, 'carageane', '12345', 'cara', 'integro', 'F'),
(4, 'herewegoagain', 'nine', 'enrico', 'bernardino', 'M'),
(5, 'icarus', '12345', 'cara', 'integro', 'F'),
(7, 'arviboy1', 'hello', 'Christian', 'Binanitan', 'M'),
(8, 'admin', 'hello', 'Arvi', 'Binanitan', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `planner`
--

CREATE TABLE `planner` (
  `id` int(11) NOT NULL,
  `accid` int(11) NOT NULL,
  `task` varchar(240) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `planner`
--

INSERT INTO `planner` (`id`, `accid`, `task`, `date`) VALUES
(1, 1, 'Buy milk', '2019-04-17'),
(2, 1, 'buy another one', '2019-04-20'),
(3, 5, 'fuck this shit', '2019-04-17'),
(4, 5, 'another one', '2019-04-30'),
(5, 5, 'buy another one of these', '2019-04-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planner`
--
ALTER TABLE `planner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accid` (`accid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `planner`
--
ALTER TABLE `planner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `planner`
--
ALTER TABLE `planner`
  ADD CONSTRAINT `planner_ibfk_1` FOREIGN KEY (`accid`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
