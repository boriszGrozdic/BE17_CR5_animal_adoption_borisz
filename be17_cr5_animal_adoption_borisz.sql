-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 03:39 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be17_cr5_animal_adoption_borisz`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `vaccinated` varchar(10) NOT NULL,
  `breed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `photo`, `location`, `description`, `size`, `age`, `vaccinated`, `breed`) VALUES
(1, 'Kangaroo', '63789a2b89af1.jpg', 'Australia', 'Bla bla', 'Large', 10, 'Yes', 'Wallaroos'),
(2, 'Lion', '63789b8f48be4.jpg', 'South Africa', 'King of the Jungle', 'Large', 14, 'No', 'White Lion'),
(3, 'Elephant', 'Animal_diversity.png', 'India', 'Elephants are the biggest animals', 'Large', 5, 'Yes', 'Indians big Elephants'),
(4, 'Dog', '63789c9c5843a.jpg', 'Europe', 'Also called the domestic dog, it is derived from the extinct', 'Small', 6, 'Yes', 'German Sheppard'),
(6, 'Squirrel', '6378a5f612aba.jpg', 'Europe', 'Squirrels are members of the family Sciuridae.', 'Small', 6, 'No', 'Sciuridae'),
(7, 'Snake', '6378a6658f217.jpg', 'Asia', 'Snakes are elongated, limbless, carnivorous reptiles of the suborder Serpentes', 'Small', 12, 'Yes', 'Boidae'),
(8, 'Monkey', '6378a6dbeefc8.jpg', 'Australia', 'Monkey is a common name that may refer to most mammals of the infraorder Simiiformes', 'Small', 3, 'Yes', 'Chimpanzee'),
(9, 'Bear', 'Animal_diversity.png', 'South America', 'Bears are carnivoran mammals of the family Ursidae', 'Large', 13, 'Yes', 'Grizzlies'),
(10, 'Deer', '6378a770027bb.jpg', 'America', 'Deer or true deer are hoofed ruminant mammals forming the family Cervidae', 'Small', 4, 'No', 'Forrest Deer'),
(11, 'Rabbit', '6378a7d820a7e.jpg', 'Asia ', 'Rabbits, also known as bunnies or bunny rabbits', 'Small', 7, 'Yes', 'Bunny Rabbits'),
(15, 'Test', 'Animal_diversity.png', 'tesst', 'test', 'Large ', 12, 'No', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `picture`, `password`, `status`) VALUES
(1, 'Boris', 'Grozdic', 'borisz@gmail.com', 32139421, 'Praterstrasse 97', '6377d5b861ece.jpg', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'adm'),
(2, 'John', 'Lennon', 'john@gmail.com', 2147483647, 'London street 72', '6377d8e4161b6.jpg', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
