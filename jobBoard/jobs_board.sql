-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 04:20 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobs_board`
--

-- --------------------------------------------------------

--
-- Table structure for table `approved_offers`
--

CREATE TABLE `approved_offers` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(40) NOT NULL,
  `job_img` varchar(1024) NOT NULL,
  `job_desc` text NOT NULL,
  `job_company` varchar(40) NOT NULL,
  `job_salary` int(10) NOT NULL,
  `job_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approved_offers`
--

INSERT INTO `approved_offers` (`job_id`, `job_title`, `job_img`, `job_desc`, `job_company`, `job_salary`, `job_date`) VALUES
(50, 'Test Title', 'https://www.iams.com/images/default-source/article-image/article_stomach-issues-in-cats-why-cats-vomit-and-what-to-do_header.jpg', 'Test Description', 'Test Company', 404, '2021-04-29 00:15:41'),
(55, 'Potato Farmer', 'https://vilee.fi/eng/wp-content/uploads/2021/03/1232019105233PM.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Potato Inc.', 7391, '2021-04-29 00:14:32'),
(56, 'No-image test', 'https://blog.nscsports.org/wp-content/uploads/2014/10/default-img.gif', '123', '123', 123, '2021-04-29 00:14:59'),
(61, 'Миньор', 'https://i.pik.bg/news/312/660_dab5c6ddbf6f900e82871d590bac6712.jpg', 'Търсим миньор', 'Миньори ООД', 475, '2021-04-28 14:16:57'),
(62, 'New page test', 'https://blog.nscsports.org/wp-content/uploads/2014/10/default-img.gif', '123', '123', 123, '2021-04-29 09:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `submitted_offers`
--

CREATE TABLE `submitted_offers` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(40) NOT NULL,
  `job_img` varchar(1024) NOT NULL,
  `job_desc` varchar(3000) NOT NULL,
  `job_company` varchar(40) NOT NULL,
  `job_salary` int(10) NOT NULL,
  `job_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submitted_offers`
--

INSERT INTO `submitted_offers` (`job_id`, `job_title`, `job_img`, `job_desc`, `job_company`, `job_salary`, `job_date`) VALUES
(28, 'Test Title', 'https://blog.nscsports.org/wp-content/uploads/2014/10/default-img.gif', 'Test Description', 'Test Company', 12345, '2021-04-29 14:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_uid` varchar(128) NOT NULL,
  `user_pwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_uid`, `user_pwd`) VALUES
(12, 'Aleks Ganev', 'aleks.ganev7@gmail.com', 'Aleks7391', '$2y$10$ySqPMzGWZQGKx2AuAAIy4.ANobKDLWM9OrEpC96imbKIUph9y3z4S'),
(13, 'TestName', 'test@test.com', 'TestUsername', '$2y$10$Z.kCCSY7HOz57jib8YSycu13W5Hj6CmN9QwIrM2bBM8olzjSH9jJi'),
(14, '123', '123@123.com', '123', '$2y$10$uzQ9cnVIlvQpyoikdsksYexI3OHYE8VQZAd9gV446VINacED1pBIm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approved_offers`
--
ALTER TABLE `approved_offers`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `submitted_offers`
--
ALTER TABLE `submitted_offers`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approved_offers`
--
ALTER TABLE `approved_offers`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `submitted_offers`
--
ALTER TABLE `submitted_offers`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
