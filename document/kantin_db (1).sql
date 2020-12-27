-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2020 at 04:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kantin_db`
--

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2020_12_12_103348_create_table_user', 1),
(3, '2020_12_12_125453_create_table_tenant', 1),
(4, '2020_12_12_125529_create_table_stan_active', 1),
(5, '2020_12_12_125601_create_table_open_hours', 1),
(6, '2020_12_12_125709_create_table_withdraw_stand', 1),
(7, '2020_12_12_125754_create_table_help', 1),
(8, '2020_12_12_125818_create_table_suggestion', 1),
(9, '2020_12_12_125835_create_table_stand', 1),
(10, '2020_12_12_125908_create_table_history_rent', 1),
(11, '2020_12_12_125936_create_table_photo_stand', 1),
(12, '2020_12_12_125959_create_table_transaction', 1),
(13, '2020_12_12_130016_create_table_rating', 1),
(14, '2020_12_12_130048_create_table_admin', 1),
(15, '2020_12_12_130108_create_table_articles', 1),
(16, '2020_12_12_130133_create_table_products', 1),
(17, '2020_12_12_130210_create_table_topup_request', 1),
(18, '2020_12_12_130238_create_table_topup_confirmation', 1),
(19, '2020_12_12_130337_create_table_broadcast', 1),
(20, '2020_12_12_130358_create_table_report', 1);

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
-- Table structure for table `table_admin`
--

CREATE TABLE `table_admin` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `admin_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_admin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_admin`
--

INSERT INTO `table_admin` (`admin_id`, `admin_name`, `username_admin`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Indra Rahdian', '082165174835', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'indra.rahdian@gmail.com', '2020-12-24 15:27:22', '2020-12-24 15:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `table_articles`
--

CREATE TABLE `table_articles` (
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `article_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_article` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `article_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_articles`
--

INSERT INTO `table_articles` (`article_id`, `article_title`, `description`, `photo_article`, `article_status`, `created_at`, `updated_at`) VALUES
(1, 'test', '<p>test</p>', '5fe19d5b259d3.png', 1, '2020-12-22 07:16:43', '2020-12-22 07:16:43'),
(2, 'test', '<p>test</p>', NULL, 1, '2020-12-22 07:19:20', '2020-12-22 07:19:20'),
(3, 'test', '<p>tese</p>', NULL, 1, '2020-12-22 07:19:28', '2020-12-22 07:19:28'),
(4, 'test', '<p>testse</p>', NULL, 1, '2020-12-22 07:19:35', '2020-12-22 07:19:35'),
(5, 'test', '<p>test</p>', NULL, 1, '2020-12-22 07:19:42', '2020-12-22 07:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `table_broadcast`
--

CREATE TABLE `table_broadcast` (
  `broadcast_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `stand_id_active` int(11) DEFAULT NULL,
  `broadcast_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `broadcast_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `broadcast_deeplink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `broadcast_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_broadcast`
--

INSERT INTO `table_broadcast` (`broadcast_id`, `product_id`, `stand_id_active`, `broadcast_title`, `broadcast_description`, `broadcast_deeplink`, `broadcast_status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'test', '<p>test</p>', '5fe19e8db7bdb.png', 1, '2020-12-22 07:16:22', '2020-12-22 07:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `table_help`
--

