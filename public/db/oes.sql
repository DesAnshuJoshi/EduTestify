-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 07:27 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oes`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `questions_id` int(11) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `is_correct` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `questions_id`, `answer`, `is_correct`, `created_at`, `updated_at`) VALUES
(9, 3, 'London', 0, '2023-10-02 06:36:07', '2023-10-25 07:12:19'),
(10, 3, 'Berlin', 0, '2023-10-02 06:36:07', '2023-10-25 07:12:20'),
(11, 3, 'Paris', 1, '2023-10-02 06:36:07', '2023-10-25 07:12:20'),
(12, 3, 'Madrid', 0, '2023-10-02 06:36:07', '2023-10-25 07:12:20'),
(13, 4, 'Oxygen', 1, '2023-10-02 06:36:43', '2023-10-02 06:36:43'),
(14, 4, 'Carbon dioxide', 0, '2023-10-02 06:36:43', '2023-10-02 06:36:43'),
(15, 4, 'Nitrogen', 0, '2023-10-02 06:36:43', '2023-10-02 06:36:43'),
(16, 4, 'Hydrogen', 0, '2023-10-02 06:36:43', '2023-10-02 06:36:43'),
(17, 5, 'George Orwell', 0, '2023-10-02 06:37:17', '2023-10-02 06:37:17'),
(18, 5, 'Harper Lee', 1, '2023-10-02 06:37:17', '2023-10-02 06:37:17'),
(19, 5, 'J.K. Rowling', 0, '2023-10-02 06:37:17', '2023-10-02 06:37:17'),
(20, 5, 'Charles Dickens', 0, '2023-10-02 06:37:17', '2023-10-02 06:37:17'),
(21, 6, 'Go', 0, '2023-10-02 06:37:54', '2023-10-02 10:16:32'),
(22, 6, 'Au', 0, '2023-10-02 06:37:54', '2023-10-02 10:16:32'),
(23, 6, 'Ag', 0, '2023-10-02 06:37:54', '2023-10-02 10:16:32'),
(24, 6, 'Ge', 0, '2023-10-02 06:37:54', '2023-10-02 10:16:32'),
(25, 7, 'Venus', 0, '2023-10-02 06:38:24', '2023-10-02 06:38:24'),
(26, 7, 'Earth', 0, '2023-10-02 06:38:24', '2023-10-02 06:38:24'),
(27, 7, 'Mars', 1, '2023-10-02 06:38:24', '2023-10-02 06:38:24'),
(28, 7, 'Jupiter', 0, '2023-10-02 06:38:24', '2023-10-02 06:38:24'),
(29, 8, 'Elephant', 0, '2023-10-02 06:38:59', '2023-10-02 06:38:59'),
(30, 8, 'Giraffe', 0, '2023-10-02 06:38:59', '2023-10-02 06:38:59'),
(31, 8, 'Blue Whale', 1, '2023-10-02 06:38:59', '2023-10-02 06:38:59'),
(32, 8, 'Polar Bear', 0, '2023-10-02 06:38:59', '2023-10-02 06:38:59'),
(33, 9, 'Vincent van Gogh', 0, '2023-10-02 06:39:28', '2023-10-02 06:39:28'),
(34, 9, 'Leonardo da Vinci', 1, '2023-10-02 06:39:28', '2023-10-02 06:39:28'),
(35, 9, 'Pablo Picasso', 0, '2023-10-02 06:39:28', '2023-10-02 06:39:28'),
(36, 9, 'Michelangelo', 0, '2023-10-02 06:39:28', '2023-10-02 06:39:28'),
(37, 10, 'Red', 0, '2023-10-02 06:39:57', '2023-10-02 06:39:57'),
(38, 10, 'Green', 0, '2023-10-02 06:39:57', '2023-10-02 06:39:57'),
(39, 10, 'Blue', 1, '2023-10-02 06:39:57', '2023-10-02 06:39:57'),
(40, 10, 'Yellow', 0, '2023-10-02 06:39:57', '2023-10-02 06:39:57'),
(41, 11, '0', 0, '2023-10-02 06:40:16', '2023-10-02 06:40:16'),
(42, 11, '1', 1, '2023-10-02 06:40:16', '2023-10-02 06:40:16'),
(43, 11, '2', 0, '2023-10-02 06:40:16', '2023-10-02 06:40:16'),
(44, 11, '3', 0, '2023-10-02 06:40:16', '2023-10-02 06:40:16'),
(45, 12, 'Oxygen', 0, '2023-10-02 06:40:46', '2023-10-02 06:40:46'),
(46, 12, 'Carbon dioxide', 0, '2023-10-02 06:40:46', '2023-10-02 06:40:46'),
(47, 12, 'Chlorofluorocarbons', 1, '2023-10-02 06:40:46', '2023-10-02 06:40:46'),
(48, 12, 'Nitrogen', 0, '2023-10-02 06:40:46', '2023-10-02 06:40:46'),
(49, 13, 'Mitochondria', 1, '2023-10-02 06:41:14', '2023-10-13 07:10:40'),
(50, 13, 'Nucleus', 0, '2023-10-02 06:41:14', '2023-10-13 07:10:40'),
(51, 13, 'Endoplasmic reticulum', 0, '2023-10-02 06:41:14', '2023-10-13 07:10:40'),
(52, 13, 'Golgi apparatus', 0, '2023-10-02 06:41:14', '2023-10-13 07:10:41'),
(53, 14, 'Isaac Newton', 1, '2023-10-02 06:42:02', '2023-10-02 06:42:02'),
(54, 14, 'Galileo Galilei', 0, '2023-10-02 06:42:02', '2023-10-02 06:42:02'),
(55, 14, 'Albert Einstein', 0, '2023-10-02 06:42:02', '2023-10-02 06:42:02'),
(71, 16, 'Object Relational Mapping', 1, '2023-10-03 10:40:12', '2023-10-03 10:40:12'),
(72, 16, 'Open Remote Mapping', 0, '2023-10-03 10:40:12', '2023-10-03 10:40:12'),
(73, 16, 'Online Reputation Management', 0, '2023-10-03 10:40:12', '2023-10-03 10:40:12'),
(74, 16, 'Operational Risk Management', 0, '2023-10-03 10:40:12', '2023-10-03 10:40:12'),
(75, 17, 'if', 0, '2023-10-03 18:02:40', '2023-10-03 12:34:11'),
(76, 17, 'if…else', 0, '2023-10-03 18:02:40', '2023-10-03 12:34:11'),
(77, 17, 'if…elif…else', 1, '2023-10-03 18:02:40', '2023-10-03 12:34:11'),
(78, 17, 'all of these', 0, '2023-10-03 18:02:40', '2023-10-03 12:34:11'),
(79, 17, 'both a & b', 0, '2023-10-03 18:02:40', '2023-10-03 12:34:11'),
(80, 17, 'none of above', 0, '2023-10-03 18:02:40', '2023-10-03 12:34:11'),
(81, 18, 'SRC', 1, '2023-10-03 18:02:40', '2023-10-08 06:29:00'),
(82, 18, 'FRAME', 0, '2023-10-03 18:02:40', '2023-10-08 06:29:00'),
(83, 18, 'HEIGHT', 0, '2023-10-03 18:02:40', '2023-10-08 06:29:00'),
(84, 18, 'BORDER', 0, '2023-10-03 18:02:40', '2023-10-08 06:29:00'),
(85, 19, 'Chat', 0, '2023-10-03 18:02:40', '2023-10-03 18:02:40'),
(86, 19, 'Google Drive', 1, '2023-10-03 18:02:40', '2023-10-03 18:02:40'),
(87, 19, 'E-Mail', 0, '2023-10-03 18:02:40', '2023-10-03 18:02:40'),
(88, 19, 'VoIP', 0, '2023-10-03 18:02:40', '2023-10-03 18:02:40'),
(93, 15, 'option 1', 0, '2023-10-25 11:46:01', '2023-10-25 11:46:01'),
(94, 15, 'option 2', 1, '2023-10-25 11:46:02', '2023-10-25 11:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `attempt` int(11) NOT NULL DEFAULT 0,
  `marks` float NOT NULL DEFAULT 0,
  `pass_marks` float NOT NULL DEFAULT 0,
  `enterance_id` varchar(255) NOT NULL,
  `plan` int(11) NOT NULL DEFAULT 0 COMMENT '0=>Free;1=>Paid',
  `prices` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`prices`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `exam_name`, `subject_id`, `date`, `time`, `attempt`, `marks`, `pass_marks`, `enterance_id`, `plan`, `prices`, `created_at`, `updated_at`) VALUES
(27, 'Dummy Exam 2', 5, '2023-10-17', '01:00', 1, 0, 0, 'exid6527ef7a2ce43', 0, NULL, '2023-10-12 13:07:06', '2023-10-12 13:07:06'),
(28, 'Dummy Exam 3', 7, '2023-10-24', '01:00', 1, 0, 0, 'exid6527efa6259a5', 0, NULL, '2023-10-12 13:07:50', '2023-10-12 13:07:50'),
(30, 'Dummy Exam 5', 9, '2023-10-21', '20:40', 1, 0, 0, 'exid6527f0055ae76', 0, NULL, '2023-10-12 13:09:25', '2023-10-12 13:09:25'),
(31, 'Dummy Exam 6', 11, '2023-10-29', '03:40', 1, 25, 25, 'exid6527f020d59b4', 0, NULL, '2023-10-12 13:09:52', '2023-10-26 01:51:21'),
(32, 'Dummy Exam 7', 11, '2023-10-25', '02:59', 1, 0, 0, 'exid6527f044932ab', 1, '{\"INR\":\"200\",\"USD\":\"3\"}', '2023-10-12 13:10:28', '2023-10-24 00:43:12'),
(33, 'Dummy Exam 8', 13, '2023-10-30', '04:00', 1, 0, 0, 'exid6527f061d741a', 1, '{\"INR\":\"500\",\"USD\":\"9\"}', '2023-10-12 13:10:57', '2023-10-23 10:45:33'),
(34, 'Demo Exam 2', 19, '2023-10-29', '01:00', 2, 5, 12, 'exid65242a4e9abdb', 0, NULL, '2023-10-09 16:29:02', '2023-10-26 07:13:28'),
(36, 'Demo Free Exam', 19, '2023-10-23', '11:00', 1, 15, 15, 'exid652d4ad343469', 0, NULL, '2023-10-16 14:38:11', '2023-10-26 07:13:51'),
(37, 'Demo Paid Exams', 19, '2023-11-01', '01:00', 2, 20, 20, 'exid652d4b3e9801d', 1, '{\"INR\":\"5000\",\"USD\":\"60\"}', '2023-10-16 14:39:58', '2023-11-01 06:51:49'),
(38, 'Demo Exam Paid 2', 19, '2023-10-30', '06:00', 1, 0, 0, '', 0, NULL, '2023-10-16 16:09:12', '2023-10-16 11:02:31'),
(39, 'Demo Exam Free 2', 19, '2023-10-30', '18:00', 1, 0, 0, 'exid652d60c63cf6d', 1, '{\"INR\":\"1000\",\"USD\":\"20\"}', '2023-10-16 16:11:50', '2023-10-24 01:43:57'),
(40, 'Demo Paid Package', 19, '2023-10-31', '20:00', 1, 0, 0, 'exid652fcf539799e', 0, NULL, '2023-10-18 12:28:03', '2023-10-18 12:28:03'),
(42, 'DB Connectivity in React', 21, '2023-10-30', '01:00', 3, 0, 0, 'exid653e96e52c9d9', 0, NULL, '2023-10-29 17:31:17', '2023-10-29 17:31:17'),
(43, 'Form Validation', 21, '2023-11-03', '01:45', 2, 0, 0, 'exid65449e25ae4ec', 0, NULL, '2023-11-03 07:15:49', '2023-11-03 07:15:49');

-- --------------------------------------------------------

--
-- Table structure for table `exams_answers`
--

CREATE TABLE `exams_answers` (
  `id` int(11) NOT NULL,
  `attempt_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams_answers`
--

INSERT INTO `exams_answers` (`id`, `attempt_id`, `question_id`, `answer_id`, `created_at`, `updated_at`) VALUES
(34, 19, 14, 54, '2023-10-29 12:25:06', '2023-10-29 12:25:06'),
(35, 19, 9, 34, '2023-10-29 12:25:06', '2023-10-29 12:25:06'),
(36, 19, 8, 31, '2023-10-29 12:25:06', '2023-10-29 12:25:06'),
(37, 19, 13, 49, '2023-10-29 12:25:06', '2023-10-29 12:25:06'),
(38, 19, 7, 27, '2023-10-29 12:25:06', '2023-10-29 12:25:06'),
(39, 20, 7, 27, '2023-10-29 12:25:40', '2023-10-29 12:25:40'),
(40, 20, 9, 34, '2023-10-29 12:25:40', '2023-10-29 12:25:40'),
(41, 20, 14, 53, '2023-10-29 12:25:40', '2023-10-29 12:25:40'),
(42, 20, 8, 31, '2023-10-29 12:25:40', '2023-10-29 12:25:40'),
(43, 20, 13, 49, '2023-10-29 12:25:40', '2023-10-29 12:25:40'),
(44, 21, 4, 13, '2023-10-29 12:26:01', '2023-10-29 12:26:01'),
(45, 21, 3, 11, '2023-10-29 12:26:01', '2023-10-29 12:26:01'),
(46, 22, 3, 11, '2023-10-29 12:31:03', '2023-10-29 12:31:03'),
(47, 22, 4, 15, '2023-10-29 12:31:03', '2023-10-29 12:31:03'),
(48, 23, 13, 52, '2023-10-29 12:31:22', '2023-10-29 12:31:22'),
(49, 23, 14, 54, '2023-10-29 12:31:22', '2023-10-29 12:31:22'),
(50, 23, 9, 34, '2023-10-29 12:31:22', '2023-10-29 12:31:22'),
(51, 23, 8, 31, '2023-10-29 12:31:22', '2023-10-29 12:31:22'),
(52, 23, 7, 27, '2023-10-29 12:31:22', '2023-10-29 12:31:22'),
(53, 24, 7, 27, '2023-10-29 12:31:39', '2023-10-29 12:31:39'),
(54, 24, 8, 31, '2023-10-29 12:31:39', '2023-10-29 12:31:39'),
(55, 24, 14, 53, '2023-10-29 12:31:39', '2023-10-29 12:31:39'),
(56, 24, 9, 33, '2023-10-29 12:31:40', '2023-10-29 12:31:40'),
(57, 24, 13, 49, '2023-10-29 12:31:40', '2023-10-29 12:31:40'),
(58, 25, 4, 16, '2023-10-29 15:57:25', '2023-10-29 15:57:25'),
(59, 25, 3, 11, '2023-10-29 15:57:25', '2023-10-29 15:57:25'),
(60, 26, 14, 54, '2023-10-29 15:57:48', '2023-10-29 15:57:48'),
(61, 26, 8, 32, '2023-10-29 15:57:48', '2023-10-29 15:57:48'),
(62, 26, 9, 35, '2023-10-29 15:57:48', '2023-10-29 15:57:48'),
(63, 26, 7, 27, '2023-10-29 15:57:48', '2023-10-29 15:57:48'),
(64, 26, 13, 49, '2023-10-29 15:57:48', '2023-10-29 15:57:48'),
(65, 27, 9, 34, '2023-10-29 15:58:09', '2023-10-29 15:58:09'),
(66, 27, 7, 27, '2023-10-29 15:58:10', '2023-10-29 15:58:10'),
(67, 27, 14, 53, '2023-10-29 15:58:10', '2023-10-29 15:58:10'),
(68, 27, 8, 30, '2023-10-29 15:58:10', '2023-10-29 15:58:10'),
(69, 27, 13, 52, '2023-10-29 15:58:10', '2023-10-29 15:58:10'),
(70, 28, 4, 14, '2023-11-01 12:24:46', '2023-11-01 12:24:46'),
(71, 28, 6, 22, '2023-11-01 12:24:46', '2023-11-01 12:24:46'),
(72, 28, 3, 10, '2023-11-01 12:24:46', '2023-11-01 12:24:46'),
(73, 28, 5, 18, '2023-11-01 12:24:46', '2023-11-01 12:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `exams_attempt`
--

CREATE TABLE `exams_attempt` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `marks` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams_attempt`
--

