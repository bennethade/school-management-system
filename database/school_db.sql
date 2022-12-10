-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 07:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_employee_salaries`
--

CREATE TABLE `account_employee_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_employee_salaries`
--

INSERT INTO `account_employee_salaries` (`id`, `employee_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(8, 5, '2022-12', 69000, '2022-12-05 07:25:12', '2022-12-05 07:25:12'),
(9, 6, '2022-12', 78300, '2022-12-05 07:25:12', '2022-12-05 07:25:12'),
(10, 8, '2022-12', 64766.666666667, '2022-12-05 07:25:12', '2022-12-05 07:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `account_other_costs`
--

CREATE TABLE `account_other_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_other_costs`
--

INSERT INTO `account_other_costs` (`id`, `date`, `amount`, `description`, `image`, `created_at`, `updated_at`) VALUES
(11, '2022-12-05', 9800, 'A new Foodstuff for kitchen', '202212051310cashew4.jpg', '2022-12-05 12:10:39', '2022-12-05 12:10:39'),
(12, '2022-12-23', 1400, 'New inserted', '202212051344cashew6.jpg', '2022-12-05 12:19:18', '2022-12-05 12:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `account_student_fees`
--

CREATE TABLE `account_student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_student_fees`
--

INSERT INTO `account_student_fees` (`id`, `year_id`, `class_id`, `student_id`, `fee_category_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 9, 1, '2022-12', 588, '2022-12-03 12:43:52', '2022-12-03 12:43:52'),
(2, 5, 5, 3, 2, '2022-12', 157, '2022-12-03 12:48:04', '2022-12-03 12:48:04'),
(3, 4, 1, 2, 1, '2022-12', 540, '2022-12-03 12:58:40', '2022-12-03 12:58:40'),
(4, 2, 1, 9, 2, '2022-12', 89, '2022-12-05 07:21:29', '2022-12-05 07:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'user_id=student_id',
  `roll` int(11) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`id`, `student_id`, `roll`, `class_id`, `year_id`, `group_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, 4, 1, 1, '2022-09-14 07:47:43', '2022-09-23 05:57:09'),
(2, 3, 1, 5, 5, 2, 3, '2022-09-14 08:32:54', '2022-09-23 05:55:56'),
(3, 9, 3, 1, 2, 1, 1, '2022-12-01 22:46:45', '2022-12-01 22:46:45'),
(4, 10, 4, 1, 2, 1, 1, '2022-12-01 22:51:49', '2022-12-01 22:51:49'),
(5, 11, 5, 1, 2, 2, 1, '2022-12-01 22:52:36', '2022-12-01 22:52:36'),
(6, 12, 6, 1, 5, 3, 1, '2022-12-01 22:53:33', '2022-12-01 22:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `full_mark` double NOT NULL,
  `pass_mark` double NOT NULL,
  `subjective_mark` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `class_id`, `subject_id`, `full_mark`, `pass_mark`, `subjective_mark`, `created_at`, `updated_at`) VALUES
(2, 1, 3, 100, 50, 100, '2022-09-14 07:41:11', '2022-09-14 07:41:11'),
(3, 1, 4, 100, 50, 100, '2022-09-14 07:41:11', '2022-09-14 07:41:11'),
(4, 1, 1, 100, 50, 100, '2022-09-14 07:41:11', '2022-09-14 07:41:11'),
(5, 1, 2, 100, 50, 100, '2022-09-14 07:41:11', '2022-09-14 07:41:11'),
(6, 1, 2, 100, 60, 100, '2022-09-14 07:41:11', '2022-09-14 07:41:11'),
(7, 1, 5, 100, 50, 100, '2022-09-14 07:41:11', '2022-09-14 07:41:11'),
(8, 1, 6, 100, 50, 100, '2022-09-14 07:41:11', '2022-09-14 07:41:11'),
(9, 1, 7, 100, 50, 100, '2022-09-14 07:41:11', '2022-09-14 07:41:11'),
(10, 1, 8, 100, 50, 100, '2022-09-14 07:41:11', '2022-09-14 07:41:11'),
(11, 1, 9, 100, 50, 100, '2022-09-14 07:41:11', '2022-09-14 07:41:11'),
(12, 1, 10, 100, 50, 100, '2022-09-14 07:41:11', '2022-09-14 07:41:11'),
(17, 3, 1, 100, 50, 100, '2022-12-01 22:48:40', '2022-12-01 22:48:40'),
(18, 3, 2, 100, 50, 100, '2022-12-01 22:48:40', '2022-12-01 22:48:40'),
(19, 3, 3, 100, 50, 100, '2022-12-01 22:48:40', '2022-12-01 22:48:40'),
(20, 3, 4, 100, 50, 100, '2022-12-01 22:48:40', '2022-12-01 22:48:40'),
(21, 3, 5, 100, 50, 100, '2022-12-01 22:48:40', '2022-12-01 22:48:40'),
(22, 3, 6, 100, 50, 100, '2022-12-01 22:48:40', '2022-12-01 22:48:40'),
(23, 3, 7, 100, 50, 100, '2022-12-01 22:48:40', '2022-12-01 22:48:40'),
(24, 3, 8, 100, 50, 100, '2022-12-01 22:48:40', '2022-12-01 22:48:40'),
(25, 3, 9, 100, 50, 100, '2022-12-01 22:48:40', '2022-12-01 22:48:40'),
(26, 3, 10, 100, 50, 100, '2022-12-01 22:48:40', '2022-12-01 22:48:40'),
(27, 4, 1, 100, 50, 100, '2022-12-01 22:50:18', '2022-12-01 22:50:18'),
(28, 4, 2, 100, 50, 100, '2022-12-01 22:50:18', '2022-12-01 22:50:18'),
(29, 4, 3, 100, 50, 100, '2022-12-01 22:50:18', '2022-12-01 22:50:18'),
(30, 4, 4, 100, 50, 100, '2022-12-01 22:50:18', '2022-12-01 22:50:18'),
(31, 4, 5, 100, 50, 100, '2022-12-01 22:50:18', '2022-12-01 22:50:18'),
(32, 4, 6, 100, 50, 100, '2022-12-01 22:50:18', '2022-12-01 22:50:18'),
(33, 4, 7, 100, 50, 100, '2022-12-01 22:50:18', '2022-12-01 22:50:18'),
(34, 4, 8, 100, 50, 100, '2022-12-01 22:50:18', '2022-12-01 22:50:18'),
(35, 4, 9, 100, 50, 100, '2022-12-01 22:50:18', '2022-12-01 22:50:18'),
(36, 4, 10, 100, 50, 100, '2022-12-01 22:50:18', '2022-12-01 22:50:18'),
(37, 2, 1, 100, 50, 100, '2022-12-01 23:36:56', '2022-12-01 23:36:56'),
(38, 2, 2, 100, 50, 100, '2022-12-01 23:36:56', '2022-12-01 23:36:56'),
(39, 2, 3, 100, 50, 100, '2022-12-01 23:36:56', '2022-12-01 23:36:56'),
(40, 2, 4, 100, 50, 100, '2022-12-01 23:36:56', '2022-12-01 23:36:56'),
(41, 2, 5, 100, 50, 100, '2022-12-01 23:36:57', '2022-12-01 23:36:57'),
(42, 2, 6, 100, 50, 100, '2022-12-01 23:36:57', '2022-12-01 23:36:57'),
(43, 2, 7, 100, 50, 100, '2022-12-01 23:36:57', '2022-12-01 23:36:57'),
(44, 2, 8, 100, 50, 100, '2022-12-01 23:36:57', '2022-12-01 23:36:57'),
(45, 2, 9, 100, 50, 100, '2022-12-01 23:36:57', '2022-12-01 23:36:57'),
(46, 2, 10, 100, 50, 100, '2022-12-01 23:36:57', '2022-12-01 23:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Principal', '2022-09-14 07:44:06', '2022-09-14 07:44:06'),
(2, 'Accountant', '2022-09-14 07:45:19', '2022-09-14 07:45:19'),
(3, 'Teacher', '2022-09-14 07:45:28', '2022-09-14 07:45:28'),
(4, 'Administrator', '2022-09-14 07:45:58', '2022-09-14 07:45:58'),
(6, 'Class Assistant', '2022-12-05 07:37:12', '2022-12-05 07:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `discount_students`
--

CREATE TABLE `discount_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_student_id` int(11) NOT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_students`
--

INSERT INTO `discount_students` (`id`, `assign_student_id`, `fee_category_id`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10, '2022-09-14 07:47:43', '2022-11-25 21:46:50'),
(2, 2, 1, 13, '2022-09-14 08:32:54', '2022-11-25 21:47:07'),
(3, 3, 1, 2, '2022-12-01 22:46:45', '2022-12-01 22:46:45'),
(4, 4, 1, 3, '2022-12-01 22:51:49', '2022-12-01 22:51:49'),
(5, 5, 1, 2, '2022-12-01 22:52:36', '2022-12-01 22:52:36'),
(6, 6, 1, 5, '2022-12-01 22:53:33', '2022-12-01 22:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `date` date NOT NULL,
  `attend_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`id`, `employee_id`, `date`, `attend_status`, `created_at`, `updated_at`) VALUES
(49, 5, '2022-12-01', 'Present', '2022-11-30 23:10:28', '2022-11-30 23:10:28'),
(50, 6, '2022-12-01', 'Present', '2022-11-30 23:10:29', '2022-11-30 23:10:29'),
(51, 7, '2022-12-01', 'Present', '2022-11-30 23:10:29', '2022-11-30 23:10:29'),
(52, 8, '2022-12-01', 'Present', '2022-11-30 23:10:29', '2022-11-30 23:10:29'),
(53, 5, '2022-12-02', 'Present', '2022-11-30 23:31:33', '2022-11-30 23:31:33'),
(54, 6, '2022-12-02', 'Absent', '2022-11-30 23:31:33', '2022-11-30 23:31:33'),
(55, 7, '2022-12-02', 'Absent', '2022-11-30 23:31:33', '2022-11-30 23:31:33'),
(56, 8, '2022-12-02', 'Present', '2022-11-30 23:31:33', '2022-11-30 23:31:33'),
(57, 5, '2022-11-10', 'Present', '2022-11-30 23:34:05', '2022-11-30 23:34:05'),
(58, 6, '2022-11-10', 'Present', '2022-11-30 23:34:05', '2022-11-30 23:34:05'),
(59, 7, '2022-11-10', 'Present', '2022-11-30 23:34:05', '2022-11-30 23:34:05'),
(60, 8, '2022-11-10', 'Present', '2022-11-30 23:34:05', '2022-11-30 23:34:05'),
(61, 5, '2022-12-03', 'Leave', '2022-12-01 10:35:53', '2022-12-01 10:35:53'),
(62, 6, '2022-12-03', 'Leave', '2022-12-01 10:35:53', '2022-12-01 10:35:53'),
(63, 7, '2022-12-03', 'Absent', '2022-12-01 10:35:53', '2022-12-01 10:35:53'),
(64, 8, '2022-12-03', 'Absent', '2022-12-01 10:35:53', '2022-12-01 10:35:53'),
(65, 5, '2022-12-05', 'Absent', '2022-12-05 07:40:37', '2022-12-05 07:40:37'),
(66, 6, '2022-12-05', 'Present', '2022-12-05 07:40:37', '2022-12-05 07:40:37'),
(67, 7, '2022-12-05', 'Present', '2022-12-05 07:40:37', '2022-12-05 07:40:37'),
(68, 8, '2022-12-05', 'Leave', '2022-12-05 07:40:37', '2022-12-05 07:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `leave_purpose_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_leaves`
--

INSERT INTO `employee_leaves` (`id`, `employee_id`, `leave_purpose_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(2, 7, 2, '2022-12-11', '2022-12-13', '2022-11-29 21:42:09', '2022-11-29 22:11:51'),
(3, 6, 5, '2022-12-03', '2022-12-04', '2022-11-29 21:44:41', '2022-11-29 21:44:41'),
(4, 8, 6, '2022-12-05', '2022-12-14', '2022-12-05 07:46:08', '2022-12-05 07:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_logs`
--

CREATE TABLE `employee_salary_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=User_id',
  `previous_salary` int(11) DEFAULT NULL,
  `present_salary` int(11) DEFAULT NULL,
  `increment_salary` int(11) DEFAULT NULL,
  `effected_salary` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salary_logs`
--

INSERT INTO `employee_salary_logs` (`id`, `employee_id`, `previous_salary`, `present_salary`, `increment_salary`, `effected_salary`, `created_at`, `updated_at`) VALUES
(2, 6, 78000, 78000, 0, '2022-11-28', '2022-11-28 07:04:26', '2022-11-28 07:04:26'),
(3, 5, 64000, 69000, 5000, '2022-11-29', '2022-11-28 22:44:14', '2022-11-28 22:44:14'),
(4, 6, 78000, 81000, 3000, '2022-11-29', '2022-11-28 23:07:21', '2022-11-28 23:07:21'),
(5, 7, 81000, 81000, 0, '2022-11-29', '2022-11-29 21:48:44', '2022-11-29 21:48:44'),
(6, 8, 67000, 67000, 0, '2022-11-30', '2022-11-29 23:19:19', '2022-11-29 23:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'First Term Examination', '2022-09-14 07:34:51', '2022-09-14 07:34:51'),
(2, 'Second Term Examination', '2022-09-14 07:35:02', '2022-09-14 07:35:02'),
(3, 'Third Term Examination', '2022-09-14 07:35:12', '2022-09-14 07:35:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Examination Fee', '2022-09-14 07:28:00', '2022-09-14 07:28:00'),
(2, 'Monthly Fee', '2022-09-14 07:28:16', '2022-11-26 17:53:55'),
(3, 'Registration Fee', '2022-09-14 07:28:48', '2022-09-14 07:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `fee_category_amounts`
--

CREATE TABLE `fee_category_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_category_amounts`
--

INSERT INTO `fee_category_amounts` (`id`, `fee_category_id`, `class_id`, `amount`, `created_at`, `updated_at`) VALUES
(17, 1, 1, 600, '2022-11-25 21:48:20', '2022-11-25 21:48:20'),
(18, 1, 2, 200, '2022-11-25 21:48:20', '2022-11-25 21:48:20'),
(19, 1, 3, 300, '2022-11-25 21:48:20', '2022-11-25 21:48:20'),
(20, 1, 4, 800, '2022-11-25 21:48:20', '2022-11-25 21:48:20'),
(21, 1, 5, 900, '2022-11-25 21:48:20', '2022-11-25 21:48:20'),
(22, 2, 1, 90, '2022-11-25 21:48:52', '2022-11-25 21:48:52'),
(23, 2, 2, 120, '2022-11-25 21:48:52', '2022-11-25 21:48:52'),
(24, 2, 3, 140, '2022-11-25 21:48:52', '2022-11-25 21:48:52'),
(25, 2, 4, 160, '2022-11-25 21:48:52', '2022-11-25 21:48:52'),
(26, 2, 5, 180, '2022-11-25 21:48:52', '2022-11-25 21:48:52'),
(27, 3, 1, 1200, '2022-11-25 21:49:27', '2022-11-25 21:49:27'),
(28, 3, 2, 1300, '2022-11-25 21:49:27', '2022-11-25 21:49:27'),
(29, 3, 3, 1500, '2022-11-25 21:49:27', '2022-11-25 21:49:27'),
(30, 3, 4, 1900, '2022-11-25 21:49:27', '2022-11-25 21:49:27'),
(31, 3, 5, 1950, '2022-11-25 21:49:27', '2022-11-25 21:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `leave_purposes`
--

CREATE TABLE `leave_purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_purposes`
--

INSERT INTO `leave_purposes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Family Problem', NULL, NULL),
(2, 'Personal Problem', NULL, NULL),
(3, 'Friend Problem', '2022-11-29 21:40:44', '2022-11-29 21:40:44'),
(4, 'Health Problem', '2022-11-29 21:42:09', '2022-11-29 21:42:09'),
(5, 'Business Issues', '2022-11-29 21:44:41', '2022-11-29 21:44:41'),
(6, 'Official', '2022-12-05 07:46:08', '2022-12-05 07:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `marks_grades`
--

CREATE TABLE `marks_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_marks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_marks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks_grades`
--

INSERT INTO `marks_grades` (`id`, `grade_name`, `grade_point`, `start_marks`, `end_marks`, `start_point`, `end_point`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'A+', '5', '80', '100', '4', '5.00', 'Excellent', '2022-12-02 22:20:26', '2022-12-06 19:18:16'),
(3, 'A', '4', '70', '79', '4', '4.49', 'Very Good', '2022-12-02 22:37:05', '2022-12-06 19:18:32'),
(4, 'B', '3.00', '60', '69', '3.00', '3.99', 'Good', '2022-12-02 22:39:01', '2022-12-02 22:39:01'),
(5, 'C', '2.5', '50', '59', '2.0', '2.99', 'Credit', '2022-12-02 22:40:22', '2022-12-02 22:40:22'),
(8, 'D', '1.5', '45', '49', '1.00', '1.99', 'Pass', '2022-12-02 22:49:14', '2022-12-02 22:49:14'),
(9, 'F', '0', '00', '44', '00', '0.99', 'Fail', '2022-12-02 22:49:55', '2022-12-06 21:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_07_22_142655_create_sessions_table', 1),
(7, '2022_08_08_075809_create_student_classes_table', 1),
(8, '2022_08_10_085614_create_student_years_table', 1),
(9, '2022_08_13_070249_create_student_groups_table', 1),
(10, '2022_08_14_175206_create_student_shifts_table', 1),
(11, '2022_08_16_231650_create_fee_categories_table', 1),
(12, '2022_08_18_210725_create_fee_category_amounts_table', 1),
(13, '2022_08_23_073830_create_exam_types_table', 1),
(14, '2022_08_23_081439_create_school_subjects_table', 1),
(15, '2022_08_23_211148_create_assign_subjects_table', 1),
(16, '2022_08_27_202041_create_designations_table', 1),
(17, '2022_08_28_120722_create_assign_students_table', 1),
(18, '2022_08_28_121109_create_discount_students_table', 1),
(19, '2022_11_27_220124_create_employee_salary_logs_table', 2),
(20, '2022_11_29_173434_create_leave_purposes_table', 3),
(21, '2022_11_29_173505_create_employee_leaves_table', 3),
(22, '2022_11_29_232202_create_employee_attendances_table', 4),
(23, '2022_12_01_230633_create_student_marks_table', 5),
(24, '2022_12_02_224859_create_marks_grades_table', 6),
(25, '2022_12_02_235659_create_account_student_fees_table', 7),
(26, '2022_12_05_071347_create_account_employee_salaries_table', 8),
(27, '2022_12_05_114527_create_account_other_costs_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_subjects`
--

CREATE TABLE `school_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_subjects`
--

INSERT INTO `school_subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Chemistry', '2022-09-14 07:35:45', '2022-09-14 07:35:45'),
(2, 'Physics', '2022-09-14 07:36:19', '2022-09-14 07:36:19'),
(3, 'English', '2022-09-14 07:36:30', '2022-09-14 07:36:30'),
(4, 'Mathematics', '2022-09-14 07:36:37', '2022-09-14 07:36:37'),
(5, 'Biology', '2022-09-14 07:36:44', '2022-09-14 07:36:44'),
(6, 'Literature', '2022-09-14 07:36:51', '2022-09-14 07:36:51'),
(7, 'Economics', '2022-09-14 07:37:05', '2022-09-14 07:37:05'),
(8, 'Government', '2022-09-14 07:37:14', '2022-09-14 07:37:14'),
(9, 'Computer', '2022-09-14 07:37:26', '2022-09-14 07:37:26'),
(10, 'Geography', '2022-09-14 07:37:34', '2022-09-14 07:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0dPhQVJ55m01fzKC1uVRXdqyMXi1AyIHUOz4gsET', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVzlyWDZvOFFXcTlzdEQwdDFGdGFMMTBwS0IydGZQSXlOWjBUYWtNNCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjE1ODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3JlcG9ydHMvbWFya3NoZWV0L2dlbmVyYXRlL2dldD9fdG9rZW49SDUyQ01VOGdXTDVQQ2V5eG95aGlUWlhZMHZEY3lsa3JwaE9CVzRiZiZjbGFzc19pZD0xJmV4YW1fdHlwZV9pZD0xJmlkX25vPTIwMTklMkYyMDIwMDAxMSZ5ZWFyX2lkPTIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1670437540);

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Year 1', '2022-09-14 07:20:12', '2022-09-14 07:20:12'),
(2, 'Year 2', '2022-09-14 07:20:22', '2022-09-14 07:20:22'),
(3, 'Year 3', '2022-09-14 07:20:38', '2022-09-14 07:20:38'),
(4, 'Year 4', '2022-09-14 07:20:54', '2022-09-14 07:20:54'),
(5, 'Year 5', '2022-09-14 07:21:05', '2022-09-14 07:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `student_groups`
--

CREATE TABLE `student_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_groups`
--

INSERT INTO `student_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Science', '2022-09-14 07:26:32', '2022-09-14 07:26:32'),
(2, 'Art', '2022-09-14 07:26:44', '2022-09-14 07:26:44'),
(3, 'Commercial', '2022-09-14 07:27:00', '2022-09-14 07:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'student_id=user_id',
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `assign_subject_id` int(11) DEFAULT NULL,
  `exam_type_id` int(255) DEFAULT NULL,
  `marks` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `student_id`, `id_no`, `year_id`, `class_id`, `assign_subject_id`, `exam_type_id`, `marks`, `created_at`, `updated_at`) VALUES
(4, 12, '2022/20230012', 5, 1, 2, 1, 90, '2022-12-01 23:34:16', '2022-12-01 23:34:16'),
(5, 9, '2019/20200004', 2, 1, 2, 1, 46, '2022-12-02 00:10:34', '2022-12-02 00:10:34'),
(6, 10, '2019/20200010', 2, 1, 2, 1, 82, '2022-12-02 00:10:34', '2022-12-02 00:10:34'),
(7, 11, '2019/20200011', 2, 1, 2, 1, 73, '2022-12-02 00:10:34', '2022-12-02 00:10:34'),
(9, 2, '2021/20220001', 4, 1, 3, 1, 89, '2022-12-05 07:33:34', '2022-12-05 07:33:34'),
(10, 9, '2019/20200004', 2, 1, 3, 1, 94, '2022-12-06 21:15:28', '2022-12-06 21:15:28'),
(14, 10, '2019/20200010', 2, 1, 3, 1, 87, '2022-12-06 21:18:10', '2022-12-06 21:18:10'),
(18, 11, '2019/20200011', 2, 1, 3, 1, 67, '2022-12-06 21:18:31', '2022-12-06 21:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `student_shifts`
--

CREATE TABLE `student_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_shifts`
--

INSERT INTO `student_shifts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Shift A', '2022-09-14 07:27:17', '2022-09-14 07:27:17'),
(2, 'Shift B', '2022-09-14 07:27:28', '2022-09-14 07:27:28'),
(3, 'Shift C', '2022-09-14 07:27:37', '2022-09-14 07:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `student_years`
--

CREATE TABLE `student_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_years`
--

INSERT INTO `student_years` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, '2019/2020', '2022-09-14 07:24:39', '2022-09-14 07:24:39'),
(3, '2020/2021', '2022-09-14 07:24:51', '2022-09-14 07:24:51'),
(4, '2021/2022', '2022-09-14 07:25:06', '2022-09-14 07:25:06'),
(5, '2022/2023', '2022-09-14 07:25:23', '2022-09-14 07:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Student, Employee, Admin',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'admin=head of software, operator=computer operator,user=employee',
  `join_date` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `mobile`, `address`, `gender`, `image`, `fname`, `mname`, `religion`, `id_no`, `dob`, `code`, `role`, `join_date`, `designation_id`, `salary`, `status`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'Admin', 'admin1@gmail.com', NULL, '$2y$10$gVrno/zp9eT0EsMljlBLKOfdTvnQwrgV3D8izY0wbIsguw0ciwJ0K', NULL, NULL, NULL, NULL, NULL, NULL, '202207311314user.png', NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(2, 'Student', 'Diala Gideon', NULL, NULL, '$2y$10$poFQHAQ8ts1xGG1Q0YzH1.JwDr9Gdbz2a.v7Z6SL8XN0T4jLFp9zm', NULL, NULL, NULL, '5678902', 'hdlbc76', 'Male', '202209140847file.png', 'Diala Tony', 'Mrs Tony', 'Christian', '2021/20220001', '2022-12-31', '5170', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-09-14 07:47:43', '2022-09-14 07:47:43'),
(3, 'Student', 'Abigail Alexandra', NULL, NULL, '$2y$10$pBWWO./mwmEQA3tHLYB03.GmxKCOajixyO9h5aLBxS7qqPrxGd9Wi', NULL, NULL, NULL, '3456789', 'Galadimawa', 'Female', '202209140932lady.jpg', 'Alexandra Alison', 'Alexandra Amanda', 'Christian', '2022/20230003', '2022-12-31', '4138', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-09-14 08:32:54', '2022-09-14 08:32:54'),
(5, 'employee', 'Bryanna', NULL, NULL, '$2y$10$gKzeQkmJwK.Bct2YAej.MO2jl0..SANG4I72ZiST6.1vKrx.amZmC', NULL, NULL, NULL, '00940297808', 'Nigeriaa', 'Female', '202211281253pretty.jpg', 'Davida', 'Maryan', 'Christian', '2022110001', '2022-12-29', '6440', NULL, '2022-11-28', 3, 69000, 1, NULL, NULL, NULL, '2022-11-28 07:01:18', '2022-11-28 22:44:14'),
(6, 'employee', 'Princess', NULL, NULL, '$2y$10$jGSlvJQDOd0uFvoJzlNpGOOjyX9RoQqi3L771bW71kGE21LaPcjD6', NULL, NULL, NULL, '8928987', 'Nigeria', 'Female', '202211280804lady.jpg', 'Emmanuel', 'Cinthia', 'Christian', '2022110006', '2022-12-31', '6830', NULL, '2022-11-28', 3, 81000, 1, NULL, NULL, NULL, '2022-11-28 07:04:26', '2022-11-28 23:07:21'),
(7, 'employee', 'Emmanuel Ikibia', NULL, NULL, '$2y$10$G/6i4.m4n1uOq9MfniEFau.p8UwUQH12jejjBBXAeu0vg4l.Vb1L6', NULL, NULL, NULL, '988887', 'hashi', 'Male', '202211292248photo.jfif', 'Elton', 'Vivian', 'Christian', '2022110007', '2022-12-31', '8497', NULL, '2022-11-29', 3, 81000, 1, NULL, NULL, NULL, '2022-11-29 21:48:44', '2022-11-29 21:48:44'),
(8, 'employee', 'Benard Emmanuel', NULL, NULL, '$2y$10$RLd9dxlR0g80VGU7.TP3Cu9kCATBW1gXaObTR5nusl5E..f.gEa/G', NULL, NULL, NULL, '87087', 'jhlu8uh', 'Male', '202211300019foto.jpg', 'Emmanuel', 'Sarah', 'Christian', '2022110008', '2022-12-31', '4664', NULL, '2022-11-30', 1, 67000, 1, NULL, NULL, NULL, '2022-11-29 23:19:19', '2022-11-29 23:19:19'),
(9, 'Student', 'David Pearl', NULL, NULL, '$2y$10$5PQ.ljzTLKVszd9d.2KQ/u/SSvyKWmcOU9qpst2Q6kKBk.dhLSnb2', NULL, NULL, NULL, '997097', 'huhb87b7y', 'Male', '2022120123467837_Profile-2.rev.1572210489.jpg', 'Daniel', 'Mercy', 'Christian', '2019/20200004', '2022-12-31', '1607', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-12-01 22:46:45', '2022-12-01 22:46:45'),
(10, 'Student', 'Dorathy Bonat', NULL, NULL, '$2y$10$Ox8l5BKx4qhucL.gEcbSPerVuBEklvwe40uoqSlR/qZUy6Z/BOWWu', NULL, NULL, NULL, '7976', 'jnblu u', 'Female', '202212012351juliana-schneider.jpg', 'Bonat', 'miryam', 'Christian', '2019/20200010', '2022-12-31', '8951', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-12-01 22:51:49', '2022-12-01 22:51:49'),
(11, 'Student', 'Tina Daniel', NULL, NULL, '$2y$10$yOzyvRi9S6E4ewj5jhBUAescpHbg/N06wgDZZwSW7DzIV9UbKdd.2', NULL, NULL, NULL, '8798', 'hbuho8', 'Female', '202212012352IMG_9991-1200x800.jpg', 'Daniel', 'Lucy', 'Christian', '2019/20200011', '2022-12-31', '7185', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-12-01 22:52:36', '2022-12-01 22:52:36'),
(12, 'Student', 'Bryan Wane', NULL, NULL, '$2y$10$FZAgxdhF6A.Ektw1XYGtf.E/Hp9IqhlN2IrkjYAUzbsmXwCIFIpSu', NULL, NULL, NULL, '89878', 'jluihbul', 'Male', '202212012353aamir-khalique.jpg', 'Wane', 'Ninna', 'Christian', '2022/20230012', '2022-12-31', '4096', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-12-01 22:53:33', '2022-12-01 22:53:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_other_costs`
--
ALTER TABLE `account_other_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_name_unique` (`name`);

--
-- Indexes for table `discount_students`
--
ALTER TABLE `discount_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_types_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fee_categories_name_unique` (`name`);

--
-- Indexes for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leave_purposes_name_unique` (`name`);

--
-- Indexes for table `marks_grades`
--
ALTER TABLE `marks_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `school_subjects`
--
ALTER TABLE `school_subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_subjects_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_classes_name_unique` (`name`);

--
-- Indexes for table `student_groups`
--
ALTER TABLE `student_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_groups_name_unique` (`name`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_shifts`
--
ALTER TABLE `student_shifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_shifts_name_unique` (`name`);

--
-- Indexes for table `student_years`
--
ALTER TABLE `student_years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_years_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `account_other_costs`
--
ALTER TABLE `account_other_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `discount_students`
--
ALTER TABLE `discount_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `marks_grades`
--
ALTER TABLE `marks_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_subjects`
--
ALTER TABLE `school_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_groups`
--
ALTER TABLE `student_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student_shifts`
--
ALTER TABLE `student_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_years`
--
ALTER TABLE `student_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
