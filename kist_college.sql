-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 05:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kist_college`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty_list`
--

CREATE TABLE `faculty_list` (
  `f_id` int(11) NOT NULL,
  `faculty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_list`
--

INSERT INTO `faculty_list` (`f_id`, `faculty`) VALUES
(1, 'BIM'),
(2, 'BIT'),
(3, 'BBA');

-- --------------------------------------------------------

--
-- Table structure for table `gpa_marks`
--

CREATE TABLE `gpa_marks` (
  `std_ids` int(10) NOT NULL,
  `sub_sn` int(10) NOT NULL,
  `gpa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gpa_marks`
--

INSERT INTO `gpa_marks` (`std_ids`, `sub_sn`, `gpa`) VALUES
(1, 1, 3.2),
(1, 2, 3.8),
(2, 3, 3),
(2, 4, 2.8);

-- --------------------------------------------------------

--
-- Table structure for table `ref2_table`
--

CREATE TABLE `ref2_table` (
  `sn` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ref2_table`
--

INSERT INTO `ref2_table` (`sn`, `ref_id`, `sub_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ref_table`
--

CREATE TABLE `ref_table` (
  `sn` int(5) NOT NULL,
  `sem_id` int(10) NOT NULL,
  `faculty_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ref_table`
--

INSERT INTO `ref_table` (`sn`, `sem_id`, `faculty_id`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` int(11) NOT NULL,
  `sem_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `sem_name`) VALUES
(1, '1st Semester'),
(2, '2st Semester'),
(3, '3rd Semester'),
(4, '4th Semester'),
(5, '5th Semester'),
(6, '6th Semester'),
(7, '7th Semester'),
(8, '8th Semester');

-- --------------------------------------------------------

--
-- Table structure for table `std_info`
--

CREATE TABLE `std_info` (
  `std_ids` int(11) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `std_name` varchar(20) NOT NULL,
  `std_faculty` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `std_info`
--

INSERT INTO `std_info` (`std_ids`, `roll_no`, `std_name`, `std_faculty`, `sem_id`) VALUES
(1, 3864, 'Ram Shrestha', 1, 1),
(2, 3865, 'Shyam Bahadur', 2, 2),
(3, 6866, 'Krishna Gopali', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sub_sn` int(11) NOT NULL,
  `sub_id` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sub_sn`, `sub_id`, `subject`) VALUES
(1, 'IT 211', 'Computer Information System'),
(2, 'IT 212', 'Digital Logic Design'),
(3, 'IT 213', 'Structured Programming'),
(4, 'IT 214', 'Data Communication and Computer Networks');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty_list`
--
ALTER TABLE `faculty_list`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `f_id` (`f_id`),
  ADD KEY `f_id_2` (`f_id`);

--
-- Indexes for table `gpa_marks`
--
ALTER TABLE `gpa_marks`
  ADD KEY `std_ids` (`std_ids`),
  ADD KEY `sub_sn` (`sub_sn`);

--
-- Indexes for table `ref2_table`
--
ALTER TABLE `ref2_table`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `ref_id` (`ref_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `sn` (`sn`);

--
-- Indexes for table `ref_table`
--
ALTER TABLE `ref_table`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `sem_id` (`sem_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `sn` (`sn`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`sem_id`),
  ADD KEY `sem_id` (`sem_id`);

--
-- Indexes for table `std_info`
--
ALTER TABLE `std_info`
  ADD PRIMARY KEY (`std_ids`),
  ADD KEY `std_faculty` (`std_faculty`),
  ADD KEY `std_faculty_2` (`std_faculty`),
  ADD KEY `std_faculty_3` (`std_faculty`),
  ADD KEY `sem_id` (`sem_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sub_sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty_list`
--
ALTER TABLE `faculty_list`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref2_table`
--
ALTER TABLE `ref2_table`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ref_table`
--
ALTER TABLE `ref_table`
  MODIFY `sn` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `sem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `std_info`
--
ALTER TABLE `std_info`
  MODIFY `std_ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sub_sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gpa_marks`
--
ALTER TABLE `gpa_marks`
  ADD CONSTRAINT `gpa_marks_ibfk_1` FOREIGN KEY (`sub_sn`) REFERENCES `subjects` (`sub_sn`),
  ADD CONSTRAINT `gpa_marks_ibfk_2` FOREIGN KEY (`std_ids`) REFERENCES `std_info` (`std_ids`);

--
-- Constraints for table `ref2_table`
--
ALTER TABLE `ref2_table`
  ADD CONSTRAINT `ref2_table_ibfk_1` FOREIGN KEY (`ref_id`) REFERENCES `ref_table` (`sn`),
  ADD CONSTRAINT `ref2_table_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_sn`);

--
-- Constraints for table `ref_table`
--
ALTER TABLE `ref_table`
  ADD CONSTRAINT `ref_table_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_list` (`f_id`),
  ADD CONSTRAINT `ref_table_ibfk_2` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`);

--
-- Constraints for table `std_info`
--
ALTER TABLE `std_info`
  ADD CONSTRAINT `std_info_ibfk_1` FOREIGN KEY (`std_faculty`) REFERENCES `faculty_list` (`f_id`),
  ADD CONSTRAINT `std_info_ibfk_2` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
