-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2023 at 01:28 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_category`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Jena Wilderman', '2023-09-29 05:55:36', '2023-09-29 05:55:36'),
(2, 'Kitty Marks', '2023-09-29 05:55:36', '2023-09-29 05:55:36'),
(3, 'Leonard Fay', '2023-09-29 05:55:37', '2023-09-29 05:55:37'),
(4, 'Rogelio Rohan', '2023-09-29 05:55:37', '2023-09-29 05:55:37'),
(5, 'Dr. Estevan Monahan V', '2023-09-29 05:55:37', '2023-09-29 05:55:37');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_29_093724_create_categories_table', 1),
(6, '2023_09_29_093725_create_products_table', 1);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `image`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Allan Cronin', 'Et dolorem sed odit voluptatem. Perspiciatis provident corporis id voluptas maiores saepe. Voluptas et exercitationem quam ut dolores.', '4597.00', 'https://via.placeholder.com/640x480.png/004411?text=products+omnis', 1, '2023-09-29 05:55:36', '2023-09-29 05:55:36', NULL),
(2, 1, 'Faustino Spinka IV', 'Aut qui fugiat neque autem. Veritatis excepturi asperiores odit rem vel consequatur necessitatibus. Quo qui ratione voluptatem et voluptatum ducimus quisquam.', '5748.00', 'https://via.placeholder.com/640x480.png/008833?text=products+optio', 1, '2023-09-29 05:55:36', '2023-09-29 05:55:36', NULL),
(3, 2, 'Dr. Alanna Rolfson', 'Deleniti facilis ut sunt veniam. Et recusandae saepe accusantium est est sed ut. Quo soluta ab sit eos porro tempora blanditiis. Assumenda itaque eos quia eaque velit a.', '5406.00', 'https://via.placeholder.com/640x480.png/00ee11?text=products+nulla', 1, '2023-09-29 05:55:37', '2023-09-29 05:55:37', NULL),
(4, 2, 'Mr. Gaetano Oberbrunner', 'Laudantium earum suscipit deserunt quia necessitatibus veniam voluptates. Sit adipisci est deleniti molestiae est dicta. Sit vel necessitatibus aut nesciunt.', '8500.00', 'https://via.placeholder.com/640x480.png/0077ff?text=products+incidunt', 1, '2023-09-29 05:55:37', '2023-09-29 05:55:37', NULL),
(5, 3, 'Mr. Einar Hackett PhD', 'Dignissimos saepe magnam et facere. Explicabo eos nesciunt voluptas veniam non delectus. Eius debitis similique quos consequuntur voluptatum laborum.', '5223.00', 'https://via.placeholder.com/640x480.png/0077dd?text=products+ex', 1, '2023-09-29 05:55:37', '2023-09-29 05:55:37', NULL),
(6, 3, 'Maximus Hermann Jr.', 'Ut quia quod eum nulla. Quis alias iste aut molestiae occaecati vitae reprehenderit. Eaque quo harum minima iure reprehenderit officia. Reprehenderit veniam est sunt magnam.', '2224.00', 'https://via.placeholder.com/640x480.png/0088cc?text=products+tempora', 1, '2023-09-29 05:55:37', '2023-09-29 05:55:37', NULL),
(7, 4, 'Ms. Claudine Gutkowski', 'Fugit expedita qui neque aut. Quia quia quia magni voluptatem. Officiis cupiditate nisi corporis expedita explicabo.', '5732.00', 'https://via.placeholder.com/640x480.png/005566?text=products+est', 1, '2023-09-29 05:55:37', '2023-09-29 05:55:37', NULL),
(8, 4, 'Prof. Sibyl Pollich', 'Et maiores dolorem et exercitationem et rerum. Sunt nisi ipsa quam sint harum aut blanditiis laborum. Error sint est dolor.', '9410.00', 'https://via.placeholder.com/640x480.png/008899?text=products+velit', 1, '2023-09-29 05:55:37', '2023-09-29 05:55:37', NULL),
(9, 5, 'Prof. Annie Feeney DDS', 'Velit molestiae perspiciatis et quo eveniet voluptatum. Non ab aspernatur temporibus ut. Sint commodi eum ut.', '2250.00', 'https://via.placeholder.com/640x480.png/00aa33?text=products+incidunt', 1, '2023-09-29 05:55:37', '2023-09-29 05:55:37', NULL),
(10, 5, 'Chelsie Bauch DDS', 'Sunt amet aut repellat corporis molestiae nihil aperiam. Optio eos corrupti doloribus nostrum et.', '8346.00', 'https://via.placeholder.com/640x480.png/0000dd?text=products+cupiditate', 1, '2023-09-29 05:55:37', '2023-09-29 05:55:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Conner Romaguera', 'gschulist@example.org', '2023-09-29 05:55:36', '$2y$10$WbT60wQ01BF7FpnoQ74AROUSNwscvxGgNB2MAeJBBrtELmQeadaxy', 'WZNjRbNL1V', '2023-09-29 05:55:36', '2023-09-29 05:55:36'),
(2, 'Miss Jessyca McClure Sr.', 'rkrajcik@example.net', '2023-09-29 05:55:36', '$2y$10$Ekci/K8xipZViwU1XydexeWOR6mdQjRJ.cxUedvcED1gvVKALDT2a', 'cW5ql6GuZ4', '2023-09-29 05:55:36', '2023-09-29 05:55:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
