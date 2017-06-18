-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 18, 2017 at 12:52 PM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tenders`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tender_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kra_pin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `proposal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `title`, `tender_id`, `c_name`, `user_id`, `kra_pin`, `proposal`, `created_at`, `updated_at`) VALUES
(1, 'Fresh Water Supplier', '3', 'Peak Innovations', '2', '9384938', 'We the best in town', '2017-06-18 11:00:36', '2017-06-18'),
(2, 'Building Materials Suppliers', '2', 'abc', '3', 'aoo578979089', 'i have experience on this particular field and i will use ste of art technology ', '2017-06-18 12:17:28', '2017-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tender_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kra_pin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_06_17_212313_create_tenders_table', 1),
('2017_06_17_212322_create_logs_table', 1),
('2017_06_17_213458_create_bids_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenders`
--

CREATE TABLE `tenders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateline` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `awarded_to` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'null',
  `c_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'null',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tenders`
--

INSERT INTO `tenders` (`id`, `title`, `description`, `category`, `status`, `file`, `dateline`, `awarded_to`, `c_name`, `created_at`, `updated_at`) VALUES
(2, 'Building Materials Suppliers', 'We need a supplier to deliver building materials for the ongoing administration block building', 'Co-operate', 'closed', NULL, '06/22/2017', '3', 'abc', '2017-06-18 16:46:37', '2017-06-18'),
(3, 'Fresh Water Supplier', 'We need a regular supplier for fresh water in our institution. We highly recommend youths to take advantage of this opportunity.', 'Youth Self-help Group', 'closed', NULL, '06/23/2017', '2', 'Peak Innovations', '2017-06-18 16:47:22', '2017-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'normal',
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phoneno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `regNo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `org_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kra_pin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `town` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `county` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `fname`, `lname`, `email`, `phoneno`, `regNo`, `org_type`, `c_name`, `kra_pin`, `address`, `town`, `county`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Dess', 'Mond', 'info@geek.com', '+254792746432', 'ST/032/13', 'Co-operate', 'Desshub Technologies', '39392323', 'P.O Box 23', 'Mombasa', 'Mombasa', '$2y$10$Lnhz7ikRMjrdkY3JDuwQL.o47pRJB7ioCiuXnxgR6zasg61J1c69i', 'ri2FbFTQmyAtrL6q9wBHo0DqlHmmHh95JCisQJmTZQ21zQHBIB3FbYAc9D7z', '2017-06-18 07:01:19', '2017-06-18 13:33:55'),
(2, 'normal', 'Josh', 'khasabuli', 'info@josh.com', '+254706285999', 'pk/23/14', 'Youth Self-help Group', 'Peak Innovations', '9384938', 'P.O Box 34', 'Nairobi', 'Nairobi', '$2y$10$2QzEWWpnL8keUbD0OM/Vs.Se2cFGiEZ8P8BFNelS3i3UkuyWM0N7S', 'OkfjhwLcRa6g0Kn2H7BO36iHHWfHNQQIvDFIfiUNXLpIcyczxMXSEHLaWNax', '2017-06-18 09:04:34', '2017-06-18 13:31:33'),
(3, 'normal', 'Brian', 'Rono', 'b.rono.br@gmail.com', '0792746432', '34567087655', 'Co-operate', 'abc', 'aoo578979089', 'P.O Box 23', 'kapsabet', 'Nandi', '$2y$10$RoV52Uo01IeGF3QawWo0X.dTmTXvPKtm0EBVGbB8FdK6oLc/G0oAC', 'lYj1tVzhGmpBkk0FFBkZesxEqlGqWditnaUjFsb3c5Z3YUZ2SiotWrUMF5E4', '2017-06-18 12:15:32', '2017-06-18 13:17:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bids_title_index` (`title`),
  ADD KEY `bids_tender_id_index` (`tender_id`),
  ADD KEY `bids_company_name_index` (`c_name`),
  ADD KEY `bids_user_id_index` (`user_id`),
  ADD KEY `bids_kra_pin_index` (`kra_pin`),
  ADD KEY `bids_propasal_index` (`proposal`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD KEY `logs_title_index` (`title`),
  ADD KEY `logs_tender_id_index` (`tender_id`),
  ADD KEY `logs_company_name_index` (`company_name`),
  ADD KEY `logs_user_id_index` (`user_id`),
  ADD KEY `logs_kra_pin_index` (`kra_pin`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `tenders`
--
ALTER TABLE `tenders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenders_title_index` (`title`),
  ADD KEY `tenders_description_index` (`description`),
  ADD KEY `tenders_category_index` (`category`),
  ADD KEY `tenders_status_index` (`status`),
  ADD KEY `tenders_file_index` (`file`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phoneno_unique` (`phoneno`),
  ADD UNIQUE KEY `users_kra_pin_unique` (`kra_pin`),
  ADD UNIQUE KEY `users_regno_unique` (`regNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tenders`
--
ALTER TABLE `tenders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
