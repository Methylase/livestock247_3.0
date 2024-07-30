-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2024 at 03:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livestock_247`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message_type` varchar(255) NOT NULL,
  `your_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `your_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `message_type`, `your_name`, `company_name`, `email`, `phone_number`, `your_message`) VALUES
(1, 'partnership', 'bola', 'lime', 'mutiu.adepoju@livestock247.com', '08188373898', 'partnership'),
(2, 'partnership', 'Tayo', 'livestock247', 'mutiu.adepoju@livestock247.com', '09027864784', 'I want to get bulk ram from your company');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_06_19_201334_create_posts_table', 1),
(2, '2024_06_24_002427_create_contact_us_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link_post_title` varchar(255) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_description` varchar(255) NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `last_read_time` varchar(255) DEFAULT NULL,
  `delete_post` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `link_post_title`, `post_title`, `post_description`, `post_image`, `user_id`, `last_read_time`, `delete_post`, `created_at`, `updated_at`) VALUES
(1, 'hjjjhjgjjddd', 'Impact of Livestock as Climate and Mitigation Strategies', 'hfhgcchchcv  frff', 'php5FD7.tmp.png', '1', NULL, NULL, '2024-06-23 00:27:15', NULL),
(2, 'LIVESTOCK PRODUCTIVITY AND SUSTAINABILITY', 'hhjtttt', 'hjj ttt', 'php1139.tmp.png', '1', '11 seconds', NULL, '2024-06-21 22:59:56', NULL),
(3, 'LIVESTOCK PRODUCTIVITY AND SUSTAINABILITY', 'Impact of Livestock as Climate and Mitigation Strategies', 'nmjhgf fhn ee', 'php65FB.tmp.png', '1', '26 seconds', NULL, '2024-06-22 20:56:29', NULL),
(4, 'hjjjhjgjj', 'Impact of Livestock as Climate and Mitigation Strategies', 'hfhgcchchcvj', 'php1473.tmp.png', '1', '14 seconds', NULL, '2024-06-21 22:27:11', NULL),
(5, 'hjjjhjgjjg', 'Impact of Livestock as Climate and Mitigation Strategies', 'hfhgcchchcvj', 'php4855.tmp.png', '1', '43 seconds', NULL, '2024-06-21 22:27:24', NULL),
(6, 'LIVESTOCK PRODUCTIVITY AND SUSTAINABILITY', 'Impact of Livestock as Climate and Mitigation Strategies', 'fdvd', 'php1F33.tmp.png', '2', '1 hours 20 minutes 7 seconds', NULL, '2024-06-22 19:32:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `designation` varchar(200) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `profile_image`, `firstname`, `lastname`, `phone_number`, `designation`, `user_id`) VALUES
(1, 'phpA9EC.tmp.jpg', 'mutiu', 'adepoju', '08188373897', 'Content Strategist, Livestock247', 1),
(2, 'phpDFB8.tmp.jpg', 'bayo', 'bolatito', '09036561101', 'Content Strategist, Livestock247', 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'ROLE_SUPERADMIN', 'role for super admin user', '2024-01-20 12:32:28', '2024-01-20 12:32:28'),
(2, 'ROLE_ADMIN', 'role for the admin user', '2024-01-20 12:32:59', '2024-01-20 12:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-01-21 19:23:34', '2024-01-21 19:23:34'),
(2, 2, 2, '2024-01-25 21:19:15', '2024-01-25 21:19:15'),
(3, 3, 2, '2024-06-24 09:41:41', '2024-06-24 09:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `condition` varchar(50) DEFAULT NULL,
  `check` varchar(10) DEFAULT NULL,
  `lock_user` varchar(20) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `condition`, `check`, `lock_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'methyl2007@gmail.com', '$2y$12$3ECjJMYgmBNGzj9QqVDIDuO/2JozFtmTUbAr2ubrdQTCG/AX5zoX2', NULL, NULL, NULL, NULL, '2024-06-18 06:27:33', '2024-07-07 13:01:28'),
(2, 'methyl2007@yahoo.com', '$2y$12$3ECjJMYgmBNGzj9QqVDIDuO/2JozFtmTUbAr2ubrdQTCG/AX5zoX2', NULL, NULL, NULL, NULL, NULL, '2024-07-07 13:16:53'),
(3, 'methyl2008@gmail.com', '$2y$12$xIJ3swKBikKjHoRP8fpG7uD7/nOxOXmBAZFzsVkQj8vJfJEwA40xG', NULL, 'new', NULL, NULL, '2024-06-24 09:41:41', '2024-06-24 09:41:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
