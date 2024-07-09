-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 06:54 PM
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
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `c_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `users_enrolled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_quan` int(11) NOT NULL,
  `item_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_quan`, `item_price`) VALUES
(1, 'shirt', 6, 6000),
(2, 'pants', 8, 5000),
(3, 'yogamat', 9, 1900),
(4, 'hoodie', 7, 18000),
(5, 'zipper', 3, 13000),
(6, 'dufflebag', 2, 7890),
(7, 'flipflops', 5, 2450);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `order_description` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `username`, `order_description`, `total_price`) VALUES
(1, 'min', 'shirt\r\npants\r\nduffle bag', 18890),
(2, 'min', 'zipper\r\nyoga mat', 14900),
(3, 'min', 'flipflops,flipflops\r\n', 14900),
(4, 'min', 'hoodie\r\nyoga mat', 19900),
(5, 'min', 'zipper\r\nhoodie\r\nduffle bag\r\nshirt', 44890);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `r_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `cook_time` int(11) NOT NULL,
  `dietitian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `email`, `password`) VALUES
(1, 'lybayaqub172003@gmail.com', '994ca9eeac1a9aaa196351f585e7e1d9'),
(2, 'l227765@lhr.nu.edu.pk', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'manahilgillani191@gmail.com', '2eeae06d36d34069bb51ca8edd8e6170'),
(4, 'minahilirfan@gmail.com', '30d606d54e1166b5ddf0af1762df3e99'),
(5, 'danish@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `v_id` int(11) NOT NULL,
  `programe` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `workoutprograms`
--

CREATE TABLE `workoutprograms` (
  `W_ID` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workoutprograms`
--

INSERT INTO `workoutprograms` (`W_ID`, `category`, `user_name`) VALUES
(1, 'beginner friendly', 'lyba'),
(2, 'moderate to advanced', 'lyba'),
(3, 'strength training', 'lyba'),
(4, 'no equipment', 'lyba'),
(5, 'abs and legs', 'lyba');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workoutprograms`
--
ALTER TABLE `workoutprograms`
  ADD PRIMARY KEY (`W_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
