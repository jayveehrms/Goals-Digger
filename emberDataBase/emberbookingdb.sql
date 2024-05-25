-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 01:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emberbookingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookinglist`
--

CREATE TABLE `bookinglist` (
  `aid_id` int(12) NOT NULL,
  `book_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_number` varchar(25) NOT NULL,
  `preferred_vehicle` varchar(255) NOT NULL,
  `pickup_location` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `travel_date_time` datetime NOT NULL,
  `status` enum('Pending','Approved','Disapproved','Cancelled') NOT NULL DEFAULT 'Pending',
  `time_duration` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookingverification`
--

CREATE TABLE `bookingverification` (
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_number` varchar(25) NOT NULL,
  `preferred_vehicle` varchar(255) NOT NULL,
  `pickup_location` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `travel_date_time` datetime NOT NULL,
  `verification_code` text NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `time_duration` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emberadmin`
--

CREATE TABLE `emberadmin` (
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emberadmin`
--

INSERT INTO `emberadmin` (`username`, `email`, `password`, `contact`) VALUES
('admin', 'admin@example.com', '$2y$10$34zHvdEdv/y4059mzeowIOkCv8EbHjSO2OzVvHsShswvXvzuGkYYe', '09756448231');

-- --------------------------------------------------------

--
-- Table structure for table `emberusers`
--

CREATE TABLE `emberusers` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `loyalty_badge` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emberusers`
--

INSERT INTO `emberusers` (`user_id`, `username`, `email`, `password`, `contact`, `loyalty_badge`) VALUES
(9, 'Carl', 'jcaamrelo@gmail.com', '$2y$10$nbJrtzFAYiaMCXZB20tJIOpvUVHuHHvr/9t8bL8NHDjn9jqy6SviW', '45646246247', 2);

-- --------------------------------------------------------

--
-- Table structure for table `embervehicles`
--

CREATE TABLE `embervehicles` (
  `v_id` int(20) NOT NULL,
  `v_name` varchar(200) NOT NULL,
  `v_reg_no` varchar(200) NOT NULL,
  `v_pass_no` varchar(200) NOT NULL,
  `v_type` varchar(200) NOT NULL,
  `v_status` enum('Booked','Available','','') NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `embervehicles`
--

INSERT INTO `embervehicles` (`v_id`, `v_name`, `v_reg_no`, `v_pass_no`, `v_type`, `v_status`) VALUES
(5, 'Car 1', 'CA123', '10', 'SUV', 'Available'),
(6, 'Car 2', 'CA1234', '50', 'BUS', 'Booked'),
(7, 'Car 3', 'CA1245', '10', 'VAN', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `userverification`
--

CREATE TABLE `userverification` (
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_code` text NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `time_duration` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userverification`
--

INSERT INTO `userverification` (`username`, `email`, `contact`, `password`, `verification_code`, `email_verified_at`, `time_duration`) VALUES
('Dreadlord', 'surunekaru@gmail.com', '09090909054', 'carl', '332568', NULL, '2024-05-24 17:57:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookinglist`
--
ALTER TABLE `bookinglist`
  ADD PRIMARY KEY (`aid_id`);

--
-- Indexes for table `bookingverification`
--
ALTER TABLE `bookingverification`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `emberadmin`
--
ALTER TABLE `emberadmin`
  ADD PRIMARY KEY (`email`,`username`);

--
-- Indexes for table `emberusers`
--
ALTER TABLE `emberusers`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `embervehicles`
--
ALTER TABLE `embervehicles`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `userverification`
--
ALTER TABLE `userverification`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookinglist`
--
ALTER TABLE `bookinglist`
  MODIFY `aid_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `emberusers`
--
ALTER TABLE `emberusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `embervehicles`
--
ALTER TABLE `embervehicles`
  MODIFY `v_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