CREATE TABLE `table_help` (
  `help_id` bigint(20) UNSIGNED NOT NULL,
  `help_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `help_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_history_rent`
--

CREATE TABLE `table_history_rent` (
  `history_id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `stand_id_active` int(11) NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_stand` smallint(6) NOT NULL,
  `rent_id` int(11) NOT NULL,
  `photo_stand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stand_category` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_profile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenant_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_inboxs`
--

CREATE TABLE `table_inboxs` (
  `inbox_id` bigint(20) UNSIGNED NOT NULL,
  `inbox_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inbox_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_inboxs`
--

INSERT INTO `table_inboxs` (`inbox_id`, `inbox_title`, `description`, `inbox_name`, `created_at`, `updated_at`) VALUES
(1, 'Kipas Angin terlalu sedikit', 'Kipas Angin terlalu sedikit', 'indra rahdian', '2020-12-22 07:16:43', '2020-12-22 07:16:43'),
(2, 'test', '<p>test</p>', 'aragon ', '2020-12-22 07:19:20', '2020-12-22 07:19:20'),
(3, 'test', '<p>tese</p>', 'arwen the elf', '2020-12-22 07:19:28', '2020-12-22 07:19:28'),
(4, 'test', '<p>testse</p>', 'boromir from gondor', '2020-12-22 07:19:35', '2020-12-22 07:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `table_open_hours_stand`
--

CREATE TABLE `table_open_hours_stand` (
  `open_time_id` bigint(20) UNSIGNED NOT NULL,
  `stand_id_active` int(11) NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `status_open` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_open_hours_stand`
--

INSERT INTO `table_open_hours_stand` (`open_time_id`, `stand_id_active`, `open_time`, `close_time`, `status_open`, `created_at`, `updated_at`) VALUES
(4, 4, '08:00:00', '09:00:00', 1, '2020-12-20 23:09:29', '2020-12-20 23:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `table_order_detail`
--

CREATE TABLE `table_order_detail` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` double NOT NULL,
  `discount` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_order_detail`
--

INSERT INTO `table_order_detail` (`id`, `transaction_id`, `product_id`, `product_name`, `qty`, `harga`, `discount`, `total`, `created_at`) VALUES
(1, 1, 1, 'Nasi Goreng ', 2, 15000, 0, 30000, '2020-12-21 07:35:32'),
(2, 1, 2, 'Jus Pokat Spesial', 2, 100000, 0, 200000, '2020-12-21 07:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `table_photo_stand`
--

CREATE TABLE `table_photo_stand` (
  `photo_id` bigint(20) UNSIGNED NOT NULL,
  `stand_id_active` int(11) NOT NULL,
  `photo_stand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_photo_stand`
--

INSERT INTO `table_photo_stand` (`photo_id`, `stand_id_active`, `photo_stand`, `created_at`, `updated_at`) VALUES
(4, 4, '5fdfdc26cd9c4.png', '2020-12-20 23:09:58', '2020-12-20 23:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `table_products`
--

CREATE TABLE `table_products` (
  `product_id` int(11) NOT NULL,
  `stand_id_active` int(11) NOT NULL,
  `stand_category` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double NOT NULL,
  `product_discount` double NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_products`
--

INSERT INTO `table_products` (`product_id`, `stand_id_active`, `stand_category`, `product_name`, `product_price`, `product_discount`, `product_image`, `product_description`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 4, 'Food', 'Nasi Goreng', 17800, 0, '', 'Nasi Goreng Spesial Bumbu India', 1, '2020-12-20 23:13:49', '2020-12-20 23:13:49'),
(2, 4, 'Drink', 'Jus Pokat Spesial', 50000, 0, '', 'Jus Pokat Spesial Madu', 1, '2020-12-20 23:14:49', '2020-12-20 23:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `table_rating`
--

CREATE TABLE `table_rating` (
  `raing_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stand_id_active` int(11) NOT NULL,
  `rating_stars_product` int(11) NOT NULL,
  `rating_stars_stand` int(11) NOT NULL,
  `comment_for_rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_report`
--

CREATE TABLE `table_report` (
  `report_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `stand_id_active` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `total_transaction` double NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_time` datetime NOT NULL,
  `number_stand` smallint(6) NOT NULL,
  `total_sales` int(11) NOT NULL,
  `report_start_date` datetime NOT NULL,
  `report_end_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_stand`
--

CREATE TABLE `table_stand` (
  `stand_id` bigint(20) UNSIGNED NOT NULL,
  `number_stand` smallint(6) NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_stand_avail` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_stand`
--

INSERT INTO `table_stand` (`stand_id`, `number_stand`, `category`, `status_stand_avail`, `created_at`, `updated_at`) VALUES
(3, 12, 'Food', 0, '2020-12-18 11:12:30', '2020-12-18 11:12:30'),
(4, 13, 'Food', 0, '2020-12-18 13:19:49', '2020-12-18 13:19:49'),
(5, 14, 'Drink', 0, '2020-12-18 13:20:22', '2020-12-18 13:20:22'),
(6, 15, 'Drink', 0, '2020-12-18 13:21:08', '2020-12-18 13:21:08'),
(7, 20, 'Drink', 0, '2020-12-18 13:22:07', '2020-12-18 13:22:07'),
(8, 78, 'Food', 0, '2020-12-20 07:32:16', '2020-12-20 07:32:16'),
(9, 123, 'Food', 0, '2020-12-22 02:46:33', '2020-12-22 02:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `table_stand_active`
--

CREATE TABLE `table_stand_active` (
  `stan_id_active` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `stand_id` int(11) NOT NULL,
  `number_stan` int(11) NOT NULL,
  `name_profile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `money_stan` double NOT NULL,
  `stan_category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_open` int(11) NOT NULL,
  `status_active` int(11) NOT NULL,
  `tenant_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_stand_active`
--

INSERT INTO `table_stand_active` (`stan_id_active`, `tenant_id`, `stand_id`, `number_stan`, `name_profile`, `money_stan`, `stan_category`, `status_open`, `status_active`, `tenant_date`, `created_at`, `updated_at`) VALUES
(4, 2, 1, 103, '', 0, 'Food', 1, 1, '2020-12-21 00:00:00', '2020-12-20 23:08:33', '2020-12-20 23:08:33'),
(5, 1, 1, 105, '-', 0, 'Food', 1, 1, '2020-12-25 21:46:27', '2020-12-25 14:46:27', '2020-12-25 14:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `table_suggestion`
--

CREATE TABLE `table_suggestion` (
  `suggest_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_tenant`
--

CREATE TABLE `table_tenant` (
  `tenant_id` int(11) NOT NULL,
  `password` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_tenant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent_id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_profile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_npwp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_payment_confirm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stan_category` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent_status` int(11) NOT NULL,
  `rental_date_start` datetime NOT NULL,
  `rental_date_end` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_tenant`
--

INSERT INTO `table_tenant` (`tenant_id`, `password`, `phone`, `avatar_tenant`, `rent_id`, `email`, `name_profile`, `photo_ktp`, `address`, `photo_npwp`, `photo_payment_confirm`, `stan_category`, `rent_status`, `rental_date_start`, `rental_date_end`, `created_at`, `updated_at`) VALUES
(1, '1234', '081190908765', '', 1, 'jamilah@mail.com', 'Mulan Jamila', '5fe16c4fda49e.png', 'Jl. Pandu No 46 Medan', '5fe16c4fda49e.png', '5fdfdc26cd9c4.png', 'food', 0, '2020-12-18 17:39:59', '2020-12-31 17:39:59', '2020-12-18 10:39:59', '2020-12-18 10:39:59'),
(2, '1234', '081190908765', '', 2, 'adi_hidayat@mail.com', 'Adi Hidayat', '5fe16c6f0b344.png', 'Jl. Surabaya No.13 Medan', '5fe16c6f0b344.png', '5fdfdc26cd9c4.png', 'Drink', 1, '2020-12-04 00:00:00', '2020-12-31 00:00:00', '2020-12-18 11:21:57', '2020-12-18 11:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `table_topup_confirmation`
--

CREATE TABLE `table_topup_confirmation` (
  `topup_id` bigint(20) UNSIGNED NOT NULL,
  `submit_date` datetime NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmation_topup_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `update_note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_topup_confirmation`
--

INSERT INTO `table_topup_confirmation` (`topup_id`, `submit_date`, `bank_name`, `account_name`, `account_number`, `confirmation_topup_photo`, `status`, `update_note`, `created_at`, `updated_at`) VALUES
(1, '2020-12-24 08:42:08', 'BRI', 'Indra Rahdian', '93193913918800', '5fdfdc26cd9c4.png', 0, 'Top Up', '2020-12-24 01:41:18', '2020-12-24 01:41:18'),
(2, '2020-12-24 13:16:43', 'CIMB NIAGA', 'Sofyan Ardian', '1039191310103', '-', 1, 'Topup Berhasil', '2020-12-24 06:16:43', '2020-12-24 06:16:43'),
(3, '2020-12-25 13:48:34', 'CIMB NIAGA', 'Sofyan Ardian', '102129991291921', '', 1, 'test', '2020-12-25 06:48:34', '2020-12-24 06:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `table_topup_request`
--

CREATE TABLE `table_topup_request` (
  `topup_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `status_topup` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_topup_request`
--

INSERT INTO `table_topup_request` (`topup_id`, `user_id`, `total_amount`, `status_topup`, `created_at`, `updated_at`) VALUES
(1, 12322347, 75000, 1, '2020-12-24 01:40:39', '2020-12-23 17:00:00'),
(2, 111, 45000, 0, '2020-12-24 06:16:18', '2020-12-24 06:16:18'),
(3, 111, 54000, 1, '2020-12-25 06:48:02', '2020-12-25 06:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `table_transaction`
--

CREATE TABLE `table_transaction` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stand_id_active` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_number` smallint(6) NOT NULL,
  `total_transaction` double NOT NULL,
  `discount` double NOT NULL,
  `order_notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_time` datetime NOT NULL,
  `payment_method` tinyint(4) NOT NULL,
  `order_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_transaction`
--

INSERT INTO `table_transaction` (`transaction_id`, `user_id`, `stand_id_active`, `product_id`, `customer_name`, `table_number`, `total_transaction`, `discount`, `order_notes`, `order_time`, `payment_method`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 12322347, 4, 1, 'Indra Rahdian', 1, 230000, 0, 'Tidak Pedas', '2020-12-21 13:29:12', 1, 1, '2020-12-21 06:29:12', '2020-12-21 06:29:12'),
(2, 111, 5, 1, 'Robi ', 3, 0, 0, 'tidak pakai saos', '2020-12-25 21:47:14', 2, 1, '2020-12-25 14:47:14', '2020-12-25 14:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emoney` double NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `phone`, `avatar_user`, `emoney`, `status`, `created_at`, `updated_at`) VALUES
(111, 'Sofyan', 'Andrian', 'sofyan.andrian@mail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '081234344321', '-', 0, 0, '2020-12-24 06:15:16', '2020-12-24 06:15:16'),
(12322347, 'Indra', 'Rahdian', 'indra@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '082165174835', NULL, 0, 1, '2020-12-17 22:48:58', '2020-12-18 13:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `table_withdraw_stand`
--

CREATE TABLE `table_withdraw_stand` (
  `withdrawal_id` bigint(20) UNSIGNED NOT NULL,
  `stand_id_active` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `money_stand` double NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_withdrawal` double NOT NULL,
  `withdrawal_date` datetime NOT NULL,
  `withdrawal_status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `table_admin`
--
ALTER TABLE `table_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `table_articles`
--
ALTER TABLE `table_articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `table_broadcast`
--
ALTER TABLE `table_broadcast`
  ADD PRIMARY KEY (`broadcast_id`);

--
-- Indexes for table `table_help`
--
ALTER TABLE `table_help`
  ADD PRIMARY KEY (`help_id`);

--
-- Indexes for table `table_history_rent`
--
ALTER TABLE `table_history_rent`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `table_inboxs`
--
ALTER TABLE `table_inboxs`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indexes for table `table_open_hours_stand`
--
ALTER TABLE `table_open_hours_stand`
  ADD PRIMARY KEY (`open_time_id`),
  ADD KEY `stand_id_active` (`stand_id_active`);

--
-- Indexes for table `table_order_detail`
--
ALTER TABLE `table_order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `table_photo_stand`
--
ALTER TABLE `table_photo_stand`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `stand_id_active` (`stand_id_active`);

--
-- Indexes for table `table_products`
--
ALTER TABLE `table_products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `stand_id_active` (`stand_id_active`);

--
-- Indexes for table `table_rating`
--
ALTER TABLE `table_rating`
  ADD PRIMARY KEY (`raing_id`);

--
-- Indexes for table `table_report`
--
ALTER TABLE `table_report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `table_stand`
--
ALTER TABLE `table_stand`
  ADD PRIMARY KEY (`stand_id`);

--
-- Indexes for table `table_stand_active`
--
ALTER TABLE `table_stand_active`
  ADD PRIMARY KEY (`stan_id_active`),
  ADD KEY `tenant_id` (`tenant_id`);

--
-- Indexes for table `table_suggestion`
--
ALTER TABLE `table_suggestion`
  ADD PRIMARY KEY (`suggest_id`);

--
-- Indexes for table `table_tenant`
--
ALTER TABLE `table_tenant`
  ADD PRIMARY KEY (`tenant_id`);

--
-- Indexes for table `table_topup_confirmation`
--
ALTER TABLE `table_topup_confirmation`
  ADD PRIMARY KEY (`topup_id`);

--
-- Indexes for table `table_topup_request`
--
ALTER TABLE `table_topup_request`
  ADD PRIMARY KEY (`topup_id`);

--
-- Indexes for table `table_transaction`
--
ALTER TABLE `table_transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `stand_id_active` (`stand_id_active`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `table_withdraw_stand`
--
ALTER TABLE `table_withdraw_stand`
  ADD PRIMARY KEY (`withdrawal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `table_admin`
--
ALTER TABLE `table_admin`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_articles`
--
ALTER TABLE `table_articles`
  MODIFY `article_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table_broadcast`
--
ALTER TABLE `table_broadcast`
  MODIFY `broadcast_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_help`
--
ALTER TABLE `table_help`
  MODIFY `help_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_history_rent`
--
ALTER TABLE `table_history_rent`
  MODIFY `history_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_inboxs`
--
ALTER TABLE `table_inboxs`
  MODIFY `inbox_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table_open_hours_stand`
--
ALTER TABLE `table_open_hours_stand`
  MODIFY `open_time_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_order_detail`
--
ALTER TABLE `table_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_photo_stand`
--
ALTER TABLE `table_photo_stand`
  MODIFY `photo_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_products`
--
ALTER TABLE `table_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_rating`
--
ALTER TABLE `table_rating`
  MODIFY `raing_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_report`
--
ALTER TABLE `table_report`
  MODIFY `report_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_stand`
--
ALTER TABLE `table_stand`
  MODIFY `stand_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `table_stand_active`
--
ALTER TABLE `table_stand_active`
  MODIFY `stan_id_active` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table_suggestion`
--
ALTER TABLE `table_suggestion`
  MODIFY `suggest_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_tenant`
--
ALTER TABLE `table_tenant`
  MODIFY `tenant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_topup_confirmation`
--
ALTER TABLE `table_topup_confirmation`
  MODIFY `topup_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_topup_request`
--
ALTER TABLE `table_topup_request`
  MODIFY `topup_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_transaction`
--
ALTER TABLE `table_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_user`
--
ALTER TABLE `table_user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12322348;

--
-- AUTO_INCREMENT for table `table_withdraw_stand`
--
ALTER TABLE `table_withdraw_stand`
  MODIFY `withdrawal_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_open_hours_stand`
--
ALTER TABLE `table_open_hours_stand`
  ADD CONSTRAINT `table_open_hours_stand_ibfk_1` FOREIGN KEY (`stand_id_active`) REFERENCES `table_stand_active` (`stan_id_active`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_order_detail`
--
ALTER TABLE `table_order_detail`
  ADD CONSTRAINT `table_order_detail_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `table_transaction` (`transaction_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `table_products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_photo_stand`
--
ALTER TABLE `table_photo_stand`
  ADD CONSTRAINT `table_photo_stand_ibfk_1` FOREIGN KEY (`stand_id_active`) REFERENCES `table_stand_active` (`stan_id_active`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_products`
--
ALTER TABLE `table_products`
  ADD CONSTRAINT `table_products_ibfk_1` FOREIGN KEY (`stand_id_active`) REFERENCES `table_stand_active` (`stan_id_active`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_stand_active`
--
ALTER TABLE `table_stand_active`
  ADD CONSTRAINT `table_stand_active_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `table_tenant` (`tenant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_transaction`
--
ALTER TABLE `table_transaction`
  ADD CONSTRAINT `table_transaction_ibfk_1` FOREIGN KEY (`stand_id_active`) REFERENCES `table_stand_active` (`stan_id_active`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_transaction_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `table_products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
