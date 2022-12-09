-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 12:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cloudcfd_ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `password` text DEFAULT NULL,
  `email_id` varchar(256) DEFAULT '',
  `remember_token` text DEFAULT NULL,
  `added_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `password`, `email_id`, `remember_token`, `added_at`, `updated_at`) VALUES
(1, '$2y$10$u3EQMnFYvKvjLYOINbz9wuraQ3WdpydetyMChdHxWfIRSWyVTno8K', 'admin@admin.com', 'GvaeJSljHkhVAxASfrL3Bp1hlzVMQvV6LeZo8Kr9mRu6lA6oGQXYFxwmEtcy', '2021-10-13 20:17:18', '2022-04-25 02:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `middle_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `father_name` varchar(250) NOT NULL,
  `mother_name` varchar(250) NOT NULL,
  `email` text NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `whatsapp_number` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `first_name`, `middle_name`, `last_name`, `father_name`, `mother_name`, `email`, `phone_number`, `whatsapp_number`, `status`, `added_at`, `updated_at`) VALUES
(2, 'Ranjith', 'Ranjith', 'Maharajan', 'Maharajan', 'Valli', 'demo@gmail.com', '9876543278', '9876543278', 1, '2022-11-28 09:25:26', '2022-11-28 03:55:26'),
(3, 'vignesh', 'vignesh', 'Ramesh', 'Ramesh', 'santhi', 'test@gmail.com', '9876543210', '9876543210', 1, '2022-11-28 02:53:20', '2022-11-28 02:53:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
