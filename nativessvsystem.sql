-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 07:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nativessvsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `incident_reports`
--

CREATE TABLE `incident_reports` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `reported_by` varchar(255) NOT NULL,
  `report_date` date NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` date NOT NULL,
  `details` text NOT NULL,
  `level_of_violation` varchar(255) NOT NULL,
  `intervention_program` varchar(255) NOT NULL,
  `violation_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incident_reports`
--

INSERT INTO `incident_reports` (`id`, `student_id`, `reported_by`, `report_date`, `description`, `created_at`, `updated_at`, `date`, `details`, `level_of_violation`, `intervention_program`, `violation_type_id`) VALUES
(1, 1, '', '0000-00-00', NULL, '2024-05-13 16:02:31', '2024-05-13 16:02:31', '2024-05-13', 'vandalism', 'Warnings', 'Counseling Sessions', 12),
(2, 1, '', '0000-00-00', NULL, '2024-05-13 16:12:46', '2024-05-13 16:12:46', '2024-05-15', 'sinipa yung prof', 'Suspensions', 'Anger Management Training', 2);

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','student') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'diomer', 'diomer@gmail.com', 'studentpassword', 'student'),
(2, 'admin', 'admin@gmail.com', 'adminpassword', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `violation_types`
--

CREATE TABLE `violation_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `violation_types`
--

INSERT INTO `violation_types` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Academic Dishonesty', 'Any form of cheating or plagiarism in academic work.', '2024-05-13 15:30:44', '2024-05-13 15:30:44'),
(2, 'Bullying', 'Repeated aggressive behavior intended to hurt, intimidate, or dominate others.', '2024-05-13 15:30:44', '2024-05-13 15:30:44'),
(3, 'Disruptive behavior', 'Actions that interrupt or disturb the normal functioning of a school environment.', '2024-05-13 15:30:44', '2024-05-13 15:30:44'),
(4, 'Dress code violations', 'Failure to comply with the school\'s dress code policy.', '2024-05-13 15:30:44', '2024-05-13 15:30:44'),
(5, 'Drug and alcohol violations', 'Possession, use, or distribution of drugs or alcohol on school premises.', '2024-05-13 15:30:44', '2024-05-13 15:30:44'),
(6, 'Brawl', 'A physical fight involving multiple individuals.', '2024-05-13 15:30:44', '2024-05-13 15:30:44'),
(7, 'Harassment', 'Persistent behavior that is unwelcome and causes fear, distress, or harm.', '2024-05-13 15:30:44', '2024-05-13 15:30:44'),
(8, 'Property Damage', 'Intentional or negligent damage to school property or the property of others.', '2024-05-13 15:30:44', '2024-05-13 15:30:44'),
(9, 'Skipping Classes', 'Failure to attend scheduled classes without permission.', '2024-05-13 15:30:44', '2024-05-13 15:30:44'),
(10, 'Theft', 'Stealing or unauthorized taking of property.', '2024-05-13 15:30:44', '2024-05-13 15:30:44'),
(11, 'Threats', 'Expressions of intent to cause harm, fear, or intimidation.', '2024-05-13 15:30:44', '2024-05-13 15:30:44'),
(12, 'Vandalism', 'Deliberate destruction or defacement of property.', '2024-05-13 15:30:44', '2024-05-13 15:30:44'),
(13, 'Weapon possession', 'Possession of weapons, including firearms, knives, or other dangerous objects.', '2024-05-13 15:30:44', '2024-05-13 15:30:44'),
(14, 'Truancy', 'Absence from school without a valid reason or permission.', '2024-05-13 15:30:44', '2024-05-13 15:30:44'),
(15, 'Hazing', 'Rituals or activities involving harassment, abuse, or humiliation as a way of initiating new members into a group or organization.', '2024-05-13 15:30:44', '2024-05-13 15:30:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `incident_reports`
--
ALTER TABLE `incident_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `violation_types`
--
ALTER TABLE `violation_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `incident_reports`
--
ALTER TABLE `incident_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `violation_types`
--
ALTER TABLE `violation_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `incident_reports`
--
ALTER TABLE `incident_reports`
  ADD CONSTRAINT `incident_reports_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
