-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 19, 2016 at 11:23 AM
-- Server version: 5.7.16
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haber_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `organisation_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_panel`
--

CREATE TABLE `menu_panel` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `menu_type` enum('ROOT','MODU','MENU','SUBM') COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `parent_menu_id` int(10) UNSIGNED DEFAULT NULL,
  `icon_code` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_order` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_roles_table', 1),
(2, '2014_10_12_000001_create_users_table', 1),
(3, '2014_10_12_100002_create_password_resets_table', 1),
(4, '2014_10_12_100003_create_permissions_table', 1),
(5, '2014_10_12_100004_create_roles_permissions_table', 1),
(6, '2014_10_12_100005_create_users_activity_table', 1),
(7, '2014_10_12_100006_create_menu_panel_table', 1),
(8, '2014_10_12_100007_create_customer_table', 1),
(9, '2014_10_12_100008_create_company_table', 1),
(10, '2014_10_12_100009_create_country_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `expire_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `route_url` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `route_url`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(6, 'api/user', 'api/user', 'api/user', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(7, '/', '/', '/', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(8, 'home', 'home', 'home', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(9, 'login', 'login', 'login', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(10, 'post-login', 'post-login', 'post-login', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(11, 'admin', 'admin', 'admin', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(12, 'admin/dashboard', 'admin/dashboard', 'admin/dashboard', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(13, 'user', 'user', 'user', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(14, 'user/form-reset-password', 'user/form-reset-password', 'user/form-reset-password', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(15, 'user/reset-password', 'user/reset-password', 'user/reset-password', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(16, 'user/update-reset-password/{token}', 'user/update-reset-password/{token}', 'user/update-reset-password/{token}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(17, 'user/set-new-password}', 'user/set-new-password}', 'user/set-new-password}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(18, 'user/lists', 'user/lists', 'user/lists', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(19, 'user/store', 'user/store', 'user/store', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(20, 'user/search', 'user/search', 'user/search', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(21, 'user/show/{id}', 'user/show/{id}', 'user/show/{id}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(22, 'user/edit/{id}', 'user/edit/{id}', 'user/edit/{id}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(23, 'user/update/{id}', 'user/update/{id}', 'user/update/{id}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(24, 'user/delete/{id}', 'user/delete/{id}', 'user/delete/{id}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(25, 'user/profile', 'user/profile', 'user/profile', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(26, 'user/profile/image', 'user/profile/image', 'user/profile/image', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(27, 'user/profile/edit', 'user/profile/edit', 'user/profile/edit', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(28, 'user/profile/update', 'user/profile/update', 'user/profile/update', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(29, 'user/logout', 'user/logout', 'user/logout', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(30, 'user/role', 'user/role', 'user/role', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(31, 'user/store-role', 'user/store-role', 'user/store-role', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(32, 'user/view-role/{slug}', 'user/view-role/{slug}', 'user/view-role/{slug}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(33, 'user/edit-role/{slug}', 'user/edit-role/{slug}', 'user/edit-role/{slug}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(34, 'user/update-role/{slug}', 'user/update-role/{slug}', 'user/update-role/{slug}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(35, 'user/delete-role/{slug}', 'user/delete-role/{slug}', 'user/delete-role/{slug}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(36, 'user/permission', 'user/permission', 'user/permission', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(37, 'user/store-permission', 'user/store-permission', 'user/store-permission', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(38, 'user/view-permission/{id}', 'user/view-permission/{id}', 'user/view-permission/{id}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(39, 'user/edit-permission/{id}', 'user/edit-permission/{id}', 'user/edit-permission/{id}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(40, 'user/update-permission/{id}', 'user/update-permission/{id}', 'user/update-permission/{id}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(41, 'user/delete-permission/{id}', 'user/delete-permission/{id}', 'user/delete-permission/{id}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(42, 'user/route-in-permission', 'user/route-in-permission', 'user/route-in-permission', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(43, 'user/role-permission', 'user/role-permission', 'user/role-permission', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(44, 'user/store-role-permission', 'user/store-role-permission', 'user/store-role-permission', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(45, 'user/view-role-permission/{id}', 'user/view-role-permission/{id}', 'user/view-role-permission/{id}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(46, 'user/edit-role-permission/{id}', 'user/edit-role-permission/{id}', 'user/edit-role-permission/{id}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(47, 'user/update-role-permission/{id}', 'user/update-role-permission/{id}', 'user/update-role-permission/{id}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(48, 'user/delete-role-permission/{id}', 'user/delete-role-permission/{id}', 'user/delete-role-permission/{id}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(49, 'user/search-role-permission', 'user/search-role-permission', 'user/search-role-permission', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(50, 'user/activity', 'user/activity', 'user/activity', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(51, 'user/search-activity', 'user/search-activity', 'user/search-activity', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(52, 'user/index-permission-role', 'user/index-permission-role', 'user/index-permission-role', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(53, 'add-permission-role', 'add-permission-role', 'add-permission-role', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(54, 'store-permission-role', 'store-permission-role', 'store-permission-role', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(55, 'view-permission-role/{id}', 'view-permission-role/{id}', 'view-permission-role/{id}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(56, 'edit-permission-role/{id}', 'edit-permission-role/{id}', 'edit-permission-role/{id}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(57, 'update-permission-role/{id}', 'update-permission-role/{id}', 'update-permission-role/{id}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(58, 'delete-permission-role/{id}', 'delete-permission-role/{id}', 'delete-permission-role/{id}', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(59, 'search-permission-role', 'search-permission-role', 'search-permission-role', 12, NULL, '2016-12-13 03:24:22', '2016-12-13 03:24:22'),
(60, 'web', 'web', 'web', 12, 12, '2016-12-13 03:24:22', '2016-12-13 06:17:15'),
(62, 'web/index', 'web/index', 'web/index', 12, 12, '2016-12-13 03:26:56', '2016-12-14 03:53:08'),
(63, 'user/add-permission-role', 'user/add-permission-role', 'user/add-permission-role', 12, 12, '2016-12-15 01:55:02', '2016-12-15 01:55:02'),
(64, 'user/store-permission-role', 'user/store-permission-role', 'user/store-permission-role', 12, 12, '2016-12-15 01:55:02', '2016-12-15 01:55:02'),
(65, 'user/view-permission-role/{id}', 'user/view-permission-role/{id}', 'user/view-permission-role/{id}', 12, 12, '2016-12-15 01:55:02', '2016-12-15 01:55:02'),
(66, 'user/edit-permission-role/{id}', 'user/edit-permission-role/{id}', 'user/edit-permission-role/{id}', 12, 12, '2016-12-15 01:55:02', '2016-12-15 01:55:02'),
(67, 'user/update-permission-role/{id}', 'user/update-permission-role/{id}', 'user/update-permission-role/{id}', 12, 12, '2016-12-15 01:55:02', '2016-12-15 01:55:02'),
(68, 'user/delete-permission-role/{id}', 'user/delete-permission-role/{id}', 'user/delete-permission-role/{id}', 12, 12, '2016-12-15 01:55:02', '2016-12-15 01:55:02'),
(69, 'user/search-permission-role', 'user/search-permission-role', 'user/search-permission-role', 12, 12, '2016-12-15 01:55:02', '2016-12-15 01:55:02'),
(70, 'user/role-search', 'user/role-search', 'user/role-search', 12, 12, '2016-12-19 02:03:47', '2016-12-19 02:03:47'),
(71, 'user/permission-search', 'user/permission-search', 'user/permission-search', 12, 12, '2016-12-19 03:22:49', '2016-12-19 03:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `slug`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'active', 1, 1, '2016-11-30 18:00:00', '2016-11-30 18:00:00'),
(2, 'user', 'user', 'active', 1, 1, '2016-11-30 18:00:00', '2016-11-30 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `roles_id` int(10) UNSIGNED DEFAULT NULL,
  `permissions_id` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`id`, `roles_id`, `permissions_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(10, 1, 7, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(11, 1, 53, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(12, 1, 11, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(13, 1, 12, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(14, 1, 6, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(15, 1, 58, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(16, 1, 56, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(17, 1, 8, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(18, 1, 9, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(19, 1, 10, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(20, 1, 59, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(21, 1, 54, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(22, 1, 57, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(23, 1, 13, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(24, 1, 50, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(25, 1, 41, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(26, 1, 48, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(27, 1, 35, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(28, 1, 24, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(29, 1, 39, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(30, 1, 46, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(31, 1, 33, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(32, 1, 22, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(33, 1, 14, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(34, 1, 52, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(36, 1, 29, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(37, 1, 36, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(38, 1, 25, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(39, 1, 27, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(40, 1, 26, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(41, 1, 28, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(42, 1, 15, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(43, 1, 30, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(44, 1, 43, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(45, 1, 42, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(46, 1, 20, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(47, 1, 51, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(48, 1, 49, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(49, 1, 17, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(50, 1, 21, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(51, 1, 19, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(52, 1, 37, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(53, 1, 31, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(54, 1, 44, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(55, 1, 40, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(56, 1, 16, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(57, 1, 47, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(58, 1, 34, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(59, 1, 23, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(60, 1, 38, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(61, 1, 45, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(62, 1, 32, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(63, 1, 55, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(64, 1, 60, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(65, 1, 62, 'active', 12, 12, '2016-12-14 08:58:50', '2016-12-14 08:58:50'),
(66, 1, 18, 'active', 12, 12, '2016-12-15 01:45:50', '2016-12-15 01:45:50'),
(67, 1, 63, 'active', 1, 1, '2016-12-14 18:00:00', '2016-12-14 18:00:00'),
(68, 1, 64, 'active', 1, 1, '2016-12-14 18:00:00', '2016-12-14 18:00:00'),
(69, 1, 68, 'active', 12, 12, '2016-12-15 01:58:12', '2016-12-15 01:58:12'),
(70, 1, 66, 'active', 12, 12, '2016-12-15 01:58:12', '2016-12-15 01:58:12'),
(71, 1, 69, 'active', 12, 12, '2016-12-15 01:58:12', '2016-12-15 01:58:12'),
(72, 1, 67, 'active', 12, 12, '2016-12-15 01:58:12', '2016-12-15 01:58:12'),
(73, 1, 65, 'active', 12, 12, '2016-12-15 01:58:12', '2016-12-15 01:58:12'),
(74, 1, 70, 'active', 12, 12, '2016-12-19 02:03:57', '2016-12-19 02:03:57'),
(75, 1, 71, 'active', 12, 12, '2016-12-19 03:23:00', '2016-12-19 03:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumb` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_address` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_visit` datetime DEFAULT NULL,
  `roles_id` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `image`, `thumb`, `auth_key`, `access_token`, `ip_address`, `last_visit`, `roles_id`, `status`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(12, 'admin@admin.com', 'colleen48@example.net', '$2y$10$EVO9wDk59Q0WsfLJQ3um3u.x5aC7aXj02cIsxdHOPSPBB5SRf9KLy', 'Jerome Bode', 'Alison Lemke', 'uploads/users/1481032916-bglobal-logo.png', 'uploads/users/thumb/1481032916-bglobal-logo.png', NULL, NULL, NULL, '2016-12-19 06:10:03', 1, 'active', 'HCPgzhGboB6mwoTUTm5ZsEo8GSwN3kr534B1LOoIsNYkh2UqLoNTaxAOJWu6', NULL, 12, '2016-12-06 02:30:41', '2016-12-15 00:23:02'),
(13, 'brandon36@example.org', 'effertz.domingo@example.net', '$2y$10$4ruW0x43uukS6QxX13N4BuQH0v2LhZrQ2rMYzM2jekqK29/Bd.ON2', 'Jarvis Stracke V', 'Kurtis Koch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'OyO3kYIwwU', NULL, NULL, '2016-12-06 02:30:41', '2016-12-06 02:30:41'),
(14, 'laurianne.luettgen@example.com', 'malinda.goyette@example.net', '$2y$10$4ruW0x43uukS6QxX13N4BuQH0v2LhZrQ2rMYzM2jekqK29/Bd.ON2', 'Oceane Jacobs', 'Stephon D\'Amore', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'olL9KrZlBq', NULL, NULL, '2016-12-06 02:30:41', '2016-12-06 02:30:41'),
(15, 'kuhic.alden@example.org', 'qturcotte@example.org', '$2y$10$4ruW0x43uukS6QxX13N4BuQH0v2LhZrQ2rMYzM2jekqK29/Bd.ON2', 'Paris Lynch', 'Eldridge Huels', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'uWiFKzBk41', NULL, NULL, '2016-12-06 02:30:41', '2016-12-06 02:30:41'),
(16, 'sklocko@example.com', 'kaylin70@example.net', '$2y$10$4ruW0x43uukS6QxX13N4BuQH0v2LhZrQ2rMYzM2jekqK29/Bd.ON2', 'Electa Larkin', 'Jovani White I', NULL, NULL, NULL, NULL, NULL, '2016-12-07 06:54:52', NULL, 'active', 'OqJA9maTY04YWgtPikI7C8MqPnDPhDoyqLxMxht7yLYi47PpO3su6UMKwEV8', NULL, 16, '2016-12-06 02:30:41', '2016-12-07 00:57:56'),
(17, 'mleuschke@example.net', 'green10@example.com', '$2y$10$4ruW0x43uukS6QxX13N4BuQH0v2LhZrQ2rMYzM2jekqK29/Bd.ON2', 'Mable Wisozk', 'Vivienne Crooks I', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'OdW0aID9fx', NULL, NULL, '2016-12-06 02:30:41', '2016-12-06 02:30:41'),
(18, 'jakob94@example.com', 'baumbach.minnie@example.org', '$2y$10$4ruW0x43uukS6QxX13N4BuQH0v2LhZrQ2rMYzM2jekqK29/Bd.ON2', 'Lyric Corkery', 'Asa Daniel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'QBTg6CcEvi', NULL, NULL, '2016-12-06 02:30:41', '2016-12-06 02:30:41'),
(19, 'goldner.raoul@example.org', 'wisoky.jaeden@example.org', '$2y$10$4ruW0x43uukS6QxX13N4BuQH0v2LhZrQ2rMYzM2jekqK29/Bd.ON2', 'Ashleigh Johnson', 'Katelin Schaefer PhD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'f3Ml4ZWJXb', NULL, NULL, '2016-12-06 02:30:41', '2016-12-06 02:30:41'),
(20, 'xveum@example.org', 'deckow.valentine@example.org', '$2y$10$4ruW0x43uukS6QxX13N4BuQH0v2LhZrQ2rMYzM2jekqK29/Bd.ON2', 'Mr. Elijah Mitchell', 'Jeffery Oberbrunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'XhaZzdBLxK', NULL, NULL, '2016-12-06 02:30:41', '2016-12-06 02:30:41'),
(21, 'owalker@example.com', 'cmckenzie@example.org', '$2y$10$4ruW0x43uukS6QxX13N4BuQH0v2LhZrQ2rMYzM2jekqK29/Bd.ON2', 'Prof. Carolyn Wisoky II', 'Ocie Bernier', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '9lI21yJJYk', NULL, NULL, '2016-12-06 02:30:41', '2016-12-06 02:30:41'),
(22, 'ipresources1@gmail.com', 'ipresources1@gmail.com', '$2y$10$JSeLNZONNfr6vLJs/5T7L.a91zt2fEvzH3B9WgIw6qmH9se3cmYzq', 'Selim', 'Reza', NULL, NULL, 'R3uWgYurZABJBRUbuZL4imRSrfbCnV', 'kpToSzrQo383WTBp4N5uxbZl5QLPuN', 'bGlobal.local', '2016-12-06 10:49:38', 1, 'active', 'gmi9Z53P7nJwRp3MfG7Y52inodhoEL', 12, NULL, '2016-12-06 04:49:38', '2016-12-06 04:49:38');

-- --------------------------------------------------------

--
-- Table structure for table `users_activity`
--

CREATE TABLE `users_activity` (
  `id` int(10) UNSIGNED NOT NULL,
  `action_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action_url` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action_detail` text COLLATE utf8_unicode_ci,
  `action_table` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `users_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_activity`
--

INSERT INTO `users_activity` (`id`, `action_name`, `action_url`, `action_detail`, `action_table`, `users_id`, `created_at`, `updated_at`) VALUES
(1, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 13, '2016-12-01 02:56:46', '2016-12-01 02:56:46'),
(2, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-01 02:56:51', '2016-12-01 02:56:51'),
(3, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-01 02:56:56', '2016-12-01 02:56:56'),
(4, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-01 03:38:40', '2016-12-01 03:38:40'),
(5, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-01 09:04:06', '2016-12-01 09:04:06'),
(6, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-02 02:25:43', '2016-12-02 02:25:43'),
(7, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-06 02:47:44', '2016-12-06 02:47:44'),
(8, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-06 08:02:28', '2016-12-06 08:02:28'),
(9, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-06 08:29:00', '2016-12-06 08:29:00'),
(10, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-06 08:29:28', '2016-12-06 08:29:28'),
(11, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-06 08:29:34', '2016-12-06 08:29:34'),
(12, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-07 00:54:52', '2016-12-07 00:54:52'),
(13, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-07 00:57:56', '2016-12-07 00:57:56'),
(14, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-07 00:58:00', '2016-12-07 00:58:00'),
(15, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-07 01:31:29', '2016-12-07 01:31:29'),
(16, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-07 07:02:58', '2016-12-07 07:02:58'),
(17, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:17:00', '2016-12-08 05:17:00'),
(18, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:22:00', '2016-12-08 05:22:00'),
(19, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:22:48', '2016-12-08 05:22:48'),
(20, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:22:48', '2016-12-08 05:22:48'),
(21, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:23:02', '2016-12-08 05:23:02'),
(22, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:23:02', '2016-12-08 05:23:02'),
(23, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:24:35', '2016-12-08 05:24:35'),
(24, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:24:35', '2016-12-08 05:24:35'),
(25, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:25:08', '2016-12-08 05:25:08'),
(26, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:25:08', '2016-12-08 05:25:08'),
(27, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:25:26', '2016-12-08 05:25:26'),
(28, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:25:26', '2016-12-08 05:25:26'),
(29, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:25:31', '2016-12-08 05:25:31'),
(30, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:25:31', '2016-12-08 05:25:31'),
(31, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:27:09', '2016-12-08 05:27:09'),
(32, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:27:09', '2016-12-08 05:27:09'),
(33, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:27:13', '2016-12-08 05:27:13'),
(34, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:27:13', '2016-12-08 05:27:13'),
(35, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:28:21', '2016-12-08 05:28:21'),
(36, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:28:21', '2016-12-08 05:28:21'),
(37, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:28:21', '2016-12-08 05:28:21'),
(38, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:28:26', '2016-12-08 05:28:26'),
(39, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:28:26', '2016-12-08 05:28:26'),
(40, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:28:26', '2016-12-08 05:28:26'),
(41, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:28:35', '2016-12-08 05:28:35'),
(42, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:28:50', '2016-12-08 05:28:50'),
(43, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:28:50', '2016-12-08 05:28:50'),
(44, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:28:59', '2016-12-08 05:28:59'),
(45, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:28:59', '2016-12-08 05:28:59'),
(46, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:29:00', '2016-12-08 05:29:00'),
(47, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:30:53', '2016-12-08 05:30:53'),
(48, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:30:55', '2016-12-08 05:30:55'),
(49, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:30:57', '2016-12-08 05:30:57'),
(50, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:31:01', '2016-12-08 05:31:01'),
(51, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:31:05', '2016-12-08 05:31:05'),
(52, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:31:05', '2016-12-08 05:31:05'),
(53, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:31:05', '2016-12-08 05:31:05'),
(54, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:31:07', '2016-12-08 05:31:07'),
(55, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:31:07', '2016-12-08 05:31:07'),
(56, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:31:07', '2016-12-08 05:31:07'),
(57, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:31:15', '2016-12-08 05:31:15'),
(58, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:31:15', '2016-12-08 05:31:15'),
(59, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:31:15', '2016-12-08 05:31:15'),
(60, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:31:15', '2016-12-08 05:31:15'),
(61, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:31:18', '2016-12-08 05:31:18'),
(62, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:31:18', '2016-12-08 05:31:18'),
(63, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:31:18', '2016-12-08 05:31:18'),
(64, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:31:22', '2016-12-08 05:31:22'),
(65, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:31:25', '2016-12-08 05:31:25'),
(66, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:31:25', '2016-12-08 05:31:25'),
(67, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:31:29', '2016-12-08 05:31:29'),
(68, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:31:30', '2016-12-08 05:31:30'),
(69, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:31:30', '2016-12-08 05:31:30'),
(70, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:31:30', '2016-12-08 05:31:30'),
(71, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:31:30', '2016-12-08 05:31:30'),
(72, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:31:50', '2016-12-08 05:31:50'),
(73, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:31:55', '2016-12-08 05:31:55'),
(74, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:31:59', '2016-12-08 05:31:59'),
(75, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:31:59', '2016-12-08 05:31:59'),
(76, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:31:59', '2016-12-08 05:31:59'),
(77, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:32:03', '2016-12-08 05:32:03'),
(78, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:32:03', '2016-12-08 05:32:03'),
(79, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:33:20', '2016-12-08 05:33:20'),
(80, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:33:27', '2016-12-08 05:33:27'),
(81, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:33:39', '2016-12-08 05:33:39'),
(82, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:33:47', '2016-12-08 05:33:47'),
(83, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:33:50', '2016-12-08 05:33:50'),
(84, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:38:16', '2016-12-08 05:38:16'),
(85, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:38:16', '2016-12-08 05:38:16'),
(86, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:43:01', '2016-12-08 05:43:01'),
(87, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:43:01', '2016-12-08 05:43:01'),
(88, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:43:02', '2016-12-08 05:43:02'),
(89, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-08 05:45:18', '2016-12-08 05:45:18'),
(90, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:47:42', '2016-12-08 05:47:42'),
(91, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 05:53:27', '2016-12-08 05:53:27'),
(92, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 06:04:20', '2016-12-08 06:04:20'),
(93, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 06:06:51', '2016-12-08 06:06:51'),
(94, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 06:11:23', '2016-12-08 06:11:23'),
(95, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-08 06:12:05', '2016-12-08 06:12:05'),
(96, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-12 23:46:57', '2016-12-12 23:46:57'),
(97, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-13 03:09:49', '2016-12-13 03:09:49'),
(98, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-13 03:53:55', '2016-12-13 03:53:55'),
(99, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-13 03:53:57', '2016-12-13 03:53:57'),
(100, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-13 04:08:51', '2016-12-13 04:08:51'),
(101, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-13 04:08:56', '2016-12-13 04:08:56'),
(102, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-13 04:09:06', '2016-12-13 04:09:06'),
(103, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-13 04:35:41', '2016-12-13 04:35:41'),
(104, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-13 04:35:44', '2016-12-13 04:35:44'),
(105, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-14 00:14:54', '2016-12-14 00:14:54'),
(106, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-14 00:14:55', '2016-12-14 00:14:55'),
(107, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-14 00:14:59', '2016-12-14 00:14:59'),
(108, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-14 03:44:50', '2016-12-14 03:44:50'),
(109, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-14 03:44:52', '2016-12-14 03:44:52'),
(110, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-14 05:02:49', '2016-12-14 05:02:49'),
(111, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-14 07:57:30', '2016-12-14 07:57:30'),
(112, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-14 08:51:50', '2016-12-14 08:51:50'),
(113, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-14 08:51:56', '2016-12-14 08:51:56'),
(114, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-15 00:23:02', '2016-12-15 00:23:02'),
(115, 'user/logout', 'user/logout', 'user logged out', 'users_activity', 12, '2016-12-15 00:23:02', '2016-12-15 00:23:02'),
(116, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-15 00:23:07', '2016-12-15 00:23:07'),
(117, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-15 05:49:58', '2016-12-15 05:49:58'),
(118, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-15 05:49:58', '2016-12-15 05:49:58'),
(119, 'create a role', 'user/store-role', NULL, 'roles', 12, '2016-12-15 06:13:11', '2016-12-15 06:13:11'),
(120, 'create a role', 'user/store-role', 'admin cancel the role :: se', 'roles', 12, '2016-12-15 06:14:32', '2016-12-15 06:14:32'),
(121, 'create a role', 'user/store-role', 'admin cancel the role :: re', 'roles', 12, '2016-12-15 06:29:13', '2016-12-15 06:29:13'),
(122, 'user-login', 'get-user-login', NULL, 'users', 12, '2016-12-19 00:10:03', '2016-12-19 00:10:03'),
(123, 'create a role', 'user/store-role', 'admin create a role :: weareok', 'roles', 12, '2016-12-19 00:38:05', '2016-12-19 00:38:05'),
(124, 'create a role', 'user/store-role', 'admin create a role :: nothun', 'roles', 12, '2016-12-19 00:38:44', '2016-12-19 00:38:44'),
(125, 'create a role', 'user/store-role', 'admin create a role :: nomore', 'roles', 12, '2016-12-19 00:40:49', '2016-12-19 00:40:49'),
(126, 'create a role', 'user/store-role', 'admin create a role :: Sdsd', 'roles', 12, '2016-12-19 00:47:02', '2016-12-19 00:47:02'),
(127, 'create a role', 'user/store-role', 'admin create a role :: nithusdsd', 'roles', 12, '2016-12-19 00:47:37', '2016-12-19 00:47:37'),
(128, 'create a role', 'user/store-role', 'admin create a role :: ok', 'roles', 12, '2016-12-19 00:48:23', '2016-12-19 00:48:23'),
(129, 'create a role', 'user/store-role', 'admin create a role :: dfdf', 'roles', 12, '2016-12-19 00:48:32', '2016-12-19 00:48:32'),
(130, 'create a role', 'user/store-role', 'admin create a role :: zzzz', 'roles', 12, '2016-12-19 00:50:57', '2016-12-19 00:50:57'),
(131, 'create a role', 'user/store-role', 'admin create a role :: okokok', 'roles', 12, '2016-12-19 00:51:16', '2016-12-19 00:51:16'),
(132, 'create a role', 'user/store-role', 'admin create a role :: okokoks', 'roles', 12, '2016-12-19 00:51:48', '2016-12-19 00:51:48'),
(133, 'create a role', 'user/store-role', 'admin create a role :: sdsdsdsds', 'roles', 12, '2016-12-19 00:52:13', '2016-12-19 00:52:13'),
(134, 'create a role', 'user/store-role', 'admin create a role :: Sdsdss', 'roles', 12, '2016-12-19 00:58:54', '2016-12-19 00:58:54'),
(135, 'create a role', 'user/store-role', 'admin create a role :: dfddffd', 'roles', 12, '2016-12-19 00:59:11', '2016-12-19 00:59:11'),
(136, 'create a role', 'user/store-role', 'admin create a role :: dfddffd1', 'roles', 12, '2016-12-19 01:00:48', '2016-12-19 01:00:48'),
(137, 'create a role', 'user/store-role', 'admin create a role :: dfddffd12', 'roles', 12, '2016-12-19 01:01:06', '2016-12-19 01:01:06'),
(138, 'create a role', 'user/store-role', 'admin create a role :: dfddffd123', 'roles', 12, '2016-12-19 01:01:53', '2016-12-19 01:01:53'),
(139, 'create a role', 'user/store-role', 'admin create a role :: dfddffd1234', 'roles', 12, '2016-12-19 01:02:09', '2016-12-19 01:02:09'),
(140, 'create a role', 'user/store-role', 'admin create a role :: sddsds', 'roles', 12, '2016-12-19 01:02:44', '2016-12-19 01:02:44'),
(141, 'create a role', 'user/store-role', 'admin create a role :: sddsdss', 'roles', 12, '2016-12-19 01:03:12', '2016-12-19 01:03:12'),
(142, 'create a role', 'user/store-role', 'admin create a role :: Sfsfsf', 'roles', 12, '2016-12-19 01:03:31', '2016-12-19 01:03:31'),
(143, 'create a role', 'user/store-role', 'admin create a role :: dfdfdfdfdf', 'roles', 12, '2016-12-19 01:04:25', '2016-12-19 01:04:25'),
(144, 'create a role', 'user/store-role', 'admin create a role :: Sdsdsdsd', 'roles', 12, '2016-12-19 01:32:59', '2016-12-19 01:32:59'),
(145, 'create a role', 'user/store-role', 'admin create a role :: qwew', 'roles', 12, '2016-12-19 01:33:30', '2016-12-19 01:33:30'),
(146, 'create a role', 'user/store-role', 'admin create a role :: qweww', 'roles', 12, '2016-12-19 01:47:50', '2016-12-19 01:47:50'),
(147, 'create a role', 'user/store-role', 'admin create a role :: dkgjkjkd', 'roles', 12, '2016-12-19 01:48:10', '2016-12-19 01:48:10'),
(148, 'create a role', 'user/store-role', 'admin create a role :: jhjhj5', 'roles', 12, '2016-12-19 01:49:29', '2016-12-19 01:49:29'),
(149, 'create a role', 'user/store-role', 'admin create a role :: we are om', 'roles', 13, '2016-12-19 01:51:28', '2016-12-19 01:51:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country_code_unique` (`code`),
  ADD UNIQUE KEY `country_name_unique` (`name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_email_unique` (`email`);

--
-- Indexes for table `menu_panel`
--
ALTER TABLE `menu_panel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_panel_menu_name_unique` (`menu_name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`),
  ADD KEY `password_resets_users_id_foreign` (`users_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_permissions_permissions_id_foreign` (`permissions_id`),
  ADD KEY `roles_permissions_roles_id_foreign` (`roles_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_roles_id_foreign` (`roles_id`);

--
-- Indexes for table `users_activity`
--
ALTER TABLE `users_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_activity_users_id_foreign` (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu_panel`
--
ALTER TABLE `menu_panel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users_activity`
--
ALTER TABLE `users_activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD CONSTRAINT `roles_permissions_permissions_id_foreign` FOREIGN KEY (`permissions_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `roles_permissions_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `users_activity`
--
ALTER TABLE `users_activity`
  ADD CONSTRAINT `users_activity_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
