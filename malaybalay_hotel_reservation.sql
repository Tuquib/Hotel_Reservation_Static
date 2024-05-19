-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 04:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `malaybalay_hotel_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_and_admin`
--

CREATE TABLE `customer_and_admin` (
  `user_id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_and_admin`
--

INSERT INTO `customer_and_admin` (`user_id`, `email`, `password`, `username`, `age`, `gender`, `address`, `role`, `created_at`) VALUES
(1, 'beronio@gmail.com', '$2y$10$4WdYEd6G9wNfVwOTVQfN4eiNZkDdWm6tv9EvgcYtFKPMYpJSOKMwu', 'Philip Beronio', 19, 'Male', 'Barangay 9, Malaybalay City', 'Customer', '2024-05-03 23:29:07'),
(2, 'tuquibubald@gmail.com', '$2y$10$PZEL11VDrG.hGJd540o3fedrYKJubeJlrUom9QE4yFg29KN4JlSna', 'Ubald Jones Tuquib', 19, 'Male', 'Kisolon, Sumilao, Bukidnon', 'Customer', '2024-05-03 23:33:13'),
(3, 'gabutera@gmail.com', '$2y$10$X9c.1X2hOKJgEQZ2NA6AW.eSlAtxmRHHcPZfpg0hOTaowxwdUoBci', 'Beverly Gabutera', 19, 'Female', 'Quezon, Bukidnon', 'Customer', '2024-05-03 23:38:01'),
(4, 'admin@gmail.com', '$2y$10$ef3BcQlbGLWO5UYwdPULU.sgqGlCHyzgDu96UI7zUvEtg7/XgAjW2', 'Admin', 20, 'Male', 'Casisang Malaybalay City', 'Admin', '2024-05-05 22:12:52'),
(5, 'francis@gmail.com', '$2y$10$BrRWgELZakcviW1gb/PGTOTZ3IhtjmctdSdpb392l0R455joltTbi', 'Francis Salinio', 19, 'Male', 'Malaybalay City', 'Customer', '2024-05-14 15:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `rev_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `room_id` int(10) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `room_num` varchar(255) NOT NULL,
  `price` int(7) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `contact_num` int(12) NOT NULL,
  `checkin` date NOT NULL,
  `checkin_time` time NOT NULL,
  `checkout` date NOT NULL,
  `checkout_time` time NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`rev_id`, `user_id`, `username`, `room_id`, `room_type`, `room_num`, `price`, `payment_method`, `contact_num`, `checkin`, `checkin_time`, `checkout`, `checkout_time`, `status`) VALUES
(91, 2, 'Ubald Jones Tuquib', 2, 'Classic', 'Room 2', 1500, 'G Cash', 2147483647, '2024-04-01', '01:00:00', '2024-04-01', '01:00:00', ''),
(92, 2, 'Ubald Jones Tuquib', 6, 'Suite', 'Room 6', 2000, 'G Cash', 912638217, '2024-01-02', '01:00:00', '2024-01-03', '01:01:00', ''),
(94, 1, 'Philip Beronio', 6, 'Suite', 'Room 6', 2000, 'E-Wallet', 98817263, '2024-02-01', '01:00:00', '2024-02-02', '01:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(10) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `room_num` varchar(255) NOT NULL,
  `price` int(7) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_type`, `room_num`, `price`, `photo`) VALUES
(5, 'Classic', 'Room 5', 2500, 'background.jpg'),
(6, 'Suite', 'Room 6', 2000, 'Bed6.jpg'),
(9, 'Standard', 'Room 1', 2500, '../Images/Back2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_and_admin`
--
ALTER TABLE `customer_and_admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`rev_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_and_admin`
--
ALTER TABLE `customer_and_admin`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `rev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customer_and_admin` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
