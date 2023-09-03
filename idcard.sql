-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2018 at 11:32 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `idcard`
--

CREATE TABLE `idcard` (
  `dte_id` varchar(14) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `admission_year` varchar(7) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `course` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `mobile_no` varchar(11) NOT NULL,
  `residential_address` varchar(1000) NOT NULL,
  `blood_group` varchar(3) NOT NULL COMMENT '0=A-,1=A+|2=B-,3=B+|4=AB-,5=AB+|6=O-,7=O+',
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `idcard`
--

INSERT INTO `idcard` (`dte_id`, `full_name`, `first_name`, `middle_name`, `last_name`, `admission_year`, `email_id`, `course`, `date_of_birth`, `mobile_no`, `residential_address`, `blood_group`, `photo`) VALUES
('EN14569853', 'Pawan Rajesh Chhabria', 'Pawan', 'Rajesh', 'Chhabria', '2018', '2016.pawan.chhabria@ves.ac.in', 'BE COMPUTER ENGINEERING', '1992-07-09', '9633325585', 'B-103, Lila Apartment, Yari Road, Versova, Andheri(W). Mumbai-400061.', '6', 'Lighthouse_1545886849.jpg'),
('EN45679087', 'Sachin Arun Chandwani', 'Sachin', 'Arun', 'Chandwani', '2018-19', '2016.sachin.chandwani@ves.ac.in', 'B.E. ELECTRONICS & TELECOMMUNICATION', '1995-08-18', '9833874565', '1206-B, Millenium Towers, Powai, Chakala, Ghatkopar(W). Mumbai-400064', 'AB+', 'Hydrangeas_1545906387.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `idcard`
--
ALTER TABLE `idcard`
  ADD PRIMARY KEY (`dte_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
