-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2023 at 09:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hack1`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` varchar(20) NOT NULL,
  `address_desc` varchar(150) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `pincode` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `doc_process_status`
--

CREATE TABLE `doc_process_status` (
  `dps_id` int(20) NOT NULL,
  `document_id` varchar(20) NOT NULL,
  `doc_path` varchar(100) DEFAULT NULL,
  `user_id` varchar(20) NOT NULL,
  `table_id` varchar(20) NOT NULL,
  `service_id` varchar(20) NOT NULL,
  `authority_id` varchar(20) NOT NULL,
  `tracking_id` varchar(20) NOT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `status` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doc_process_status`
--

INSERT INTO `doc_process_status` (`dps_id`, `document_id`, `doc_path`, `user_id`, `table_id`, `service_id`, `authority_id`, `tracking_id`, `reason`, `status`) VALUES
(1, '1', NULL, 'shiv@gmail.com', 'A_P1_1', 'A_P1', 'nitin@gmail.com', 'TRACK_1', NULL, 3),
(2, '2', NULL, 'shiv@gmail.com', 'A_P1_1', 'A_P1', 'nitin@gmail.com', 'TRACK_1', NULL, 3),
(3, '3', NULL, 'shiv@gmail.com', 'A_P1_1', 'A_P1', 'nitin@gmail.com', 'TRACK_1', NULL, 3),
(67, '1', '23', 'shiv@gmail.com', 'A_P1_2', 'A_P1', 'divyesh@gmail.com', 'TRACK_1', NULL, 3),
(68, '2', '34', 'shiv@gmail.com', 'A_P1_2', 'A_P1', 'divyesh@gmail.com', 'TRACK_1', NULL, 3),
(69, '3', '56', 'shiv@gmail.com', 'A_P1_2', 'A_P1', 'divyesh@gmail.com', 'TRACK_1', NULL, 3),
(70, '1', '23', 'shiv@gmail.com', 'A_P1_3', 'A_P1', 'ravi@gmail.com', 'TRACK_1', NULL, 0),
(71, '2', '34', 'shiv@gmail.com', 'A_P1_3', 'A_P1', 'ravi@gmail.com', 'TRACK_1', NULL, 0),
(72, '3', '56', 'shiv@gmail.com', 'A_P1_3', 'A_P1', 'ravi@gmail.com', 'TRACK_1', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rejected_doc`
--

CREATE TABLE `rejected_doc` (
  `reject_id` varchar(20) DEFAULT NULL,
  `reject_reason` varchar(100) DEFAULT NULL,
  `reject_documents` varchar(100) DEFAULT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `table_id` varchar(20) DEFAULT NULL,
  `authority_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` varchar(20) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `service_desc` varchar(200) NOT NULL,
  `services_city` varchar(20) NOT NULL,
  `service_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_desc`, `services_city`, `service_status`) VALUES
('A_P1', 'Passport', 'Indian passport', 'Ahmedabad', 1),
('A_A1', 'Aadhar Card', 'Mera Aadhar Desh ka Aadhar', 'Ahmedabad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_services`
--

CREATE TABLE `table_services` (
  `table_id` varchar(20) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `services_id` varchar(20) NOT NULL,
  `services_city` varchar(50) NOT NULL,
  `services_authority` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_services`
--

INSERT INTO `table_services` (`table_id`, `table_name`, `services_id`, `services_city`, `services_authority`) VALUES
('A_P1_1', 'pt1', 'A_P1', 'Ahmedabad', 'nitin@gmail.com'),
('A_P1_2', 'pt2', 'A_P1', 'Ahmedabad', 'divyesh@gmail.com'),
('A_P1_3', 'pt3', 'A_P1', 'Ahmedabad', 'ravi@gmail.com'),
('A_P1_4', 'pt4', 'A_P1', 'Ahmedabad', 'preet@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tracking_process`
--

CREATE TABLE `tracking_process` (
  `tracking_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `service_id` varchar(20) NOT NULL,
  `final_status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tracking_process`
--

INSERT INTO `tracking_process` (`tracking_id`, `user_id`, `service_id`, `final_status`) VALUES
('TRACK_1', 'shiv@gmail.com', 'A_P1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `address_id` varchar(20) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `profile_pic` varchar(30) DEFAULT NULL,
  `profile_sign` varchar(30) DEFAULT NULL,
  `aasign_table` varchar(20) DEFAULT NULL,
  `assign_services` varchar(20) DEFAULT NULL,
  `role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `email`, `phone`, `gender`, `DOB`, `password`, `address_id`, `qualification`, `profile_pic`, `profile_sign`, `aasign_table`, `assign_services`, `role`) VALUES
('Divyesh Mepal', 'divyesh@gmail.com', '7776543210', '2001-01-01', '0000-00-00', '123', NULL, NULL, NULL, NULL, 'A_P1_2', 'A_P1', 1),
('Gaurav Jethva', 'gaurav@gmail.com', '8876543210', '2001-01-01', '0000-00-00', '123', NULL, NULL, NULL, NULL, NULL, NULL, 2),
('Heet Patel', 'heet@gmail.com', '7876543210', '2001-01-01', '0000-00-00', '123', NULL, NULL, NULL, NULL, NULL, NULL, 2),
('javlan Patel', 'javlan@gmail.com', '7776543210', '2001-01-01', '0000-00-00', '123', NULL, NULL, NULL, NULL, NULL, NULL, 2),
('Nitin Makwana', 'nitin@gmail.com', '7776543210', '2001-01-01', '0000-00-00', '123', NULL, NULL, NULL, NULL, 'A_P1_1', 'A_P1', 1),
('preet patel', 'preet@gmail.com', '7776543210', '2001-01-01', '0000-00-00', '123', NULL, NULL, NULL, NULL, 'A_P1_4', 'A_P1', 1),
('ravi patel', 'ravi@gmail.com', '7776543210', '2001-01-01', '0000-00-00', '123', NULL, NULL, NULL, NULL, 'A_P1_3', 'A_P1', 1),
('Shiv Patel', 'shiv@gmail.com', '9876543210', '2001-01-01', '0000-00-00', '123', NULL, NULL, NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_document`
--

CREATE TABLE `user_document` (
  `document_id` varchar(20) NOT NULL,
  `doc_path` varchar(100) DEFAULT NULL,
  `doc_name` varchar(50) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `doc_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_document`
--

INSERT INTO `user_document` (`document_id`, `doc_path`, `doc_name`, `user_id`, `doc_number`) VALUES
('1', '63e68b172341c1.82843950.pdf', 'Adhar Card', 'shiv@gmail.com', '12345678'),
('2', '63e65447eeea00.65583700.pdf', 'PAN Card', 'shiv@gmail.com', '12345678'),
('3', '63e65448029d65.22616857.pdf', 'Ration Card', 'shiv@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `user_other_details`
--

CREATE TABLE `user_other_details` (
  `uod_id` varchar(20) NOT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `father_occupation` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `mother_occupation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `doc_process_status`
--
ALTER TABLE `doc_process_status`
  ADD PRIMARY KEY (`dps_id`);

--
-- Indexes for table `table_services`
--
ALTER TABLE `table_services`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `tracking_process`
--
ALTER TABLE `tracking_process`
  ADD PRIMARY KEY (`tracking_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `user_document`
--
ALTER TABLE `user_document`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `user_other_details`
--
ALTER TABLE `user_other_details`
  ADD PRIMARY KEY (`uod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doc_process_status`
--
ALTER TABLE `doc_process_status`
  MODIFY `dps_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
