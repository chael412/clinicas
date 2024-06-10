-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 06:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `a_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`a_id`, `username`, `password`) VALUES
(7, 'admin', 'admin'),
(8, 'jayar', 'jayar123'),
(9, 'mike', 'mike123'),
(14, 'sam', 'sample');

-- --------------------------------------------------------

--
-- Table structure for table `confinement`
--

CREATE TABLE `confinement` (
  `cf_id` int(11) NOT NULL,
  `mh_id` int(11) NOT NULL,
  `confinement` varchar(100) NOT NULL,
  `confinement_date` date NOT NULL,
  `m_diagnosis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `confinement`
--

INSERT INTO `confinement` (`cf_id`, `mh_id`, `confinement`, `confinement_date`, `m_diagnosis`) VALUES
(1, 1, 'IDGH confinement', '2024-01-01', 'covid diagnosis');

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `ct_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `chief_complaints` varchar(100) NOT NULL,
  `recommendation` varchar(100) NOT NULL,
  `med_desc` varchar(255) NOT NULL,
  `process_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultations`
--

INSERT INTO `consultations` (`ct_id`, `u_id`, `chief_complaints`, `recommendation`, `med_desc`, `process_date`) VALUES
(1, 4, 'hh', 'hhhh', 'h', '2024-05-04 07:54:37'),
(2, 1, 'nahaha', 'nahahah', 'no comment', '2024-05-04 23:48:42'),
(3, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Libero enim sed faucibus turpis in eu mi. Suspendisse interdum consectetur libero id. Aenean et tortor at risus viverra adipiscing ', '2024-05-05 00:36:27'),
(4, 2, 'vv', 'vv', 'ju', '2024-05-05 23:44:52'),
(5, 8, 'bg', 'bgg', 'mkhg', '2024-05-05 23:54:08'),
(6, 6, 'jjj', 'jjjj', 'jjjj', '2024-05-05 23:54:41'),
(7, 7, 'nnjnn', 'nnnn', 'mmmma', '2024-05-05 23:57:05'),
(8, 9, 'ss', 'ss', 'ss', '2024-05-06 02:13:48'),
(9, 3, 'kkkk', 'kkkk', 'kkk', '2024-05-07 03:20:42'),
(10, 15, 'sample chief com', 'sample recom', 'sample med pres', '2024-05-26 03:57:59'),
(11, 15, 'gtyayay', 'recomen', 'precribe', '2024-05-26 04:18:55'),
(12, 15, 'gg chief', 'gg recos', 'gg pres', '2024-05-26 04:21:20'),
(18, 15, 'hahah chief', 'hahaha recom', 'hahah pres', '2024-05-26 04:52:23'),
(19, 5, 'your love', 'nating', 'jajajaj', '2024-05-27 13:05:35'),
(20, 5, 'aa', 'aa', 'aa', '2024-05-27 13:06:28'),
(21, 3, 'bb', 'bbb', '', '2024-05-27 13:08:03'),
(22, 5, 'mmm', 'mmm', 'mmm', '2024-05-27 13:08:33'),
(23, 7, 'nnn', 'nnn', 'jj', '2024-05-27 13:09:29'),
(24, 16, 'bb update', 'cdczx', 'yun ka', '2024-05-27 13:15:02'),
(25, 14, 'yuuauau update version1', 'yahay up', 'tysas', '2024-05-27 14:53:33'),
(26, 12, 'gggg update', 'gggg hahaha pogi ako', 'ggggg', '2024-05-27 23:45:54'),
(27, 12, 'aguy', 'hahah bleh', 'hahaah anno na', '2024-05-27 23:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `consult_medicine`
--

CREATE TABLE `consult_medicine` (
  `cm_id` int(11) NOT NULL,
  `ct_id` int(11) NOT NULL,
  `mdn_id` int(11) NOT NULL,
  `cm_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consult_medicine`
--

INSERT INTO `consult_medicine` (`cm_id`, `ct_id`, `mdn_id`, `cm_quantity`) VALUES
(1, 1, 2, 6),
(3, 2, 4, 33),
(4, 2, 7, 34),
(5, 3, 4, 2),
(6, 3, 2, 3),
(9, 5, 2, 6),
(73, 4, 2, 3),
(74, 4, 3, 6),
(75, 4, 5, 8),
(85, 8, 7, 10),
(86, 7, 7, 7),
(87, 7, 3, 1),
(88, 6, 7, 1),
(89, 6, 6, 2),
(96, 9, 3, 5),
(97, 9, 7, 8),
(98, 10, 0, 0),
(99, 12, 3, 10),
(100, 12, 6, 8),
(105, 18, 4, 1),
(106, 18, 5, 1),
(107, 19, 2, 2),
(108, 20, 7, 2),
(109, 21, 2, 1),
(110, 21, 6, 1),
(111, 22, 7, 1),
(112, 22, 11, 1),
(113, 23, 7, 5),
(114, 23, 2, 2),
(119, 24, 7, 2),
(120, 24, 3, 2),
(125, 25, 2, 5),
(126, 25, 3, 2),
(129, 27, 7, 2),
(130, 27, 3, 1),
(133, 26, 2, 1),
(134, 26, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `consult_monthly`
--

CREATE TABLE `consult_monthly` (
  `ctm_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `chief_complaints` varchar(100) NOT NULL,
  `recommendation` varchar(100) NOT NULL,
  `med_desc` varchar(100) NOT NULL,
  `process_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consult_monthly`
