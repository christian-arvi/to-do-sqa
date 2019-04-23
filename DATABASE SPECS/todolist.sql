-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2019 at 03:36 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `pword` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `pword`) VALUES
(1, 'arviboy', 'hello'),
(2, 'carageane', '12345'),
(4, 'herewegoagain', 'nine'),
(5, 'icarus', '12345'),
(7, 'arviboy1', 'hello'),
(8, 'admin', 'hello'),
(9, 'kutch', 'ambot'),
(10, 'ola', 'tinola'),
(11, 'pong', 'pagong'),
(12, 'tortang', 'talong'),
(13, 'kangkong', 'bagoong');

-- --------------------------------------------------------

--
-- Table structure for table `planner`
--

CREATE TABLE `planner` (
  `id` int(11) NOT NULL,
  `accid` int(11) NOT NULL,
  `task` varchar(240) NOT NULL,
  `duedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `planner`
--

INSERT INTO `planner` (`id`, `accid`, `task`, `duedate`) VALUES
(1, 1, 'Buy milk', '2019-04-17'),
(2, 1, 'buy another one', '2019-04-20'),
(3, 5, 'fuck this shit', '2019-04-17'),
(4, 5, 'another one', '2019-04-30'),
(5, 5, 'buy another one of these', '2019-04-26'),
(12, 8, 'hala', '2019-04-13'),
(13, 8, 'Clean turtle\'s tank.', '2019-04-24'),
(16, 8, 'otlum', '2019-04-25'),
(17, 8, 'amf', '2019-04-27'),
(18, 10, 'meh', '2019-04-13'),
(19, 13, 'Bugbugin si Khelly.', '2019-04-24');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `planner`
--
ALTER TABLE `planner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `planner`
--
ALTER TABLE `planner`
  ADD CONSTRAINT `planner_ibfk_1` FOREIGN KEY (`accid`) REFERENCES `accounts` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
