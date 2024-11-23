-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2024 at 08:44 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Added_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `Added_by`, `created_at`, `updated_at`) VALUES
(1, 'اللغة العربية', 1, '2024-11-23 20:13:49', '2024-11-23 20:14:11'),
(3, 'قسم البرمجة', 1, '2024-11-23 20:14:26', '2024-11-23 20:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `available_date` date DEFAULT NULL,
  `available_time` time DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `Added_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `title`, `image`, `time`, `available_date`, `available_time`, `category_id`, `Added_by`, `created_at`, `updated_at`) VALUES
(1, 'اختبار  علي لغة HTML', 'images/exam/1732392957.jpg', '10', '2024-11-23', '22:00:00', 3, 1, '2024-11-23 20:15:57', '2024-11-23 20:25:52'),
(2, 'اختبار نحو', NULL, '5', '2024-11-23', '22:00:00', 1, 2, '2024-11-23 20:28:41', '2024-11-23 20:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `exam_attemps`
--

CREATE TABLE `exam_attemps` (
  `id` bigint UNSIGNED NOT NULL,
  `exam_id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `score` int DEFAULT '0',
  `started_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_attemps`
--

INSERT INTO `exam_attemps` (`id`, `exam_id`, `student_id`, `is_completed`, `score`, `started_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 6, '2024-11-23 20:26:03', '2024-11-23 20:26:03', '2024-11-23 20:26:49'),
(2, 2, 1, 1, 1, '2024-11-23 20:32:42', '2024-11-23 20:32:42', '2024-11-23 20:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `exam_forms`
--

CREATE TABLE `exam_forms` (
  `id` bigint UNSIGNED NOT NULL,
  `exam_id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `question_id` bigint UNSIGNED NOT NULL,
  `selected_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  `score` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_forms`
--

INSERT INTO `exam_forms` (`id`, `exam_id`, `student_id`, `question_id`, `selected_answer`, `is_correct`, `score`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'mark ', 1, 1, '2024-11-23 20:26:49', '2024-11-23 20:26:49'),
(2, 1, 1, 2, 'لتقسيم الصفحة الى اجزاء يمكن تنسيقها ', 1, 1, '2024-11-23 20:26:49', '2024-11-23 20:26:49'),
(3, 1, 1, 3, 'ul', 0, 1, '2024-11-23 20:26:49', '2024-11-23 20:26:49'),
(4, 1, 1, 4, 'Pixels ', 1, 1, '2024-11-23 20:26:49', '2024-11-23 20:26:49'),
(5, 1, 1, 5, 'control ', 1, 1, '2024-11-23 20:26:49', '2024-11-23 20:26:49'),
(6, 1, 1, 6, 'body ', 1, 1, '2024-11-23 20:26:49', '2024-11-23 20:26:49'),
(7, 1, 1, 7, 'خطأ', 0, 1, '2024-11-23 20:26:49', '2024-11-23 20:26:49'),
(8, 1, 1, 8, 'h1 ', 1, 1, '2024-11-23 20:26:49', '2024-11-23 20:26:49'),
(9, 2, 1, 9, 'مبتدأ و خبر', 1, 1, '2024-11-23 20:33:39', '2024-11-23 20:33:39'),
(10, 2, 1, 10, 'إسم و فعل', 0, 1, '2024-11-23 20:33:39', '2024-11-23 20:33:39'),
(11, 2, 1, 11, 'كلــِّها', 0, 1, '2024-11-23 20:33:39', '2024-11-23 20:33:39'),
(12, 2, 1, 12, ' ثلاثين رجلًا', 0, 1, '2024-11-23 20:33:39', '2024-11-23 20:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `exam_questions`
--

CREATE TABLE `exam_questions` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answers` json NOT NULL,
  `right_answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int NOT NULL DEFAULT '1',
  `exam_id` bigint UNSIGNED NOT NULL,
  `Added_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_questions`
--

INSERT INTO `exam_questions` (`id`, `title`, `answers`, `right_answer`, `score`, `exam_id`, `Added_by`, `created_at`, `updated_at`) VALUES
(1, 'الوسم <.....> يستخدم لتمييز النص بلون مميز', '\"[\\\"mark \\\",\\\"em\\\",\\\"h3\\\"]\"', 'mark ', 1, 1, 1, '2024-11-23 20:20:08', '2024-11-23 20:20:08'),
(2, 'فيما هذا الوسم <div> يستخدم؟', '\"[\\\"\\\\u0644\\\\u064a\\\\u062d\\\\u0644 \\\\u0645\\\\u062d\\\\u0644 \\\\u0627\\\\u0644\\\\u0641\\\\u0642\\\\u0631\\\\u0627\\\\u062a\\\",\\\"\\\\u0644\\\\u062a\\\\u0648\\\\u0641\\\\u064a\\\\u0631 \\\\u0645\\\\u0633\\\\u0627\\\\u062d\\\\u0629 \\\\u0628\\\\u064a\\\\u0646 \\\\u0627\\\\u0644\\\\u062c\\\\u062f\\\\u0627\\\\u0648\\\\u0644\\\",\\\"\\\\u0644\\\\u062a\\\\u0642\\\\u0633\\\\u064a\\\\u0645 \\\\u0627\\\\u0644\\\\u0635\\\\u0641\\\\u062d\\\\u0629 \\\\u0627\\\\u0644\\\\u0649 \\\\u0627\\\\u062c\\\\u0632\\\\u0627\\\\u0621 \\\\u064a\\\\u0645\\\\u0643\\\\u0646 \\\\u062a\\\\u0646\\\\u0633\\\\u064a\\\\u0642\\\\u0647\\\\u0627 \\\",\\\"\\\\u0644\\\\u062a\\\\u0642\\\\u0633\\\\u064a\\\\u0645 \\\\u0627\\\\u0644\\\\u0641\\\\u0642\\\\u0631\\\\u0627\\\\u062a \\\\u0627\\\\u0644\\\\u0649 \\\\u0627\\\\u062c\\\\u0632\\\\u0627\\\\u0621 \\\"]\"', 'لتقسيم الصفحة الى اجزاء يمكن تنسيقها ', 1, 1, 1, '2024-11-23 20:20:08', '2024-11-23 20:20:08'),
(3, 'لعمل قائمة مرتبة نستخدم الوسم <....>', '\"[\\\"li\\\",\\\"ul\\\",\\\"ol \\\"]\"', 'ol ', 1, 1, 1, '2024-11-23 20:20:08', '2024-11-23 20:20:08'),
(4, 'ما هو التنسيق المستخدم للتعبير عن ارتفاع الصورة وعرضها؟', '\"[\\\"Centimeters\\\",\\\"Pixels \\\",\\\"Inches\\\",\\\"Dots per inch\\\"]\"', 'Pixels ', 1, 1, 1, '2024-11-23 20:20:08', '2024-11-23 20:20:08'),
(5, 'كيف تستطيع اضافة ازرار تحكم الى فيديو في موقعك؟', '\"[\\\"type \\\",\\\"video\\\",\\\"control \\\"]\"', 'control ', 1, 1, 1, '2024-11-23 20:20:08', '2024-11-23 20:20:08'),
(6, 'ما هو الوسم المسؤول عن عرض المحتوى المرئي للمستخدم؟', '\"[\\\"h1\\\",\\\"body \\\",\\\"head \\\"]\"', 'body ', 1, 1, 1, '2024-11-23 20:20:08', '2024-11-23 20:20:08'),
(7, 'نستخدم <h1> لاضافة العناوين صح ام خطأ', '\"[\\\"\\\\u0635\\\\u062d \\\",\\\"\\\\u062e\\\\u0637\\\\u0623\\\"]\"', 'صح ', 1, 1, 1, '2024-11-23 20:21:26', '2024-11-23 20:21:26'),
(8, 'الوسم المسؤال عن العنوان الاكبر هو <....>', '\"[\\\"h1 \\\",\\\"p\\\",\\\"div\\\"]\"', 'h1 ', 1, 1, 1, '2024-11-23 20:21:26', '2024-11-23 20:21:26'),
(9, 'مما تتألف الجملة الإسمية ؟', '\"[\\\"\\\\u0625\\\\u0633\\\\u0645 \\\\u0648\\\\u0641\\\\u0639\\\\u0644\\\",\\\"\\\\u0645\\\\u0628\\\\u062a\\\\u062f\\\\u0623\\\",\\\"\\\\u062e\\\\u0628\\\\u0631\\\",\\\"\\\\u0645\\\\u0628\\\\u062a\\\\u062f\\\\u0623 \\\\u0648 \\\\u062e\\\\u0628\\\\u0631\\\"]\"', 'مبتدأ و خبر', 1, 2, 2, '2024-11-23 20:32:14', '2024-11-23 20:32:14'),
(10, 'ما هم أقسام الكلام ؟', '\"[\\\"\\\\u0641\\\\u0639\\\\u0644 \\\\u0641\\\\u0627\\\\u0639\\\\u0644 \\\\u0645\\\\u0641\\\\u0639\\\\u0648\\\\u0644 \\\\u0628\\\\u0647\\\",\\\"\\\\u0625\\\\u0633\\\\u0645 \\\\u0648 \\\\u0641\\\\u0639\\\\u0644\\\",\\\"\\\\u0625\\\\u0633\\\\u0645 \\\\u0641\\\\u0639\\\\u0644 \\\\u062d\\\\u0631\\\\u0641\\\",\\\"\\\\u0627\\\\u0644\\\\u062c\\\\u0645\\\\u0644\\\\u0629 \\\\u0627\\\\u0644\\\\u0625\\\\u0633\\\\u0645\\\\u064a\\\\u0629 \\\\u0648 \\\\u0627\\\\u0644\\\\u062c\\\\u0645\\\\u0644\\\\u0629 \\\\u0627\\\\u0644\\\\u0641\\\\u0639\\\\u0644\\\\u064a\\\\u0629\\\"]\"', 'إسم فعل حرف', 1, 2, 2, '2024-11-23 20:32:14', '2024-11-23 20:32:14'),
(11, 'قرأتُ موضوعاتِ الكتابِ ............', '\"[\\\"\\\\u0643\\\\u0640\\\\u0640\\\\u0644\\\\u0640\\\\u0651\\\\u064e\\\\u0647\\\\u0627\\\",\\\" \\\\u0643\\\\u0644\\\\u0640\\\\u0640\\\\u0651\\\\u064f\\\\u0647\\\\u0627\\\",\\\"\\\\u0643\\\\u0644\\\\u0640\\\\u0640\\\\u0651\\\\u0650\\\\u0647\\\\u0627\\\"]\"', ' كلــُّها', 1, 2, 2, '2024-11-23 20:32:14', '2024-11-23 20:32:14'),
(12, ' ما حضرَ الندوةَ الأدبيةَ إلا .......', '\"[\\\" \\\\u062b\\\\u0644\\\\u0627\\\\u062b\\\\u064a\\\\u0646 \\\\u0631\\\\u062c\\\\u0644\\\\u064b\\\\u0627\\\",\\\" \\\\u062b\\\\u0644\\\\u0627\\\\u062b\\\\u0648\\\\u0646 \\\\u0631\\\\u062c\\\\u0644\\\\u064b\\\\u0627\\\",\\\" \\\\u062b\\\\u0644\\\\u0627\\\\u062b\\\\u064a\\\\u0646 \\\\u0631\\\\u062c\\\\u0644\\\\u064d\\\"]\"', ' ثلاثين رجلٍ', 1, 2, 2, '2024-11-23 20:32:14', '2024-11-23 20:32:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `phone`, `city`, `school_name`, `email`, `email_verified_at`, `password`, `profile_img`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'منة الله', '010924342323', 'الرياض', 'الشروق الخاصة', 'student@gmail.com', NULL, '$2y$12$PiUb..uAd0L8Pyye5FH5xe9bRB5Qg0qbjx9jTK9iKMNgAFql0TNim', 'images/students/1732393455.png', 1, NULL, '2024-11-23 20:23:56', '2024-11-23 20:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `status`, `profile_img`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'أدمن', 'admin@example.com', NULL, '$2y$12$J09nK.9xkWJlW9HK9U3V6OKls.CBhyxuZ58XWgZHu/Y4oqASglSm2', 'admin', 1, NULL, NULL, '2024-11-23 20:13:30', '2024-11-23 20:13:30'),
(2, 'محمد ياسر', 'teacher@example.com', NULL, '$2y$12$oU96V5TdLVVBowb47WboG.Zq9duECG/Unb5VicDD32flm.yG4T57C', 'teacher', 1, NULL, NULL, '2024-11-23 20:22:41', '2024-11-23 20:22:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_added_by_foreign` (`Added_by`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_category_id_foreign` (`category_id`),
  ADD KEY `exams_added_by_foreign` (`Added_by`);

--
-- Indexes for table `exam_attemps`
--
ALTER TABLE `exam_attemps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_attemps_exam_id_foreign` (`exam_id`),
  ADD KEY `exam_attemps_student_id_foreign` (`student_id`);

--
-- Indexes for table `exam_forms`
--
ALTER TABLE `exam_forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_forms_exam_id_foreign` (`exam_id`),
  ADD KEY `exam_forms_student_id_foreign` (`student_id`),
  ADD KEY `exam_forms_question_id_foreign` (`question_id`);

--
-- Indexes for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_questions_exam_id_foreign` (`exam_id`),
  ADD KEY `exam_questions_added_by_foreign` (`Added_by`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_attemps`
--
ALTER TABLE `exam_attemps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_forms`
--
ALTER TABLE `exam_forms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `exam_questions`
--
ALTER TABLE `exam_questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_added_by_foreign` FOREIGN KEY (`Added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_added_by_foreign` FOREIGN KEY (`Added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exams_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_attemps`
--
ALTER TABLE `exam_attemps`
  ADD CONSTRAINT `exam_attemps_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_attemps_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_forms`
--
ALTER TABLE `exam_forms`
  ADD CONSTRAINT `exam_forms_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_forms_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `exam_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_forms_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD CONSTRAINT `exam_questions_added_by_foreign` FOREIGN KEY (`Added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_questions_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
