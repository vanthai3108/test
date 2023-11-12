-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Generation Time: Nov 12, 2023 at 04:05 PM
-- Server version: 8.0.34
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app`
--

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `payment_date` date NOT NULL,
  `payment_bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `song_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_date`, `payment_bank`, `user_id`, `song_id`, `created_at`, `updated_at`) VALUES
(1, '2023-11-12', 'MB Bank', 5, 34, '2023-11-12 15:30:24', '2023-11-12 15:30:24'),
(2, '2023-11-12', 'MB Bank', 5, 2, '2023-11-12 15:30:24', '2023-11-12 15:30:24'),
(3, '2023-11-12', 'Eximbank', 5, 7, '2023-11-12 15:57:09', '2023-11-12 15:57:09'),
(4, '2023-11-12', 'Eximbank', 5, 5, '2023-11-12 15:57:09', '2023-11-12 15:57:09'),
(5, '2023-11-12', 'Eximbank', 5, 26, '2023-11-12 15:57:09', '2023-11-12 15:57:09'),
(6, '2023-11-12', 'Eximbank', 5, 25, '2023-11-12 15:57:09', '2023-11-12 15:57:09'),
(7, '2023-11-12', 'Eximbank', 5, 20, '2023-11-12 15:57:09', '2023-11-12 15:57:09'),
(8, '2023-11-12', 'Eximbank', 5, 3, '2023-11-12 15:57:09', '2023-11-12 15:57:09'),
(9, '2023-11-12', 'Eximbank', 5, 27, '2023-11-12 15:57:09', '2023-11-12 15:57:09'),
(10, '2023-11-12', 'Eximbank', 5, 30, '2023-11-12 15:57:09', '2023-11-12 15:57:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`),
  ADD KEY `payments_song_id_foreign` (`song_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_song_id_foreign` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
