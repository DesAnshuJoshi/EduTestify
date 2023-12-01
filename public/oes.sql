-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 05:12 PM
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
(1, 1, 'To catch exceptions', 0, '2023-12-01 13:44:58', '2023-12-01 13:44:58'),
(2, 1, 'To execute code regardless of whether an exception occurs or not', 1, '2023-12-01 13:44:59', '2023-12-01 13:44:59'),
(3, 1, 'To handle checked exceptions', 0, '2023-12-01 13:44:59', '2023-12-01 13:44:59'),
(4, 1, 'To terminate the program', 0, '2023-12-01 13:44:59', '2023-12-01 13:44:59'),
(5, 2, 'ArrayList is synchronized, LinkedList is not', 0, '2023-12-01 13:45:00', '2023-12-01 13:45:51'),
(6, 2, 'ArrayList is faster for random access, LinkedList is faster for insertions and deletions', 1, '2023-12-01 13:45:00', '2023-12-01 13:45:51'),
(7, 2, 'LinkedList is a resizable array, ArrayList is a linked list', 0, '2023-12-01 13:45:00', '2023-12-01 13:45:51'),
(8, 2, 'There is no difference', 0, '2023-12-01 13:45:00', '2023-12-01 13:45:51'),
(9, 3, 'Singleton', 0, '2023-12-01 13:46:26', '2023-12-01 13:46:26'),
(10, 3, 'Prototype', 0, '2023-12-01 13:46:26', '2023-12-01 13:46:26'),
(11, 3, 'Factory Method', 1, '2023-12-01 13:46:27', '2023-12-01 13:46:27'),
(12, 3, 'Abstract Factory', 0, '2023-12-01 13:46:27', '2023-12-01 13:46:27'),
(13, 4, 'To manage database connections', 0, '2023-12-01 13:47:16', '2023-12-01 13:47:16'),
(14, 4, 'To define a standard for ORM (Object-Relational Mapping)', 1, '2023-12-01 13:47:17', '2023-12-01 13:47:17'),
(15, 4, 'To handle user authentication', 0, '2023-12-01 13:47:17', '2023-12-01 13:47:17'),
(16, 4, 'To create graphical user interfaces', 0, '2023-12-01 13:47:17', '2023-12-01 13:47:17'),
(17, 5, 'To handle HTTP requests', 0, '2023-12-01 13:47:54', '2023-12-01 13:47:54'),
(18, 5, 'To manage persistence and business logic', 1, '2023-12-01 13:47:54', '2023-12-01 13:47:54'),
(19, 5, 'To create web pages', 0, '2023-12-01 13:47:54', '2023-12-01 13:47:54'),
(20, 5, 'To handle JavaScript functionality', 0, '2023-12-01 13:47:54', '2023-12-01 13:47:54'),
(21, 6, 'To manage Java source code', 0, '2023-12-01 13:48:31', '2023-12-01 13:48:31'),
(22, 6, 'To provide a messaging system between Java applications', 1, '2023-12-01 13:48:31', '2023-12-01 13:48:31'),
(23, 6, 'To create graphical user interfaces', 0, '2023-12-01 13:48:31', '2023-12-01 13:48:31'),
(24, 6, 'To handle database connections', 0, '2023-12-01 13:48:31', '2023-12-01 13:48:31'),
(25, 7, 'To manage database migrations', 0, '2023-12-01 13:49:12', '2023-12-01 13:49:12'),
(26, 7, 'To generate code snippets for web pages', 0, '2023-12-01 13:49:12', '2023-12-01 13:49:12'),
(27, 7, 'To create and manage Laravel projects', 1, '2023-12-01 13:49:12', '2023-12-01 13:49:12'),
(28, 7, 'To handle user authentication', 0, '2023-12-01 13:49:12', '2023-12-01 13:49:12'),
(29, 8, 'To handle database queries', 0, '2023-12-01 13:49:49', '2023-12-01 13:49:49'),
(30, 8, 'To define routes in a Laravel application', 0, '2023-12-01 13:49:49', '2023-12-01 13:49:49'),
(31, 8, 'To write and manage views in a concise syntax', 1, '2023-12-01 13:49:49', '2023-12-01 13:49:49'),
(32, 8, 'To create RESTful APIs', 0, '2023-12-01 13:49:49', '2023-12-01 13:49:49'),
(33, 9, 'Many-to-Many', 1, '2023-12-01 13:50:28', '2023-12-01 13:50:28'),
(34, 9, 'One-to-One', 0, '2023-12-01 13:50:28', '2023-12-01 13:50:28'),
(35, 9, 'One-to-Many', 0, '2023-12-01 13:50:28', '2023-12-01 13:50:28'),
(36, 9, 'Belongs-To-Many', 0, '2023-12-01 13:50:28', '2023-12-01 13:50:28'),
(37, 10, 'To handle HTTP requests', 0, '2023-12-01 13:51:13', '2023-12-01 13:51:13'),
(38, 10, 'To manage database migrations', 0, '2023-12-01 13:51:13', '2023-12-01 13:51:13'),
(39, 10, 'To provide an interface for querying the database using an object-oriented syntax', 1, '2023-12-01 13:51:13', '2023-12-01 13:51:13'),
(40, 10, 'To define routes in a Laravel application', 0, '2023-12-01 13:51:13', '2023-12-01 13:51:13'),
(41, 11, 'To create and manage database tables', 0, '2023-12-01 13:51:55', '2023-12-01 13:51:55'),
(42, 11, 'To define routes for API endpoints', 0, '2023-12-01 13:51:55', '2023-12-01 13:51:55'),
(43, 11, 'To filter HTTP requests entering the application', 1, '2023-12-01 13:51:55', '2023-12-01 13:51:55'),
(44, 11, 'To generate code snippets for web pages', 0, '2023-12-01 13:51:55', '2023-12-01 13:51:55'),
(45, 12, 'php artisan serve', 0, '2023-12-01 13:52:37', '2023-12-01 13:52:37'),
(46, 12, 'php artisan migrate:make', 0, '2023-12-01 13:52:38', '2023-12-01 13:52:38'),
(47, 12, 'php artisan new:migration', 0, '2023-12-01 13:52:38', '2023-12-01 13:52:38'),
(48, 12, 'php artisan make:migration', 1, '2023-12-01 13:52:38', '2023-12-01 13:52:38'),
(49, 13, 'A record in a traditional relational database', 0, '2023-12-01 13:53:20', '2023-12-01 13:53:20'),
(50, 13, 'A JSON-like data structure used to store data', 1, '2023-12-01 13:53:20', '2023-12-01 13:53:20'),
(51, 13, 'A field in a MongoDB collection', 0, '2023-12-01 13:53:20', '2023-12-01 13:53:20'),
(52, 13, 'A table in a relational database', 0, '2023-12-01 13:53:20', '2023-12-01 13:53:20'),
(53, 14, 'Schema flexibility', 1, '2023-12-01 13:53:49', '2023-12-01 13:53:49'),
(54, 14, 'Strict schema enforcement', 0, '2023-12-01 13:53:49', '2023-12-01 13:53:49'),
(55, 14, 'Lack of support for indexing', 0, '2023-12-01 13:53:49', '2023-12-01 13:53:49'),
(56, 14, 'Limited data storage capacity', 0, '2023-12-01 13:53:49', '2023-12-01 13:53:49'),
(57, 15, 'It is a reserved keyword and cannot be used', 0, '2023-12-01 13:54:29', '2023-12-01 13:54:29'),
(58, 15, 'It uniquely identifies a document within a collection', 1, '2023-12-01 13:54:30', '2023-12-01 13:54:30'),
(59, 15, 'It represents the document\'s data type', 0, '2023-12-01 13:54:30', '2023-12-01 13:54:30'),
(60, 15, 'It is used to define relationships between documents', 0, '2023-12-01 13:54:30', '2023-12-01 13:54:30'),
(61, 16, 'A way to sort documents in a collection', 0, '2023-12-01 13:55:14', '2023-12-01 13:55:14'),
(62, 16, 'A technique for dividing a large database into smaller, more manageable parts', 1, '2023-12-01 13:55:14', '2023-12-01 13:55:14'),
(63, 16, 'A type of index used for querying', 0, '2023-12-01 13:55:14', '2023-12-01 13:55:14'),
(64, 16, 'A method for encrypting data in MongoDB', 0, '2023-12-01 13:55:14', '2023-12-01 13:55:14'),
(65, 17, '$sort', 0, '2023-12-01 13:55:48', '2023-12-01 13:55:48'),
(66, 17, '$project', 0, '2023-12-01 13:55:48', '2023-12-01 13:55:48'),
(67, 17, '$match', 0, '2023-12-01 13:55:48', '2023-12-01 13:55:48'),
(68, 17, '$group', 1, '2023-12-01 13:55:48', '2023-12-01 13:55:48'),
(69, 18, 'A reserved keyword in queries', 0, '2023-12-01 13:56:19', '2023-12-01 13:56:19'),
(70, 18, 'A collection of documents', 0, '2023-12-01 13:56:19', '2023-12-01 13:56:19'),
(71, 18, 'A data type for numeric values', 0, '2023-12-01 13:56:19', '2023-12-01 13:56:19'),
(72, 18, 'A data structure that improves the speed of data retrieval operations', 1, '2023-12-01 13:56:19', '2023-12-01 13:56:19'),
(73, 21, 'To create graphical user interfaces', 0, '2023-12-01 14:29:06', '2023-12-01 14:30:31'),
(74, 21, 'To manage persistence and business logic', 0, '2023-12-01 14:29:06', '2023-12-01 14:30:31'),
(75, 21, 'To provide a naming and directory service for Java applications', 1, '2023-12-01 14:29:06', '2023-12-01 14:30:31'),
(76, 21, 'To handle HTTP requests', 0, '2023-12-01 14:29:06', '2023-12-01 14:30:31'),
(78, 22, 'To manage Java source code', 0, '2023-12-01 14:29:06', '2023-12-01 14:31:04'),
(79, 22, 'To handle user authentication and authorization', 1, '2023-12-01 14:29:06', '2023-12-01 14:31:04'),
(80, 22, 'To create web pages', 0, '2023-12-01 14:29:06', '2023-12-01 14:31:04'),
(81, 22, 'To handle database connections', 0, '2023-12-01 14:29:06', '2023-12-01 14:31:04'),
(83, 23, 'Enterprise JavaBeans (EJB)', 0, '2023-12-01 14:29:06', '2023-12-01 14:31:18'),
(84, 23, 'JavaServer Faces (JSF)', 1, '2023-12-01 14:29:06', '2023-12-01 14:31:18'),
(85, 23, 'Java Message Service (JMS)', 0, '2023-12-01 14:29:06', '2023-12-01 14:31:18'),
(86, 23, 'Java Servlet', 0, '2023-12-01 14:29:06', '2023-12-01 14:31:18'),
(88, 24, 'To define a one-to-one relationship', 0, '2023-12-01 14:29:06', '2023-12-01 14:31:34'),
(89, 24, 'To define a many-to-many relationship', 0, '2023-12-01 14:29:06', '2023-12-01 14:31:34'),
(90, 24, 'To define a one-to-many relationship', 1, '2023-12-01 14:29:06', '2023-12-01 14:31:35'),
(91, 24, 'To define a polymorphic relationship', 0, '2023-12-01 14:29:06', '2023-12-01 14:31:35'),
(93, 25, 'By using the php artisan secure command', 0, '2023-12-01 14:29:06', '2023-12-01 14:31:50'),
(94, 25, 'By configuring the .env file', 0, '2023-12-01 14:29:06', '2023-12-01 14:31:50'),
(95, 25, 'By using middleware to enforce authentication', 1, '2023-12-01 14:29:06', '2023-12-01 14:31:50'),
(96, 25, 'By setting the appropriate permissions on the route file', 0, '2023-12-01 14:29:06', '2023-12-01 14:31:50'),
(98, 26, 'To include a partial view', 0, '2023-12-01 14:29:06', '2023-12-01 14:32:08'),
(99, 26, 'To define a section of content that can be overridden in child views', 1, '2023-12-01 14:29:06', '2023-12-01 14:32:08'),
(100, 26, 'To create a new migration', 0, '2023-12-01 14:29:06', '2023-12-01 14:32:08'),
(101, 26, 'To handle HTTP requests', 0, '2023-12-01 14:29:06', '2023-12-01 14:32:08'),
(103, 27, 'To handle HTTP requests', 0, '2023-12-01 14:29:06', '2023-12-01 14:32:22'),
(104, 27, 'To manage database migrations', 0, '2023-12-01 14:29:06', '2023-12-01 14:32:22'),
(105, 27, 'To provide storage and retrieval of data in MongoDB', 1, '2023-12-01 14:29:06', '2023-12-01 14:32:22'),
(106, 27, 'To define routes in a MongoDB application', 0, '2023-12-01 14:29:06', '2023-12-01 14:32:22'),
(108, 28, 'Through the use of the WiredTiger storage engine', 0, '2023-12-01 14:29:06', '2023-12-01 14:32:41'),
(109, 28, 'By dividing the database into smaller parts called shards', 1, '2023-12-01 14:29:06', '2023-12-01 14:32:41'),
(110, 28, 'By enforcing a strict schema for data storage', 0, '2023-12-01 14:29:06', '2023-12-01 14:32:41'),
(111, 28, 'By using the $sort aggregation pipeline stage', 0, '2023-12-01 14:29:06', '2023-12-01 14:32:41'),
(113, 29, 'To insert documents into a collection', 0, '2023-12-01 14:29:06', '2023-12-01 14:32:52'),
(114, 29, 'To update documents in a collection', 0, '2023-12-01 14:29:06', '2023-12-01 14:32:52'),
(115, 29, 'To retrieve documents from a collection based on a query', 1, '2023-12-01 14:29:06', '2023-12-01 14:32:53'),
(116, 29, 'To define relationships between documents', 0, '2023-12-01 14:29:06', '2023-12-01 14:32:53'),
(118, 30, 'if', 0, '2023-12-01 14:34:25', '2023-12-01 14:35:01'),
(119, 30, 'if…else', 0, '2023-12-01 14:34:25', '2023-12-01 14:35:01'),
(120, 30, 'if…elif…else', 1, '2023-12-01 14:34:25', '2023-12-01 14:35:01'),
(121, 30, 'all of these', 0, '2023-12-01 14:34:25', '2023-12-01 14:35:01'),
(122, 30, 'both a & b', 0, '2023-12-01 14:34:25', '2023-12-01 14:35:01'),
(123, 30, 'none of above', 0, '2023-12-01 14:34:25', '2023-12-01 14:35:01'),
(124, 31, 'SRC', 1, '2023-12-01 14:34:25', '2023-12-01 14:34:25'),
(125, 31, 'FRAME', 0, '2023-12-01 14:34:25', '2023-12-01 14:34:25'),
(126, 31, 'HEIGHT', 0, '2023-12-01 14:34:25', '2023-12-01 14:34:25'),
(127, 31, 'BORDER', 0, '2023-12-01 14:34:25', '2023-12-01 14:34:25'),
(128, 32, 'Chat', 0, '2023-12-01 14:34:25', '2023-12-01 14:34:25'),
(129, 32, 'Google Drive', 1, '2023-12-01 14:34:25', '2023-12-01 14:34:25'),
(130, 32, 'E-Mail', 0, '2023-12-01 14:34:25', '2023-12-01 14:34:25'),
(131, 32, 'VoIP', 0, '2023-12-01 14:34:25', '2023-12-01 14:34:25'),
(132, 33, 'ans1', 0, '2023-12-01 14:36:12', '2023-12-01 14:36:42'),
(133, 33, 'ans2', 0, '2023-12-01 14:36:12', '2023-12-01 14:36:43'),
(134, 33, 'ans3', 0, '2023-12-01 14:36:12', '2023-12-01 14:36:43'),
(135, 33, 'ans4', 1, '2023-12-01 14:36:43', '2023-12-01 14:36:43'),
(136, 34, '2000', 0, '2023-12-01 15:09:38', '2023-12-01 15:09:38'),
(137, 34, '2003', 0, '2023-12-01 15:09:38', '2023-12-01 15:09:38'),
(138, 34, '2010', 0, '2023-12-01 15:09:38', '2023-12-01 15:09:38'),
(139, 34, '2007', 1, '2023-12-01 15:09:38', '2023-12-01 15:09:38');

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
(5, 'MongoDB Fundamentals and Application Exam', 3, '2023-12-02', '01:00', 1, 5, 10, 'exid6569e0150880c', 0, NULL, '2023-12-01 13:31:01', '2023-12-01 14:50:15'),
(6, 'Advanced MongoDB Database Design and Querying', 3, '2023-12-02', '02:00', 2, 75, 50, 'exid6569e03e7696c', 1, '{\"INR\":\"1200\",\"USD\":\"49\"}', '2023-12-01 13:31:42', '2023-12-01 14:50:31'),
(7, 'JavaEE Mastery Exam', 1, '2023-12-02', '01:00', 1, 15, 25, 'exid6569e0a1338bc', 0, NULL, '2023-12-01 13:33:21', '2023-12-01 14:50:47'),
(8, 'Laravel Web Application Development Challenge', 2, '2023-12-02', '01:00', 1, 40, 40, 'exid6569e0c873a08', 0, NULL, '2023-12-01 13:34:00', '2023-12-01 14:51:03'),
(9, 'MongoDB Expertise Certification', 3, '2023-12-02', '01:00', 1, 35, 70, 'exid6569e0da5e65d', 0, NULL, '2023-12-01 13:34:18', '2023-12-01 14:51:28');

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
(1, 'Advanced Course', '[7,8,9]', '{\"INR\":\"5000\",\"USD\":\"250\"}', '2024-12-31', '2023-12-01 13:35:44', '2023-12-01 13:35:53');

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
(1, 1, 1, '2023-12-01 14:41:41', '2023-12-01 14:41:41'),
(2, 1, 2, '2023-12-01 14:41:42', '2023-12-01 14:41:42'),
(3, 1, 3, '2023-12-01 14:41:42', '2023-12-01 14:41:42'),
(4, 2, 4, '2023-12-01 14:42:05', '2023-12-01 14:42:05'),
(5, 2, 5, '2023-12-01 14:42:05', '2023-12-01 14:42:05'),
(6, 2, 6, '2023-12-01 14:42:05', '2023-12-01 14:42:05'),
(7, 3, 7, '2023-12-01 14:42:34', '2023-12-01 14:42:34'),
(8, 3, 8, '2023-12-01 14:42:34', '2023-12-01 14:42:34'),
(9, 3, 9, '2023-12-01 14:42:34', '2023-12-01 14:42:34'),
(10, 4, 10, '2023-12-01 14:43:20', '2023-12-01 14:43:20'),
(11, 4, 11, '2023-12-01 14:43:20', '2023-12-01 14:43:20'),
(12, 4, 12, '2023-12-01 14:43:42', '2023-12-01 14:43:42'),
(13, 5, 13, '2023-12-01 14:44:05', '2023-12-01 14:44:05'),
(14, 5, 14, '2023-12-01 14:44:24', '2023-12-01 14:44:24'),
(15, 5, 15, '2023-12-01 14:44:42', '2023-12-01 14:44:42'),
(16, 6, 16, '2023-12-01 14:45:03', '2023-12-01 14:45:03'),
(17, 6, 17, '2023-12-01 14:45:22', '2023-12-01 14:45:22'),
(18, 6, 18, '2023-12-01 14:45:40', '2023-12-01 14:45:40'),
(19, 7, 21, '2023-12-01 14:46:05', '2023-12-01 14:46:05'),
(20, 7, 22, '2023-12-01 14:46:05', '2023-12-01 14:46:05'),
(21, 7, 23, '2023-12-01 14:46:05', '2023-12-01 14:46:05'),
(25, 8, 24, '2023-12-01 14:47:47', '2023-12-01 14:47:47'),
(26, 8, 25, '2023-12-01 14:47:47', '2023-12-01 14:47:47'),
(27, 8, 26, '2023-12-01 14:47:47', '2023-12-01 14:47:47'),
(28, 9, 27, '2023-12-01 14:48:32', '2023-12-01 14:48:32'),
(29, 9, 28, '2023-12-01 14:48:32', '2023-12-01 14:48:32'),
(30, 9, 29, '2023-12-01 14:48:32', '2023-12-01 14:48:32');

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
(1, 'What is the purpose of the `finally` block in Java exception handling?', 'To execute code regardless of whether an exception occurs or not', '2023-12-01 13:44:58', '2023-12-01 13:44:58'),
(2, 'What is the difference between `ArrayList` and `LinkedList` in Java?', 'ArrayList is faster for random access, LinkedList is faster for insertions and deletions', '2023-12-01 13:45:00', '2023-12-01 13:45:51'),
(3, 'Which design pattern is commonly used in Java for object creation and is specifically used to control the instantiation process?', NULL, '2023-12-01 13:46:26', '2023-12-01 13:46:26'),
(4, 'What is the purpose of the Java Persistence API (JPA) in Java EE applications?', 'To define a standard for ORM (Object-Relational Mapping)', '2023-12-01 13:47:16', '2023-12-01 13:47:16'),
(5, 'In Java EE, what is the role of the Enterprise JavaBeans (EJB) technology?', NULL, '2023-12-01 13:47:53', '2023-12-01 13:47:53'),
(6, 'What is the purpose of the Java Message Service (JMS) in Java EE?', NULL, '2023-12-01 13:48:31', '2023-12-01 13:48:31'),
(7, 'In Laravel, what is the purpose of the artisan command-line tool?', NULL, '2023-12-01 13:49:12', '2023-12-01 13:49:12'),
(8, 'What is Laravel\'s Blade templating engine used for?', 'To write and manage views in a concise syntax', '2023-12-01 13:49:49', '2023-12-01 13:49:49'),
(9, 'Which Laravel Eloquent relationship type is used when a model is related to another model through an intermediate table?', NULL, '2023-12-01 13:50:28', '2023-12-01 13:50:28'),
(10, 'What is the purpose of Laravel\'s Eloquent ORM?', 'To provide an interface for querying the database using an object-oriented syntax', '2023-12-01 13:51:13', '2023-12-01 13:51:13'),
(11, 'In Laravel, what is the purpose of a middleware?', 'To filter HTTP requests entering the application', '2023-12-01 13:51:54', '2023-12-01 13:51:54'),
(12, 'Which artisan command is used to create a new migration in Laravel?', NULL, '2023-12-01 13:52:37', '2023-12-01 13:52:37'),
(13, 'In MongoDB, what is a document?', 'A JSON-like data structure used to store data', '2023-12-01 13:53:20', '2023-12-01 13:53:20'),
(14, 'Which of the following is a primary advantage of using MongoDB over traditional relational databases?', NULL, '2023-12-01 13:53:48', '2023-12-01 13:53:48'),
(15, 'What is the purpose of the _id field in a MongoDB document?', NULL, '2023-12-01 13:54:29', '2023-12-01 13:54:29'),
(16, 'What is sharding in MongoDB?', 'A technique for dividing a large database into smaller, more manageable parts', '2023-12-01 13:55:14', '2023-12-01 13:55:14'),
(17, 'Which MongoDB aggregation pipeline stage is used to group documents by a specified expression?', NULL, '2023-12-01 13:55:48', '2023-12-01 13:55:48'),
(18, 'In MongoDB, what is an index?', 'A data structure that improves the speed of data retrieval operations', '2023-12-01 13:56:18', '2023-12-01 13:56:18'),
(21, 'What is the purpose of the Java Naming and Directory Interface (JNDI) in JavaEE?', NULL, '2023-12-01 14:29:06', '2023-12-01 14:30:30'),
(22, 'In JavaEE, what is the role of the Java Authentication and Authorization Service (JAAS)?', NULL, '2023-12-01 14:29:06', '2023-12-01 14:31:04'),
(23, 'Which JavaEE component is responsible for managing the flow of control in a Java web application?', NULL, '2023-12-01 14:29:06', '2023-12-01 14:31:17'),
(24, 'What is the purpose of Laravel\'s Eloquent belongsTo relationship?', NULL, '2023-12-01 14:29:06', '2023-12-01 14:31:34'),
(25, 'How can you protect routes in Laravel from unauthorized access?', NULL, '2023-12-01 14:29:06', '2023-12-01 14:31:50'),
(26, 'What is the purpose of Laravel\'s Blade directive @yield?', NULL, '2023-12-01 14:29:06', '2023-12-01 14:32:08'),
(27, 'What is the role of the WiredTiger storage engine in MongoDB?', NULL, '2023-12-01 14:29:06', '2023-12-01 14:32:22'),
(28, 'How does MongoDB handle horizontal scaling?', NULL, '2023-12-01 14:29:06', '2023-12-01 14:32:41'),
(29, 'What is the purpose of the MongoDB find method?', NULL, '2023-12-01 14:29:06', '2023-12-01 14:32:52'),
(30, 'Which of the following conditional statements is used to test multiple conditions', NULL, '2023-12-01 14:34:25', '2023-12-01 14:35:01'),
(31, 'Which of the following attributes is not used with the <IMG> tag', NULL, '2023-12-01 14:34:25', '2023-12-01 14:34:25'),
(32, 'Which of the following is not a communication service of the Internet?', NULL, '2023-12-01 14:34:25', '2023-12-01 14:34:25'),
(33, 'demo question', NULL, '2023-12-01 14:36:12', '2023-12-01 14:36:42'),
(34, 'In which year was MongoDB developed?', NULL, '2023-12-01 15:09:38', '2023-12-01 15:09:38');

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
(1, 'APPLICATION DEVEL. USING ADVANCE JAVA', 'CS-01', '2023-12-01 13:26:23', '2023-12-01 13:26:23'),
(2, 'ADVANCE WEB DEVELOPMENT IN LARAVEL', 'CS-02', '2023-12-01 13:26:36', '2023-12-01 13:26:36'),
(3, 'NOSQL DATABASE : MONGODB', 'CS-03', '2023-12-01 13:26:52', '2023-12-01 13:26:52');

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
(1, 'Anshu Joshi', 'anshujoshi@proton.me', 'admin.jpg', NULL, 1, '$2y$10$5LZafQz10tmMEoyepj3RT.OBkVttGb8VieVUI1DsMHknT4Rdfdday', NULL, '2023-12-01 13:24:29', '2023-12-01 13:24:29'),
(2, 'Aarav Sharma', 'aarav.sharma@example.com', NULL, NULL, 0, '$2y$10$.W7PgySqaZXLkSzWEy14DeoW1ZbdcrNtr94b7WuerZKvHCuk8LFVC', NULL, '2023-12-01 14:55:13', '2023-12-01 14:55:13'),
(3, 'Riya Patel', 'riya.patel@example.com', NULL, NULL, 0, '$2y$10$epavXa5MLqMqnRfYUAWC5eenRSU/mIJvJBjRxwEwriDsO9yf0BfQ.', NULL, '2023-12-01 14:55:36', '2023-12-01 14:55:36'),
(4, 'Arjun Singh', 'arjun.singh@example.com', NULL, NULL, 0, '$2y$10$KSC50c5q.aEQ0k.MHlrnQ.TYPZFimKj.k.7i8H47qnYpSz9knodbW', NULL, '2023-12-01 14:55:54', '2023-12-01 14:55:54'),
(5, 'Aisha Verma', 'aisha.verma@example.com', NULL, NULL, 0, '$2y$10$7aZYLAJzoQxBsJRuvUGIMOxg3Mdnnkz0pkn131qbeBW0teZUXoLt2', NULL, '2023-12-01 14:56:12', '2023-12-01 14:56:12'),
(6, 'Ansh Joshi', 'joshianshu045@gmail.com', NULL, NULL, 0, '$2y$10$pODBHAdZh13dnHZsEq115e9BhnE.mD.uapgYYrX5R8ijvkk1KVhhG', NULL, '2023-12-01 14:56:35', '2023-12-01 14:56:35');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `exams_answers`
--
ALTER TABLE `exams_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `exams_attempt`
--
ALTER TABLE `exams_attempt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qna_exams`
--
ALTER TABLE `qna_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
