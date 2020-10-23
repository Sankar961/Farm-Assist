-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2020 at 10:02 AM
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
-- Table structure for table `labour_register`
--

CREATE TABLE `labour_register` (
  `emailid` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phoneno` varchar(15) NOT NULL,
  `aadharno` varchar(50) NOT NULL,
  `housename` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `wages` double NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labour_register`
--

INSERT INTO `labour_register` (`emailid`, `first_name`, `last_name`, `phoneno`, `aadharno`, `housename`, `city`, `state`, `pincode`, `wages`, `specialization`, `created_at`, `updated_at`) VALUES
('sankardas@gmail.com', 'Sankar', 'Das', '7558099682', '1234434122', 'Akathoottu', 'Muvattupuzha', 'Kerala', '686673', 12000, '1', '2020-10-21 11:57:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `labour_register`
--
ALTER TABLE `labour_register`
  ADD PRIMARY KEY (`emailid`),
  ADD UNIQUE KEY `aadharno` (`aadharno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