INSERT INTO `exams_attempt` (`id`, `exam_id`, `user_id`, `status`, `marks`, `created_at`, `updated_at`) VALUES
(19, 34, 26, 1, 20, '2023-10-29 12:25:06', '2023-10-29 06:56:51'),
(20, 34, 26, 1, 25, '2023-10-29 12:25:40', '2023-10-29 06:57:10'),
(21, 31, 26, 1, 50, '2023-10-29 12:26:01', '2023-10-29 06:57:24'),
(22, 31, 7, 1, 25, '2023-10-29 12:31:03', '2023-10-29 07:02:22'),
(23, 34, 7, 1, 15, '2023-10-29 12:31:22', '2023-10-29 07:02:52'),
(24, 34, 7, 1, 20, '2023-10-29 12:31:39', '2023-10-29 07:03:07'),
(25, 31, 27, 0, NULL, '2023-10-29 15:57:24', '2023-10-29 15:57:24'),
(26, 34, 27, 0, NULL, '2023-10-29 15:57:48', '2023-10-29 15:57:48'),
(27, 34, 27, 0, NULL, '2023-10-29 15:58:09', '2023-10-29 15:58:09'),
(28, 37, 26, 1, 20, '2023-11-01 12:24:46', '2023-11-01 06:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `exam_payments`
--

CREATE TABLE `exam_payments` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`payment_details`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_id` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_payments`
--

INSERT INTO `exam_payments` (`id`, `exam_id`, `user_id`, `payment_details`, `created_at`, `updated_id`) VALUES
(12, 37, 26, '{\"razorpay_order_id\":\"order_MvCzbjNPFKz7XS\",\"razorpay_payment_id\":\"pay_MvCzjv5zyQ5QiO\",\"razorpay_signature\":\"17b8f4a0a51af1d022152978beb34dc479dcb6aade4b0027ed5a5c126f3f69d1\"}', '2023-11-01 12:24:27', '2023-11-01 12:24:27');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `exam_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`exam_id`)),
  `price` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`price`)),
  `expiry` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `exam_id`, `price`, `expiry`, `created_at`, `updated_at`) VALUES
(1, 'First Sem MscIT', '[41,22,23,38,40]', '{\"INR\":\"1250\",\"USD\":\"15\"}', '2024-10-23', '2023-10-18 12:53:21', '2023-10-24 03:32:53'),
(3, 'Dummy Package', '[26,27,28]', '{\"INR\":\"250\",\"USD\":\"12\"}', '2023-10-31', '2023-10-23 18:17:45', '2023-10-23 18:17:45');

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
-- Table structure for table `qna_exams`
--

CREATE TABLE `qna_exams` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qna_exams`
--

INSERT INTO `qna_exams` (`id`, `exam_id`, `question_id`, `created_at`, `updated_at`) VALUES
(3, 14, 5, '2023-10-08 12:46:33', '2023-10-08 12:46:33'),
(6, 15, 4, '2023-10-08 15:03:31', '2023-10-08 15:03:31'),
(9, 17, 16, '2023-10-09 13:33:22', '2023-10-09 13:33:22'),
(11, 21, 3, '2023-10-09 16:31:34', '2023-10-09 16:31:34'),
(12, 21, 4, '2023-10-09 16:31:35', '2023-10-09 16:31:35'),
(13, 21, 5, '2023-10-09 16:31:35', '2023-10-09 16:31:35'),
(14, 20, 18, '2023-10-09 16:32:15', '2023-10-09 16:32:15'),
(15, 20, 19, '2023-10-09 16:32:15', '2023-10-09 16:32:15'),
(16, 20, 20, '2023-10-09 16:32:15', '2023-10-09 16:32:15'),
(18, 23, 11, '2023-10-12 12:14:30', '2023-10-12 12:14:30'),
(19, 23, 12, '2023-10-12 12:14:30', '2023-10-12 12:14:30'),
(20, 23, 13, '2023-10-12 12:14:31', '2023-10-12 12:14:31'),
(21, 22, 16, '2023-10-12 12:16:33', '2023-10-12 12:16:33'),
(22, 22, 17, '2023-10-12 12:16:33', '2023-10-12 12:16:33'),
(23, 34, 7, '2023-10-12 13:12:28', '2023-10-12 13:12:28'),
(24, 34, 8, '2023-10-12 13:12:29', '2023-10-12 13:12:29'),
(25, 34, 9, '2023-10-12 13:12:29', '2023-10-12 13:12:29'),
(26, 34, 13, '2023-10-12 13:12:29', '2023-10-12 13:12:29'),
(27, 34, 14, '2023-10-12 13:12:29', '2023-10-12 13:12:29'),
(29, 39, 19, '2023-10-25 07:17:34', '2023-10-25 07:17:34'),
(32, 31, 3, '2023-10-25 12:07:11', '2023-10-25 12:07:11'),
(33, 31, 4, '2023-10-25 12:07:11', '2023-10-25 12:07:11'),
(34, 36, 7, '2023-10-26 12:43:06', '2023-10-26 12:43:06'),
(35, 36, 8, '2023-10-26 12:43:06', '2023-10-26 12:43:06'),
(36, 37, 3, '2023-11-01 12:19:24', '2023-11-01 12:19:24'),
(37, 37, 4, '2023-11-01 12:19:24', '2023-11-01 12:19:24'),
(38, 37, 5, '2023-11-01 12:19:24', '2023-11-01 12:19:24'),
(39, 37, 6, '2023-11-01 12:19:24', '2023-11-01 12:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `explaination` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `explaination`, `created_at`, `updated_at`) VALUES
(3, 'What is the capital of France?', 'Capital city of Spain', '2023-10-02 06:36:07', '2023-10-25 07:12:19'),
(4, 'What gas do plants primarily absorb from the atmosphere during photosynthesis?', NULL, '2023-10-02 06:36:42', '2023-10-02 06:36:42'),
(5, 'Who is the author of the famous novel \"To Kill a Mockingbird\"?', NULL, '2023-10-02 06:37:17', '2023-10-02 06:37:17'),
(6, 'What is the chemical symbol for gold?', NULL, '2023-10-02 06:37:54', '2023-10-02 10:16:32'),
(7, 'Which planet in our solar system is known as the \"Red Planet\"?', NULL, '2023-10-02 06:38:24', '2023-10-02 06:38:24'),
(8, 'What is the largest mammal on Earth?', NULL, '2023-10-02 06:38:59', '2023-10-02 06:38:59'),
(9, 'Who painted the Mona Lisa?', NULL, '2023-10-02 06:39:28', '2023-10-02 06:39:28'),
(10, 'Which of the following is not a primary color in subtractive color mixing?', NULL, '2023-10-02 06:39:57', '2023-10-02 06:39:57'),
(11, 'What is the smallest prime number?', NULL, '2023-10-02 06:40:16', '2023-10-02 06:40:16'),
(12, 'Which gas is responsible for the Earth\'s ozone layer depletion?', NULL, '2023-10-02 06:40:46', '2023-10-02 06:40:46'),
(13, 'What is the powerhouse of the cell?', 'It is a biology question.', '2023-10-02 06:41:14', '2023-10-13 07:10:40'),
(14, 'deleted question 14', NULL, '2023-10-25 07:19:28', '2023-10-25 07:19:28'),
(15, 'demo question 15', NULL, '2023-10-25 11:45:12', '2023-10-25 06:16:01'),
(16, 'ORM in laravel stands for?', NULL, '2023-10-03 10:40:12', '2023-10-03 10:40:12'),
(17, 'Which of the following conditional statements is used to test multiple conditions', NULL, '2023-10-03 18:02:40', '2023-10-03 12:34:11'),
(18, 'Which of the following attributes is not used with the IMG tag', NULL, '2023-10-03 18:02:40', '2023-10-08 06:29:00'),
(19, 'Which of the following is not a communication service of the Internet?', NULL, '2023-10-03 18:02:40', '2023-10-03 18:02:40'),
(20, 'dummy question 20', NULL, '2023-10-25 07:56:23', '2023-10-25 07:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `sub_code` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `sub_code`, `created_at`, `updated_at`) VALUES
(1, 'Advanced Programming in Java', 'APJ', '2023-10-25 07:46:57', '2023-10-25 07:46:57'),
(3, 'Python Programming', 'PyP', '2023-09-26 09:38:53', '2023-09-26 09:38:53'),
(5, 'Programming with ASP.Net', 'ASP', '2023-09-26 09:42:36', '2023-09-26 09:42:36'),
(6, 'App Development in Android', 'ADAnd', '2023-09-26 09:43:16', '2023-09-26 09:43:16'),
(7, 'Programming in C#', 'PC#', '2023-09-26 09:43:38', '2023-09-26 09:43:38'),
(9, 'Network Administration and Programming', 'NAP', '2023-09-26 09:44:42', '2023-09-26 09:44:42'),
(10, 'OOP using C++', 'OOPC++', '2023-09-26 09:45:01', '2023-09-26 09:45:01'),
(11, 'Oracle with RDBMS', 'ORC', '2023-09-26 09:45:24', '2023-09-26 09:45:24'),
(12, 'CMS using Wordpress', 'CMS', '2023-09-26 09:45:41', '2023-09-26 09:45:41'),
(13, 'Programming & Data Structures in C', 'PDS', '2023-09-26 09:46:19', '2023-09-26 06:53:44'),
(14, 'Fundamentals of Website Design & Development', 'FWDD', '2023-09-26 09:47:03', '2023-09-26 09:47:03'),
(15, 'Software Designing & Testing', 'SDT', '2023-09-26 09:47:39', '2023-09-26 07:15:48'),
(17, 'Introduction to NoSQL: MongoDB', 'MONG', '2023-10-03 10:30:20', '2023-10-29 02:04:46'),
(19, 'Demo Subject', 'DS', '2023-10-08 12:02:08', '2023-10-08 12:02:08'),
(20, 'Database Programming in MongoDB', 'DBM', '2023-10-08 17:05:04', '2023-10-08 17:05:04'),
(21, 'Introduction to React.JS', 'IRJ', '2023-10-29 07:26:33', '2023-10-29 07:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `profile_pic`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Anshu Joshi', 'anshujoshi@proton.me', 'profile/1.jpg', NULL, 1, '$2y$10$J4B3hCa5Ll2jeJ5cHjMaRuLkQ5aNNK5BfdqDVaqLTKNf06vuCAf/m', NULL, '2023-09-23 07:31:01', '2023-11-03 06:57:32'),
(7, 'Krith Joshi', 'joshikreet.312@gmail.com', NULL, NULL, 0, '$2y$10$P/VIxAm4d2tJeCJTYkuhF.E00nsBsGY0Rg.Yfqb90WoRI2IkZzxsO', NULL, NULL, '2023-10-29 07:00:14'),
(26, 'Anshula Kapoor', 'joshianshu045@gmail.com', NULL, NULL, 0, '$2y$10$Vm/ABWOpaZ5EDv1/RohfhuuOsC8hT8ZxwEFl.0SF62NNZKTO0BpF2', NULL, '2023-10-29 06:45:26', '2023-10-29 06:45:26'),
(27, 'Anvita Joshi', 'anshujoshi084@gmail.com', NULL, NULL, 0, '$2y$10$3wiXjFriz7zoNnGybsdV8eNYA3XV0kN2rS961Rk3vuMxYIGJha4BC', NULL, '2023-10-29 10:26:27', '2023-10-29 10:26:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams_answers`
--
ALTER TABLE `exams_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams_attempt`
--
ALTER TABLE `exams_attempt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_payments`
--
ALTER TABLE `exam_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
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
-- Indexes for table `qna_exams`
--
ALTER TABLE `qna_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `exams_answers`
--
ALTER TABLE `exams_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `exams_attempt`
--
ALTER TABLE `exams_attempt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `exam_payments`
--
ALTER TABLE `exam_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qna_exams`
--
ALTER TABLE `qna_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
