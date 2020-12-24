-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 04:09 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_donate_the_blood`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donor`
--

CREATE TABLE `tbl_donor` (
  `donor_id` int(11) NOT NULL,
  `donor_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `contact_no` varchar(16) NOT NULL,
  `safe_life_date` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_donor`
--

INSERT INTO `tbl_donor` (`donor_id`, `donor_name`, `gender`, `blood_group`, `email_address`, `city`, `dob`, `contact_no`, `safe_life_date`, `password`) VALUES
(8, 'AH Zihan', 'Male', 'A+', 'ahzihan7@gmail.com', 'Bhola', '1997-01-01', '01776328578', '20-07-04', '6d65eb3315cb013e9e0bf8ff21097c35'),
(11, 'Md Akbar Hossain', 'Male', 'A+', 'akbarhossain5813@gmail.com', 'Bhola', '1993-08-23', '01776328578', '20-07-06', '6d65eb3315cb013e9e0bf8ff21097c35'),
(12, 'Abul Bashar', 'Male', 'A+', 'bashar@gmail.com', 'Bhola', '1992-05-14', '01725584187', '0', '91c9e9be5e339f2544d66539a0d13a97'),
(13, 'Alamin', 'Male', 'O+', 'alamin@gmail.com', 'Madaripur', '1992-12-09', '01776328578', '0', 'd061f4891bd39deb65390f62677c38d1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_donor`
--
ALTER TABLE `tbl_donor`
  ADD PRIMARY KEY (`donor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_donor`
--
ALTER TABLE `tbl_donor`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
