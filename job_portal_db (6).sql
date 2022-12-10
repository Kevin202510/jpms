-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 07:11 AM
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
(1, '100', 'general tinio', 'online', 38),
(2, '20000', 'General Tinio', 'IT ', 50),
(3, '40000', 'General Tinio', 'SEO and Analytics', 51);

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
(2, 50, 'University/College Details', '2011-06-09', 1),
(3, 51, 'Bachelor of Arts, Major in Communication', '2012-06-09', 1);

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
(3, 50, 'Fashion School', 'Borcelle University', 'Super Visor', '2020-01-09', '2022-12-04'),
(4, 51, 'Social Media Producer ', ' Anywhere St., Any City', 'Manager', '2013-02-09', '2015-06-09');

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
(2, 50, 'Negotiation'),
(3, 50, 'Problem Solving'),
(4, 51, 'Market research'),
(5, 51, 'Copywriting');

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
  `jobs_description` longtext NOT NULL,
  `jobs_r_skills` varchar(100) NOT NULL,
  `jobs_r_education_id` int(11) DEFAULT NULL,
  `jobs_preferred_time` varchar(100) NOT NULL,
  `jobs_r_experience` varchar(100) NOT NULL,
  `jobs_vacancy_count` varchar(100) NOT NULL,
  `job_expected_salary` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `jobs_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobs_id`, `job_company_name`, `jobs_name`, `jobs_address`, `jobs_description`, `jobs_r_skills`, `jobs_r_education_id`, `jobs_preferred_time`, `jobs_r_experience`, `jobs_vacancy_count`, `job_expected_salary`, `created_at`, `jobs_user_id`) VALUES
(31, 'Comapany Name', 'Position', 'manila', 'Responsible in assisting the review of concessionaire design proposals and implementation of the sta', 'Skills', 5, 'Part Time', 'Experience', '9', '8', '2022-12-04 10:27:03', 30),
(41, 'sdfsd', 'sfsd', 'sdfs', 'dfs', 'sdfsd', 1, 'Full Time', 'dfsf', '234', '44', '2022-12-09 09:32:39', 38),
(42, 'Robinsons Appliances Corp', 'CEO', 'Cagayan De Oro, Pampanga, Mindoro', 'Responsible in assisting the review of concessionaire design proposals and implementation of the standard design guidelines prior to the approval of SPD Design Supervisor and Manager. Helps in preparation of all communication letters/memos, scope of works, in-house estimates, specifications and other bid documents.', 'Marketing, Time Management, Data Analysis', 3, 'Full Time', '3-5 Years', '1', '30000', '2022-12-09 10:39:01', 48),
(43, 'KC Wonderland Corp. (World of Fun)', 'Clown', 'National Capital Reg', 'Job R Responsibilities With Bachelor’s/College Degree in Architecture or equivalent.l At least 5 yrs of experiencel Knowledgeable in MS Project and Auto cadl Will create store designs, layout, and cost estimatesl Will monitor construction and renovationl With experience in handling draftsman', 'Funny, Magician, Talkative', 1, 'Part Time', '1 Year', '10', '15000', '2022-12-09 10:43:04', 49);

-- --------------------------------------------------------

--
-- Table structure for table `job_applicants`
--

CREATE TABLE `job_applicants` (
  `job_app_id` int(11) NOT NULL,
  `job_app_job_id` int(11) NOT NULL,
  `job_app_user_id` int(11) NOT NULL,
  `date_apply` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `requirements_id` int(11) NOT NULL,
  `requirements_filename` varchar(255) NOT NULL,
  `requirements_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(31, 'admin', 'account', '0987622132', 'admin@gmail.com', 'BRGY Sagingan General Tinio Nueva Ecija ', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(48, 'Mariana', 'Anderson', '09876543211', 'Mariana@gmail.com', 'Nazareth General Tinio Nueva Ecija', '5f4dcc3b5aa765d61d8327deb882cf99', 3),
(49, 'Olivia', ' Wilson', '09876543212', 'Olivia@gmai.com', 'Conception General Tinio Nueva Ecija', '5f4dcc3b5aa765d61d8327deb882cf99', 3),
(50, 'Itsuki', ' Takahashi', '09876543213', 'Itsuki@gmail.com', 'San Pedro General Tinio Nueva Ecija', '5f4dcc3b5aa765d61d8327deb882cf99', 4),
(51, 'Ketut ', 'Susilo', '09897654321', 'Ketut@gmail.com', 'Bago General Tinio Nueva Ecija', '5f4dcc3b5aa765d61d8327deb882cf99', 4);

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
  ADD PRIMARY KEY (`jobs_id`),
  ADD KEY `nat` (`jobs_r_education_id`);

--
-- Indexes for table `job_applicants`
--
ALTER TABLE `job_applicants`
  ADD PRIMARY KEY (`job_app_id`),
  ADD KEY `ja_user_id` (`job_app_user_id`),
  ADD KEY `ja_job_id` (`job_app_job_id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`requirements_id`);

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
  MODIFY `aai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applicant_educationbg`
--
ALTER TABLE `applicant_educationbg`
  MODIFY `aebg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applicant_experience`
--
ALTER TABLE `applicant_experience`
  MODIFY `ae_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `jobs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `job_applicants`
--
ALTER TABLE `job_applicants`
  MODIFY `job_app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `requirements_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `nat` FOREIGN KEY (`jobs_r_education_id`) REFERENCES `education_attainment` (`ea_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_applicants`
--
ALTER TABLE `job_applicants`
  ADD CONSTRAINT `ja_job_id` FOREIGN KEY (`job_app_job_id`) REFERENCES `jobs` (`jobs_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ja_user_id` FOREIGN KEY (`job_app_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `ri` FOREIGN KEY (`user_role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
