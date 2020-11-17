-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2020 at 06:44 PM
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
-- Database: `myonlinemeal`
--

-- --------------------------------------------------------

--
-- Table structure for table `foodlist`
--

CREATE TABLE `foodlist` (
  `food_id` int(20) NOT NULL,
  `food_name` varchar(30) NOT NULL,
  `food_price` int(10) NOT NULL,
  `food_desc` varchar(200) NOT NULL,
  `img_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodlist`
--

INSERT INTO `foodlist` (`food_id`, `food_name`, `food_price`, `food_desc`, `img_path`) VALUES
(1, 'Paneer Kathi Roll', 40, 'Juicy Masala Paneer Kathi Roll loaded with Masala Paneer chunks, onion & Mayo.', 'img/dishes/Masala_Paneer_Kathi_Roll.jpg'),
(2, 'Meurig Fish', 60, 'Try Meurig - A whole Pomfret fish grilled with tangy marination & served with grilled onions and tomatoes.', 'img/dishes/Meurig.jpg'),
(3, 'Hazelnut Truffle', 90, 'Lose all senses over this very delicious chocolate hazelnut truffle.', 'img/dishes/Chocolate_Hazelnut_Truffle.jpg'),
(4, 'Samosa', 40, 'Cocktail Crispy Samosa..Served Hot with Green and Red Chutni to give an exotic taste', 'img/dishes/samosa.jpg'),
(5, 'Baahubali Thali', 75, 'Baahubali Thali is accompanied by Kattapa Biriyani, Devasena Paratha, Bhalladeva Patiala Lassi', 'img/dishes/Baahubali_Thali.jpg'),
(6, 'Paneer Pakora', 45, 'it gives whole new dimension even to the most boring or dull vegetable', 'img/dishes/paneer pakora.jpg'),
(7, 'Pizza', 60, 'Pizza is a savory dish of Italian origin consisting of a usually round, flattened base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients', 'img/dishes/pizza.jpg'),
(8, 'Ravioli', 30, 'Ravioli are a type of pasta comprising a filling enveloped in thin pasta dough. Usually served in broth or with a sauce, they originated as a traditional food in Italian cuisine.', 'img/dishes/ravioli.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `food_id` int(20) NOT NULL,
  `food_name` varchar(30) NOT NULL,
  `food_price` int(10) NOT NULL,
  `food_qty` int(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `food_id`, `food_name`, `food_price`, `food_qty`, `order_date`, `username`) VALUES
(12, 2, ' Meurig Fish ', 60, 1, '2020-10-01 19:20:02', 'user1'),
(13, 2, ' Meurig Fish ', 60, 1, '2020-10-01 19:27:59', 'user1'),
(14, 2, ' Meurig Fish ', 60, 1, '2020-10-01 19:28:24', 'user1'),
(15, 2, ' Meurig Fish ', 60, 1, '2020-10-01 19:28:30', 'user1'),
(16, 2, ' Meurig Fish ', 60, 1, '2020-10-01 19:28:43', 'user1'),
(17, 8, ' Ravioli ', 30, 3, '2020-10-01 19:47:17', 'ayush'),
(18, 7, ' Pizza ', 60, 2, '2020-10-01 19:47:17', 'ayush'),
(19, 8, ' Ravioli ', 30, 3, '2020-10-01 21:39:38', 'ayush'),
(20, 7, ' Pizza ', 60, 2, '2020-10-01 21:39:38', 'ayush'),
(21, 3, ' Hazelnut Truffle ', 90, 2, '2020-10-01 22:05:14', 'user1'),
(22, 4, ' Samosa ', 40, 2, '2020-10-01 22:05:15', 'user1'),
(23, 59, ' Meurig Fish ', 60, 1, '2020-10-01 22:08:33', 'user1'),
(24, 2, ' Meurig Fish ', 60, 2, '2020-10-01 22:08:33', 'user1'),
(25, 4, ' Samosa ', 40, 1, '2020-10-02 10:11:29', 'user1'),
(26, 4, ' Samosa ', 40, 1, '2020-10-02 10:11:45', 'user1'),
(27, 1, ' Paneer Kathi Roll ', 40, 1, '2020-10-03 11:05:14', 'user1'),
(28, 2, ' Meurig Fish ', 60, 3, '2020-10-03 11:05:14', 'user1'),
(29, 3, ' Hazelnut Truffle ', 90, 4, '2020-10-03 11:05:14', 'user1'),
(30, 1, ' Paneer Kathi Roll ', 40, 1, '2020-10-03 11:05:27', 'user1'),
(31, 2, ' Meurig Fish ', 60, 3, '2020-10-03 11:05:28', 'user1'),
(32, 3, ' Hazelnut Truffle ', 90, 4, '2020-10-03 11:05:28', 'user1'),
(33, 1, ' Paneer Kathi Roll ', 40, 2, '2020-10-03 11:08:17', 'user1'),
(34, 1, ' Paneer Kathi Roll ', 40, 2, '2020-10-03 11:08:58', 'user1'),
(35, 2, ' Meurig Fish ', 60, 2, '2020-10-03 13:52:19', 'hriday'),
(36, 2, ' Meurig Fish ', 60, 2, '2020-10-03 13:52:32', 'hriday');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `dt`) VALUES
(2, 'user1', 'user1', '2020-08-22 15:59:00'),
(3, 'user2', 'user2', '2020-08-22 16:30:07'),
(6, 'user3', 'user3', '2020-08-25 14:36:22'),
(7, 'admin', 'admin', '2020-09-25 19:20:54'),
(8, 'ayush', 'ayush', '2020-10-02 01:16:44'),
(9, 'hriday', 'hriday', '2020-10-03 19:20:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foodlist`
--
ALTER TABLE `foodlist`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foodlist`
--
ALTER TABLE `foodlist`
  MODIFY `food_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
