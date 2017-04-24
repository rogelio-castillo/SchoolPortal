-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2017 at 10:59 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parent_teacher`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(4) NOT NULL,
  `to_id` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL DEFAULT '',
  `message` longtext NOT NULL,
  `datetime` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `to_id`, `class_id`, `user_id`, `subject`, `message`, `datetime`) VALUES
(1, 'o6ryfIgV-X9tDtSN-6g5q5', '0wRl-RSV0-216V', 'w1Ccfzoh-lYwtD7-ZwyHy', 'msg to parent', 'hello this is a msg', '24/04/17 09:09:26'),
(2, 'w1Ccfzoh-lYwtD7-ZwyHy', '0wRl-RSV0-216V', 'o6ryfIgV-X9tDtSN-6g5q5', 'msg to teacher', 'hello this is a msg', '24/04/17 09:10:14'),
(3, 'o6ryfIgV-X9tDtSN-6g5q5', '0wRl-RSV0-216V', 'w1Ccfzoh-lYwtD7-ZwyHy', 'msg to parent', 'hello this is a msg', '24/04/17 09:33:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
