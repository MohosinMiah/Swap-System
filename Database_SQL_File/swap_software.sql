-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 04:39 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swap_software`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `otp`, `email`, `password`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '01857126452', NULL, 'hamza1610330816@gmail.com', '202cb962ac59075b964b07152d234b70', 'Uttara, Dhaka', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `category_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(10, 11, 'Apple', '1620039009_mobile.jpg', NULL, NULL),
(11, 11, 'Sumsung', '1620039040_1620038979_smart_phone.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `cart_number`, `added_by`, `created_at`, `updated_at`) VALUES
(3, '44444444', NULL, NULL, NULL),
(4, '55555555', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(11, 'Smart Phone', '1620038979_smart_phone.jpg', NULL, NULL),
(12, 'Laptop', '1620039057_laptop.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `card_number` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2021_01_06_053142_create_customers_table', 1),
(11, '2021_01_06_053242_create_sellers_table', 1),
(12, '2021_01_06_093437_create_admins_table', 1),
(14, '2021_01_23_023817_create_carts_table', 2),
(15, '2021_04_23_055227_create_categories_table', 3),
(16, '2021_04_24_035312_create_brands_table', 4),
(17, '2021_04_27_040159_create_mobile_categories_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mobile_categories`
--

CREATE TABLE `mobile_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `mobile_model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram_rom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `camera` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `battery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prices` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specificationram_rom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specificationsim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specificationcamera` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specificationprocessor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specificationbattery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobile_categories`
--

INSERT INTO `mobile_categories` (`id`, `category_id`, `brand_id`, `mobile_model`, `image`, `ram_rom`, `sim`, `camera`, `processor`, `battery`, `prices`, `specificationram_rom`, `specificationsim`, `specificationcamera`, `specificationprocessor`, `specificationbattery`, `created_at`, `updated_at`) VALUES
(5, 11, 10, 'Apple iPhone XS Max', '1620039557_13.png', '4 GB | 512 GB,4 GB | 600 GB', 'Single', NULL, NULL, NULL, '20000,23000', 'rom', 'sim', 'Protext', 'A13 Bionic', 'Pottery', NULL, NULL),
(6, 11, 10, 'Samsung Galaxy A10s', '1620039900_49.png', '3GB | 32GB,2GB | 32GB', NULL, NULL, NULL, NULL, '20000,54555', 'rom', 'sim', 'Protex', 'B12 Nobinomix', 'Mottery', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `temporary_order_id` int(11) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `category_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 0,
  `delete_status` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `temporary_order_id`, `phone_number`, `category_type`, `created_at`, `status`, `delete_status`) VALUES
(1, 6, 40, '01857126452', 'mobile_category', '2021-05-15 13:34:49', 0, 0),
(2, 6, 41, '01857126452', 'mobile_category', '2021-05-15 14:04:42', 0, 0),
(3, 6, 44, '01857126452', 'mobile_category', '2021-05-15 14:19:39', 0, 0),
(4, 6, 46, '01857126452', 'mobile_category', '2021-05-16 05:56:21', 0, 0),
(5, 6, 59, '01857126452', 'mobile_category', '2021-05-16 10:49:49', 0, 0),
(6, 6, 60, '01857126452', 'mobile_category', '2021-05-16 10:52:19', 0, 0),
(7, 5, 61, '01857126452', 'mobile_category', '2021-05-16 12:32:04', 0, 0),
(8, 5, 62, '01857126452', 'mobile_category', '2021-05-16 12:41:40', 0, 0),
(9, 5, 63, '01857126452', 'mobile_category', '2021-05-16 14:32:57', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_mobile_categories`
--

CREATE TABLE `order_mobile_categories` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `ram_rom` varchar(255) DEFAULT NULL,
  `sim` varchar(255) DEFAULT NULL,
  `estimated_price` varchar(255) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `ex_emi_box_charger` varchar(256) DEFAULT NULL,
  `ex_phone_problem` varchar(256) DEFAULT NULL,
  `ex_parts_change` varchar(256) DEFAULT NULL,
  `ex_issue_network` varchar(256) DEFAULT NULL,
  `category_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_place_status` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_mobile_categories`
--

INSERT INTO `order_mobile_categories` (`id`, `product_id`, `category_id`, `brand_id`, `phone_number`, `ram_rom`, `sim`, `estimated_price`, `order_id`, `ex_emi_box_charger`, `ex_phone_problem`, `ex_parts_change`, `ex_issue_network`, `category_type`, `created_at`, `order_place_status`) VALUES
(1, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, NULL, '2021-05-12 16:30:38', 'no'),
(2, 5, 11, 10, '01857154874', '4 GB | 512 GB', 'Single', '20000', 1, NULL, NULL, NULL, NULL, NULL, '2021-05-15 08:18:58', 'no'),
(3, 5, 11, 10, '01857126452', '4 GB | 512 GB', 'Single', '20000', 1, NULL, NULL, NULL, NULL, NULL, '2021-05-15 08:29:00', 'no'),
(4, 5, 11, 10, '01857126452', '4 GB | 512 GB', 'Single', '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 08:38:25', 'no'),
(5, 5, 11, 10, '01857126452', '4 GB | 512 GB', 'Single', '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 08:39:22', 'no'),
(6, 5, 11, 10, '01857126452', '4 GB | 600 GB', 'Single', '23000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 08:52:42', 'no'),
(7, 5, 11, 10, '01857126452', '4 GB | 600 GB', 'Single', '23000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 08:54:59', 'no'),
(8, 5, 11, 10, '01857126452', '4 GB | 600 GB', 'Single', '23000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 08:55:08', 'no'),
(9, 6, 11, 10, '01857126452', '2GB | 32GB', NULL, '54555', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 08:57:24', 'no'),
(10, 5, 11, 10, '01857126452', '4 GB | 600 GB', 'Single', '23000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 08:59:26', 'no'),
(11, 5, 11, 10, '01857126452', '4 GB | 600 GB', 'Single', '23000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:18:47', 'no'),
(12, 5, 11, 10, '01857126452', '4 GB | 600 GB', 'Single', '23000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:19:09', 'no'),
(13, 5, 11, 10, '01857126452', '4 GB | 512 GB', 'Single', '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:24:07', 'no'),
(14, 5, 11, 10, '01857126452', '4 GB | 512 GB', 'Single', '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:24:25', 'no'),
(15, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:27:46', 'no'),
(16, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:31:27', 'no'),
(17, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:38:52', 'no'),
(18, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:39:53', 'no'),
(19, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:41:34', 'no'),
(20, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:42:37', 'no'),
(21, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:43:33', 'no'),
(22, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:43:58', 'no'),
(23, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:44:23', 'no'),
(24, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:47:50', 'no'),
(25, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:48:19', 'no'),
(26, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:50:52', 'no'),
(27, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:51:22', 'no'),
(28, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:51:58', 'no'),
(29, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:54:26', 'no'),
(30, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:55:35', 'no'),
(31, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:59:10', 'no'),
(32, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 09:59:49', 'no'),
(33, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 10:01:40', 'no'),
(34, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 10:01:51', 'no'),
(35, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 10:02:46', 'no'),
(36, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 10:04:08', 'no'),
(37, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 10:04:58', 'no'),
(38, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 10:05:12', 'no'),
(39, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 10:06:15', 'no'),
(40, 6, 11, 10, '01857126452', '2GB | 32GB', NULL, '54555', 1, 'Yes', 'Short Note 2', 'Short Note  3', 'Short Note  4', 'mobile_category', '2021-05-15 13:34:04', 'no'),
(41, 6, 11, 10, '01857126452', '2GB | 32GB', NULL, '54555', 2, 'Yes', NULL, NULL, NULL, 'mobile_category', '2021-05-15 13:38:06', 'no'),
(42, 6, 11, 10, '01857126452', '2GB | 32GB', NULL, '54555', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 14:08:28', 'no'),
(43, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 14:15:21', 'no'),
(44, 6, 11, 10, '01857126452', '2GB | 32GB', NULL, '54555', 3, 'Yes', 'Short Note 2', 'Short Note  3', 'Short Note  4', 'mobile_category', '2021-05-15 14:18:16', 'no'),
(45, 6, 11, 10, '01857126452', '2GB | 32GB', NULL, '54555', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-15 14:20:16', 'no'),
(46, 6, 11, 10, '01857126452', '2GB | 32GB', NULL, '54555', 4, 'Yes', 'Short Note 2', 'Short Note  3', 'Short Note  4', 'mobile_category', '2021-05-16 05:55:54', 'no'),
(47, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-16 05:56:46', 'no'),
(48, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-16 10:11:01', 'no'),
(49, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-16 10:15:28', 'no'),
(50, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-16 10:17:14', 'no'),
(51, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-16 10:17:47', 'no'),
(52, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-16 10:18:32', 'no'),
(53, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-16 10:20:37', 'no'),
(54, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-16 10:21:28', 'no'),
(55, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-16 10:24:21', 'no'),
(56, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-16 10:25:02', 'no'),
(57, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-16 10:25:21', 'no'),
(58, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 1, NULL, NULL, NULL, NULL, 'mobile', '2021-05-16 10:47:48', 'no'),
(59, 6, 11, 10, '01857126452', '3GB | 32GB', NULL, '20000', 5, 'Yes', 'Short Note 2', 'Short Note  3', 'Short Note  4', 'mobile_category', '2021-05-16 10:49:06', 'no'),
(60, 6, 11, 10, '01857126452', '2GB | 32GB', NULL, '54555', 6, 'Yes', NULL, NULL, NULL, 'mobile_category', '2021-05-16 10:50:32', 'no'),
(61, 5, 11, 10, '01857126452', '4 GB | 512 GB', 'Single', '20000', 7, 'Yes', 'Short Note 2', 'Short Note  3', NULL, 'mobile_category', '2021-05-16 12:31:30', 'no'),
(62, 5, 11, 10, '01857126452', '4 GB | 512 GB', 'Single', '20000', 8, 'Yes', 'Short Note 2', 'Short Note  3', 'Short Note  4', 'mobile_category', '2021-05-16 12:40:56', 'no'),
(63, 5, 11, 10, '01857126452', '4 GB | 512 GB', 'Single', '20000', 9, NULL, NULL, NULL, NULL, 'mobile_category', '2021-05-16 14:32:28', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `otp_varifiers`
--

CREATE TABLE `otp_varifiers` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `otp` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `name`, `area_code`, `phone`, `otp`, `email`, `password`, `address`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'Demoa2z', '1857', '126452', NULL, 'test@gmail.com', '202cb962ac59075b964b07152d234b70', 'House-39,Shataish', 1, '2021-01-17 04:03:10', '2021-01-20 19:31:05'),
(2, 'Demoa2z', '1857', '126451111', NULL, '01857126452@gmail.com', '202cb962ac59075b964b07152d234b70', 'House-39,Shataish', 1, '2021-01-18 12:39:59', NULL),
(3, 'Demoa2z 33', '1857', '01857126452', NULL, NULL, '698d51a19d8a121ce581499d7b701668', 'House-39,Shataish', 1, '2021-01-18 12:42:36', '2021-01-20 12:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `session_otp`
--

CREATE TABLE `session_otp` (
  `id` int(11) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `otp` int(11) NOT NULL,
  `temporary_order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session_otp`
--

INSERT INTO `session_otp` (`id`, `phone`, `otp`, `temporary_order_id`) VALUES
(1, '5', 3519, 6),
(2, '5', 7346, 7),
(3, '5', 3918, 8),
(4, '6', 9523, 9),
(5, '5', 9442, 10),
(6, '5', 5578, 11),
(7, '5', 9796, 12),
(8, '5', 2883, 13),
(9, '5', 4856, 14),
(10, '6', 2409, 15),
(11, '6', 2921, 16),
(12, '6', 7268, 17),
(13, '6', 8410, 18),
(14, '6', 3123, 19),
(15, '6', 9281, 20),
(16, '6', 1904, 21),
(17, '6', 9474, 22),
(18, '6', 4020, 23),
(19, '6', 5665, 24),
(20, '6', 6185, 25),
(21, '6', 3752, 26),
(22, '6', 3637, 27),
(23, '6', 3901, 28),
(24, '6', 1802, 29),
(25, '6', 4334, 30),
(26, '6', 2297, 31),
(27, '6', 1728, 32),
(28, '6', 7200, 33),
(29, '6', 2968, 34),
(30, '6', 4054, 35),
(31, '6', 1514, 36),
(32, '6', 2324, 37),
(33, '6', 1925, 38),
(34, '6', 2533, 39),
(35, '6', 4577, 40),
(36, '01857126452', 6264, 41),
(37, '01857126452', 8929, 42),
(38, '01857126452', 3316, 43),
(39, '01857126452', 7712, 44),
(40, '01857126452', 3235, 45),
(41, '01857126452', 8509, 46),
(42, '01857126452', 5683, 47),
(43, '01857126452', 5636, 48),
(44, '01857126452', 2601, 49),
(45, '01857126452', 3221, 50),
(46, '01857126452', 5915, 51),
(47, '01857126452', 9606, 52),
(48, '01857126452', 3420, 53),
(49, '01857126452', 7728, 54),
(50, '01857126452', 4805, 55),
(51, '01857126452', 7032, 56),
(52, '01857126452', 5609, 57),
(53, '01857126452', 1812, 58),
(54, '01857126452', 4850, 59),
(55, '01857126452', 7544, 60),
(56, '01857126452', 6373, 61),
(57, '01857126452', 6660, 62),
(58, '01857126452', 6678, 63);

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
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_categories`
--
ALTER TABLE `mobile_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_mobile_categories`
--
ALTER TABLE `order_mobile_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp_varifiers`
--
ALTER TABLE `otp_varifiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_otp`
--
ALTER TABLE `session_otp`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mobile_categories`
--
ALTER TABLE `mobile_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_mobile_categories`
--
ALTER TABLE `order_mobile_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `otp_varifiers`
--
ALTER TABLE `otp_varifiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `session_otp`
--
ALTER TABLE `session_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
