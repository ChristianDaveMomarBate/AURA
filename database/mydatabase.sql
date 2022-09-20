-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 03:31 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `servicerequest` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `feedback` varchar(250) NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `name`, `phone`, `location`, `date`, `time`, `servicerequest`, `price`, `status`, `feedback`, `reason`) VALUES
(95, 'bats', '09518221226', 'Claver', '2021-10-02', '01:05:00.000000', ' waya lang', ' ₱ 63,600.00', 'Cancelled', 'this is feedback', 'dasdas'),
(96, 'claire', '09518221226', 'Surigao ', '2021-10-01', '10:10:00.000000', ' waya lang', ' ₱ 63,600.00', 'Cancelled', 'yaot', 'reson ini'),
(98, 'claire', '09518221226', 'Surigao city', '2021-10-21', '06:53:00.000000', ' dasda', ' ₱ 6,500.00', 'Cancelled', '', 'Cancelled'),
(99, 'Jerome', '091554212121', 'Surigao ', '2021-10-22', '07:15:00.000000', ' dasdasdasda', ' ₱ 400.00', 'Cancelled', '', ''),
(100, 'claire', '09518221226', 'Surigao ', '2021-10-21', '21:23:00.000000', ' waya-lang', ' ₱ 300.00', 'Unpaid', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bats`
--

CREATE TABLE `bats` (
  `id` int(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bats`
--

INSERT INTO `bats` (`id`, `date`) VALUES
(1, '2021-09-01 23:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `category` varchar(255) NOT NULL,
  `services` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `services`) VALUES
(54, 'CHINGAI', 'Chingcat'),
(55, 'SAMPLE-ES', 'sample 1'),
(56, 'T-LOUNGE', 'Desctipdasda');

-- --------------------------------------------------------

--
-- Table structure for table `cuser`
--

CREATE TABLE `cuser` (
  `id` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cuser`
--

INSERT INTO `cuser` (`id`, `password`, `user_name`, `position`) VALUES
(9, '123', 'Christian Dave Bate', 'Client'),
(10, '123', 'Jerome', 'Client'),
(11, '1234', 'Jerome', 'Client'),
(12, '123', 'jawa', 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `firstname`, `lastname`, `gender`, `age`, `address`) VALUES
(50, 'Philip', 'Reyes', 'Male', 21, 'Purok 2 Brgy. Serna Santa cruz City'),
(51, 'abdul ', 'pangandaman', 'male', 2312, 'asdawsqffw'),
(52, 'abdul ', 'pangandaman', 'male', 23, 'asdawsqffw');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) NOT NULL,
  `maincategory` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `servicename` varchar(255) NOT NULL,
  `price` int(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `maincategory`, `category`, `description`, `servicename`, `price`, `image`, `location`) VALUES
(60, 'GRAND-ROYAL-SPA', 'Chingcat', 'anuena', 'waya-lang', 300, 'blackP.jpg', 'SURIGAO CITY'),
(74, 'T-LOUNGE', 'Desctipdasda', 'china ', 'anuena', 122, 'blackP.jpg', 'surigao');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `phone`, `password`, `position`, `name`) VALUES
(30, 'Aura', 'aura@gmail.com', '09123456789', 'aura', 'Administrator', 'Aura Appointment System'),
(33, 'establishtment', 'cblake@sample.com', '09093456789', '12345', 'Administrator', 'philip');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bats`
--
ALTER TABLE `bats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuser`
--
ALTER TABLE `cuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `bats`
--
ALTER TABLE `bats`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `cuser`
--
ALTER TABLE `cuser`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
