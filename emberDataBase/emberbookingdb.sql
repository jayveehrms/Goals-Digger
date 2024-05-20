-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 02:54 PM
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
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_number` varchar(25) NOT NULL,
  `preferred_vehicle` varchar(255) NOT NULL,
  `pickup_location` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `travel_date_time` datetime NOT NULL,
  `status` enum('Pending','Approved','Disapproved','Cancelled') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookinglist`
--

INSERT INTO `bookinglist` (`user_id`, `username`, `email`, `mobile_number`, `preferred_vehicle`, `pickup_location`, `destination`, `travel_date_time`, `status`) VALUES
(6, 'Dreadlord', 'surunekaru@gmail.com', '09090909054', 'Car 1', 'Centennial Village', 'SM aura', '2024-05-20 23:48:00', 'Cancelled'),
(121, 'Carl', '3qagaq3a4ha', '34262362623', 'aegra3q4a', 'aefbqa34', 'adbarea', '2024-05-18 09:33:12', 'Disapproved');

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
(4, 'Carl Angelo Jamero', 'angelo@example.coma', 'asgasga', '0183751089', 3),
(5, 'Angelo', 'carl@example.com', 'fyueafaer', '09756448231', 1),
(6, 'Dreadlord', 'surunekaru@gmail.com', '$2y$10$34zHvdEdv/y4059mzeowIOkCv8EbHjSO2OzVvHsShswvXvzuGkYYe', '09090909054', 0);

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
  `v_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `embervehicles`
--

INSERT INTO `embervehicles` (`v_id`, `v_name`, `v_reg_no`, `v_pass_no`, `v_type`, `v_status`) VALUES
(2, 'Car 1', 'CA124', '10', 'VAN', 'Available'),
(3, 'Car 2', 'CA125', '50', 'BUS', 'Booked');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `bookinglist`
--
ALTER TABLE `bookinglist`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

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
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `user_id` (`user_id`);

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `emberusers`
--
ALTER TABLE `emberusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `embervehicles`
--
ALTER TABLE `embervehicles`
  MODIFY `v_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
