-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 09:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oguaa`
--

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
(26, '2014_10_12_000000_create_users_table', 1),
(27, '2014_10_12_100000_create_password_resets_table', 1),
(28, '2019_08_19_000000_create_failed_jobs_table', 1),
(29, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(30, '2022_03_02_200454_create_occupants_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `occupants`
--

CREATE TABLE `occupants` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `index_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_status` tinyint(1) DEFAULT NULL,
  `hasKey` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `occupants`
--

INSERT INTO `occupants` (`id`, `first_name`, `other_name`, `last_name`, `contact`, `program`, `level`, `index_number`, `room_number`, `image`, `key_status`, `hasKey`, `created_at`, `updated_at`) VALUES
(4, 'Armooh', 'Adade', 'Benjamin', '0559982885', 'Bachelor of Arts', '100', 'AR/BAA/21/0091', 'E26', '1646669138_Benjamin.jpg', NULL, NULL, '2022-03-07 16:05:38', '2022-03-07 16:05:38'),
(5, 'Benedicta', 'Akosua', 'Broni', '0554985549/0270537328', 'B.COM MANAGEMENT', '100', 'SB/ADM/21/0028', 'B27', '1646669643_Broni.jpg', 0, 0, '2022-03-07 16:14:03', '2022-03-07 18:05:16'),
(6, 'Ewurakua', '.', 'Appiah', '0279473170', 'Hospitality management', '100', 'SS/HMG/21/0060', 'F66', '1646669832_Appiah.jpg', NULL, NULL, '2022-03-07 16:17:12', '2022-03-07 16:17:12'),
(7, 'Richie', 'Adu', 'Ansere', '0543662667', 'Bachelor of Arts(Social Sciences)', '100', 'SS/BSS/21/0066', 'G48', '1646669999_Ansere.jpg', NULL, NULL, '2022-03-07 16:19:59', '2022-03-07 16:19:59'),
(8, 'Alex', 'Nana Kwame', 'Sarfo', '0552364260', 'Bsc Health Information Management', '200', 'AH/HIM/20/0103', 'G1', '1646670180_Sarfo.jpg', NULL, NULL, '2022-03-07 16:23:00', '2022-03-07 16:23:00'),
(9, 'Dorcas', '.', 'Akpakudi', '0554662722', 'BA.COMMUNICATION STUDIES', '300', 'AR/CMS/19/0026', 'F10', '1646670426_Akpakudi.jpg', NULL, NULL, '2022-03-07 16:27:06', '2022-03-07 16:27:06'),
(10, 'Abigail', '.', 'Sanguma', '0547238624', 'Bachelor of Home Economics education', '300', 'ET/EVT/19/0025', 'F10', '1646677527_Sanguma.jpg', NULL, NULL, '2022-03-07 18:25:27', '2022-03-07 18:25:27'),
(11, 'YUSSUF', '.', 'ALHASSAN', '0543004215 /0597757423', 'Bed Mathematics', '300', 'Et/MAT/19/0024', 'E17', '1646677752_ALHASSAN.jpg', NULL, NULL, '2022-03-07 18:29:12', '2022-03-07 18:29:12'),
(12, 'ENOCK', '.', 'AGYEI', '0556227172', 'BED. SOCIAL SCIENCES', '300', 'EH/BSS/19/0037', 'E37', '1646678016_AGYEI.jpg', NULL, NULL, '2022-03-07 18:33:36', '2022-03-07 18:33:36'),
(13, 'EBENEZER', '.', 'YARBOI', '0547427117', 'B.ED ARTS', '400', 'EH/ART/18/0127', 'E1', '1646678180_YARBOI.jpg', NULL, NULL, '2022-03-07 18:36:20', '2022-03-07 18:36:20'),
(14, 'Magdaline', 'Optimistic', 'Attah-Bakobie', '0246266577', 'Bachelor of Education (Home Economics)', '300', 'ET/EVT/19/0272', 'F24', '1646678315_Attah-Bakobie.jpg', NULL, NULL, '2022-03-07 18:38:35', '2022-03-07 18:38:35'),
(15, 'Kingsley', 'Kwame', 'Agyei', '0555123341', 'Bcom. Marketing', '100', 'SB/MKN/21/0005', 'E39', '1646678484_Agyei.jpg', NULL, NULL, '2022-03-07 18:41:24', '2022-03-07 18:41:24'),
(16, 'Emmanuel', '.', 'YeboahYeboah', '0245704623', 'Linguistics and Philosophy', '300', 'AR/LGT/21/0012', 'D4', '1646678636_YeboahYeboah.jpg', NULL, NULL, '2022-03-07 18:43:56', '2022-03-07 18:43:56'),
(17, 'John', 'Kwabena', 'Ankomah', '0548933682', 'BSC. NURSING', '300', 'SN/NUS/19/0078', 'A8', '1646679196_Ankomah.jpg', NULL, NULL, '2022-03-07 18:53:16', '2022-03-07 18:53:16'),
(18, 'Betty', 'Efua', 'Dickson', '0547890504', 'B.ed home economics', '200', 'ET/EVT/20/0278', 'F52', '1646679591_Dickson.jpg', NULL, NULL, '2022-03-07 18:59:51', '2022-03-07 18:59:51'),
(19, 'Henry', 'Kwaku Junior', 'Dzreke', '0558241807', 'Health information management', '300', 'AH/HIM/19/0925', 'G1', '1646679760_Dzreke.jpg', NULL, NULL, '2022-03-07 19:02:40', '2022-03-07 19:02:40'),
(20, 'Daniel', 'Adjei', 'Neequaye', '0549806948', 'Bachelor of Education (Ghanaian Language, Religion and Human Values)', '200', 'EH/ART/20/0320', 'G19', '1646679921_Neequaye.jpg', NULL, NULL, '2022-03-07 19:05:21', '2022-03-07 19:05:21'),
(21, 'Ibrahim', 'Mohammed', 'oduro', '0249451876', 'Health Physical Education and Recreation', '400', 'ET/HPE/18/0011', 'D37', '1646680055_oduro.jpg', NULL, NULL, '2022-03-07 19:07:35', '2022-03-07 19:07:35'),
(22, 'Solomon King', 'Kweku', 'Korang', '0278569839 / 0555404114', 'B.A Social Science', '100', 'SS/BSS/21/0171', 'E7', '1646680169_Korang.jpg', NULL, NULL, '2022-03-07 19:09:29', '2022-03-07 19:09:29'),
(23, 'Francis', 'Amelisa', 'Akaba', '0551359751', 'Bachelor Of Science (Nursing)', '100', 'SN/NUS/21/0008', 'E 25', '1646680309_Akaba.jpg', NULL, NULL, '2022-03-07 19:11:49', '2022-03-07 19:11:49'),
(24, 'Nicholas', 'Qwesi', 'Agyiri', '0594754257', 'Biomedical sciences', '100', 'AH/BMS/21/0075', 'E14', '1646816567_Agyiri.jpg', NULL, NULL, '2022-03-09 09:02:47', '2022-03-09 09:02:47'),
(25, 'Delight', 'Delali', 'Afidemenyo', '0558813376', 'Be.d Social Science', '100', 'EH/BSS/21/0169', 'E14', '1646816738_Afidemenyo.jpg', NULL, NULL, '2022-03-09 09:05:38', '2022-03-09 09:05:38'),
(26, 'Emmanuella', 'Sharon', 'Afeku', '0551001696', 'B.A(Communication studies)', '100', 'AR/CMS/21/0077', 'F30', '1646817144_Afeku.jpg', NULL, NULL, '2022-03-09 09:12:24', '2022-03-09 09:12:24'),
(27, 'Emmanuel', 'Addison', 'Adoe', '0202913753', 'Batchelor of Education (social science)', '100', 'EH/BSS/21/0080', 'D31', '1646817304_Adoe.jpg', NULL, NULL, '2022-03-09 09:15:04', '2022-03-09 09:15:04'),
(28, 'Esther', 'Abena', 'Arhin', '0554345137', 'B.com  Management', '100', 'SB/ADM/21/0156', 'F65', '1646817459_Arhin.jpg', NULL, NULL, '2022-03-09 09:17:39', '2022-03-09 09:17:39'),
(29, 'Amanir', 'Dela', 'Dorinda', '0542953094', 'B.A SOCIAL SCIENCES', '100', 'SS/BSS/21/0211', 'F50', '1646817621_Dorinda.jpg', NULL, NULL, '2022-03-09 09:20:21', '2022-03-09 09:20:21');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'Jason', 'Appiatu', 'bolt', '$2y$10$PElU7Z/qXucd8VQmMEepBun09rE5kFLHAAvNa.l7/RaXVLuwZ8rOW', NULL, '2022-03-03 10:47:29', '2022-03-03 10:47:29');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `occupants`
--
ALTER TABLE `occupants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `occupants_index_number_unique` (`index_number`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `occupants`
--
ALTER TABLE `occupants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
