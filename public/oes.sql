-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 06:50 PM
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
(5, 2, 'SRK', 1, '2023-10-02 06:34:09', '2023-10-02 06:34:09'),
(6, 2, 'Hritik Roshan', 0, '2023-10-02 06:34:09', '2023-10-02 06:34:09'),
(7, 2, 'Shahid Kapoor', 0, '2023-10-02 06:34:09', '2023-10-02 06:34:09'),
(8, 2, 'Varun Dhawan', 0, '2023-10-02 06:34:09', '2023-10-02 06:34:09'),
(9, 3, 'London', 1, '2023-10-02 06:36:07', '2023-10-02 06:36:07'),
(10, 3, 'Berlin', 0, '2023-10-02 06:36:07', '2023-10-02 06:36:07'),
(11, 3, 'Paris', 0, '2023-10-02 06:36:07', '2023-10-02 06:36:07'),
(12, 3, 'Madrid', 0, '2023-10-02 06:36:07', '2023-10-02 06:36:07'),
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
(89, 20, 'Column Based', 0, '2023-10-09 14:40:41', '2023-10-09 14:40:41'),
(90, 20, 'Document Based', 1, '2023-10-09 14:40:41', '2023-10-09 14:40:41'),
(91, 20, 'Graph Based', 0, '2023-10-09 14:40:42', '2023-10-09 14:40:42'),
(92, 20, 'Key Value Based', 0, '2023-10-09 14:40:42', '2023-10-09 14:40:42');

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
(20, 'Demo Exam', 19, '2023-10-12', '03:00', 3, 0, 0, 'exid65242a336c3df', 0, NULL, '2023-10-09 16:28:35', '2023-10-12 06:43:10'),
(22, 'ORM in Laravel', 18, '2023-10-12', '03:01', 2, 22.5, 0, 'exid65242bf687f4b', 0, NULL, '2023-10-09 16:36:06', '2023-10-09 11:27:45'),
(23, 'Spring Java Demo', 1, '2023-10-12', '03:00', 2, 0, 0, 'exid6527e2fc9dd48', 0, NULL, '2023-10-12 12:13:48', '2023-10-12 12:13:48'),
(26, 'Dummy Exam 1', 2, '2023-10-14', '01:00', 1, 0, 0, 'exid6527ef5cdc9fa', 0, NULL, '2023-10-12 13:06:36', '2023-10-12 13:06:36'),
(27, 'Dummy Exam 2', 5, '2023-10-17', '01:00', 1, 0, 0, 'exid6527ef7a2ce43', 0, NULL, '2023-10-12 13:07:06', '2023-10-12 13:07:06'),
(28, 'Dummy Exam 3', 7, '2023-10-24', '01:00', 1, 0, 0, 'exid6527efa6259a5', 0, NULL, '2023-10-12 13:07:50', '2023-10-12 13:07:50'),
(29, 'Dummy Exam 4', 8, '2023-10-25', '02:00', 1, 0, 0, 'exid6527efc653050', 0, NULL, '2023-10-12 13:08:22', '2023-10-12 13:08:22'),
(30, 'Dummy Exam 5', 9, '2023-10-21', '20:40', 1, 0, 0, 'exid6527f0055ae76', 0, NULL, '2023-10-12 13:09:25', '2023-10-12 13:09:25'),
(31, 'Dummy Exam 6', 11, '2023-10-23', '03:40', 1, 0, 0, 'exid6527f020d59b4', 0, NULL, '2023-10-12 13:09:52', '2023-10-12 13:09:52'),
(32, 'Dummy Exam 7', 11, '2023-10-25', '02:59', 1, 0, 0, 'exid6527f044932ab', 0, NULL, '2023-10-12 13:10:28', '2023-10-12 13:10:28'),
(33, 'Dummy Exam 8', 13, '2023-10-30', '04:00', 1, 0, 0, 'exid6527f061d741a', 0, NULL, '2023-10-12 13:10:57', '2023-10-12 13:10:57'),
(34, 'Demo Exam 2', 19, '2023-10-12', '01:00', 2, 5, 12, 'exid65242a4e9abdb', 0, NULL, '2023-10-09 16:29:02', '2023-10-13 01:27:00'),
(36, 'Demo Free Exam', 19, '2023-10-23', '11:00', 1, 0, 0, 'exid652d4ad343469', 0, NULL, '2023-10-16 14:38:11', '2023-10-16 14:38:11'),
(37, 'Demo Paid Exams', 19, '2023-10-25', '17:00', 2, 0, 0, 'exid652d4b3e9801d', 1, '{\"INR\":\"5000\",\"USD\":\"60\"}', '2023-10-16 14:39:58', '2023-10-16 11:02:13'),
(38, 'Demo Exam Paid 2', 19, '2023-10-30', '06:00', 1, 0, 0, '', 0, NULL, '2023-10-16 16:09:12', '2023-10-16 11:02:31'),
(39, 'Demo Exam Free 2', 19, '2023-10-30', '18:00', 1, 0, 0, 'exid652d60c63cf6d', 1, '{\"INR\":\"1000\",\"USD\":\"20\"}', '2023-10-16 16:11:50', '2023-10-16 11:04:37');

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
(1, 1, 2, 8, '2023-10-12 08:27:15', '2023-10-12 08:27:15'),
(2, 1, 5, 19, '2023-10-12 08:27:15', '2023-10-12 08:27:15'),
(3, 1, 4, 14, '2023-10-12 08:27:15', '2023-10-12 08:27:15'),
(4, 1, 3, 9, '2023-10-12 08:27:15', '2023-10-12 08:27:15'),
(5, 2, 2, 5, '2023-10-12 12:09:28', '2023-10-12 12:09:28'),
(6, 2, 4, 15, '2023-10-12 12:09:28', '2023-10-12 12:09:28'),
(7, 2, 5, 18, '2023-10-12 12:09:29', '2023-10-12 12:09:29'),
(8, 2, 3, 12, '2023-10-12 12:09:29', '2023-10-12 12:09:29');

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
(1, 34, 6, 0, 5, '2023-10-12 08:27:15', '2023-10-13 01:02:40'),
(2, 34, 6, 1, 10, '2023-10-12 12:09:28', '2023-10-13 01:07:57');

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
(1, 39, 6, '{\"razorpay_order_id\":\"order_MpL6c5coSIKsJr\",\"razorpay_payment_id\":\"pay_MpL6wM5fWSntdu\",\"razorpay_signature\":\"c64c81e87bfa316459151769fd75bfa3aadf154ee849d3ea004d5e54790ca1b3\"}', '2023-10-17 16:26:52', '2023-10-17 16:26:52'),
(2, 37, 6, '{\"PayerID\":\"4C7HX2NA4E3ZG\"}', '2023-10-17 16:27:30', '2023-10-17 16:27:30');

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
(4, 15, 2, '2023-10-08 15:03:30', '2023-10-08 15:03:30'),
(6, 15, 4, '2023-10-08 15:03:31', '2023-10-08 15:03:31'),
(9, 17, 16, '2023-10-09 13:33:22', '2023-10-09 13:33:22'),
(10, 21, 2, '2023-10-09 16:31:34', '2023-10-09 16:31:34'),
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
(27, 34, 14, '2023-10-12 13:12:29', '2023-10-12 13:12:29');

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
(2, 'Who was lead actor in kabir singh?', 'This is a bollywood movie.', '2023-10-02 06:34:09', '2023-10-02 06:34:09'),
(3, 'What is the capital of France?', 'Capital city of Spain', '2023-10-02 06:36:07', '2023-10-02 06:36:07'),
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
(14, 'Who is known as the father of modern physics and formulated the theory of relativity?', NULL, '2023-10-02 06:42:02', '2023-10-02 06:42:02'),
(16, 'ORM in laravel stands for?', NULL, '2023-10-03 10:40:12', '2023-10-03 10:40:12'),
(17, 'Which of the following conditional statements is used to test multiple conditions', NULL, '2023-10-03 18:02:40', '2023-10-03 12:34:11'),
(18, 'Which of the following attributes is not used with the IMG tag', NULL, '2023-10-03 18:02:40', '2023-10-08 06:29:00'),
(19, 'Which of the following is not a communication service of the Internet?', NULL, '2023-10-03 18:02:40', '2023-10-03 18:02:40'),
(20, 'MongoDB is a which type of NoSQL?', NULL, '2023-10-09 14:40:41', '2023-10-09 14:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `created_at`, `updated_at`) VALUES
(1, 'Advanced Programming in Java', '2023-09-26 09:10:36', '2023-09-26 09:10:36'),
(2, 'Programming in Java', '2023-09-26 09:33:01', '2023-09-26 09:33:01'),
(3, 'Python Programming', '2023-09-26 09:38:53', '2023-09-26 09:38:53'),
(5, 'Programming with ASP.Net', '2023-09-26 09:42:36', '2023-09-26 09:42:36'),
(6, 'App Development in Android', '2023-09-26 09:43:16', '2023-09-26 09:43:16'),
(7, 'Programming in C#', '2023-09-26 09:43:38', '2023-09-26 09:43:38'),
(8, 'Unix and Shell Programming', '2023-09-26 09:44:06', '2023-09-26 06:51:17'),
(9, 'Network Administration and Programming', '2023-09-26 09:44:42', '2023-09-26 09:44:42'),
(10, 'OOP using C++', '2023-09-26 09:45:01', '2023-09-26 09:45:01'),
(11, 'Oracle with RDBMS', '2023-09-26 09:45:24', '2023-09-26 09:45:24'),
(12, 'CMS using Wordpress', '2023-09-26 09:45:41', '2023-09-26 09:45:41'),
(13, 'Programming & Data Structures in C', '2023-09-26 09:46:19', '2023-09-26 06:53:44'),
(14, 'Fundamentals of Website Design & Development', '2023-09-26 09:47:03', '2023-09-26 09:47:03'),
(15, 'Software Designing & Testing', '2023-09-26 09:47:39', '2023-09-26 07:15:48'),
(17, 'Introduction to NoSQL: MongoDB', '2023-10-03 10:30:20', '2023-10-03 10:30:20'),
(18, 'Advanced Web Programming in Laravel', '2023-10-03 10:34:11', '2023-10-03 10:34:11'),
(19, 'Demo Subject', '2023-10-08 12:02:08', '2023-10-08 12:02:08'),
(20, 'Database Programming in MongoDB', '2023-10-08 17:05:04', '2023-10-08 17:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'anshu', 'anshujoshi@proton.me', NULL, 1, '$2y$10$J4B3hCa5Ll2jeJ5cHjMaRuLkQ5aNNK5BfdqDVaqLTKNf06vuCAf/m', NULL, '2023-09-23 07:31:01', '2023-09-25 23:54:04'),
(4, 'Kreet', 'KreetJoshi.312@gmail.com', NULL, 0, '$2y$10$N4DnbaHJnXxh9gQQ8HrFaui0CgHB32zy7XjNr4wHyY6bRuo7QMRBK', NULL, '2023-09-24 07:28:33', '2023-09-24 07:31:26'),
(6, 'Anshuman Singh', 'joshianshu045@gmail.com', NULL, 0, '$2y$10$uOipd/bNAzLSRB.VLsvuA.qp.ASo6GdKkMGNfE5mYxMZLRwfFlwTG', NULL, '2023-10-03 05:15:29', '2023-10-09 09:17:28'),
(7, 'Krith Joshi', 'joshikreet.312@gmail.com', NULL, 0, '$2y$10$.KtKESI5xhc0DbKgGiMmvedkmwgixaoWFEoQ2r4cCZhGYsDbdgkRy', NULL, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `exams_answers`
--
ALTER TABLE `exams_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exams_attempt`
--
ALTER TABLE `exams_attempt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_payments`
--
ALTER TABLE `exam_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qna_exams`
--
ALTER TABLE `qna_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
