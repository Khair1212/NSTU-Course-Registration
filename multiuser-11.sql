-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2021 at 05:30 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multiuser`
--

-- --------------------------------------------------------

--
-- Table structure for table `chairman_file`
--

CREATE TABLE `chairman_file` (
  `id` int(10) NOT NULL,
  `session` varchar(50) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `batch` int(50) NOT NULL,
  `message` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fname`, `lname`, `email`, `batch`, `message`) VALUES
(1, 'Akash', 'Debnath', 'akashdebnath@gmail.com', 13, 'i am happy');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(100) NOT NULL,
  `dept_id` varchar(50) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `year` int(4) NOT NULL,
  `term` int(10) NOT NULL,
  `credit` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `dept_id`, `course_name`, `course_code`, `year`, `term`, `credit`) VALUES
(8, '25', 'DataBase', 'SE-01', 3, 1, '3'),
(9, '25', 'Artificial Intelligence', 'SE-02', 3, 1, '3'),
(10, '25', 'SPL-2', 'SE-03', 3, 1, '3'),
(11, '25', 'Data Science', 'SE-04', 3, 1, '3'),
(12, '25', 'Ethics', 'SE-05', 3, 1, '3'),
(13, '25', 'Data Lab', 'SE-06', 3, 1, '3'),
(14, '25', 'BBMS Lab', 'SE-07', 3, 1, '3'),
(15, '25', 'C Programming', 'CSE-01', 1, 1, '3'),
(16, '25', 'SPL-1', 'CSE-02', 1, 1, '3'),
(17, '25', 'Discrete Math', 'CSE-01', 1, 1, '3'),
(18, '25', 'Statistics', 'CSE-01', 1, 1, '3'),
(19, '25', 'Mathematics', 'CSE-01', 1, 1, '3'),
(20, '25', 'Java', 'CSE-01', 1, 1, '3');

-- --------------------------------------------------------

--
-- Table structure for table `course_coordinator`
--

CREATE TABLE `course_coordinator` (
  `id` int(50) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `dept_id` varchar(50) NOT NULL,
  `session` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_coordinator`
--

INSERT INTO `course_coordinator` (`id`, `dept_name`, `dept_id`, `session`) VALUES
(1, 'CSTE', '01', '21'),
(2, 'Law', 'law27', '22'),
(3, 'SE', 'SE25', '21'),
(4, 'Botany', 'Bo30', '21');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `dept_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dept_name`, `dept_id`) VALUES
(25, 'CSTE', 'CSTE05'),
(26, 'SE', 'SE25'),
(27, 'Botany', 'Bo12');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `id` int(50) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `dept_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`id`, `dept_name`, `dept_id`) VALUES
(1, 'Software Engineering', 'SE25'),
(2, 'CSTE', 'CSTE12');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_members`
--

CREATE TABLE `faculty_members` (
  `member_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dept_id` varchar(50) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Signature` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_members`
--

INSERT INTO `faculty_members` (`member_id`, `name`, `dept_id`, `designation`, `username`, `email`, `password`, `Signature`) VALUES
(1, 'Akash Debnath', '25', '', 'ak123', 'ak123@gmail.com', '6ab6bed3ce43e3b53e2149655b17c149', '615b6b19119f6.png'),
(2, 'JOYSREE MOJUMDER', '25', '', 'joy123', 'joy123@gmail.com', '0d5425118d7aaa57e0f18a9e0d87104b', '615b6b19119f6.png'),
(3, 'Akash Debnath', 'SE25', '', 'akash', 'akashdebnath@gmail.com', '3467c9dd313b559af9cb07024b0530e5', '615b6b19119f6.png'),
(4, 'Shatta Ranjan Devnath', '21', '', 'shatta', 'shatta@gmail.com', '3467c9dd313b559af9cb07024b0530e5', '615b6b19119f6.png'),
(5, 'Sandha Rani Nath', '22', '', 'sandha', 'sandha@gmail.com', '3467c9dd313b559af9cb07024b0530e5', '615b6b19119f6.png'),
(6, 'Akash Debnath', 'SE25', '', 'akash', 'akashdebnath@gmail.com', '3467c9dd313b559af9cb07024b0530e5', '615b6b19119f6.png'),
(7, 'Akash Debnath', 'SE25', '', 'akash', 'akashdebnath@gmail.com', '3467c9dd313b559af9cb07024b0530e5', '615b6b19119f6.png'),
(8, 'RONY', 'SE25', '', 'rony00', 'raju@gmail.com', '3467c9dd313b559af9cb07024b0530e5', '615b6b19119f6.png'),
(9, 'Khair Ahammed', 'SE23', 'Professor', 'khair1212', 'khairahmad6@gmail.com', '4aa59fe8b53d1ff26849a6d6f949187d', '615b6b19119f6.png'),
(0, 'Kawsar Ahmed', 'SE12', 'Chairman', 'user', 'kaws.med@gmail.com', '25d55ad283aa400af464c76d713c07ad', '615b6b19119f6.png'),
(0, 'Akash Debnath', 'SE25', 'professor', 'akash00', 'akash00@gmail.com', 'e3f6d1731305bf82dff61e08e8f2f9f5', '615bbb0aa771e.jpg'),
(0, 'Sandha Rani Nath', 'Botany12', 'provost', 'Sandha12', 'sandha12@gmail.com', '0f81520bf247257f6c7b5286647e74d3', '615bbb946acf5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `id` int(15) NOT NULL,
  `hall_name` varchar(100) NOT NULL,
  `hall_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`id`, `hall_name`, `hall_id`) VALUES
