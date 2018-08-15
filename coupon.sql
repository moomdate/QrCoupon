-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2018 at 06:18 AM
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
-- Database: `coupon`
--

-- --------------------------------------------------------

--
-- Table structure for table `history_exchange`
--

CREATE TABLE `history_exchange` (
  `his_id` int(11) NOT NULL,
  `his_value` int(10) NOT NULL,
  `his_user_id` int(10) NOT NULL,
  `his_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mem_id` int(11) NOT NULL,
  `mem_username` text COLLATE utf8_bin NOT NULL,
  `mem_coupon` int(5) NOT NULL,
  `mem_password` text COLLATE utf8_bin NOT NULL,
  `mem_type` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `mem_username`, `mem_coupon`, `mem_password`, `mem_type`) VALUES
(2, 'test2', 0, '01234563', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE `point` (
  `p_id` int(11) NOT NULL,
  `p_qr` varchar(20) COLLATE utf8_bin NOT NULL,
  `p_value` int(10) NOT NULL,
  `p_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `prom`
--

CREATE TABLE `prom` (
  `prom_id` int(11) NOT NULL,
  `prom_qr` varchar(50) COLLATE utf8_bin NOT NULL,
  `prom_qr_url` text COLLATE utf8_bin NOT NULL,
  `prom_value` int(11) NOT NULL,
  `prom_status` int(1) NOT NULL,
  `prom_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `userfake`
--

CREATE TABLE `userfake` (
  `f_id` int(11) NOT NULL,
  `f_usid` int(10) NOT NULL,
  `f_fake` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history_exchange`
--
ALTER TABLE `history_exchange`
  ADD PRIMARY KEY (`his_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `prom`
--
ALTER TABLE `prom`
  ADD PRIMARY KEY (`prom_id`);

--
-- Indexes for table `userfake`
--
ALTER TABLE `userfake`
  ADD PRIMARY KEY (`f_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history_exchange`
--
ALTER TABLE `history_exchange`
  MODIFY `his_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `point`
--
ALTER TABLE `point`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `prom`
--
ALTER TABLE `prom`
  MODIFY `prom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `userfake`
--
ALTER TABLE `userfake`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
