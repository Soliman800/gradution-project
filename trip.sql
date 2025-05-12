-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 09:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trip`
--

-- --------------------------------------------------------

--
-- Table structure for table `checked`
--

CREATE TABLE `checked` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `leavedate` date NOT NULL,
  `adate` date NOT NULL,
  `card` bigint(100) NOT NULL,
  `cost` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checked`
--

INSERT INTO `checked` (`id`, `user_id`, `ticket_id`, `leavedate`, `adate`, `card`, `cost`) VALUES
(27, 1, 2, '2025-02-05', '0000-00-00', 0, 500),
(28, 1, 2, '5222-02-02', '6522-12-15', 1235435435435435, 1000),
(29, 1, 2, '0000-00-00', '3543-05-04', 5636533343543543, 5000),
(30, 1, 2, '5454-05-04', '4545-04-05', 3565464654654654, 1200),
(31, 1, 2, '2024-02-12', '2024-02-14', 5345476845768565, 1200),
(32, 1, 2, '2024-10-10', '2024-11-11', 5464464215454445, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `val` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `val`, `name`) VALUES
(1, 0, 'Cairo'),
(2, 1, 'Riyadh '),
(3, 2, 'Abu Dhabi'),
(4, 3, 'New York'),
(5, 4, 'Beirut');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`id`, `user_id`, `hotel_id`) VALUES
(42, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `id` int(11) NOT NULL,
  `takeoff` int(11) NOT NULL,
  `land` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `timeoff` int(11) NOT NULL,
  `timearrive` int(11) NOT NULL,
  `leavedate` date NOT NULL,
  `arrivedate` date NOT NULL,
  `class` int(11) NOT NULL,
  `gate` varchar(100) NOT NULL,
  `seat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`id`, `takeoff`, `land`, `price`, `timeoff`, `timearrive`, `leavedate`, `arrivedate`, `class`, `gate`, `seat`) VALUES
(2, 0, 1, 1200, 3, 12, '2024-02-15', '2024-02-20', 0, 'A5', 8),
(3, 1, 0, 5000, 2, 8, '2024-02-20', '2024-02-25', 1, 'A3', 1),
(4, 0, 3, 800, 5, 10, '0000-00-00', '0000-00-00', 1, '', 0),
(5, 2, 3, 999, 3, 7, '0000-00-00', '0000-00-00', 2, '', 0),
(6, 0, 2, 1200, 0, 0, '0000-00-00', '0000-00-00', 1, '', 0),
(7, 0, 4, 650, 0, 0, '0000-00-00', '0000-00-00', 1, '', 0),
(8, 1, 0, 900, 0, 0, '0000-00-00', '0000-00-00', 0, '', 0),
(9, 1, 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1, '', 0),
(10, 1, 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2, '', 0),
(11, 2, 0, 0, 0, 0, '0000-00-00', '0000-00-00', 0, '', 0),
(12, 2, 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1, '', 0),
(13, 2, 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2, '', 0),
(14, 3, 0, 0, 0, 0, '0000-00-00', '0000-00-00', 0, '', 0),
(15, 3, 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1, '', 0),
(16, 3, 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1, '', 0),
(17, 3, 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2, '', 0),
(18, 4, 0, 0, 0, 0, '0000-00-00', '0000-00-00', 0, '', 0),
(19, 4, 0, 0, 0, 0, '0000-00-00', '0000-00-00', 1, '', 0),
(20, 4, 0, 0, 0, 0, '0000-00-00', '0000-00-00', 2, '', 0),
(21, 0, 1, 0, 0, 0, '0000-00-00', '0000-00-00', 2, '', 0),
(22, 0, 1, 0, 0, 0, '0000-00-00', '0000-00-00', 3, '', 0),
(23, 0, 1, 0, 0, 0, '0000-00-00', '0000-00-00', 0, '', 0),
(24, 0, 2, 0, 0, 0, '0000-00-00', '0000-00-00', 0, '', 0),
(25, 0, 2, 0, 0, 0, '0000-00-00', '0000-00-00', 1, '', 0),
(26, 0, 2, 0, 0, 0, '0000-00-00', '0000-00-00', 2, '', 0),
(27, 0, 3, 0, 0, 0, '0000-00-00', '0000-00-00', 0, '', 0),
(28, 0, 3, 0, 0, 0, '0000-00-00', '0000-00-00', 2, '', 0),
(29, 0, 4, 0, 0, 0, '0000-00-00', '0000-00-00', 0, '', 0),
(30, 0, 4, 0, 0, 0, '0000-00-00', '0000-00-00', 2, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `free` tinyint(4) NOT NULL,
  `price` int(11) NOT NULL,
  `beds` int(11) NOT NULL,
  `contant` varchar(100) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `city`, `free`, `price`, `beds`, `contant`, `img`) VALUES
(1, 'Four Seasons Hotel', 'cairo', 0, 340, 5, 'we got 5 stars', 'img/Bitmap.png'),
(2, 'Cleopatra Hotel', 'cairo', 0, 370, 6, 'Very Good\nBreakfast included', 'img/hotel2.png'),
(3, 'Pyramids View Inn', 'giza', 0, 50, 5, 'Very Good', 'img/hotel3.jpg'),
(4, 'Berlin Hotel', 'sharqya', 0, 50, 5, 'Very Good', 'img/hotel4.jpg'),
(5, 'Golden Hotel', 'giza', 0, 750, 5, 'Very Good', 'img/hotel2.png'),
(6, 'Hotel Royal Marshal', 'alx', 0, 50, 3, 'Very Good', 'img/hotel3.jpg'),
(7, 'Osiris Hotel', 'alx', 0, 300, 5, 'Very Good', 'img/Bitmap.png');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `leavedate` date NOT NULL,
  `adate` date NOT NULL,
  `card` int(11) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `user_id`, `hotel_id`, `leavedate`, `adate`, `card`, `cost`) VALUES
(37, 1, 1, '2024-06-13', '2024-06-20', 2147483647, 280),
(38, 1, 1, '2024-06-13', '2024-06-15', 2147483647, 80),
(39, 1, 1, '2024-06-13', '2024-06-25', 2147483647, 480),
(40, 1, 1, '2024-06-13', '2024-06-25', 2147483647, 480),
(41, 1, 1, '2020-06-13', '2020-06-20', 2147483647, 280);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `bdate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `country`, `gender`, `bdate`) VALUES
(1, 'abdo@gmail.com', 'abdo', '$2y$10$DgLCl.QGERc7R42ZFZRd2OA42g/6ct5rea0YYZU90EFR1ZkLcGthC', 3, 0, ''),
(23, 'baraaahmed576@gmail.com', 'baraa', '$2y$10$fbIuJOjIKdhaSOve7qaoiedULjl.umnMOVTA.rnSUlpZfjXY3mdce', 0, 0, '2001-07-01'),
(25, 'abdo5@gmail.com', 'reka1', '$2y$10$Ib/h/uJnztBKs9ON7dsH1O9HIfe/fKfn7pL80nXvaoWVVvroq0QtW', 2, 0, '6165-02-15'),
(26, 'abdo55@gmail.com', '45kmm', '$2y$10$7rOtEuAm7D0pKg3qZmClU.OyfzU9p4RhQKxVdBTlrndtCXqxmeG/S', 0, 0, '2005-05-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checked`
--
ALTER TABLE `checked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
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
-- AUTO_INCREMENT for table `checked`
--
ALTER TABLE `checked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
