-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 04:42 PM
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
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply_job`
--

CREATE TABLE `apply_job` (
  `jobpost_id` int(11) NOT NULL,
  `jobseeker_id` int(11) NOT NULL,
  `essay` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `create_jobpost`
--

CREATE TABLE `create_jobpost` (
  `jobpost_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `job_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `employer_id` int(11) NOT NULL,
  `employer_fullname` varchar(255) NOT NULL,
  `employer_countrycode` varchar(5) DEFAULT NULL,
  `employer_phonenumber` varchar(20) DEFAULT NULL,
  `employer_email` varchar(255) NOT NULL,
  `employer_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`employer_id`, `employer_fullname`, `employer_countrycode`, `employer_phonenumber`, `employer_email`, `employer_password`) VALUES
(1, ' ', '', '', '', '32RASFF'),
(2, 'bryant effendi', '78999', '72888828888', 'bryanteffendi1234@gmail.com', '32QRWAERYAEASF'),
(3, 'bryant effendi', '78999', '72888828888', 'bryant1234@gmail.com', '5ergfy5thy5e'),
(4, 'bryant effendi', 'ermmm', '72888828543542', 'bryant1244@gmail.com', 'iejdfgdG'),
(5, 'bryant effendi', '78999', '72888828543542', 'bryant1244735724@gmail.com', '$2y$10$34bUmT8tZDBNsO5LUTEiZehZhZ./7BQQ0dyeHQwpIrMowmo/5lhcW'),
(6, 'test test', 'test', 'tetststts', 'test@gmail.com', '$2y$10$nILDs9cqnd.Qm1gn9RQm..bZzJp7zXeyo2IYBwdzgsxl/PLIC/dai'),
(7, 'testing yes', '+623', '08977735355', 'test22@gmail.com', '$2y$10$BY5RQe7gZh8ipulepA/K6ucOctG29XrWsVR.BvC8DRRQANGV.Pjga'),
(8, 'test yes', '+6234', '3857828578', 'bryant12344@gmail.com', '$2y$10$jVBgGO49enxYkcKfK/gvNuEX0M8ObOSf.7OtqGccjAQeRDIUqyNKi'),
(9, 'test 4wefd', '6543', '47223212', 'bryant12447357245@gmail.com', '$2y$10$nCcNhmJYDFLXk1SABGxal.ebEFmFcBxUtE6Xpg/wjIGpXJulsq2g2'),
(10, 'bryant 4wefd', 'ermmm', '08977735355', 'bryanteffendi12345@gmail.com', '$2y$10$wxASsxyIxAulv64LgXoaweMtt/wofNFfFq9d0lIZ2uNnNg/5pLP8O'),
(11, 'bryant effendi', '78999', '72888828543542', 'bryanteffendi12347@gmail.com', '$2y$10$mHZ9Q0Iay6B62GSooFII7OUvx/2vpSZ1HAwRExdffBgDehFxRrSfi'),
(12, 'bryant yes', '78999', '72888828888', 'bryanteffendi123rqe4@gmail.com', '$2y$10$BluDVrgEac7K.bsKmEO4h.Me1gY1LakWgdrgZAfxW6f6ijAm0QX7e'),
(13, 'test effendi', '78999', 'tetststts5', 'bryanteffendi123544@gmail.com', '$2y$10$lsZUv4Nbbm4vtsE0BmPMvO2wzWESZw6XkdapyGaMVTfAoMRcQ0l/q'),
(14, 'bryant effendi', '42', '72888828888', 'bryanteffendi12354@gmail.com', '$2y$10$/P/Z5WXA183auu0ibdeS4OylQmsH3s3E1ZlSH3hJCzTUx6asWn37i'),
(15, 'bryant effendi', '78999', '72888828888', 'bryanteffendi12346@gmail.com', '$2y$10$8b40WRepNvt1Zdt/YHuPVO.m/mVI.g89BTKInSaLdSBRjJYsvGQVS'),
(16, 'bryant effendi', '78999', '72888828888', 'bryanteffendi1234324@gmail.com', '$2y$10$xxIdT0nYrzJaYJxiOyn1TueDmoyEMdje5GYG22YMvgzo8seGi5g7a'),
(17, 'bryant effendi', '78999', '72888828888', 'bryanteffendi123523234@gmail.com', '$2y$10$mcCNqiS3N5xEhOjnVRqwO.gV754ZflDZVNNe1oKxZiK5oI6o4ur9K'),
(18, 'bryant effendi', '78999', '72888828543542', 'bryanteffendi121424134@gmail.com', '$2y$10$GXPsxR/AB8/j0G5SgZvh4u4tENqNs8eoseZc4iyp7IuWqTAzZV0BK'),
(19, 'bryant effendi', '78999', '72888828543542', 'bryanteffendi1214666134@gmail.com', '$2y$10$tXMrmmGjYc1CLdKGoXiTOeage4p8xFF79LXPiWer2l/OWFmCq5Doe'),
(20, 'bryant effendi', '78999', '72888828543542', 'bryanteffendi12314666134@gmail.com', '$2y$10$GqIY59sHm8T0bFFkkO8lyudyrbyeFT92XAGuULLOjvMvll7gYCj66'),
(21, 'bryant effendi', '78999', '72888828543542', 'bryanteffendi123146r366134@gmail.com', '$2y$10$N74rjs3kPr7awJR8.zBWI.T5JHdTGTYO0K66UKrlgAsGxiJJWSHBO'),
(22, 'Kayden C2', '62', '82213212833', 'kayden@gmail.com', 'passwd');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE `jobseeker` (
  `jobseeker_id` int(11) NOT NULL,
  `jobseeker_fullname` varchar(255) NOT NULL,
  `jobseeker_countrycode` varchar(20) DEFAULT NULL,
  `jobseeker_phonenumber` varchar(30) DEFAULT NULL,
  `jobseeker_birthday` date DEFAULT NULL,
  `jobseeker_university` varchar(255) DEFAULT NULL,
  `jobseeker_degree` varchar(255) DEFAULT NULL,
  `jobseeker_major` varchar(255) DEFAULT NULL,
  `jobseeker_email` varchar(255) NOT NULL,
  `jobseeker_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`jobseeker_id`, `jobseeker_fullname`, `jobseeker_countrycode`, `jobseeker_phonenumber`, `jobseeker_birthday`, `jobseeker_university`, `jobseeker_degree`, `jobseeker_major`, `jobseeker_email`, `jobseeker_password`) VALUES
(1, 'bryant effendi', '78999', '72888828888', '2007-05-14', 'SGU', 'bachelor', 'Information Technology', 'bryanteffendi1234@gmail.com', '273r6848747'),
(3, ' ', '', '', '0000-00-00', '', '', '', '', ''),
(4, 'bryant effendi', '78999', '72888828888', '2007-05-14', 'SGU', 'bachelor', 'Information Technology', 'bryant12446@gmail.com', '214341'),
(5, 'bryant effendi', '78999', '72888828888', '2007-05-14', 'SGU', 'bachelor', 'Information Technology', 'bryanteffendi1233524@gmail.com', '341241'),
(6, 'bryant effendi', '78999', '72888828888', '2007-05-14', 'SGU', 'bachelor', 'Information Technology', 'bryanteffendi123465@gmail.com', '4253252'),
(7, 'Kayden C', '62', '82213212833', '2005-01-02', 'SGU', 'Bachelor', 'IT', 'kayden@gmail.com', 'passwd');

-- --------------------------------------------------------

--
-- Table structure for table `job_post`
--

CREATE TABLE `job_post` (
  `jobpost_id` int(11) NOT NULL,
  `job_name` varchar(255) DEFAULT NULL,
  `job_type` varchar(100) DEFAULT NULL,
  `salary_wage` decimal(10,2) DEFAULT NULL,
  `age` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`jobpost_id`, `job_name`, `job_type`, `salary_wage`, `age`, `gender`, `is_active`, `company_logo`) VALUES
(0, 'IT-developer', 'Full time', 7500000.00, '30', 'Both', 1, NULL),
(1, 'tester', 'Part time', 5000000.00, '21', 'male', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply_job`
--
ALTER TABLE `apply_job`
  ADD PRIMARY KEY (`jobpost_id`,`jobseeker_id`);

--
-- Indexes for table `create_jobpost`
--
ALTER TABLE `create_jobpost`
  ADD PRIMARY KEY (`jobpost_id`,`employer_id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`employer_id`),
  ADD UNIQUE KEY `employer_email` (`employer_email`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`jobseeker_id`),
  ADD UNIQUE KEY `jobseeker_email` (`jobseeker_email`);

--
-- Indexes for table `job_post`
--
ALTER TABLE `job_post`
  ADD PRIMARY KEY (`jobpost_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `employer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `jobseeker`
--
ALTER TABLE `jobseeker`
  MODIFY `jobseeker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
