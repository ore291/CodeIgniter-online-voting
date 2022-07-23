-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2022 at 09:47 PM
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
  `votes` int(11) NOT NULL DEFAULT 0,
  `stage` int(11) NOT NULL DEFAULT 99,
  `is_disqualified` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contestants`
--

INSERT INTO `contestants` (`id`, `user_id`, `contest_id`, `slug`, `share_url`, `votes`, `stage`, `is_disqualified`, `image`, `full_name`) VALUES
(1, 6, 9, 'sdgsdgsgs', 'http://localhost:8080/contest/view/9/6', 61, 3, 1, 'passport__1636197781_26234.png', 'john test'),
(2, 2, 9, 'effffs', 'http://localhost:8080/contest/view/9/2', 202, 2, 1, 'rental-logo.jpg', 'ore ff1'),
(6, 6, 11, '11/6', 'http://localhost:8080/contest/view/11/6', 20, 99, 0, 'rental-logo.jpg', 'john test');

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
  `slug` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `price_per_vote` int(11) NOT NULL,
  `winner` int(11) DEFAULT NULL,
  `total_votes` int(11) NOT NULL DEFAULT 0,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `sponsor_id` int(11) DEFAULT NULL,
  `status` enum('pending','ongoing','ended') NOT NULL DEFAULT 'pending',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contests`
--

INSERT INTO `contests` (`id`, `title`, `slug`, `category`, `cover`, `picture`, `price_per_vote`, `winner`, `total_votes`, `start_date`, `end_date`, `sponsor_id`, `status`, `created_at`) VALUES
(9, 'most beautiful abakaliki', 'most-beautiful-abakaliki', 2, 'rental-logo.jpg', 'rental-logo.jpg', 50, NULL, 313, '2022-07-21 13:48:00', '2022-08-18 13:49:00', 1, 'pending', '2022-07-21 10:22:19'),
(10, 'MOST ALL SUPER STAR', 'most-all-super-star', 1, 'cameras (1).png', 'dj (1).jpg', 100, NULL, 0, '2022-07-21 21:05:00', '2022-07-30 21:06:00', NULL, 'pending', '2022-07-21 10:22:19'),
(11, 'MUSTACHIO', 'mustachio', 3, 'canon-zoom-lens-efs55250mm-f456-image-stabilizer-94919957.jpg', 'canon-zoom-lens-efs55250mm-f456-image-stabilizer-59614874.jpg', 200, NULL, 20, '2022-07-31 21:09:00', '2022-08-09 21:09:00', NULL, 'pending', '2022-07-21 10:22:19');

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

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `name`, `company_name`, `brand`, `description`, `phone`, `email`) VALUES
(1, 'new day', 'pharmacist', 'pharmcist', 'ffwefwef', 'wwwf', 'wfwfw@rweefwf');

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
(4, 'diamond', 350),
(99, 'unstaged', 0);

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
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `full_name`, `gender`, `picture`, `email`, `phone`, `category`, `occupation`, `state`, `created_at`, `unique_url`, `password`, `role`) VALUES
(1, 'oreoluwa ', 'padonu', 'oreoluwa  padonu', 'male', 'https://via.placeholder.com/150', 'oreoluwapadonu@gmail.com', '09099286472', 1, 'Farmer', 'Lagos', '2022-07-16 20:30:17', NULL, '$2y$10$jP6YSmQo6UIPAPfAzyESnuz24h1MvTsWyTVPJlOrL1ogvftDHk1xG', 'user'),
(2, 'john', 'test', 'john test', 'male', 'https://via.placeholder.com/150', 'test@gmail.com', '09099286472', 4, 'ruger', 'Nassarawa', '2022-07-17 12:15:25', NULL, '$2y$10$SXyNEmtbIM8ytF/A5znpoujQHO3TkWbZ0VBJxaMa0HK84Qk58aKY.', 'user'),
(5, 'ewer', 'rwrwr', 'ewer rwrwr', 'female', 'https://via.placeholder.com/150', 'test1@gmail.com', 'rweweerweer', 2, 'rwrwr', 'Imo', '2022-07-18 17:43:02', NULL, '$2y$10$Lo3pH2E1JfhQeKbtOKmXlunJqP6Cw6zGdzV8KCYHSmnyCqTAlWcY6', 'user'),
(6, 'test1', 'ffa', 'test1 ffa', 'female', 'rental-logo.jpg', 'test2@gmail.com', '09099286472', 2, 'farmer', 'Sokoto', '2022-07-19 10:20:43', NULL, '$2y$10$R08hdu39g0pN7MPqb1NmzO4zNugtp68Tn3SwTiQ0wf1fE.mYVLcnm', 'admin'),
(7, 'fggg', 'dfgdfgd', 'fggg dfgdfgd', 'female', 'cantina-royale-cover-clean.jpg', 'test4@gmail.com', 'gfhfhfh', 4, 'hgfhfhf', 'Imo', '2022-07-22 12:15:55', NULL, '$2y$10$PCbKCgNo7vYcQKGq5Ny57Oae9A9iGdkv7Uo.x.EYW.75bOJ7B0KZG', 'user');

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
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `email`, `name`, `reference`, `cost`, `vote_count`, `contestant_id`) VALUES
(1, 'oreoluwapadonu@gmail.com', 'john', 'T521997298601233', 50000, 10, 1),
(2, 'oreoluwapadonu@gmail.com', 'john', 'T211833717434234', 400000, 20, 6),
(3, 'oreoluwapadonu@gmail.com', 'john', 'T266512035125648', 250000, 50, 2),
(4, 'oreoluwapadonu@gmail.com', 'oreoluwa ', 'T297373821173821', 500, 10, 2),
(5, 'oreoluwapadonu@gmail.com', 'guy', 'T247808088723722', 500, 10, 2),
(6, 'oreoluwapadonu@gmail.com', 'guy', 'T266637275798572', 500, 10, 2),
(7, 'oreoluwapadonu@gmail.com', 'gyt', 'T695509900167601', 500, 10, 2),
(8, 'oreoluwapadonu@gmail.com', 'oreoluwa ', 'T837367720729011', 500, 10, 2),
(9, 'oreoluwapadonu@gmail.com', '3ds', 'T720675556710528', 500, 10, 2),
(10, 'oreoluwapadonu@gmail.com', 'john', 'T800040701884155', 500, 10, 2),
(11, 'oreoluwapadonu@gmail.com', 'gyu', 'T465283803453920', 4000, 80, 2),
(12, 'oreoluwapadonu@gmail.com', 'u', 'T549089837771340', 50, 1, 2),
(13, 'oreoluwapadonu@gmail.com', 'huy', 'T083619887636055', 50, 1, 2),
(14, 'oreoluwapadonu@gmail.com', 'huy', 'T768383556492375', 50, 1, 1);

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
  ADD KEY `winner` (`winner`),
  ADD KEY `sponsor` (`sponsor_id`);

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
  ADD UNIQUE KEY `email` (`email`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contestants_pics`
--
ALTER TABLE `contestants_pics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contests`
--
ALTER TABLE `contests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  ADD CONSTRAINT `contests_ibfk_2` FOREIGN KEY (`winner`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contests_ibfk_3` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsors` (`id`);

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
