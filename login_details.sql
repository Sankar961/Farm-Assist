-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2020 at 04:10 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmassist`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `id` int(11) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `account_type` varchar(50) DEFAULT NULL,
  `register_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`id`, `emailid`, `password`, `account_type`, `register_at`, `last_login`) VALUES
(4, 'sankar961a@gmail.com', 'bbae5703fa28dfb6515870388c81de45', '1', '2020-10-16 18:31:30', NULL),
(5, 'sankar961a@gmail.com', 'bbae5703fa28dfb6515870388c81de45', '1', '2020-10-16 19:09:56', NULL),
(6, 'sankar961a@gmail.com', 'bbae5703fa28dfb6515870388c81de45', '2', '2020-10-17 20:08:09', NULL),
(7, 'sankar961a@gmail.com', 'bbae5703fa28dfb6515870388c81de45', '1', '2020-10-19 18:23:34', NULL),
(8, 'sankar961a@gmail.com', '57c046325ad38199b15078548967b1df', '2', '2020-10-21 11:45:58', NULL),
(9, 'sankardas@gmail.com', '67164b7de9d39294681ba0990dc719e9', '2', '2020-10-21 11:47:24', NULL),
(10, 'sankardas@gmail.com', '67164b7de9d39294681ba0990dc719e9', '2', '2020-10-21 11:49:53', NULL),
(11, 'sankardas@gmail.com', 'bbae5703fa28dfb6515870388c81de45', '2', '2020-10-21 11:57:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
