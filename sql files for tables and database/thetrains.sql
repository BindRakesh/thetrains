-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2019 at 09:38 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thetrains`
--

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `id` int(11) NOT NULL,
  `station_name` text NOT NULL,
  `h` tinyint(1) NOT NULL DEFAULT '0',
  `c` tinyint(1) NOT NULL DEFAULT '0',
  `w` tinyint(1) NOT NULL DEFAULT '0',
  `th` tinyint(1) NOT NULL DEFAULT '0',
  `rank` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`id`, `station_name`, `h`, `c`, `w`, `th`, `rank`) VALUES
(1, 'mankhurd', 1, 0, 0, 0, '15'),
(2, 'govandi', 1, 0, 0, 0, '14'),
(3, 'chembur', 1, 0, 0, 0, '13'),
(4, 'tilak nagar', 1, 0, 0, 0, '12'),
(5, 'kurla', 1, 0, 0, 0, '11'),
(6, 'chunabhatti', 1, 0, 0, 0, '10');

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `id` int(11) NOT NULL,
  `start` text NOT NULL,
  `destination` text NOT NULL,
  `start_time` time NOT NULL,
  `destination_time` time NOT NULL,
  `h` tinyint(1) NOT NULL DEFAULT '0',
  `c` tinyint(1) NOT NULL DEFAULT '0',
  `w` tinyint(1) NOT NULL DEFAULT '0',
  `th` tinyint(1) NOT NULL DEFAULT '0',
  `on_sunday` tinyint(1) NOT NULL DEFAULT '1',
  `source_rank` int(11) NOT NULL,
  `destination_rank` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`id`, `start`, `destination`, `start_time`, `destination_time`, `h`, `c`, `w`, `th`, `on_sunday`, `source_rank`, `destination_rank`) VALUES
(14, 'panvel', 'csmt', '04:29:00', '05:49:00', 1, 0, 0, 0, 1, 25, 1),
(13, 'panvel', 'csmt', '04:03:00', '05:22:00', 1, 0, 0, 0, 1, 25, 1),
(12, 'csmt', 'panvel', '04:32:00', '05:52:00', 1, 0, 0, 0, 1, 1, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `trains`
--
ALTER TABLE `trains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
