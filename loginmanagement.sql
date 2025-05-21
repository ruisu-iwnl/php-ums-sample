-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2025 at 02:27 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `created_at`) VALUES
(1, 'Emanuel Luis', 'Pelaez', 'e.luis.pelaez@gmail.com', '2025-05-20 11:00:07'),
(2, 'Juliecca', 'Abrera', 'julieccaabrera@gmail.com', '2025-05-20 11:32:45'),
(3, 'John', 'Doe', 'johndoe@gmail.com', '2025-05-20 11:32:55'),
(4, 'Julian', 'Cucio', 'juliancucio@gmail.com', '2025-05-20 11:33:28'),
(5, 'Shem', 'Angelo', 'shemangelo@gmail.com', '2025-05-20 11:33:49'),
(6, 'Luis', 'Pelaez', 'test@test.com', '2025-05-20 11:34:20'),
(7, 'Patrick', 'Manapol', 'patrickmanapol@gmail.com', '2025-05-20 11:34:58'),
(8, 'Bella', 'Swan', 'whathaffen_bella@gmail.com', '2025-05-20 11:35:48'),
(9, 'Jacob', 'Black', 'vampyr_rite@gmail.com', '2025-05-20 11:36:35'),
(10, 'Yuri', 'Puyat', 'yuripuyat@gmail.com', '2025-05-20 11:36:46'),
(11, 'Adrian', 'Sandoval', 'adriansandoval@gmail.com', '2025-05-20 11:36:59'),
(12, 'Adrian', 'Pineda', 'my_favorite_hr@gmail.com', '2025-05-20 11:37:32'),
(13, 'Ryz', 'Ferry', 'ryztheamazing@gmail.com', '2025-05-20 11:38:00'),
(14, 'Vinz', 'Romero', 'vinzfromtheDA@gmail.com', '2025-05-20 11:38:38'),
(15, 'Kyle', 'Macabante', 'kyle_biryani@gmail.com', '2025-05-20 11:38:51'),
(16, 'Hendrix', 'Blue', 'hendrix__123@gmail.com', '2025-05-20 11:39:20'),
(17, 'Ford', 'Facundo', 'manilaboy@gmail.com', '2025-05-20 11:39:43'),
(18, 'Sajj', 'Gonzales', 'sajjshawarma_nice@gmail.com', '2025-05-20 11:40:19'),
(19, 'Tea', 'Alonzo', 'tea_alonzo@gmail.com', '2025-05-20 11:41:02'),
(20, 'Cody', 'Rhodes', 'americannightmare@gmail.com', '2025-05-20 11:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_passwords`
--

CREATE TABLE `user_passwords` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_passwords`
--

INSERT INTO `user_passwords` (`id`, `user_id`, `password`, `created_at`) VALUES
(1, 1, '202cb962ac59075b964b07152d234b70', '2025-05-20 11:00:07'),
(2, 2, '202cb962ac59075b964b07152d234b70', '2025-05-20 11:32:45'),
(3, 3, '202cb962ac59075b964b07152d234b70', '2025-05-20 11:32:55'),
(4, 4, '202cb962ac59075b964b07152d234b70', '2025-05-20 11:33:28'),
(5, 5, '202cb962ac59075b964b07152d234b70', '2025-05-20 11:33:50'),
(6, 6, '16d7a4fca7442dda3ad93c9a726597e4', '2025-05-20 11:34:20'),
(7, 7, '202cb962ac59075b964b07152d234b70', '2025-05-20 11:34:58'),
(8, 8, '202cb962ac59075b964b07152d234b70', '2025-05-20 11:35:48'),
(9, 9, '202cb962ac59075b964b07152d234b70', '2025-05-20 11:36:35'),
(10, 10, '202cb962ac59075b964b07152d234b70', '2025-05-20 11:36:46'),
(11, 11, '202cb962ac59075b964b07152d234b70', '2025-05-20 11:36:59'),
(12, 12, '202cb962ac59075b964b07152d234b70', '2025-05-20 11:37:32'),
(13, 13, '202cb962ac59075b964b07152d234b70', '2025-05-20 11:38:00'),
(14, 14, '202cb962ac59075b964b07152d234b70', '2025-05-20 11:38:38'),
(15, 15, '202cb962ac59075b964b07152d234b70', '2025-05-20 11:38:51'),
(16, 16, '202cb962ac59075b964b07152d234b70', '2025-05-20 11:39:20'),
(17, 17, '202cb962ac59075b964b07152d234b70', '2025-05-20 11:39:43'),
(18, 18, '202cb962ac59075b964b07152d234b70', '2025-05-20 11:40:19'),
(19, 19, '202cb962ac59075b964b07152d234b70', '2025-05-20 11:41:02'),
(20, 20, '202cb962ac59075b964b07152d234b70', '2025-05-20 11:41:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_passwords`
--
ALTER TABLE `user_passwords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_passwords`
--
ALTER TABLE `user_passwords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_passwords`
--
ALTER TABLE `user_passwords`
  ADD CONSTRAINT `user_passwords_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
