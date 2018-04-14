-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2018 at 12:24 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swep_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `faculty` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `faculty`) VALUES
(1, 'James Falola', 'Jhhames@yahoo.com', 'computer', 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(6) NOT NULL,
  `title` varchar(30) NOT NULL,
  `code` varchar(20) NOT NULL,
  `units` int(20) NOT NULL,
  `faculty` varchar(30) NOT NULL,
  `part` varchar(20) NOT NULL,
  `semester` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `code`, `units`, `faculty`, `part`, `semester`) VALUES
(1, 'Simple Mathematics', 'MTH 202', 4, 'All', '2', 'harmattan'),
(2, 'Introduction to vector', 'MTH 104', 2, 'all', '1', 'rain'),
(3, 'Enginering Drawing', 'MEE 203', 2, 'technology', '2', 'harmattan'),
(4, 'Introduction to programming', 'CSC 201', 3, 'all', '2', 'harmattan'),
(5, 'simple maths', 'MTH 101', 5, 'Technology', '1', 'harmattan'),
(6, 'advanced calculus', 'MTH 301', 3, 'sciences', '3', 'harmattan');

-- --------------------------------------------------------

--
-- Table structure for table `exam_timetable`
--

CREATE TABLE `exam_timetable` (
  `id` int(6) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `venue` varchar(30) NOT NULL,
  `month` varchar(10) NOT NULL,
  `day` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_timetable`
--

INSERT INTO `exam_timetable` (`id`, `course_code`, `venue`, `month`, `day`, `time`) VALUES
(1, 'MTH 202', 'BOOC', 'MAY', '01', '8AM - 9AM'),
(2, 'MTH 104', 'ODLT', 'APR', '11', '2PM - 3PM'),
(3, 'MEE 203', 'CHEM ENGINE, ODLT', 'APR', '13', '1PM - 2PM'),
(4, 'CSC 201', 'STEP B', 'APR', '01', '8AM - 9AM');

-- --------------------------------------------------------

--
-- Table structure for table `fakolujo`
--

CREATE TABLE `fakolujo` (
  `id` int(4) NOT NULL,
  `code` varchar(10) NOT NULL,
  `exam_date` varchar(20) NOT NULL,
  `venue` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakolujo`
--

INSERT INTO `fakolujo` (`id`, `code`, `exam_date`, `venue`) VALUES
(2, 'MTH 104', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `falolajames`
--

CREATE TABLE `falolajames` (
  `id` int(4) NOT NULL,
  `code` varchar(10) NOT NULL,
  `exam_date` varchar(20) NOT NULL,
  `venue` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `falolajames`
--

INSERT INTO `falolajames` (`id`, `code`, `exam_date`, `venue`) VALUES
(13, 'MEE 203', '', ''),
(15, 'CSC 201', '', ''),
(16, 'MTH 202', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `school_timetable`
--

CREATE TABLE `school_timetable` (
  `id` int(5) NOT NULL,
  `course_code` varchar(5) NOT NULL,
  `venue` varchar(20) NOT NULL,
  `month` varchar(10) NOT NULL,
  `day` varchar(10) NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `matric_no` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `department` varchar(40) NOT NULL,
  `faculty` varchar(20) NOT NULL,
  `course` varchar(100) NOT NULL,
  `current_part` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `matric_no`, `password`, `department`, `faculty`, `course`, `current_part`) VALUES
(1, 'Falola James', 'jhhames@gmail.com', 'csc/2015/051', 'computer', 'Computer Science And Engineering', 'Technology', 'B.Sc Computer Engineering', '2'),
(2, 'Balogun Bolaji', 'bj@example.com', 'CSC/2015/012', 'computer', 'Computer Science And Engineering', 'Technology', 'B.Sc Computer Engineering', '2'),
(3, 'Fakolujo', 'Fako@gmail.com', 'csc/2015/048', 'computer', 'Computer Science And Engineering', 'Technology', 'B. art computer designer', '1'),
(4, 'Fesomade Alli', 'Alli1@gmail.com', 'csc/2015/049', 'computer', 'Computer Science And Engineering', 'technology', 'Bsc Computer Engineering', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_timetable`
--
ALTER TABLE `exam_timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fakolujo`
--
ALTER TABLE `fakolujo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `falolajames`
--
ALTER TABLE `falolajames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_timetable`
--
ALTER TABLE `school_timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_timetable`
--
ALTER TABLE `exam_timetable`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fakolujo`
--
ALTER TABLE `fakolujo`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `falolajames`
--
ALTER TABLE `falolajames`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `school_timetable`
--
ALTER TABLE `school_timetable`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