(7, 'Abdus Salam Hall', 'ASH'),
(8, 'Bibi Khadiza Hall', 'BKH'),
(9, 'Bongomata Shekh Fozilatunnesa Hall', 'BSFH');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `mail_id` int(50) NOT NULL,
  `fromm` varchar(50) NOT NULL,
  `too` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`mail_id`, `fromm`, `too`, `subject`, `message`, `file`) VALUES
(1, 'edu12', 'se25', 'Online Course Registration', 'This is the .....', ''),
(3, 'edu12', 'SE25', 'Online Course Registration', 'This is the .....', ''),
(6, 'edu02', 'SE25', 'IIT Online Course Registration permission', 'Follow the file rules', '61592c8283add.jpg'),
(7, 'edu02', 'SE25', 'IIT Online Course Registration permission', 'Follow the file rules', '615930917d932.jpg'),
(8, 'edu02', 'SE25', 'IIT Online Course Registration permission', 'Follow the file rules', '615930ee46e40.jpg'),
(9, 'edu02', 'SE25', 'IIT Online Course Registration permission', 'Follow the file rules', '61593171a605c.jpg'),
(10, 'edu02', 'SE25', 'IIT Online Course Registration permission', 'Follow the file rules', '6159319ae2dde.jpg'),
(11, 'edu02', 'se25', 'Hello Nstu', 'Project', '615a97a5331ab.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `multiuserlogin`
--

CREATE TABLE `multiuserlogin` (
  `id` int(25) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `signature` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `multiuserlogin`
--

INSERT INTO `multiuserlogin` (`id`, `usertype`, `email`, `password`, `signature`) VALUES
(1, 'education', 'education@gmail.com', '25d55ad283aa400af464c76d713c07ad', '615b6b19119f6.png'),
(2, 'student', 'raju@gmail.com', '3467c9dd313b559af9cb07024b0530e5', '615b6b19119f6.png'),
(3, 'student', 'raju@gmail.com', '3467c9dd313b559af9cb07024b0530e5', '615b6b19119f6.png'),
(4, 'chairman', 'chairman@gmail.com', '25d55ad283aa400af464c76d713c07ad', '615b6b19119f6.png'),
(5, 'sectionofficer', 'millat@gmail.com', '25d55ad283aa400af464c76d713c07ad', '615b6b19119f6.png'),
(6, 'provost', 'provostash@gmail.com', '3467c9dd313b559af9cb07024b0530e5', '615b6b19119f6.png'),
(7, 'co-ordinator', 'dipanita@gmail.com', '25d55ad283aa400af464c76d713c07ad', '615b6b19119f6.png'),
(8, 'admin', 'ak123@gmail.com', '3467c9dd313b559af9cb07024b0530e5', '615b6b19119f6.png'),
(9, 'admin', 'Akash123@gmail.com', 'ad8c932963c7af0ecacb204eeab1dc94', '615b6b19119f6.png'),
(10, 'admin', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', '615b6b19119f6.png'),
(11, 'chairman', 'chairman@gmail.com', '3467c9dd313b559af9cb07024b0530e5', '615b6b19119f6.png'),
(12, 'sectionofficer', 'millat@gmail.com', '3467c9dd313b559af9cb07024b0530e5', '615b6b19119f6.png'),
(14, 'education', 'education@gmail.com', '3467c9dd313b559af9cb07024b0530e5', '615b6b19119f6.png'),
(15, 'co-ordinator', 'dipanita@gmail.com', '3467c9dd313b559af9cb07024b0530e5', '615b6b19119f6.png'),
(16, 'chairman', 'chairman@gmail.com', '3467c9dd313b559af9cb07024b0530e5', '615b6b19119f6.png'),
(17, 'sectionofficer', 'section@gmail.com', '3467c9dd313b559af9cb07024b0530e5', '615b6b19119f6.png'),
(18, 'provost', 'provost@gmail.com', '25d55ad283aa400af464c76d713c07ad', '615b6b19119f6.png'),
(19, 'co-ordinator', 'dipanita@gmail.com', '3467c9dd313b559af9cb07024b0530e5', '615b6b19119f6.png'),
(20, 'student', 'khair@gmail.com', '12345678', '615b6b19119f6.png'),
(21, 'student', 'khair@gmail.com', '12345678', '615b6b19119f6.png'),
(23, 'admin', 'pulok111@gmail.com', 'cfdb567d62f5d8895268b851b5cca55b', NULL),
(24, 'sectionofficer', 'mahfuz123@gmail.com', 'a3bcbab4e780eb50d775de3808932d30', NULL),
(25, 'chairman', 'armanur@gmail.com', '3467c9dd313b559af9cb07024b0530e5', NULL),
(26, 'chairman', 'officer@gmail.com', '3467c9dd313b559af9cb07024b0530e5', NULL),
(27, 'sectionofficer', 'officer@gmail.com', '3467c9dd313b559af9cb07024b0530e5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(50) NOT NULL,
  `re_id` varchar(50) NOT NULL,
  `dept_id` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `re_id`, `dept_id`, `subject`, `message`, `file`) VALUES
(1, 'edu12', 'SE25', 'IIT Online Course Registration', 'REPLY', '61592f35452a5.'),
(2, 'edu12', 'SE25', 'akkkk', 'dnnefnfekfe', '6159314dc2024.'),
(3, 'edu12', 'SE25', 'akkkk', 'dnnefnfekfe', '615931d04e51b.'),
(4, 'edu12', 'SE25', 'Online Course Registration', 'dnwklndw', '615931f47ebb3.'),
(5, 'edu 15', 'SE25', 'Me', 'dbjkfebbef', '61594ad7d75ef.');

-- --------------------------------------------------------

--
-- Table structure for table `section_officers`
--

CREATE TABLE `section_officers` (
  `so_id` int(50) NOT NULL,
  `name` text NOT NULL,
  `dept_id` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_officers`
--

INSERT INTO `section_officers` (`so_id`, `name`, `dept_id`, `username`, `email`, `password`) VALUES
(11, 'Millat Rahman', 'SE25', 'millat012', 'millat012@gmail.com', '69660b3810313548517a4756b3452825'),
(12, 'Md. Rahim', 'CSTE12', 'rahim222', 'rahim222@gmail.com', 'da778d5c1fe9749f7ae48b2e633194ea'),
(13, 'Md Badsha', 'Law28', 'badsha28', 'badsha28@gmail.com', 'b9416550dc668b2ac180b741578fd7db');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `Id` int(100) NOT NULL,
  `institute` varchar(50) NOT NULL,
  `Department` text NOT NULL,
  `dept_id` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `Year` int(10) NOT NULL,
  `Term` int(10) NOT NULL,
  `session` int(50) NOT NULL,
  `Roll` varchar(100) NOT NULL,
  `cgpa` varchar(50) NOT NULL,
  `hall_id` varchar(50) NOT NULL,
  `res_status` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` varchar(11) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `batch01` int(1) DEFAULT 0,
  `batch02` int(1) DEFAULT 0,
  `batch03` int(1) DEFAULT 0,
  `batch04` int(1) DEFAULT 0,
  `approved_for` varchar(10) DEFAULT NULL,
  `co_c_approve_stat` int(1) DEFAULT 0,
  `co_c_approve_by` int(5) DEFAULT NULL,
  `ch_di_approve_stat` int(1) DEFAULT 0,
  `ch_di_approve_by` int(5) DEFAULT NULL,
  `prov_approve_stat` int(1) DEFAULT 0,
  `prov_approve_by` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`Id`, `institute`, `Department`, `dept_id`, `Name`, `father_name`, `mother_name`, `Year`, `Term`, `session`, `Roll`, `cgpa`, `hall_id`, `res_status`, `Email`, `Mobile`, `Password`, `batch01`, `batch02`, `batch03`, `batch04`, `approved_for`, `co_c_approve_stat`, `co_c_approve_by`, `ch_di_approve_stat`, `ch_di_approve_by`, `prov_approve_stat`, `prov_approve_by`) VALUES
(14, '', 'software engineering', 'SE25', 'JOYSREE MOJUMDER', '', '', 3, 1, 28, 'ASH1825037M', '', '05', 'Onabasik', 'joysreemojumder506@gmail.com', '01690160299', '3467c9dd313b559af9cb07024', 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL),
(15, '', 'Software Engineer', 'SE27', 'Khair Ahmad', '', '', 1, 1, 21, 'ASH1825036M', '', '05', 'Abashik', 'khair@gmail.com', '12458796325', '25d55ad283aa400af464c76d713c07ad', 2, 0, 0, 0, 'batch01', 0, 0, 0, 0, 0, 0),
(16, '', 'software engineering', 'CSTE 05', 'Abu Taher', '', '', 3, 1, 32, 'ASH1825037M', '', '06', 'Abasik', 'taher@gmail.com', '01690160297', '25d55ad283aa400af464c76d713c07ad', 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL),
(17, '', 'software engineering', 'CSTE 05', 'Abu Taher', '', '', 3, 1, 32, 'ASH1825037M', '', '06', 'Abasik', 'taher@gmail.com', '01690160297', '3467c9dd313b559af9cb07024b0530e5', 0, 0, 2, 0, 'batch03', 1, 22, 1, 16, 0, NULL),
(19, 'IIT', 'Software Engineering ', 'SE23', 'Ahammed', 'Khair', 'Nasrin Nahar', 3, 1, 12, 'ASH1825036M', '', 'ASH', 'Yes', 'khairahmad6@gmail.com', '01822342990', '25d55ad283aa400af464c76d713c07ad', 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL),
(20, 'IIT', 'Software Engineering', 'SE25', 'Akash Debnath', 'shatta', 'Sandha ', 3, 1, 2017, 'ASH1825037M', '3.53', 'ASH', 'No', 'akashdeb@gmail.com', 'o18888888', 'ASH1825037m', 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL),
(21, 'IIT', 'SE', 'SE25', 'Razu', 'anyone', 'anyone1', 2, 1, 2018, 'ASH1925030M', '3.5', 'ASH', 'Yes', 'razu@gmail.com', '017777777', 'ASH1825037m', 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_results`
--

CREATE TABLE `student_results` (
  `id` int(50) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `year` int(20) NOT NULL,
  `term` int(20) NOT NULL,
  `credit_completed` int(11) NOT NULL,
  `cgpa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_results`
--

INSERT INTO `student_results` (`id`, `student_id`, `year`, `term`, `credit_completed`, `cgpa`) VALUES
(1, 'ASH1825037M', 0, 0, 0, '3.53'),
(2, 'ASH1825036M', 3, 1, 0, '4'),
(3, 'ASH1825031', 3, 1, 23, '2.33'),
(4, 'ASH1825036M', 3, 2, 12, '4.23'),
(5, 'ASH1825036M', 1, 1, 22, '3.32'),
(6, 'ASH1825036M', 1, 2, 23, '3.33'),
(7, 'ASH1825036M', 2, 1, 21, '3.35'),
(8, 'ASH1825036M', 2, 2, 19, '3.53'),
(9, 'ASH1825036M', 3, 1, 22, '3.52'),
(10, 'ASH1825036M', 3, 2, 25, '3.32'),
(11, 'ASH1825037M', 1, 1, 22, '3.32'),
(12, 'ASH1825037M', 1, 2, 23, '3.33'),
(13, 'ASH1825037M', 2, 1, 21, '3.35'),
(14, 'ASH1825037M', 2, 2, 19, '3.53'),
(15, 'ASH1825037M', 3, 1, 22, '3.52'),
(16, 'ASH1825037M', 3, 2, 25, '3.32'),
(17, 'ASH1825034M', 1, 1, 22, '3.32'),
(18, 'ASH1825034M', 1, 2, 23, '3.33'),
(19, 'ASH1825034M', 2, 1, 21, '3.35'),
(20, 'ASH1825034M', 2, 2, 19, '3.53'),
(21, 'ASH1825034M', 3, 1, 22, '3.52'),
(22, 'ASH1825034M', 3, 2, 25, '3.32'),
(23, 'ASH1825030M', 1, 1, 22, '3.32'),
(24, 'ASH1825030M', 1, 2, 23, '3.33'),
(25, 'ASH1825030M', 2, 1, 21, '3.35'),
(26, 'ASH1825030M', 2, 2, 19, '3.53'),
(27, 'ASH1825030M', 3, 1, 22, '3.52'),
(28, 'ASH1825030M', 3, 2, 25, '3.32');

-- --------------------------------------------------------

--
-- Table structure for table `term_fee`
--

CREATE TABLE `term_fee` (
  `id` int(20) NOT NULL,
  `termfee_id` varchar(50) NOT NULL,
  `dept_id` varchar(50) NOT NULL,
  `total_course` int(20) NOT NULL,
  `total_credit` int(20) NOT NULL,
  `year` int(20) NOT NULL,
  `term` int(20) NOT NULL,
  `residential` varchar(50) NOT NULL,
  `credit_fee` varchar(50) NOT NULL,
  `residential_fee` varchar(50) NOT NULL,
  `other_fee` varchar(50) NOT NULL,
  `total_fee` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `term_fee`
--

INSERT INTO `term_fee` (`id`, `termfee_id`, `dept_id`, `total_course`, `total_credit`, `year`, `term`, `residential`, `credit_fee`, `residential_fee`, `other_fee`, `total_fee`) VALUES
(15, '5', 'SE25', 10, 10, 3, 1, 'No', '50', '0', '500', '1000'),
(16, '3', 'CSTE12', 10, 18, 2, 1, 'Yes', '50', '500', '2000', '3400');

-- --------------------------------------------------------

--
-- Table structure for table `uploadform`
--

CREATE TABLE `uploadform` (
  `id` int(10) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploadform`
--

INSERT INTO `uploadform` (`id`, `file`, `type`, `size`) VALUES
(1, '79388-bsse0137.accdb', 'application/msaccess', 1928),
(2, '31288-134494698_2877879145784129_3027281665306373883_o.jpg', 'image/jpeg', 128),
(3, '22870-134494698_2877879145784129_3027281665306373883_o.jpg', 'image/jpeg', 128),
(4, '16243-nstu.jpg', 'image/jpeg', 29),
(5, '8311-72605421_2482842101954504_57250316327845888_n.jpg', 'image/jpeg', 60),
(6, '92157-me.jpg', 'image/jpeg', 92),
(7, '61592c8283add.jpg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `view`
--

CREATE TABLE `view` (
  `id` int(10) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chairman_file`
--
ALTER TABLE `chairman_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_coordinator`
--
ALTER TABLE `course_coordinator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `multiuserlogin`
--
ALTER TABLE `multiuserlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_officers`
--
ALTER TABLE `section_officers`
  ADD PRIMARY KEY (`so_id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `student_results`
--
ALTER TABLE `student_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_fee`
--
ALTER TABLE `term_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploadform`
--
ALTER TABLE `uploadform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `view`
--
ALTER TABLE `view`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chairman_file`
--
ALTER TABLE `chairman_file`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `course_coordinator`
--
ALTER TABLE `course_coordinator`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `mail_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `multiuserlogin`
--
ALTER TABLE `multiuserlogin`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `section_officers`
--
ALTER TABLE `section_officers`
  MODIFY `so_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student_results`
--
ALTER TABLE `student_results`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `term_fee`
--
ALTER TABLE `term_fee`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `uploadform`
--
ALTER TABLE `uploadform`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `view`
--
ALTER TABLE `view`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
