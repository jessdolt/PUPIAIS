-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 08:46 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pupiais`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `year`) VALUES
(9, '2018');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `dept_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`, `dept_code`) VALUES
(17, 'Diploma in Information Communication Technology', 'DICT');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` mediumblob NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `image`, `created_at`) VALUES
(20, 'Concert for Alumni', 'Sed egestas leo sem, quis aliquam est dictum et. Curabitur congue purus quam, ac elementum libero suscipit ut. Etiam id semper mauris, nec aliquet risus. Quisque lobortis ultricies sapien, a laoreet nisl lacinia sed. Aliquam elementum ligula risus, sollic', 0x36303966363634363538393461392e34303837333839342e6a7067, '2021-05-15 14:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `job_portal`
--

CREATE TABLE `job_portal` (
  `id` int(11) NOT NULL,
  `company_logo` tinyblob NOT NULL,
  `work_status` varchar(10) NOT NULL,
  `job_status` varchar(255) NOT NULL,
  `avail_pos` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `description` varchar(1200) NOT NULL,
  `others` varchar(5000) NOT NULL,
  `posted_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_portal`
--

INSERT INTO `job_portal` (`id`, `company_logo`, `work_status`, `job_status`, `avail_pos`, `company_name`, `job_title`, `description`, `others`, `posted_on`) VALUES
(23, 0x36303966363735656165376231382e33323434353632312e6a706567, 'Full-Time', 'Active', 2, 'Earth Corp.', 'Software Engineer', '<p>Sed bibendum risus ante, eu sagittis magna tempor vel. Mauris sed nisl molestie, blandit dui in, efficitur massa. Nullam fringilla, turpis ac ultricies posuere, arcu quam vestibulum erat, convallis porta odio odio vitae justo. Aliquam pretium malesuada augue sit amet maximus. Suspendisse euismod ullamcorper metus, id bibendum orci aliquet porttitor. Quisque sit amet eros vestibulum, gravida velit eu, feugiat orci. Vestibulum turpis sem, tempus ultrices tristique sed, sagittis sit amet velit. Fusce non lobortis augue, eu tincidunt sem. Phasellus malesuada tempor scelerisque. Vivamus convallis consectetur efficitur. Nulla posuere vitae risus eget facilisis. Ut ut rhoncus erat, quis vehicula ipsum.</p>\r\n', '<p>Integer facilisis justo in mauris condimentum, ac fermentum nunc egestas. Ut quis euismod eros, et ullamcorper mi. Mauris ut nulla ut erat maximus aliquet scelerisque euismod magna. Aenean dapibus finibus semper. Etiam rutrum metus eros, a cursus leo varius tristique. Duis eu convallis turpis, sit amet sagittis eros. Mauris id finibus sapien. Sed vitae fringilla nisi. Donec vitae pulvinar mi. Aliquam erat volutpat. Mauris elit nisi, consequat sit amet volutpat sed, tempor eget odio. Phasellus mollis tincidunt orci vitae volutpat. Maecenas porta, enim et egestas vulputate, ante justo dignissim nibh, ut varius quam arcu a purus. Proin fringilla sem at ligula venenatis egestas. Morbi sit amet erat mauris. Morbi dignissim ante sit amet ex tincidunt scelerisque.</p>\r\n', '2021-05-15 14:17:02');

-- --------------------------------------------------------

--
-- Table structure for table `survey_set`
--

CREATE TABLE `survey_set` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_set`
--

INSERT INTO `survey_set` (`id`, `title`, `description`, `user_id`, `start_date`, `end_date`, `date_created`) VALUES
(18, 'zxc', 'zxxzczxc', 1, '2021-05-19', '2021-05-20', '2021-05-07 15:59:31'),
(19, 'First survey', 'zxczxc', 1, '2021-05-13', '2021-05-14', '2021-05-07 16:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Admin', 'admin@test.com', '$2y$12$ksLBTzUnXMyyg3Fu6iLNdew60/Y23/n1PbHcPCoqqwBveZhxRc/VC', 1),
(2, 'Alumni', 'alumni@test.com', '$2y$12$YmOAqnZcKy0yGJCSR43dA.jIUngdQlvvBzHJ9YzAqIGJw9DYCngam', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `user_control` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `user_control`) VALUES
(1, 'Admin'),
(2, 'Alumni'),
(3, 'Content Creator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `year` (`year`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dept_code` (`dept_code`),
  ADD UNIQUE KEY `dept_name` (`dept_name`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_portal`
--
ALTER TABLE `job_portal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_set`
--
ALTER TABLE `survey_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type_id` (`user_type`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `job_portal`
--
ALTER TABLE `job_portal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `survey_set`
--
ALTER TABLE `survey_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_type_id` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
