-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 12:37 AM
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
(4, '20000', 'Manila', 'ON Site', 54);

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
(4, 54, 'Bachelor of Business Management ', '2016-08-16', 3);

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
(4, 54, 'Social Media Producer | Fauget', 'Manila', 'Manager', '2019-11-16', '2020-06-16');

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
(6, 54, 'Communication, Interpersonal skills, Time management,  Organization'),
(7, 54, 'Problem solving, Design UX, Advertising and branding, Copywriting Layout');

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
  `job_company_logo` varchar(255) DEFAULT NULL,
  `job_company_name` varchar(100) NOT NULL,
  `jobs_name` varchar(100) NOT NULL,
  `jobs_address` varchar(100) NOT NULL,
  `jobs_description` longtext NOT NULL,
  `jobs_r_skills` varchar(100) NOT NULL,
  `jobs_r_education_id` int(11) NOT NULL,
  `jobs_preferred_time` varchar(100) NOT NULL,
  `jobs_r_experience` varchar(100) NOT NULL,
  `jobs_vacancy_count` varchar(100) NOT NULL,
  `job_expected_salary` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `jobs_user_id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobs_id`, `job_company_logo`, `job_company_name`, `jobs_name`, `jobs_address`, `jobs_description`, `jobs_r_skills`, `jobs_r_education_id`, `jobs_preferred_time`, `jobs_r_experience`, `jobs_vacancy_count`, `job_expected_salary`, `created_at`, `jobs_user_id`, `req_id`) VALUES
(60, 'ee4dce1061f3f616224767ad58cb2fc751b8d2dc.jpg', 'ESCA Incorporated', 'CAD Drafter', 'Quezon City', 'Read and interpret Architectural/Structural drawings. Knows how to read mechanical, electrical and plumbing drawings is an advantage.\r\nPrepare and create detailed drawing submittal packages for review.\r\nUpdate or revise new or existing drawings.\r\nDraft/model structural plans and detailed drawings using AutoCAD and Revit Structure.\r\nCan work independently or under the instruction/supervision of the project supervisor/engineer to complete drawings with standard and quality.\r\nCoordinate with other departments to ensure that drawings are properly referenced and coordinated between disciplines.\r\nEnsuring the quality of drawing deliverables.\r\nPlot and issue project drawings and document packages.', 'Knowledge of construction regulations, technical standards and laws\r\nWorking knowledge of constructi', 3, 'Full Time', '2 Years', '5', '20000', '2022-12-16 19:49:59', 52, 0),
(61, 'ee4dce1061f3f616224767ad58cb2fc751b8d2dc.jpg', 'ESCA Incorporated', 'Bridge Design Engineer', 'National Capital Reg', 'The Bridge Design Engineer will design safe bridges, highways structures to facilitate efficient public transportation through the Philippines by providing planning and developing design proposals, create the details, drawings, and schematics for the building of larger structures, such as buildings, bridges, and other public works.', 'Able to produce well-presented and accurate reports\r\nMust have working experience using the followin', 1, 'Full Time', '2 Years', '3', '30000', '2022-12-16 20:09:44', 52, 0),
(62, 'ee4dce1061f3f616224767ad58cb2fc751b8d2dc.jpg', 'ESCA Incorporated', 'Structural Design Engineer', 'ESCA Incorporated', 'Participate in the design of engineering elements in respective discipline, including establishing design basis, development of options and optimization of selected design.\r\nUses knowledge of general application of principles, theories, concepts, and industry practices and standards to perform Structural Engineering Design.\r\nCan independently work on projects or under general supervision of senior engineer/team lead, manager. \r\nCalculate and organizes data for Structural Engineering calculations, drawings and reports\r\nPrepare specifications and/or operating instructions\r\nParticipate in planning, cost development and scheduling for assigned projects\r\nMaintains effective communication with project team members\r\nPerform site inspection to site prior to bidding to ensure that work will be in accordance with the site conditions and specifications of the client\r\nHandle technical Structural Design works and design review', 'Knowledge on U.S. building codes like ACI, ASCE, AISC and IBC. \r\nHas design experience on concrete, ', 4, 'Full Time', '1 Years', '5', '40000', '2022-12-16 22:27:13', 52, 0),
(63, 'ee4dce1061f3f616224767ad58cb2fc751b8d2dc (1).jpg', 'Mandaue Foam Industries, Inc.', 'Wood working supervisor', 'Rizal', 'The Woodworking Production Supervisor is responsible in providing assistance to Woodworking Production Manager and overseeing the production processes and ensuring the final product meets quality standards and customer specifications. The Production Supervisor directs process heads to ensure smooth flow of operation in their assigned area and helps in ensuring production quotas are met and items are delivered on-time.', 'Ensures all finished items are transacted properly with Goods Receipt in SAP\r\nMakes sure that the tr', 1, 'Full Time', '2 Years', '6', '20000', '2022-12-16 22:35:54', 58, 0),
(64, 'ee4dce1061f3f616224767ad58cb2fc751b8d2dc (1).jpg', 'Mandaue Foam Industries, Inc.', 'Social Media Marketing Officer', 'Cebu', '   Coordinates with the managers of showrooms, concessions, wholesale and other departments with regard to their marketing requests, concerns, follow-ups.\r\n\r\n·        Works with the Social Media Manager to ensure the requests are well coordinated\r\n\r\nSocial Media Management\r\n\r\n·        Ensures all deliverables are followed; where posts and captions are filtered.\r\n\r\n·        Makes sure the winners of all giveaways will get their prizes, in coordination with the showrooms\r\n\r\n·        Manage the social media accounts of Mandaue Foam in the following social media platforms: Facebook, Instagram, YouTube, Twitter, LinkedIn, etc.\r\n\r\n·        Create engaging content for all platforms, including blog pieces, articles, social media posts, newsletters, and video scripts.\r\n\r\nMarketing Collaterals\r\n\r\n·        Ensures marketing collaterals are installed in the showrooms such as grey frames, white frames, billboards, wall stickers, wall acrylic, price tags, colored strips, etc., and other additional marketing-related instructions to be implemented in the showrooms.\r\n\r\n·        Coordinates with the Raw Mats department to ensure the inventory of marketing collaterals is enough.', 'Copywriting skills\r\n\r\n·        Organizational skills\r\n\r\n·        Communication skills.\r\n\r\n·        S', 1, 'Full Time', '2 Years', '10', '15000', '2022-12-16 22:39:09', 58, 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_applicants`
--

CREATE TABLE `job_applicants` (
  `job_app_id` int(11) NOT NULL,
  `job_app_job_id` int(11) NOT NULL,
  `job_app_user_id` int(11) NOT NULL,
  `date_apply` timestamp NOT NULL DEFAULT current_timestamp(),
  `job_application_status` int(11) NOT NULL DEFAULT 0,
  `requirements_id_applicant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_applicants`
--

INSERT INTO `job_applicants` (`job_app_id`, `job_app_job_id`, `job_app_user_id`, `date_apply`, `job_application_status`, `requirements_id_applicant`) VALUES
(32, 60, 54, '2022-12-16 21:08:04', 1, NULL),
(33, 60, 54, '2022-12-16 22:00:25', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `requirements_id` int(11) NOT NULL,
  `requirements_filename` varchar(255) NOT NULL,
  `requirements_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`requirements_id`, `requirements_filename`, `requirements_user_id`) VALUES
