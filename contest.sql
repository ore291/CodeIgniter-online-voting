-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2022 at 03:14 PM
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
-- Database: `contest`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL DEFAULT 'A beauty pageant or beauty contest is a competition that has traditionally focused on judging and ranking the physical attributes of the contestants.',
  `picture` varchar(255) NOT NULL DEFAULT 'https://via.placeholder.com/150',
  `allowed_gender` enum('male','female','all') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `description`, `picture`, `allowed_gender`) VALUES
(1, 'Most Handsome', 'most-handsome', 'A beauty pageant or beauty contest is a competition that has traditionally focused on judging and ranking the physical attributes of the contestants.', 'https://via.placeholder.com/150', 'male'),
(2, 'Most Beautiful', 'most-beautiful', 'A beauty pageant or beauty contest is a competition that has traditionally focused on judging and ranking the physical attributes of the contestants.\r\n', 'https://via.placeholder.com/150\r\n\r\n', 'female'),
(3, 'Most Creative Visual Artist', 'most-creative-visual-artist', 'A beauty pageant or beauty contest is a competition that has traditionally focused on judging and ranking the physical attributes of the contestants.', 'https://via.placeholder.com/150', 'all'),
(4, 'Comedy', 'comedy', 'A beauty pageant or beauty contest is a competition that has traditionally focused on judging and ranking the physical attributes of the contestants.', 'https://via.placeholder.com/150', 'all'),
(5, 'Music', 'music', 'A beauty pageant or beauty contest is a competition that has traditionally focused on judging and ranking the physical attributes of the contestants.', 'https://via.placeholder.com/150', 'all');

-- --------------------------------------------------------

--
-- Table structure for table `contestants`
--

CREATE TABLE `contestants` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contest_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `share_url` varchar(255) NOT NULL,
  `votes` int(11) NOT NULL,
  `stage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contestants_pics`
--

CREATE TABLE `contestants_pics` (
  `id` int(11) NOT NULL,
  `contestant_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contests`
--

CREATE TABLE `contests` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` int(255) NOT NULL,
  `category` int(11) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `price_per_vote` int(11) NOT NULL,
  `winner` int(11) DEFAULT NULL,
  `total_votes` int(11) NOT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `min_votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `name`, `min_votes`) VALUES
(1, 'bronze', 100),
(2, 'silver', 200),
(3, 'gold', 300),
(4, 'diamond', 350);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `picture` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `unique_url` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `full_name`, `gender`, `picture`, `email`, `phone`, `category`, `occupation`, `state`, `created_at`, `unique_url`, `password`) VALUES
(1, 'oreoluwa ', 'padonu', 'oreoluwa  padonu', 'male', 'https://via.placeholder.com/150', 'oreoluwapadonu@gmail.com', '09099286472', 1, 'Farmer', 'Lagos', '2022-07-16 20:30:17', NULL, '$2y$10$jP6YSmQo6UIPAPfAzyESnuz24h1MvTsWyTVPJlOrL1ogvftDHk1xG'),
(2, 'john', 'test', 'john test', 'male', 'https://via.placeholder.com/150', 'test@gmail.com', '09099286472', 4, 'ruger', 'Nassarawa', '2022-07-17 12:15:25', NULL, '$2y$10$SXyNEmtbIM8ytF/A5znpoujQHO3TkWbZ0VBJxaMa0HK84Qk58aKY.');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `vote_count` int(11) NOT NULL,
  `contestant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contestants`
--
ALTER TABLE `contestants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contest_id` (`contest_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `stage` (`stage`);

--
-- Indexes for table `contestants_pics`
--
ALTER TABLE `contestants_pics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contestant_id` (`contestant_id`);

--
-- Indexes for table `contests`
--
ALTER TABLE `contests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `winner` (`winner`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contestant_id` (`contestant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contestants`
--
ALTER TABLE `contestants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contestants_pics`
--
ALTER TABLE `contestants_pics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contests`
--
ALTER TABLE `contests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contestants`
--
ALTER TABLE `contestants`
  ADD CONSTRAINT `contestants_ibfk_1` FOREIGN KEY (`contest_id`) REFERENCES `contests` (`id`),
  ADD CONSTRAINT `contestants_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contestants_ibfk_3` FOREIGN KEY (`stage`) REFERENCES `stages` (`id`);

--
-- Constraints for table `contestants_pics`
--
ALTER TABLE `contestants_pics`
  ADD CONSTRAINT `contestants_pics_ibfk_1` FOREIGN KEY (`contestant_id`) REFERENCES `contestants` (`id`);

--
-- Constraints for table `contests`
--
ALTER TABLE `contests`
  ADD CONSTRAINT `contests_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `contests_ibfk_2` FOREIGN KEY (`winner`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`contestant_id`) REFERENCES `contestants` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
