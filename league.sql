-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2022 at 02:36 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `league`
--

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `player_name` varchar(25) NOT NULL,
  `team_name` varchar(25) NOT NULL,
  `goals` int(10) DEFAULT 0,
  `assists` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `player_name`, `team_name`, `goals`, `assists`) VALUES
(18, 'Osman Abi', 'Blaugrana (B)', 2, 0),
(19, 'Prince Ade', 'Los Blancos (A)', 2, 0),
(20, 'Ramadhan Abi', 'Ballers (D)', 5, 0),
(21, 'Lester Mukhanji', 'Ballers (D)', 1, 0),
(22, 'Masud Adan', 'The Reds (C)', 1, 0),
(23, 'Jamaludin', 'The Reds (C)', 2, 0),
(24, 'Hudheifa Abdikadir', 'Los Blancos (A)', 2, 0),
(25, 'Mike Mwaura', 'The Reds (C)', 1, 0),
(26, 'Akaka', 'The Reds (C)', 8, 0),
(27, 'Mohamed Yusuf', 'Ballers (D)', 4, 0),
(29, 'Dilan Ilombi', 'Blaugrana (B)', 1, 0),
(30, 'David Gachoka', 'Blaugrana (B)', 2, 0),
(31, 'Marcus', 'Los Blancos (A)', 2, 0),
(32, 'Nicholas', 'Blaugrana (B)', 1, 0),
(33, 'Abi Zack', 'The Reds (C)', 3, 0),
(34, 'Farid Ahmed', 'Los Blancos (A)', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `team_name` varchar(25) NOT NULL,
  `matches_played` int(10) DEFAULT 0,
  `won` int(10) DEFAULT 0,
  `drawn` int(10) DEFAULT 0,
  `lost` int(10) DEFAULT 0,
  `goals_for` int(100) DEFAULT 0,
  `goals_against` int(100) DEFAULT 0,
  `goal_difference` int(100) DEFAULT 0,
  `points` int(100) DEFAULT 0,
  `last_match` varchar(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `matches_played`, `won`, `drawn`, `lost`, `goals_for`, `goals_against`, `goal_difference`, `points`, `last_match`) VALUES
(10, 'Los Blancos (A)', 6, 2, 1, 3, 8, 9, -1, 7, 'W'),
(11, 'Blaugrana (B)', 6, 3, 1, 2, 8, 6, 2, 10, 'D'),
(12, 'The Reds (C)', 9, 4, 1, 4, 15, 15, 0, 13, 'W'),
(14, 'Ballers (D)', 9, 3, 3, 3, 13, 14, -1, 12, 'L');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
