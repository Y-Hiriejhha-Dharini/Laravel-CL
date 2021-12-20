-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 04:47 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cl_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Distributor 1', 'active', NULL, NULL),
(2, 'Distributor 2', 'active', NULL, NULL),
(3, 'Distributor 3', 'active', NULL, NULL);

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
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(14, '2021_12_17_045711_create_zones_table', 1),
(15, '2021_12_17_045909_create_products_table', 1),
(16, '2021_12_17_045934_create_regions_table', 1),
(17, '2021_12_17_045958_create_terriotories_table', 1),
(21, '2021_12_18_181520_create_distributors_table', 4),
(22, '2014_10_12_000000_create_users_table', 5),
(23, '2021_12_18_094613_create_purchase_order_products_table', 6),
(24, '2021_12_17_050049_create_purchase_orders_table', 7);

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
  `skuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skucode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skuname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mrp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distributorprice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weightvolumn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `skuid`, `skucode`, `skuname`, `mrp`, `distributorprice`, `weightvolumn`, `uom`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SKU00001', 'SKU_00001', 'Product 01', '10', '100.00', '3', 'Kg', 'active', NULL, NULL),
(5, 'STR00002', 'SKU_00005', 'Product 05', '30', '50.00', '5', 'm', 'active', '2021-12-18 02:41:01', '2021-12-18 02:41:01');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `territory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distributor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `ponumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `zone`, `region`, `territory`, `distributor`, `date`, `time`, `ponumber`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'Z00001', 'R00001', 'T00001', 'T00002', '2021-12-20', '02:11:25', 'PO00001', 'Test 1', '2021-12-19 20:41:25', '2021-12-19 20:41:25'),
(2, 'Z00001', 'R00002', 'T00001', 'T00002', '2021-12-20', '02:12:18', 'PO00002', 'Test 1', '2021-12-19 20:42:18', '2021-12-19 20:42:18'),
(3, 'Z00001', 'R00002', 'T00001', 'T00002', '2021-12-20', '02:17:52', 'PO00003', 'Test 1', '2021-12-19 20:47:52', '2021-12-19 20:47:52'),
(4, 'Z00001', 'R00001', 'T00001', 'T00002', '2021-12-20', '02:20:24', 'PO00004', 'Test 1', '2021-12-19 20:50:24', '2021-12-19 20:50:24'),
(5, 'Z00001', 'R00001', 'T00001', 'T00002', '2021-12-20', '02:31:13', 'PO00005', 'Test 1', '2021-12-19 21:01:13', '2021-12-19 21:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_products`
--

CREATE TABLE `purchase_order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skucode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skuname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitprice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avbqty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enterqty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `units` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalprice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalamount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_order_products`
--

INSERT INTO `purchase_order_products` (`id`, `poid`, `skucode`, `skuname`, `unitprice`, `avbqty`, `enterqty`, `units`, `totalprice`, `totalamount`, `created_at`, `updated_at`) VALUES
(1, '1', 'SKU_00004', 'Product 04', '10', '100', '10', '90', '1000', '1000.00', '2021-12-19 20:41:25', '2021-12-19 20:41:25'),
(2, '2', 'SKU_00004', 'Product 04', '10', '100', '10', '90', '1000', '1000.00', '2021-12-19 20:42:18', '2021-12-19 20:42:18'),
(3, '3', 'SKU_00004', 'Product 04', '10', '100', '10', '90', '1000', '1000.00', '2021-12-19 20:47:52', '2021-12-19 20:47:52'),
(4, '4', 'SKU_00005', 'Product 04', '10', '100', '10', '90', '1000', '1000.00', '2021-12-19 20:50:24', '2021-12-19 20:50:24'),
(5, '5', 'SKU_00005', 'Product 04', '10', '100', '10', '90', '1000', '1000.00', '2021-12-19 21:01:13', '2021-12-19 21:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zonecode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regioncode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regionname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `zonecode`, `regioncode`, `regionname`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Z00001', 'R00001', 'REGION 1', 'active', NULL, '2021-12-17 20:52:21'),
(2, 'Z00002', 'R00002', 'REGION 2', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `terriotories`
--

CREATE TABLE `terriotories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zonecode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regioncode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `territorycode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `territoryname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terriotories`
--

INSERT INTO `terriotories` (`id`, `zonecode`, `regioncode`, `territorycode`, `territoryname`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Z00001', 'R00001', 'T00001', 'TERRITORY 1', 'active', NULL, NULL),
(2, 'Z00002', 'R00002', 'T00002', 'TERRITORY 2', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `territorycode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user','distributor') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nic`, `address`, `mobile`, `email`, `gender`, `territorycode`, `username`, `password`, `role`, `status`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '875489654V', 'Colombo', '0117895478', 'admin@test.com', 'female', 'T00001', 'Admin 01', '$2y$10$CA8R0QNWNifxOKvXs3tUQuqGmaCYsH21GMTf5jJqTLyddbmARaoSG', 'admin', 'active', NULL, NULL, NULL, '2021-12-19 19:48:18'),
(2, 'User 1', '897458125V', 'Kandy', '0779854126', 'user1@test.com', 'male', 'T00002', 'User 01', '$2y$10$HvzKEdVxxziFBj/MfEw7YegDbtjEZlQ4XpnQnnjFEMXeigyysj2wO', 'user', 'active', NULL, NULL, NULL, NULL),
(3, 'Distributor 1', '207845879V', 'Badulla', '0768974581', 'distributor1@test.com', 'male', 'T00003', 'Distributor 01', '$2y$10$aGzUNX.hN754SxLbTyqQwuZTXOcrVSn17f9Zwi8J/StFD5TeS0BxS', 'distributor', 'active', NULL, NULL, NULL, NULL),
(4, 'Admin 2', '855489654V', 'Galle', '0787895478', 'admin2@test.com', 'male', 'T00002', 'Admin 02', '$2y$10$LIpTIhvIQfLF5DdD0NnmbexBlfUT8DJso/AsI5nhLhYIjZDGYl5U2', 'admin', 'active', NULL, NULL, NULL, NULL),
(5, 'User 2', '887458125V', 'Rathnapura', '0779854126', 'user2@test.com', 'female', 'T00001', 'User 02', '$2y$10$lGaVGWv7sfAB/LgqztqnAODY912bUB7UMqIWUxeHizlgjCy9W5qu.', 'user', 'active', NULL, NULL, NULL, NULL),
(6, 'Distributor 2', '227845879V', 'Bandarawela', '07768974581', 'distributor2@test.com', 'female', 'T00001', 'Distributor 02', '$2y$10$5eQmoXiE5eh6JfczlwcaG.Kawwfvwh1I3KpQfbELRS/uo55CuWjg2', 'distributor', 'active', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zonecode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zoneldesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zonesdesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `zonecode`, `zoneldesc`, `zonesdesc`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Z00001', 'ZONE 1', 'Z01', 'active', NULL, NULL),
(5, 'Z00005', 'ZONE 5', 'Z05', 'inactive', '2021-12-17 01:24:36', '2021-12-17 01:24:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_products`
--
ALTER TABLE `purchase_order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terriotories`
--
ALTER TABLE `terriotories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase_order_products`
--
ALTER TABLE `purchase_order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `terriotories`
--
ALTER TABLE `terriotories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
