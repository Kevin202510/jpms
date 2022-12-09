-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2022 at 07:20 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant_additional_info`
--

INSERT INTO `applicant_additional_info` (`aai_id`, `aai_expected_salary`, `aai_location`, `aai_wfh_os`, `aai_user_id`) VALUES
(1, '100', 'general tinio', 'online', 38);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant_educationbg`
--

INSERT INTO `applicant_educationbg` (`aebg_id`, `aebg_user_id`, `aebg_school_name`, `aebg_year_graduate`, `aebg_education_attainment_id`) VALUES
(1, 38, 'Nueva Ecija University of Science and Technology', '2022-12-13', 3);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant_experience`
--

INSERT INTO `applicant_experience` (`ae_id`, `ae_user_id`, `ae_companyname`, `ae_companyaddress`, `ae_position`, `ae_from`, `ae_to`) VALUES
(1, 29, 'asdasdasd', 'asdasda', 'sdasdas', '2022-12-03', '2022-12-03'),
(2, 38, 'Comapany Name', 'Comapany Address', 'Position', '2022-12-02', '2022-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_skills`
--

CREATE TABLE `applicant_skills` (
  `as_id` int(11) NOT NULL,
  `as_user_id` int(11) NOT NULL,
  `as_skillname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant_skills`
--

INSERT INTO `applicant_skills` (`as_id`, `as_user_id`, `as_skillname`) VALUES
(1, 38, 'web developer');

-- --------------------------------------------------------

--
-- Table structure for table `education_attainment`
--

CREATE TABLE `education_attainment` (
  `ea_id` int(11) NOT NULL,
  `ea_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `job_company_logo` varchar(255) DEFAULT NULL,
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `jobs_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobs_id`, `job_company_logo`, `job_company_name`, `jobs_name`, `jobs_address`, `jobs_description`, `jobs_r_skills`, `jobs_r_education_id`, `jobs_preferred_time`, `jobs_r_experience`, `jobs_vacancy_count`, `job_expected_salary`, `created_at`, `jobs_user_id`) VALUES
(31, 'Kevin F. Caluag.jpg', 'Comapany Name', 'Position', 'manila', 'Description', 'Skills', 5, 'Part Time', 'Experience', '9', '8', '2022-12-04 10:27:03', 30),
(33, 'qrcode_mushroommonitoringsystemv2-production.up.railway.app (2).png', 'Name', 'Web Dev', 'general tinio nueva ecija', 'fhsfsgfhjgfshsgfhjgsdhjfsfg', 'sjfhsdfdsgfhsgfhsjgfshjfgsjhfg', 3, 'Part Time', 'sfdfhsghfjsgdfhsgfhsjgfshgfsjhgfskgshfgsdhjfgdshgfshgf', '2', '455', '2022-12-04 10:27:03', 30),
(35, '313788361_2497306877076540_1469489385254321468_n.jpg', 'asdasd', 'asdasd', 'asdasd', 'asdasdas', '1', 1, 'Part Time', 'asdasdas', '2', '2', '2022-12-04 10:27:17', 30),
(36, NULL, 'asdasd', 'asdasd', 'asdasd', 'asdasdas', '1', 1, 'Full Time', 'asdasdas', '2', '2', '2022-12-04 10:28:11', 30),
(37, NULL, 'sdfsdf', 'sdfsd', 'dsfsd', 'sdfsd', '1', 1, 'sfsdf', 'sfsd', '2', '2', '2022-12-05 05:08:14', 30),
(38, NULL, 'SAS', 'sadas', 'asdas', 'asdas', '1', 3, 'Full Time', 'asda', '1', '1', '2022-12-05 05:09:58', 30),
(39, NULL, 'vcbvn', 'vbnvb', 'vnvb', 'vbnvb', '1', 0, 'vbnvb', 'vbn', '8', '8', '2022-12-05 05:14:09', 30),
(40, NULL, 'dfgdf', 'dfgd', 'dfgd', 'dfgd', 'dfgdf', 1, 'Full Time', 'fdgd', '6', '6', '2022-12-05 05:17:45', 30);

-- --------------------------------------------------------

--
-- Table structure for table `job_applicants`
--

CREATE TABLE `job_applicants` (
  `job_app_id` int(11) NOT NULL,
  `job_app_job_id` int(11) NOT NULL,
  `job_app_user_id` int(11) NOT NULL,
  `date_apply` timestamp NOT NULL DEFAULT current_timestamp(),
  `requirements_id_applicant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_applicants`
--

INSERT INTO `job_applicants` (`job_app_id`, `job_app_job_id`, `job_app_user_id`, `date_apply`, `requirements_id_applicant`) VALUES
(4, 31, 38, '2022-12-09 16:54:50', 1),
(5, 36, 30, '2022-12-09 17:04:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `requirements_id` int(11) NOT NULL,
  `requirements_filename` varchar(255) NOT NULL,
  `requirements_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`requirements_id`, `requirements_filename`, `requirements_user_id`) VALUES
(1, 'Doc1.pdf', 38);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `display_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `user_profile_img` varchar(255) DEFAULT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_contact` varchar(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_profile_img`, `user_fname`, `user_lname`, `user_contact`, `user_email`, `address`, `user_password`, `user_role_id`) VALUES
(29, NULL, 'kevin', 'felix', '90809890', 'kfc202510@gmail.com', 'bago general tinio ne', '5f4dcc3b5aa765d61d8327deb882cf99', 4),
(30, NULL, 'asdasd', 'asdasdasda', '3424234', 'employer@gmail.com', 'wewerwe', '5f4dcc3b5aa765d61d8327deb882cf99', 3),
(31, NULL, 'admin', 'admin', '0987622132', 'admin@gmail.com', 'adsadasd', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(32, NULL, 'employee', 'lname', '0987654321', 'employee@gmail.com', 'address', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(37, NULL, 'sfd', 'sdfs', '0987654321', 'adsd', 'sada', 'd8578edf8458ce06fbc5bb76a58c5ca4', 4),
(38, 'qrcode_mushroommonitoringsystemv2-production.up.railway.app (2).png', 'REY', 'JOHN', '098765431', 'reyjohnpaul@gmail.com', 'asdsadasd', '5f4dcc3b5aa765d61d8327deb882cf99', 4);

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
-- Indexes for table `job_applicants`
--
ALTER TABLE `job_applicants`
  ADD PRIMARY KEY (`job_app_id`),
  ADD KEY `ja_user_id` (`job_app_user_id`),
  ADD KEY `ja_job_id` (`job_app_job_id`),
  ADD KEY `ja_req_id` (`requirements_id_applicant`);

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
  MODIFY `aai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applicant_educationbg`
--
ALTER TABLE `applicant_educationbg`
  MODIFY `aebg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applicant_experience`
--
ALTER TABLE `applicant_experience`
  MODIFY `ae_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applicant_skills`
--
ALTER TABLE `applicant_skills`
  MODIFY `as_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education_attainment`
--
ALTER TABLE `education_attainment`
  MODIFY `ea_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `job_applicants`
--
ALTER TABLE `job_applicants`
  MODIFY `job_app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `requirements_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
-- Constraints for table `job_applicants`
--
ALTER TABLE `job_applicants`
  ADD CONSTRAINT `ja_job_id` FOREIGN KEY (`job_app_job_id`) REFERENCES `jobs` (`jobs_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ja_req_id` FOREIGN KEY (`requirements_id_applicant`) REFERENCES `requirements` (`requirements_id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
