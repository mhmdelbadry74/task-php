-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 06, 2020 at 12:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `person_data`
--

CREATE TABLE `person_data` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `latitude` float(8,2) NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person_data`
--

INSERT INTO `person_data` (`id`, `name`, `birth_date`, `latitude`, `longitude`) VALUES
(9, 'mhmd Ra ahmed ', '5-6-2000', 1.50, 1.4),
(10, 'mhmd M ahmed ', '3-10-2000', 1.50, 1.4),
(11, 'mhmd M ahmed ', '20-1-2000', 1.50, 1.4),
(12, 'mhmd M ahmed ', '20-1-2001', 1.50, 1.4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `person_data`
--
ALTER TABLE `person_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `person_data`
--
ALTER TABLE `person_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