--

INSERT INTO `consult_monthly` (`ctm_id`, `u_id`, `chief_complaints`, `recommendation`, `med_desc`, `process_date`) VALUES
(1, 9, 'sample mnth compliants', 'sample recommendation', '', '2024-06-10 00:23:13'),
(2, 9, 'month comaplinats', 'tes123', 'test123', '2024-06-10 00:48:40'),
(3, 9, 'xxxxx', 'xxxxxx', 'xxxx', '2024-06-10 00:49:15'),
(4, 9, 'xxxxxxxxxxx', 'xxxxxxxxxxxxxxx', 'xxxxxxxxxxxx', '2024-06-10 00:51:09'),
(5, 9, 'xxxxxxxxxxxxxxx', 'xxxxxxxxxxxxxx', 'xxxxxxxxx', '2024-06-10 00:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `consult_monthly_medicine`
--

CREATE TABLE `consult_monthly_medicine` (
  `ctmm_id` int(11) NOT NULL,
  `ctm_id` int(11) NOT NULL,
  `mdn_id` int(11) NOT NULL,
  `ctmm_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consult_monthly_medicine`
--

INSERT INTO `consult_monthly_medicine` (`ctmm_id`, `ctm_id`, `mdn_id`, `ctmm_quantity`) VALUES
(1, 1, 3, 5),
(2, 5, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cs_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `acro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cs_id`, `course_name`, `acro`) VALUES
(1, 'Bachelor of Science in Information Technology', 'BSIT'),
(2, 'Bachelor of Science in Civil Engineering', 'BSCE'),
(3, 'Bachelor of Science in Electrical Engineering', 'BSEE'),
(4, 'Bachelor of Science in Architecture', 'BSA'),
(5, 'Bachelor of Technological-Vocational Teacher Education', 'BTVTED'),
(6, 'Bachelor of Technology and Livelihood Education', 'BTLED'),
(7, 'Bachelor of Science in Nursing', 'BSN'),
(8, 'School of Midwifery', 'SOM'),
(9, 'Bachelor of Science in Psychology', 'BSPysh'),
(10, 'Bachelor of  Secondary Education', 'BSED'),
(11, 'Bachelor of Science in Industrial Technology', 'BSIndus'),
(12, 'Bachelor of Science in Physical Education', 'BPED');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dp_id` int(11) NOT NULL,
  `dp_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dp_id`, `dp_name`) VALUES
(1, 'CEAT'),
(2, 'CEd'),
(3, 'CoN'),
(4, 'SoM'),
(5, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `desease`
--

CREATE TABLE `desease` (
  `d_id` int(11) NOT NULL,
  `deseas_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `desease`
--

INSERT INTO `desease` (`d_id`, `deseas_name`) VALUES
(1, 'Hyperthension'),
(2, 'Diabetes'),
(3, 'Cardiovascular(Heart)Desease'),
(4, 'PTB'),
(5, 'Hyperacidity'),
(6, 'Allergy'),
(7, 'Epilepsy'),
(8, 'Asthma'),
(9, 'Dysmenorrhea'),
(10, 'liver/Gall Blader Desease');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `employee_no` varchar(100) NOT NULL,
  `u_id` int(11) NOT NULL,
  `dp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `employee_no`, `u_id`, `dp_id`) VALUES
(1, 'atr-12345', 9, 0),
(2, 'aaa-019191', 14, 0),
(3, 'ascc-6666', 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `food_major`
--

CREATE TABLE `food_major` (
  `food_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `cbc` varchar(255) NOT NULL,
  `urinalysis` varchar(255) NOT NULL,
  `x_ray` varchar(255) NOT NULL,
  `pregnancy_test` varchar(255) NOT NULL,
  `screening` varchar(255) NOT NULL,
  `fecalysis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `mh_id` int(11) NOT NULL,
  `Hyperthension` varchar(1) NOT NULL DEFAULT '0',
  `Diabetes` int(1) NOT NULL DEFAULT 0,
  `Cardiovascular_desease` int(1) NOT NULL DEFAULT 0,
  `PTB` int(1) NOT NULL DEFAULT 0,
  `Hyperacidity` int(1) NOT NULL DEFAULT 0,
  `Allergy` int(1) NOT NULL DEFAULT 0,
  `Epilepsy` int(1) NOT NULL DEFAULT 0,
  `Asthma` int(1) NOT NULL DEFAULT 0,
  `Dysmenorrhea` int(1) NOT NULL DEFAULT 0,
  `liver_Desease` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_history`
--

INSERT INTO `medical_history` (`mh_id`, `Hyperthension`, `Diabetes`, `Cardiovascular_desease`, `PTB`, `Hyperacidity`, `Allergy`, `Epilepsy`, `Asthma`, `Dysmenorrhea`, `liver_Desease`) VALUES
(2, '1', 1, 1, 1, 1, 1, 1, 1, 1, 1),
(3, '1', 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `medical_present`
--

CREATE TABLE `medical_present` (
  `mp_id` int(11) NOT NULL,
  `ispresent` int(1) NOT NULL DEFAULT 0,
  `mp_diagnosis` varchar(100) NOT NULL,
  `mp_treatment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_present`
--

INSERT INTO `medical_present` (`mp_id`, `ispresent`, `mp_diagnosis`, `mp_treatment`) VALUES
(1, 1, 'sakit sa tyan', 'eart well'),
(2, 1, 'nako', 'nako po');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `mdn_id` int(11) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `type_id` int(11) NOT NULL,
  `ml` decimal(6,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `med_prescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`mdn_id`, `medicine_name`, `brand_name`, `type_id`, `ml`, `quantity`, `med_prescription`) VALUES
(2, 'ascorbic acid', '', 2, 0.00, 9988, ''),
(3, 'Mefenamic acid', '', 2, 0.00, 999994, ''),
(4, 'Amoxicillin Cap', '', 1, 0.00, 0, ''),
(5, 'Ambroxol Tab', '', 3, 4.50, 0, ''),
(6, 'Azithromycin Tab', '', 3, 1.20, 0, ''),
(7, 'vitamin x', '', 2, 0.00, 18, ''),
(11, 'sample genericer', 'sample brander', 1, 1.75, 1, 'sample prescription');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_types`
--

CREATE TABLE `medicine_types` (
  `mdntype_id` int(11) NOT NULL,
  `mdn_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine_types`
--

INSERT INTO `medicine_types` (`mdntype_id`, `mdn_id`, `type_id`) VALUES
(1, 2, 2),
(2, 3, 2),
(3, 4, 1),
(4, 5, 3),
(5, 6, 3),
(6, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `med_cert`
--

CREATE TABLE `med_cert` (
  `mc_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `mh_id` int(11) NOT NULL,
  `mp_id` int(11) NOT NULL,
  `med_type` int(1) NOT NULL DEFAULT 1 COMMENT '1-students,2-employees,3-visitors'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `med_cert`
--

INSERT INTO `med_cert` (`mc_id`, `u_id`, `mh_id`, `mp_id`, `med_type`) VALUES
(1, 1, 2, 2, 1),
(2, 8, 3, 2, 3),
(3, 9, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mhistory_desease`
--

CREATE TABLE `mhistory_desease` (
  `cd_id` int(11) NOT NULL,
  `mh_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mhistory_desease`
--

INSERT INTO `mhistory_desease` (`cd_id`, `mh_id`, `d_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 7),
(6, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `ojts`
--

CREATE TABLE `ojts` (
  `ojt_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `mh_id` int(11) NOT NULL,
  `mp_id` int(11) NOT NULL,
  `urinalysis` varchar(100) NOT NULL,
  `x_ray` varchar(100) NOT NULL,
  `pregnancy_test` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ojts`
--

INSERT INTO `ojts` (`ojt_id`, `s_id`, `mh_id`, `mp_id`, `urinalysis`, `x_ray`, `pregnancy_test`) VALUES
(6, 1, 0, 0, '../assets/upload/g2s.png', '../assets/upload/Project Summary.png', '../assets/upload/splashbanner.png'),
(8, 2, 0, 0, '../assets/upload/Screenshot (21).png', '../assets/upload/Screenshot (24).png', '../assets/upload/Screenshot (72).png'),
(9, 2, 2, 1, '../assets/upload/ojt/Dashboard - Copy.png', '../assets/upload/ojt/Plus.png', '../assets/upload/ojt/Supplier.png'),
(10, 2, 3, 2, '../assets/upload/ojt/dashboard.png', '../assets/upload/ojt/close.png', '../assets/upload/ojt/skills.png');

-- --------------------------------------------------------

--
-- Table structure for table `practice_teaching`
--

CREATE TABLE `practice_teaching` (
  `teach_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `cbc` varchar(255) NOT NULL,
  `urinalysis` varchar(255) NOT NULL,
  `x_ray` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `practice_teaching`
--

INSERT INTO `practice_teaching` (`teach_id`, `s_id`, `cbc`, `urinalysis`, `x_ray`) VALUES
(1, 5, '../assets/upload/game2.png', '../assets/upload/scrim_pic1.png', '../assets/upload/iconz.png');

-- --------------------------------------------------------

--
-- Table structure for table `rle`
--

CREATE TABLE `rle` (
  `rle_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `urinalysis` varchar(255) NOT NULL,
  `screening` varchar(255) NOT NULL,
  `fecalysis` varchar(255) NOT NULL,
  `x_ray` varchar(255) NOT NULL,
  `pregnancy_test` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rle`
--

INSERT INTO `rle` (`rle_id`, `s_id`, `urinalysis`, `screening`, `fecalysis`, `x_ray`, `pregnancy_test`) VALUES
(1, 3, '../assets/upload/108350454.jpg', '../assets/upload/girl1.jpg', '../assets/upload/edsheran.png', '../assets/upload/teambanner.png', '../assets/upload/chibi2.png');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `s_id` int(11) NOT NULL,
  `student_no` varchar(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `cs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s_id`, `student_no`, `u_id`, `cs_id`) VALUES
(1, '20-12345', 1, 1),
(2, '22-99999', 2, 4),
(3, '88-65655', 3, 8),
(4, '55-00102', 4, 10),
(5, '44-93933', 5, 1),
(7, '22-189191', 7, 1),
(10, '20-19234', 16, 9);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type_id`, `type_name`) VALUES
(1, 'Capsule'),
(2, 'Syrup'),
(3, 'Tablet');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `sex` int(1) NOT NULL DEFAULT 1 COMMENT '1=male,2=female',
  `contact_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `firstname`, `middlename`, `lastname`, `birthdate`, `sex`, `contact_no`) VALUES
(1, 'leo', 'hanz', 'batusay', '2002-06-30', 1, ''),
(2, 'jet', 'a', 'lee', '2000-03-07', 1, '0976767676'),
(3, 'hanna', 'a', 'isabel', '2024-03-28', 1, '0988976867'),
(4, 'jun', 'a', 'laki', '2002-03-28', 1, '098897844'),
(5, 'jack', 'a', 'kiel', '2003-03-22', 1, '0987967876'),
(6, 'joshua', 'asa', 'greymatsi', '2002-03-19', 2, '0898775676'),
(7, 'song', 'asUUUU', 'yang', '2001-05-02', 1, '09898787'),
(8, 'visit1', 'visit2', 'visit3', '2024-04-17', 1, '09877876767'),
(9, 'employee1', 'employee2', 'employee3', '2015-04-08', 2, '09567657444'),
(10, 'hanso', 'a', 'hyu', '2003-05-01', 1, '089787686'),
(11, 'lancelot', 'ju', 'poiiu', '2024-05-08', 1, '08797686575'),
(12, 'moi', 'aa', 'bgty', '2024-05-10', 1, '0989678'),
(13, 'igno', 'mkk', 'kkk', '2024-05-08', 1, '098978777'),
(14, 'eros', '', 'cdfff', '2007-05-06', 0, '09787686'),
(15, 'hyy', '', 'aasa', '2024-05-14', 0, '0987976856'),
(16, 'Taguro', 'a', 'Gumenasai', '2001-05-09', 1, '09818181811');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `v_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`v_id`, `u_id`) VALUES
(1, 8),
(2, 12),
(3, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `confinement`
--
ALTER TABLE `confinement`
  ADD PRIMARY KEY (`cf_id`);

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `consult_medicine`
--
ALTER TABLE `consult_medicine`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `consult_monthly`
--
ALTER TABLE `consult_monthly`
  ADD PRIMARY KEY (`ctm_id`);

--
-- Indexes for table `consult_monthly_medicine`
--
ALTER TABLE `consult_monthly_medicine`
  ADD PRIMARY KEY (`ctmm_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dp_id`);

--
-- Indexes for table `desease`
--
ALTER TABLE `desease`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `food_major`
--
ALTER TABLE `food_major`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`mh_id`);

--
-- Indexes for table `medical_present`
--
ALTER TABLE `medical_present`
  ADD PRIMARY KEY (`mp_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`mdn_id`);

--
-- Indexes for table `medicine_types`
--
ALTER TABLE `medicine_types`
  ADD PRIMARY KEY (`mdntype_id`);

--
-- Indexes for table `med_cert`
--
ALTER TABLE `med_cert`
  ADD PRIMARY KEY (`mc_id`);

--
-- Indexes for table `mhistory_desease`
--
ALTER TABLE `mhistory_desease`
  ADD PRIMARY KEY (`cd_id`);

--
-- Indexes for table `ojts`
--
ALTER TABLE `ojts`
  ADD PRIMARY KEY (`ojt_id`);

--
-- Indexes for table `practice_teaching`
--
ALTER TABLE `practice_teaching`
  ADD PRIMARY KEY (`teach_id`);

--
-- Indexes for table `rle`
--
ALTER TABLE `rle`
  ADD PRIMARY KEY (`rle_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `confinement`
--
ALTER TABLE `confinement`
  MODIFY `cf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `consult_medicine`
--
ALTER TABLE `consult_medicine`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `consult_monthly`
--
ALTER TABLE `consult_monthly`
  MODIFY `ctm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `consult_monthly_medicine`
--
ALTER TABLE `consult_monthly_medicine`
  MODIFY `ctmm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `desease`
--
ALTER TABLE `desease`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `food_major`
--
ALTER TABLE `food_major`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `mh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medical_present`
--
ALTER TABLE `medical_present`
  MODIFY `mp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `mdn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `medicine_types`
--
ALTER TABLE `medicine_types`
  MODIFY `mdntype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `med_cert`
--
ALTER TABLE `med_cert`
  MODIFY `mc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mhistory_desease`
--
ALTER TABLE `mhistory_desease`
  MODIFY `cd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ojts`
--
ALTER TABLE `ojts`
  MODIFY `ojt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `practice_teaching`
--
ALTER TABLE `practice_teaching`
  MODIFY `teach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rle`
--
ALTER TABLE `rle`
  MODIFY `rle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
