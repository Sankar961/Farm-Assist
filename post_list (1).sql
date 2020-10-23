-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2020 at 11:51 AM
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
-- Table structure for table `post_list`
--

CREATE TABLE `post_list` (
  `post_id` varchar(20) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `image` int(50) NOT NULL DEFAULT 0,
  `name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` varchar(10) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `status` int(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `quantity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_list`
--

INSERT INTO `post_list` (`post_id`, `emailid`, `image`, `name`, `description`, `price`, `payment`, `status`, `created_at`, `quantity`) VALUES
('UB196459', 'ajaycmohanan@gmail.com', 1, 'Ajay', 'Student', '23.99', 'Cash', 1, '2020-10-23 15:19:36', '100Kg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post_list`
--
ALTER TABLE `post_list`
  ADD PRIMARY KEY (`post_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
