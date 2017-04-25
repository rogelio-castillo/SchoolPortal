-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2017 at 02:13 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

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
-- Table structure for table `Homework`
--

CREATE TABLE `Homework` (
  `classid` int(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `dueDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Homework`
--

INSERT INTO `Homework` (`classid`, `subject`, `title`, `description`, `dueDate`) VALUES
(1, 'Math', '{title}', 'problems 1-20', '2017-05-01'),
(2, 'test', '{title}', 'something', '1111-11-11'),
(3, 'test', 'Algebra ', 'something', '1111-11-11'),
(4, 'one', 'one', 'one', '1111-11-11'),
(5, 'one', 'one', 'one', '1111-11-11'),
(6, 'one', 'one', 'one', '1111-11-11'),
(7, 'one', 'one', 'one', '1111-11-11'),
(8, '', '', '', '0000-00-00'),
(9, '1', '1', '1', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Homework`
--
ALTER TABLE `Homework`
  ADD PRIMARY KEY (`classid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Homework`
--
ALTER TABLE `Homework`
  MODIFY `classid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
