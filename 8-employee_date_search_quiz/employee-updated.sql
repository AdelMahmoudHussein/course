-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2020 at 06:31 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `emp_name` varchar(70) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_join` date NOT NULL,
  `email` varchar(80) NOT NULL,
  `image_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_name`, `gender`, `date_of_join`, `email`, `image_name`, `timestamp`) VALUES
(1, 'Yogesh', 'male', '2018-03-02', 'yogesh@makitweb.com', '01.jfif', '2020-04-07 17:03:21'),
(2, 'Vishal', 'male', '2017-12-06', 'vishal@gmail.com', '06.jfif', '2020-04-07 17:05:10'),
(3, 'Vijay', 'male', '2018-03-05', 'vijayec@yahoo.com', '03.jfif', '2020-04-07 17:03:58'),
(4, 'Rahul', 'male', '2018-02-21', 'rahul512@gmail.com', '07.jfif', '2020-04-07 17:05:29'),
(5, 'Sonarika', 'female', '2018-01-08', 'bsonarika@gmail.com', '05.jfif', '2020-04-07 17:04:50'),
(6, 'Jitentendre', 'male', '2017-12-19', 'jiten94@yahoo.com', '08.jfif', '2020-04-07 17:05:36'),
(7, 'Aditya', 'male', '2018-01-20', 'aditya@gmail.com', '04.jfif', '2020-04-07 17:04:26'),
(8, 'Anil', 'male', '2017-11-24', 'anilsingh@gmail.com', '04.jfif', '2020-04-07 17:04:29'),
(9, 'Sunil', 'male', '2017-12-17', 'sunil1993@gmail.com', '09.jfif', '2020-04-07 17:06:01'),
(10, 'Akilesh', 'male', '2018-01-28', 'akileshsahu@yahoo.com', '02.jfif', '2020-04-07 17:04:15'),
(11, 'Raj', 'male', '2017-12-16', 'rajsingh@gmail.com', '10.jfif', '2020-04-07 17:06:17'),
(12, 'Mayank', 'male', '2017-11-10', 'mpatidar@gmail.com', '08.jfif', '2020-04-07 17:05:48'),
(13, 'Shalu', 'female', '2017-10-14', 'gshalu521@gmail.com', '04.jfif', '2020-04-07 17:04:31'),
(14, 'Ravi', 'male', '2017-11-27', 'ravisharma21@yahoo.com', '09.jfif', '2020-04-07 17:06:07'),
(15, 'Shruti', 'female', '2017-09-29', 'shruti@gmail.com', '02.jfif', '2020-04-07 17:04:12'),
(16, 'Rishi', 'male', '2018-03-01', 'rishi121@gmail.com', '10.jfif', '2020-04-07 17:06:20'),
(17, 'Rohan', 'male', '2018-01-11', 'rohansingh@gmail.com', '09.jfif', '2020-04-07 17:06:10'),
(18, 'Priya', 'female', '2017-11-30', 'priya1992@gmail.com', '05.jfif', '2020-04-07 17:04:46'),
(19, 'Rakesh', 'male', '2017-10-22', 'rakesh@yahoo.com', '04.jfif', '2020-04-07 17:07:04'),
(20, 'Vinay', 'male', '2018-01-09', 'vinaysingh@gmail.com', '01.jfif', '2020-04-07 17:03:32'),
(21, 'Tanu', 'female', '2017-12-23', 'Tanu@gmail.com', '07.jfif', '2020-04-07 17:05:24'),
(22, 'Ajay', 'male', '2018-02-23', 'ajay93@gmail.com', '05.jfif', '2020-04-07 17:06:48'),
(23, 'Nikhil', 'male', '2017-11-22', 'nikhil@gmail.com', '02.jfif', '2020-04-07 17:04:06'),
(24, 'Arav', 'male', '2017-10-22', 'aravsingh@yahoo.com', '03.jfif', '2020-04-07 17:06:57'),
(25, 'Madhu', 'female', '2017-12-07', 'madhu@gmail.com', '02.jfif', '2020-04-07 17:03:41'),
(26, 'Sagar', 'male', '2018-03-05', 'sagar@gmail.com', '07.jfif', '2020-04-07 17:05:26'),
(27, 'Anju ', 'female', '2018-02-19', 'anju@gmail.com', '06.jfif', '2020-04-07 17:05:18'),
(28, 'Rajat', 'male', '2018-01-08', 'rajat@gmail.com', '10.jfif', '2020-04-07 17:06:24'),
(29, 'Anjali', 'female', '2017-10-26', 'anjali@gmail.com', '08.jfif', '2020-04-07 17:05:51'),
(30, 'Saloni', 'female', '2017-11-11', 'saloni@gmail.com', '02.jfif', '2020-04-07 17:04:09'),
(31, 'Mayur', 'male', '2017-12-21', 'mayur@gmail.com', '05.jfif', '2020-04-07 17:04:40'),
(32, 'Pankaj', 'male', '2018-02-09', 'pankaj@gmail.com', '06.jfif', '2020-04-07 17:05:15'),
(33, 'Hrithik', 'male', '2017-11-05', 'hrithik@gmail.com', '01.jfif', '2020-04-07 17:03:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