(13, 'White Modern Digital Marketing Specialist Resume (5).pdf', 54),
(14, 'White Modern Digital Marketing Specialist Resume (5).pdf', 52),
(16, 'dasdasdasd', 31);

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
  `user_profile_img` varchar(255) DEFAULT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_contact` varchar(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `verification_code` varchar(50) DEFAULT NULL,
  `email_verified_at` varchar(100) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_profile_img`, `user_fname`, `user_lname`, `user_contact`, `user_email`, `verification_code`, `email_verified_at`, `address`, `user_password`, `user_role_id`) VALUES
(31, 'th (7).jpg', 'Alfred', 'Simbulan', '09559269054', 'admin@gmail.com', NULL, NULL, 'General Tinio Nueva Ecija ', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(52, 'th (6).jpg', 'John Paul', 'Parchamento', '16516596', 'johnpaulparchamento07@gmail.com', '291608', '22-12-14 08:50:09 CET', 'Nazareth General Tinio Nueva Ecija', '5f4dcc3b5aa765d61d8327deb882cf99', 3),
(54, 'th (5).jpg', 'jomari', 'mallare', '0987654311', 'bbrah646@gmail.com', '131121', '22-12-16 05:44:07 CET', 'Padolina General Tinio Nueva Ecija', '5f4dcc3b5aa765d61d8327deb882cf99', 4),
(56, NULL, 'REY', 'JOHN', '09066075965', 'reyjohnpaul@gmail.com', NULL, NULL, 'Bago General Tinio Nueva Ecija', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(58, 'Snapchat-1584596663.jpg', 'Gymbert', 'Busalpa', '09876543211', 'bgymbert@gmail.com', '340745', '22-12-16 11:32:13 CET', 'Concepion General Tinio Nueva Ecija', '5f4dcc3b5aa765d61d8327deb882cf99', 3);

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
  MODIFY `aai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `applicant_educationbg`
--
ALTER TABLE `applicant_educationbg`
  MODIFY `aebg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `applicant_experience`
--
ALTER TABLE `applicant_experience`
  MODIFY `ae_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `applicant_skills`
--
ALTER TABLE `applicant_skills`
  MODIFY `as_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `education_attainment`
--
ALTER TABLE `education_attainment`
  MODIFY `ea_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `job_applicants`
--
ALTER TABLE `job_applicants`
  MODIFY `job_app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `requirements_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

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
