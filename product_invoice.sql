-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2023 at 06:36 PM
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
-- Database: `product_invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice_detail`
--

CREATE TABLE `invoice_detail` (
  `InvoiceDetail_Id` bigint(20) UNSIGNED NOT NULL,
  `Invoice_Id` int(11) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `Rate` decimal(8,2) NOT NULL,
  `Unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Qty` int(11) NOT NULL,
  `Disc_Percentage` decimal(5,2) NOT NULL,
  `NetAmount` decimal(10,2) NOT NULL,
  `TotalAmount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_master`
--

CREATE TABLE `invoice_master` (
  `Invoice_Id` bigint(20) UNSIGNED NOT NULL,
  `Invoice_no` int(11) NOT NULL,
  `Invoice_Date` date NOT NULL,
  `CustomerName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TotalAmount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_09_07_054358_create_product_masters_table', 1),
(5, '2023_09_07_054534_create_invoice_masters_table', 1),
(6, '2023_09_07_054550_create_invoice_details_table', 1);

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
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `Product_ID` bigint(20) UNSIGNED NOT NULL,
  `Product_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Rate` decimal(8,2) NOT NULL,
  `Unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`Product_ID`, `Product_Name`, `Rate`, `Unit`, `created_at`, `updated_at`) VALUES
(1, 'Product 1', '10.99', 'Pieces', NULL, NULL),
(2, 'Product 2', '26.65', 'Kilograms', NULL, NULL),
(3, 'Product 3', '90.58', 'Grams', NULL, NULL),
(4, 'Product 4', '68.87', 'Kilograms', NULL, NULL),
(5, 'Product 5', '59.33', 'Kilograms', NULL, NULL);

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
(1, 'Neva Purdy IV', 'bailee33@example.net', '2023-09-07 01:15:41', '$2y$10$EL3gB62UmofsxXXhKpUXuO5nW7ivwZJAKOw/FjT7a.ldB0OO.Jsm6', '7ZfTXJIIOLPmDYWS9WfME7Vb6rkbAl5IWYnLtKNy5TZLjBLZt1vQRFgkl4oZ', '2023-09-07 01:15:41', '2023-09-07 01:15:41'),
(2, 'Domingo Cruickshank', 'vschumm@example.com', '2023-09-07 01:15:41', '$2y$10$jD8Y31fCOUIeCkxoUcC6ne4o1yTJmx8sBwuMsbyA514oc/87i3V.e', 'kw91Lwdgx7', '2023-09-07 01:15:41', '2023-09-07 01:15:41'),
(3, 'Francesco Orn', 'alexandria36@example.net', '2023-09-07 01:16:55', '$2y$10$rXE9NFmxcGhZYftCgD1pfe.XtlU4rJPEzH1tSFLeYgKAHh/EPbZl6', '6q5SgXNDn8', '2023-09-07 01:16:55', '2023-09-07 01:16:55'),
(4, 'Prof. Amir Crooks', 'funk.kayli@example.com', '2023-09-07 01:16:55', '$2y$10$kmsvuz37LnaCqEdEYD5uLOTjopa5yzH8hT5R88G0bXfjN/FPwakt2', 'rbLu7qnwAm', '2023-09-07 01:16:55', '2023-09-07 01:16:55'),
(5, 'Destin Beier', 'carleton16@example.com', '2023-09-07 01:17:37', '$2y$10$24HzUkjbe.U2vvsZwGVC4.sDcsnW.2qGQSrc2sTe9zKYnyWy2kL5a', '4JzCgQcqf7', '2023-09-07 01:17:37', '2023-09-07 01:17:37'),
(6, 'Glenda Hettinger', 'dwehner@example.org', '2023-09-07 01:17:37', '$2y$10$Of/7hI1l6p3chGQzqeZagOe5A8Q8/ghLpXHhp5ay0izzenjG47oSC', 'D5VnYgVp1C', '2023-09-07 01:17:37', '2023-09-07 01:17:37'),
(7, 'Ora Bashirian', 'beatty.sofia@example.net', '2023-09-07 01:18:04', '$2y$10$xLIuENqcSDguxKYodFA3sOrh.mrrm2tSfSY47La.I/nOSl7Xr79sy', 'JyMJvFxyFO', '2023-09-07 01:18:05', '2023-09-07 01:18:05'),
(8, 'Emilio Wilkinson', 'zkeeling@example.com', '2023-09-07 01:18:05', '$2y$10$DKGo/09MHSjKuS.atZZLne.I31ev0kWwOmp1ZH8FxWbr/YsTKxInO', 'UF7F88vVny', '2023-09-07 01:18:05', '2023-09-07 01:18:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD PRIMARY KEY (`InvoiceDetail_Id`);

--
-- Indexes for table `invoice_master`
--
ALTER TABLE `invoice_master`
  ADD PRIMARY KEY (`Invoice_Id`);

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
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`Product_ID`);

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
-- AUTO_INCREMENT for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  MODIFY `InvoiceDetail_Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `invoice_master`
--
ALTER TABLE `invoice_master`
  MODIFY `Invoice_Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `Product_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
