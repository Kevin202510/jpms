-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 12:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant_additional_info`
--

CREATE TABLE `applicant_additional_info` (
  `aai_id` int(11) NOT NULL,
  `aai_expected_salary` varchar(255) NOT NULL,
  `aai_location` varchar(100) NOT NULL,
  `aai_wfh_os` varchar(100) NOT NULL,
  `aai_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_additional_info`
--

INSERT INTO `applicant_additional_info` (`aai_id`, `aai_expected_salary`, `aai_location`, `aai_wfh_os`, `aai_user_id`) VALUES
(3, '10000', 'general tinio', 'home', 1),
(10, '500', 'gapan', 'work from Home', 1);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_educationbg`
--

CREATE TABLE `applicant_educationbg` (
  `aebg_id` int(11) NOT NULL,
  `aebg_user_id` int(100) NOT NULL,
  `aebg_school_name` varchar(100) NOT NULL,
  `aebg_year_graduate` varchar(100) NOT NULL,
  `aebg_education_attainment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_educationbg`
--

INSERT INTO `applicant_educationbg` (`aebg_id`, `aebg_user_id`, `aebg_school_name`, `aebg_year_graduate`, `aebg_education_attainment_id`) VALUES
(13, 1, 'Nueva Ecija University of Science and Technology ', '2022-11-22', 6),
(15, 1, 'Nueva Ecija University of Science and Technology', '2022-11-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_experience`
--

CREATE TABLE `applicant_experience` (
  `ae_id` int(11) NOT NULL,
  `ae_user_id` int(100) NOT NULL,
  `ae_companyname` varchar(100) NOT NULL,
  `ae_companyaddress` varchar(100) NOT NULL,
  `ae_position` varchar(100) NOT NULL,
  `ae_from` varchar(100) NOT NULL,
  `ae_to` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_experience`
--

INSERT INTO `applicant_experience` (`ae_id`, `ae_user_id`, `ae_companyname`, `ae_companyaddress`, `ae_position`, `ae_from`, `ae_to`) VALUES
(14, 1, 'Comapany Name', 'Comapany Address', 'Position', '2022-11-11', '2022-11-21'),
(24, 1, 'TECHNOWIZ', 'CABANATUAN NUEVA ECIJA', 'FULL STACK WEB DEVELOPER', '2019-01-20', '2022-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_skills`
--

CREATE TABLE `applicant_skills` (
  `as_id` int(11) NOT NULL,
  `as_user_id` int(11) NOT NULL,
  `as_skillname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_skills`
--

INSERT INTO `applicant_skills` (`as_id`, `as_user_id`, `as_skillname`) VALUES
(1, 1, 'software dev'),
(2, 1, 'web');

-- --------------------------------------------------------

--
-- Table structure for table `education_attainment`
--

CREATE TABLE `education_attainment` (
  `ea_id` int(11) NOT NULL,
  `ea_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education_attainment`
--

INSERT INTO `education_attainment` (`ea_id`, `ea_name`) VALUES
(1, 'High School Diploma'),
(2, 'Vocational Diploma / Short Course Certificate'),
(3, 'Bachelor\'s/College Degree'),
(4, 'Post Graduate Diploma / Master\'s Degree'),
(5, 'Professional License'),
(6, 'Doctorate Degree');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jobs_id` int(11) NOT NULL,
  `job_company_name` varchar(100) NOT NULL,
  `jobs_name` varchar(100) NOT NULL,
  `jobs_address` varchar(100) NOT NULL,
  `jobs_description` varchar(100) NOT NULL,
  `jobs_r_skills` varchar(100) NOT NULL,
  `jobs_r_education_id` int(11) NOT NULL,
  `jobs_preferred_time` varchar(100) NOT NULL,
  `jobs_r_experience` varchar(100) NOT NULL,
  `jobs_vacancy_count` varchar(100) NOT NULL,
  `job_expected_salary` varchar(100) NOT NULL,
  `jobs_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobs_id`, `job_company_name`, `jobs_name`, `jobs_address`, `jobs_description`, `jobs_r_skills`, `jobs_r_education_id`, `jobs_preferred_time`, `jobs_r_experience`, `jobs_vacancy_count`, `job_expected_salary`, `jobs_user_id`) VALUES
(1, 'company', 'developer', 'manila', 'dhsgsghs', 'dsfghgs', 1, '', 'fsghsfgh', 'wertreywery', 'PHP1000', 1),
(2, '', 'fullstack web developer', 'pasig ala manila', 'dhsgsghs', 'dsfghgs', 1, '', 'fsghsfgh', 'wertreywery', '', 1),
(3, '', 'cabanatuan', 'dgdgeg', 'dhsgsghs', 'dsfghgs', 1, '', 'fsghsfgh', 'wertreywery', '', 1),
(4, 'name of company', 'web developer', 'general tinio', 'dhsgsghs', 'dsfghgs', 1, '', 'fsghsfgh', '2', '100', 1),
(5, 'Comapany Name', 'Position', 'Comapany Address', 'Description', 'none', 1, '1', 'Experience', '5', '12', 3),
(6, 'j', 'fghfg', 'gfhfg', 'fghfg', '1', 1, 'gfhfg', 'fghf', '45', '5', 3),
(7, 'dfg', 'fg', 'dfgdf', 'dfgdf', '1', 1, 'dfgdf', 'fgdf', '334', '4543', 3),
(13, 'dsd', 'asdas', 'asda', 'asds', '1', 1, 'asdasd', 'sadas', '2', '32', 3),
(14, 'sdfsdf', 'dsffs', 'dfsd', 'ewerwer', '1', 1, 'dsfdsfsd', 'dsfsdf', '3', '7', 3),
(15, 'wqewqeq', 'ssdfsd', 'fsdfsd', 'fsdf', '1', 1, 'dfsd', 'erwer', '3', '44', 3),
(16, 'fdgdf', 'gfgd', 'gfdfgd', 'fgdfg', '1', 1, 'fdgdfg', '2', '3', '3', 3),
(17, 'weewew', 'wwe', 'wewe', 'ewe', '1', 1, 'wewew', 'wewe', '2', '2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `display_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `display_name`) VALUES
(1, 'administrator'),
(2, 'employee'),
(3, 'employer'),
(4, 'applicants');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_contact` varchar(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_contact`, `user_email`, `address`, `user_password`, `user_role_id`) VALUES
(1, 'rey john paul', 'limbo', '098765432', 'reyjohnpaul@gmail.com', 'afsfdsdfs', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(2, 'asdasd', 'asdasdasd', '3422345234', 'applicant@gmail.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_additional_info`
--
ALTER TABLE `applicant_additional_info`
  ADD PRIMARY KEY (`aai_id`);

--
-- Indexes for table `applicant_educationbg`
--
ALTER TABLE `applicant_educationbg`
  ADD PRIMARY KEY (`aebg_id`),
  ADD KEY `uid` (`aebg_user_id`),
  ADD KEY `ua` (`aebg_education_attainment_id`);

--
-- Indexes for table `applicant_experience`
--
ALTER TABLE `applicant_experience`
  ADD PRIMARY KEY (`ae_id`),
  ADD KEY `ae` (`ae_user_id`);

--
-- Indexes for table `applicant_skills`
--
ALTER TABLE `applicant_skills`
  ADD PRIMARY KEY (`as_id`),
  ADD KEY `as` (`as_user_id`);

--
-- Indexes for table `education_attainment`
--
ALTER TABLE `education_attainment`
  ADD PRIMARY KEY (`ea_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobs_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `ri` (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_additional_info`
--
ALTER TABLE `applicant_additional_info`
  MODIFY `aai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `applicant_educationbg`
--
ALTER TABLE `applicant_educationbg`
  MODIFY `aebg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `applicant_experience`
--
ALTER TABLE `applicant_experience`
  MODIFY `ae_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `applicant_skills`
--
ALTER TABLE `applicant_skills`
  MODIFY `as_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `education_attainment`
--
ALTER TABLE `education_attainment`
  MODIFY `ea_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicant_educationbg`
--
ALTER TABLE `applicant_educationbg`
  ADD CONSTRAINT `ua` FOREIGN KEY (`aebg_education_attainment_id`) REFERENCES `education_attainment` (`ea_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uid` FOREIGN KEY (`aebg_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applicant_experience`
--
ALTER TABLE `applicant_experience`
  ADD CONSTRAINT `ae` FOREIGN KEY (`ae_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applicant_skills`
--
ALTER TABLE `applicant_skills`
  ADD CONSTRAINT `as` FOREIGN KEY (`as_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `ri` FOREIGN KEY (`user_role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
