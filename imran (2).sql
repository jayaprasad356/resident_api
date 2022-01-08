-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 12:20 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imran`
--

-- --------------------------------------------------------

--
-- Table structure for table `council`
--

CREATE TABLE `council` (
  `id` int(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `council`
--

INSERT INTO `council` (`id`, `email`, `password`) VALUES
(1, 'admin@shangrila.gov.un', 'ffb59fefe7dd5821b12e01875605c2c5');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) NOT NULL,
  `question` text NOT NULL,
  `option_1` varchar(200) NOT NULL,
  `option_2` varchar(200) NOT NULL,
  `option_3` varchar(100) NOT NULL,
  `option_4` varchar(200) NOT NULL,
  `correct_option` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `password` varchar(200) NOT NULL,
  `SNI` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `dob`, `address`, `password`, `SNI`) VALUES
(4, 'jsp@gmail.com', 'jaya prasad', '01-11-2000', '', '25d55ad283aa400af464c76d713c07ad', '23456478');

-- --------------------------------------------------------

--
-- Table structure for table `users_answers`
--

CREATE TABLE `users_answers` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `question_id` int(10) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `option_1` varchar(200) DEFAULT NULL,
  `option_2` varchar(200) DEFAULT NULL,
  `option_3` varchar(200) DEFAULT NULL,
  `option_4` varchar(200) DEFAULT NULL,
  `correct_option` varchar(200) DEFAULT NULL,
  `result` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_answers`
--

INSERT INTO `users_answers` (`id`, `user_id`, `question_id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `correct_option`, `result`) VALUES
(1, 2, 2, 'Whats your Favourite Fruit?', 'Apple', 'Orange', 'Lemon', 'Pine Apple', 'Lemon', 'weong'),
(2, 1, 1, 'xjdfit ggg', 'if', 'iti', 'ifi', 'jfjfk', 'ifi', 'wrong'),
(3, 1, 1, 'xjdfit ggg', 'if', 'iti', 'ifi', 'jfjfk', 'ifi', 'correct'),
(4, 1, 1, 'Who\'s your Favourite hERO', 'Surya', 'Vijay', 'Ajith', 'Kamal', 'Kamal', 'correct'),
(5, 1, 1, 'Who\'s your Favourite hERO', 'Surya', 'Vijay', 'Ajith', 'Kamal', 'Kamal', 'correct'),
(6, 1, 2, 'What\'s your Favourite Number', 'One', 'Two', 'Three', 'Four', 'Two', 'correct'),
(7, 1, 1, 'Who\'s your Favourite hERO', 'Surya', 'Vijay', 'Ajith', 'Kamal', 'Kamal', 'wrong'),
(8, 1, 2, 'What\'s your Favourite Number', 'One', 'Two', 'Three', 'Four', 'Two', 'wrong'),
(9, 3, 1, 'Who\'s your Favourite hERO', 'Surya', 'Vijay', 'Ajith', 'Kamal', 'Kamal', 'wrong'),
(10, 3, 2, 'What\'s your Favourite Number', 'One', 'Two', 'Three', 'Four', 'Two', 'correct'),
(11, 2, 2, 'Whats your Favourite Fruit?', 'Apple', 'Orange', 'Lemon', 'Pine Apple', 'Lemon', 'weong');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `council`
--
ALTER TABLE `council`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_answers`
--
ALTER TABLE `users_answers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `council`
--
ALTER TABLE `council`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_answers`
--
ALTER TABLE `users_answers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
