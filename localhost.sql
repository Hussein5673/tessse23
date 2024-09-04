-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 21, 2024 at 10:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_base`
--
CREATE DATABASE IF NOT EXISTS `user_base` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `user_base`;

-- --------------------------------------------------------

--
-- Table structure for table `game_title`
--

CREATE TABLE `game_title` (
  `ID` int(11) NOT NULL,
  `Game_Title` text NOT NULL,
  `price` varchar(100) NOT NULL,
  `console` varchar(100) NOT NULL,
  `type` text NOT NULL,
  `image_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_title`
--


INSERT INTO `game_title` (`ID`, `Game_Title`, `price`, `console`, `type`, `image_path`) VALUES
(1, 'ELDEN RING', '69.99', 'PS5', 'PRE-ORDER', 'Catalog_images/image 6.png'),
(2, 'Project Zero 20th Anniversary Celebration DLC', '69.99', 'PS5', 'GAME BUNDLE', 'Catalog_images/image 6 (1).png'),
(3, "Tiny Tina\'s Wonderlands: Chaotic Edition", '89.99', 'PS5', 'PRE-ORDER', 'Catalog_images/image 6 (2).png'),
(4, 'Riders Republic™ Gold Edition', '99.99', 'PS5 | PS4', 'GAME BUNDLE', 'Catalog_images/image 6 (3).png'),
(5, 'eFootball™ 2022', 'FREE', 'PS5 | PS4', '', 'Catalog_images/image 6 (4).png'),
(6, 'Saints Row', '69.99', 'PS5 | PS4', 'PRE-ORDER', 'Catalog_images/image 6 (5).png'),
(7, 'Gran Turismo® 7', '79.99', 'PS5', 'PRE-ORDER', 'Catalog_images/image 6 (6).png'),
(8, 'Sifu ', '49.99', 'PS5', 'PRE-ORDER', 'Catalog_images/image 6 (7).png'),
(9, 'Horizon Forbidden West™ Digital Deluxe Edition', '89.99', 'PS5 | PS4', 'PRE-ORDER', 'Catalog_images/image 6 (8).png');
-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Email` text NOT NULL,
  `UserName` text NOT NULL,
  `Password` text NOT NULL,
  `DateOfBirth` text NOT NULL,
  `Friends` text NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Name`, `Email`, `UserName`, `Password`, `DateOfBirth`, `Friends`, `reg_date`) VALUES
(1, 'Waleed', 'Waleed123@gmail.com', 'myuser', '123', '04/07/2000', 'Omran,Waleed', '2024-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `level` int(11) NOT NULL,
  `trophies` int(11) NOT NULL,
  `cups` int(11) NOT NULL,
  `medals` int(11) NOT NULL,
  `prizes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game_title`
--
ALTER TABLE `game_title`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game_title`
--
ALTER TABLE `game_title`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
