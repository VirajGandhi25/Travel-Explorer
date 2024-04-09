-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 11:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodations`
--

CREATE TABLE `accomodations` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accomodations`
--

INSERT INTO `accomodations` (`id`, `category`, `name`) VALUES
(12, 'Beach', 'dona julia beach resort'),
(13, 'Beach', 'Maggie’s beach resort'),
(14, 'Beach', 'kingstork beach resort'),
(15, 'Beach', 'Sea Breeze Beach Resort'),
(16, 'Similar Places', 'Sunrise'),
(17, 'Similar Places', 'Salida del Sol'),
(18, 'Similar Places', 'Beauki Hostel'),
(19, 'Similar Places', 'Duven Hostel'),
(20, 'Hotel', 'fortune inn haveli - member itc hotel group, gandhinagar'),
(21, 'Hotel', 'Hotel Pine Ridge'),
(22, 'Hotel', 'Hotel Shangri La'),
(23, 'Hotel', 'Hotel DawnLand'),
(24, 'Hotel', 'Hotel Blue Pine'),
(25, 'Similar Places', 'd.b.girls hostal'),
(26, 'Hotel', 'Tillu Hotel'),
(27, 'Similar Places', 'Lotus Kamat Resort'),
(28, 'Similar Places', 'Lord\'s inn'),
(29, 'Similar Places', 'Princess Park'),
(30, 'Hotel', 'Hotel Greenpark'),
(31, 'Restaurant', 'Basseraa Dormitory and Restaurant'),
(32, 'Beach', 'Paradise Village Beach Resort'),
(33, 'Fort', 'The Hawaii Comforts');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`username`, `password`) VALUES
('admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location`, `created_at`) VALUES
(103, 'goa', '2024-04-08 20:08:52'),
(104, 'Goa', '2024-04-08 21:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `locations_visit`
--

CREATE TABLE `locations_visit` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations_visit`
--

INSERT INTO `locations_visit` (`id`, `category`, `name`) VALUES
(272, 'Palace', 'Bishop\'s Palace'),
(273, 'Palace', 'Maquinez Palace'),
(274, 'Palace', 'Udupi Palace'),
(275, 'Church', 'Seventh Day Adventist Church'),
(276, 'Church', 'St. Inez Church'),
(277, 'Church', 'Reis Magos Church'),
(278, 'Church', 'Reis Magos Church Cemetery'),
(279, 'Church', 'Santa Cruz Church'),
(280, 'Church', 'Our Lady Of Rosary Church'),
(281, 'Church', 'St. Lawrence\'s Church'),
(282, 'Church', 'Church'),
(283, 'Church', 'Church of the Rosary'),
(284, 'Restaurant', 'Ace`s The Pub & Restaurant'),
(285, 'Restaurant', 'Cafe Central'),
(286, 'Hotel', 'Hotel Manoshanti'),
(287, 'Hotel', 'POOJA UDUPI HOTEL'),
(288, 'Hotel', 'Uttam Hotel and Fast Food'),
(289, 'Hotel', 'Hotel Sawan'),
(290, 'Hotel', 'Hotel Kishor'),
(291, 'Hotel', 'Hotel Shaurya Family Bar & Restaurant'),
(292, 'Hotel', 'Hotel Renuka'),
(293, 'Restaurant', 'Nescafe'),
(294, 'Restaurant', 'Cafe Coffee Day'),
(295, 'Restaurant', 'Vege Deli Cafe'),
(296, 'Restaurant', 'Sachin Cafe'),
(297, 'Restaurant', 'Viva Goa Bar and Restaurant'),
(298, 'Restaurant', 'Chaska Multicuisine Restaurant'),
(299, 'Restaurant', 'BLUE BANANA RESTAURANT'),
(300, 'Restaurant', 'Shivers Garden Restaurant'),
(301, 'Restaurant', 'Dolce Amore Cafe and Bakery'),
(302, 'Similar Places', 'Goenchin'),
(303, 'Similar Places', 'Chilli \'n Spice'),
(304, 'Museum', 'Indian Customs & Central Excise Museum'),
(305, 'Museum', 'Goa State Museum (closed)'),
(306, 'Museum', 'Museum of Goa');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` int(11) NOT NULL,
  `budget_level` int(11) NOT NULL,
  `meal` varchar(50) NOT NULL,
  `price` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `budget_level`, `meal`, `price`) VALUES
(32, 2, 'dinner', 400.00),
(33, 1, 'breakfast', 60.00),
(34, 1, 'lunch', 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `travel_preferences`
--

CREATE TABLE `travel_preferences` (
  `id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `travel_buddy` varchar(50) DEFAULT NULL,
  `number_of_days` int(11) DEFAULT NULL,
  `transportMode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel_preferences`
--

INSERT INTO `travel_preferences` (`id`, `start_date`, `end_date`, `travel_buddy`, `number_of_days`, `transportMode`) VALUES
(82, '2024-04-03', '2024-04-09', 'friends', 7, 'plane');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomodations`
--
ALTER TABLE `accomodations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations_visit`
--
ALTER TABLE `locations_visit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_preferences`
--
ALTER TABLE `travel_preferences`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomodations`
--
ALTER TABLE `accomodations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `locations_visit`
--
ALTER TABLE `locations_visit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `travel_preferences`
--
ALTER TABLE `travel_preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
