-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 02:58 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `posted_by` varchar(60) NOT NULL,
  `posted_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_body`, `posted_by`, `posted_to`, `date_added`, `removed`, `post_id`) VALUES
(1, 'thest', 'test_testing', 'test_testing', '2023-03-06 02:41:43', 'no', 22),
(2, 'Test2', 'test_testing', 'test_testing_1', '2023-03-06 02:42:30', 'no', 14),
(3, 'still testing', 'test_testing', 'test_testing', '2023-03-06 03:11:53', 'no', 22),
(4, 'Testing', 'test_testing', 'test_testing', '2023-03-06 15:40:41', 'no', 22);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `username`, `post_id`) VALUES
(3, 'test_testing', 14),
(7, 'test_testing', 22);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `added_by`, `user_to`, `date_added`, `user_closed`, `deleted`, `likes`) VALUES
(1, 'This is a test.', 'test_testing', 'none', '2023-03-02 17:52:13', 'no', 'no', 0),
(7, 'This is a test.', 'test_testing', 'none', '2023-03-02 18:00:01', 'no', 'no', 0),
(8, 'This is a test.', 'test_testing', 'none', '2023-03-02 18:00:05', 'no', 'no', 0),
(9, 'This is a test.', 'test_testing', 'none', '2023-03-02 18:00:07', 'no', 'no', 0),
(10, '12345', 'test_testing', 'none', '2023-03-02 18:01:38', 'no', 'no', 0),
(11, '12345', 'test_testing', 'none', '2023-03-02 18:01:45', 'no', 'no', 0),
(12, 'thest', 'test_testing', 'none', '2023-03-02 18:02:02', 'no', 'no', 0),
(13, 'Hello', 'test_testing', 'none', '2023-03-04 18:04:32', 'no', 'no', 0),
(14, 'hello', 'test_testing_1', 'none', '2023-03-04 18:06:03', 'no', 'no', 1),
(15, 'still testing', 'test_testing', 'none', '2023-03-04 19:23:43', 'no', 'no', 0),
(16, 'still testing 10', 'test_testing', 'none', '2023-03-04 19:24:00', 'no', 'no', 0),
(17, 'still testing 11', 'test_testing', 'none', '2023-03-04 19:24:05', 'no', 'no', 0),
(18, 'still testing 11', 'test_testing', 'none', '2023-03-04 19:24:09', 'no', 'no', 0),
(19, 'still testing 12', 'test_testing', 'none', '2023-03-04 19:24:13', 'no', 'no', 0),
(20, 'still testing 13', 'test_testing', 'none', '2023-03-04 19:44:10', 'no', 'no', 0),
(21, 'still testing 14', 'test_testing', 'none', '2023-03-04 19:44:15', 'no', 'no', 0),
(22, 'uu', 'test_testing', 'none', '2023-03-04 19:53:39', 'no', 'no', 1),
(23, 'Hi My name is john.', 'johnny_test', 'none', '2023-03-05 18:02:04', 'no', 'no', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `friend_array` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`) VALUES
(1, 'John', 'Wick', 'John_Wick', 'johnwick@gmail.com', 'whatever', '2023-02-02', 'jkhkh', 1, 2, 'no', ''),
(6, 'Test', 'Testing', 'test_testing', 'test@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', '2023-02-25', 'assets/images/profile_pics/defaults/head_alizarin.png', 15, 1, 'no', ',test_testing_1,'),
(7, 'Test', 'Testing', 'test_testing_1', 'test1@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', '2023-02-25', 'assets/images/profile_pics/defaults/head_amethyst.png', 1, 1, 'no', ',test_testing,johnny_test,'),
(8, 'Test', 'Testing', 'test_testing_2', 'test2@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', '2023-02-25', 'assets/images/profile_pics/defaults/head_alizarin.png', 0, 0, 'no', ','),
(9, 'Test', 'Testing', 'test_testing_3', 'test3@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', '2023-02-25', 'assets/images/profile_pics/defaults/head_amethyst.png', 0, 0, 'no', ','),
(10, 'Test', 'Testing', 'test_testing_4', 'test4@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', '2023-02-25', 'assets/images/profile_pics/defaults/head_alizarin.png', 0, 0, 'no', ','),
(11, 'Test', 'Testing', 'test_testing_5', 'test5@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', '2023-02-25', 'assets/images/profile_pics/defaults/head_amethyst.png', 0, 0, 'no', ','),
(12, 'Adf', 'Jyhu', 'adf_jyhu', 'Test101@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', '2023-02-25', 'assets/images/profile_pics/defaults/head_amethyst.png', 0, 0, 'no', ','),
(13, 'Fcv', 'Fcxv', 'fcv_fcxv', 'test201@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', '2023-02-25', 'assets/images/profile_pics/defaults/head_alizarin.png', 0, 0, 'no', ','),
(14, 'Dfdddd', 'Dfsdf', 'dfdddd_dfsdf', 'test393@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', '2023-02-25', 'assets/images/profile_pics/defaults/head_amethyst.png', 0, 0, 'no', ','),
(15, 'Johnny', 'Test', 'johnny_test', 'Johnny_test@home.com', 'ae2b1fca515949e5d54fb22b8ed95575', '2023-02-26', 'assets/images/profile_pics/defaults/head_amethyst.png', 1, 0, 'no', ',test_testing_1,'),
(30, 'Tet', 'Ststs', 'tet_ststs', 'test@nowhere.com', 'ae2b1fca515949e5d54fb22b8ed95575', '2023-02-26', '$assets/images/profile_pics/defaults/head_alizarin', 0, 0, 'no', ','),
(31, 'Testy', 'Testington', 'testy_testington', 'Testington@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', '2023-03-03', 'assets/images/profile_pics/defaults/head_alizarin.png', 0, 0, 'no', ','),
(32, 'Testy', 'Testington', 'testy_testington_1', 'Testington1@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', '2023-03-03', 'assets/images/profile_pics/defaults/head_alizarin.png', 0, 0, 'no', ','),
(33, 'Testy', 'Testington', 'testy_testington_2', 'testy2@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', '2023-03-03', 'assets/images/profile_pics/defaults/head_amethyst.png', 0, 0, 'no', ',');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
