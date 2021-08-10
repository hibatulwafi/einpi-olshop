-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 06:32 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_olshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Buku', '2021-08-05 08:29:08', '2021-08-05 08:29:08'),
(2, 'Hoodie', '2021-08-05 08:29:08', '2021-08-05 08:29:08'),
(3, 'Kaos', '2021-08-05 08:29:08', '2021-08-05 08:29:08'),
(4, 'Food', '2021-08-05 08:29:08', '2021-08-05 08:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(4, '2020_08_17_073152_create_permission_tables', 1),
(5, '2020_08_18_062807_create_settings_table', 1),
(6, '2020_08_19_072946_create_produk_table', 1),
(7, '2020_08_19_073627_create_kategori_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(2, 'App\\User', 3),
(2, 'App\\User', 4),
(2, 'App\\User', 5),
(2, 'App\\User', 6);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `invoice` varchar(25) NOT NULL,
  `bukti_pembayaran` varchar(100) DEFAULT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `no_resi` varchar(100) DEFAULT NULL,
  `ongkir` varchar(100) NOT NULL,
  `subtotal` varchar(100) NOT NULL,
  `pesan` varchar(255) DEFAULT NULL,
  `status_order` int(1) NOT NULL DEFAULT 1,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `id_user`, `invoice`, `bukti_pembayaran`, `metode_pembayaran`, `no_hp`, `no_resi`, `ongkir`, `subtotal`, `pesan`, `status_order`, `alamat`, `created_at`) VALUES
(1, 2, 'INV/07082021-0001', NULL, 'Transfer', '+6285156323162', NULL, '12000', '198695', 'Terima Kasih, Ditunggu Verifikasinya', 5, 'Sukabumi', '2021-08-07 13:14:24'),
(2, 2, 'INV/07082021-0002', 'odqTVp38Zdov91N-610eaa4d9c75b.jpeg', 'Transfer', '+6285156323162', NULL, '12000', '99722', 'Terima Kasih', 2, 'Sukabumi', '2021-08-07 14:50:34'),
(3, 2, 'INV/07082021-0003', 'sS9868XrGAAAOMO-610eb7c1d39b9.png', 'Transfer', '+6285156323162', 'JNP00101299011', '12000', '283931', 'Halo', 3, 'Sukabumi', '2021-08-07 16:38:34'),
(4, 4, 'INV/09082021-0004', 'A2tvvCoHM7CcbYh-6110f7fd96eb7.png', 'Transfer', '+6285156323162', 'JP-162872163891', '12000', '229247', 'Ditunggu pengirimannya', 4, 'Jl Bhayangkara Gg Karya 1, RT 03, RW 09, Kecamatan Gunung Puyuh Kelurahan Gunung Puyuh, Kota Sukabumi 43123', '2021-08-09 09:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order_detail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `qty` varchar(5) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id_order_detail`, `id_order`, `id_produk`, `id_user`, `qty`, `harga`, `created_at`) VALUES
(6, 1, 1, 2, '2', '99000', '2021-08-07 13:14:24'),
(7, 2, 1, 2, '1', '99000', '2021-08-07 14:50:34'),
(8, 3, 1, 2, '2', '99000', '2021-08-07 16:38:34'),
(9, 3, 4, 2, '1', '85000', '2021-08-07 16:38:34'),
(10, 4, 5, 4, '2', '65000', '2021-08-09 09:39:35'),
(11, 4, 8, 4, '1', '99000', '2021-08-09 09:39:35');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manajemen users', 'web', '2021-08-05 08:29:08', '2021-08-05 08:29:08'),
(2, 'manajemen roles', 'web', '2021-08-05 08:29:08', '2021-08-05 08:29:08'),
(3, 'manajemen produk', 'web', '2021-08-05 08:29:08', '2021-08-05 08:29:08'),
(4, 'manajemen kategori', 'web', '2021-08-05 08:29:08', '2021-08-05 08:29:08'),
(5, 'manajemen transaksi', 'web', '2021-08-05 08:29:08', '2021-08-05 08:29:08'),
(6, 'manajemen pembelian', 'web', '2021-08-05 08:29:08', '2021-08-05 08:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `harga_beli`, `harga_jual`, `stok`, `kategori_id`, `gambar`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'A Gift From A Friend', 89000, 99000, 49, 1, 'a-gift-from-a-friend-61108b66d2c29.jpeg', 'Odit ea vitae deleniti sunt natus est. Non recusandae in quaerat quis. Praesentium tenetur impedit omnis quisquam qui minima. Veritatis ipsum ducimus neque ex debitis aut amet.', '2021-08-05 08:29:08', '2021-08-08 18:56:54'),
(2, 'Mimpi Sejuta Dollar', 80000, 89000, 21, 1, 'mimpi-sejuta-dollar-61108bc5ace98.jpeg', 'Perspiciatis ut explicabo qui molestiae. Minus rem ex adipisci. Ullam nesciunt optio quia eveniet. Fugit dolorem qui dolore minima culpa et.', '2021-08-05 08:29:08', '2021-08-08 18:58:29'),
(3, 'I\'m Possible', 50000, 59000, 26, 1, 'im-possible-6111c55f4d9d9.jpeg', 'Quasi et consequuntur aspernatur ullam aut magnam. Harum quas aut et consectetur qui aliquid. Est est consequatur vitae quis laudantium exercitationem.', '2021-08-05 08:29:08', '2021-08-09 17:16:31'),
(4, 'Hello Goodbye', 79000, 85000, 40, 1, 'hello-goodbye-6111c583832a6.jpeg', 'Sit quas incidunt necessitatibus ex assumenda dignissimos. Consequuntur cum voluptas repellat doloremque et. Voluptas autem fugiat minus enim qui explicabo.', '2021-08-05 08:29:08', '2021-08-09 17:17:07'),
(5, 'And I Say Its All Right', 52000, 65000, 42, 1, 'and-i-say-its-all-right-6111c625cc5d3.jpeg', 'Iusto dolore consequatur occaecati neque et sed. Est dignissimos esse recusandae id corporis incidunt non. Officiis quidem dolor veniam quo quibusdam maiores sint. Magnam eos hic veritatis.', '2021-08-05 08:29:08', '2021-08-09 17:19:49'),
(6, 'Sunny Days', 81000, 92000, 43, 1, 'sunny-days-6111c6a80bcde.jpeg', 'Aut atque nulla voluptates autem. Qui non non libero voluptatem. Mollitia qui beatae atque omnis est iusto facilis. Magnam ut sit ut quis temporibus.', '2021-08-05 08:29:08', '2021-08-09 17:22:00'),
(7, 'Wandering', 84000, 96000, 17, 1, 'wandering-6111c70c51b86.jpeg', 'Adipisci quia atque aut perferendis illum in molestias. Dolorem sit occaecati accusantium eligendi inventore ullam sed. Dolore nam quidem consequuntur.', '2021-08-05 08:29:08', '2021-08-09 17:23:40'),
(8, 'Nihonggo Mantappu', 85000, 99000, 49, 1, 'nihonggo-mantappu-6111c739c6793.jpeg', 'Ad cum necessitatibus sit reiciendis consequatur repudiandae neque nulla. Eveniet quo omnis fugiat nemo. Cupiditate aliquid perferendis a eum et. Cumque tempore unde culpa ut cum culpa.', '2021-08-05 08:29:08', '2021-08-09 17:24:25'),
(9, 'Confession', 89000, 98000, 2, 1, 'confession-6111c75e05799.jpeg', 'Asperiores minima illum atque dicta adipisci exercitationem et. Qui qui consequatur velit rerum eum alias. Unde facilis delectus placeat voluptates qui ea libero.', '2021-08-05 08:29:08', '2021-08-09 17:25:02'),
(10, 'Absolute Justice', 58000, 62000, 30, 1, 'absolute-justice-6111c783d7910.jpeg', 'Quia inventore voluptatibus facere ut et. Quia repellendus molestiae qui sit impedit ut id eveniet. Id sequi velit quis voluptatibus quod blanditiis reiciendis.', '2021-08-05 08:29:08', '2021-08-09 17:25:39'),
(41, 'Hoodie Im Possible - Merry Riana', 250000, 260000, 25, 2, 'hoodie-im-possible-full-colour-merry-riana-6111c8498b80a.jpeg', 'Sudah menggunakan bahan Fleece, tidak terlalu tebal dan juga tidak terlalu tipis sehingga sangat cocok dan nyaman digunakan di iklim tropis Indonesia.', '2021-08-09 17:28:57', '2021-08-09 17:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-08-05 08:29:08', '2021-08-05 08:29:08'),
(2, 'customer', 'web', '2021-08-05 08:29:08', '2021-08-05 08:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_right` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_left` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `favicon`, `logo`, `app_name`, `footer_right`, `footer_left`, `created_at`, `updated_at`) VALUES
(1, 'favicon_default.ico', 'einpi.png', 'Einpi', 'Ver 1.0', 'Einpi Build with Laravel 7 & Admin LTE 3', '2021-08-05 08:29:09', '2021-08-06 19:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Sukabumi',
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `status`, `phone`, `alamat`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hibatul Wafi', 'admin@admin.com', 1, NULL, 'Sukabumi', 'admin', NULL, '$2y$10$DF3qttvA71N87MAb0skpp.sTYtC16AEHKajsaEVlhrMX29z46Psz6', NULL, '2021-08-05 08:29:09', '2021-08-05 08:29:09'),
(2, 'User 1', 'user1@example.com', 1, NULL, 'Sukabumi', 'customer', NULL, '$2y$10$iny2WWJPHsEbaH4x01od0eIL1weQ85UHOEz9D7Kbw9kWrQjGiIWsq', NULL, '2021-08-05 08:29:09', '2021-08-05 08:29:09'),
(3, 'User 2', 'user2@example.com', 1, NULL, 'Sukabumi', 'customer', NULL, '$2y$10$zZVM8eFFZwAFzYzSufRTpeEO2SEaXa8V0dGiEcXECUaen5ml.uGGi', NULL, '2021-08-05 08:29:09', '2021-08-05 08:29:09'),
(4, 'Hibatul Wafi', 'wavy285@gmail.com', 1, NULL, 'Sukabumi', 'customer', NULL, '$2y$10$ylG.jRnCB9UWpL.kjWx7PuYVI.xjOOcBKlKaPwPlE1IFrkmmTCWfK', NULL, '2021-08-06 10:00:42', '2021-08-06 10:00:42'),
(5, 'Rizky San Wijaya', 'rizkysan@gmail.com', 1, '+6285621140091', 'Sukabumi', 'customer', NULL, '$2y$10$QP.FYWn5SwzK0XutlhMsF.Vlj/Hr1i5ADkCi270VMFSzZy0eCBGTq', NULL, '2021-08-09 20:27:05', '2021-08-09 20:37:27'),
(6, 'Hauzan Rafid', 'hauzan@gmail.com', 1, '+6285621140091', 'jl bhayangkara sukabumi', 'customer', NULL, '$2y$10$mvHwZjYi9FUD8acBR8wnPec40D3vLKw/6JIx4HPcUolNSSJzy6hVC', NULL, '2021-08-09 20:29:31', '2021-08-09 20:29:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_order_detail`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_order_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
