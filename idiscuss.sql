-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2021 at 10:59 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sno.` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sno.`, `username`, `password`, `date`) VALUES
(1, 'yashwantmangate', '$2y$10$fUesfBxmXfzLrIPmP0wjneDeeEekgnebw3b/MmM2W6OyriKf0y4qm', '2021-03-14 10:50:49'),
(2, 'vishal', '$2y$10$fUesfBxmXfzLrIPmP0wjneDeeEekgnebw3b/MmM2W6OyriKf0y4qm', '2021-03-14 13:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'python', 'Python is an interpreted, high-level and general-purpose programming language. Python\'s design philosophy emphasizes code readability with its notable use of significant indentation.', '2021-03-09 11:14:16'),
(2, 'javascript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing, prototype-based object', '2021-03-09 11:14:43'),
(3, 'Django', 'Django is a Python-based free and open-source web framework that follows the model-template-views architectural pattern. It is maintained by the Django Software Foundation, an American independent organization established as a 501 non-profit.', '2021-03-09 13:46:06'),
(4, 'flask', 'Flask is a micro web framework written in Python. It is classified as a microframework because it does not require particular tools or libraries. It has no database abstraction layer, form validation, or any other components where pre-existing third-party', '2021-03-09 13:46:58'),
(5, 'reactjs', 'facebook', '2021-03-14 21:32:39'),
(6, 'vue 3', 'google', '2021-03-14 21:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(8) NOT NULL,
  `comment_by` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(1, 'learn from codewithharry', 1, 9, '2021-03-11 12:24:35'),
(2, 'rt', 1, 10, '2021-03-11 12:37:43'),
(3, 'i think you should see the link www.python.org\r\n', 1, 11, '2021-03-11 12:43:43'),
(4, 'just simply type fetch_api and your will see the snippets', 22, 26, '2021-03-11 12:45:06'),
(5, 'i am also having the same problem', 1, 32, '2021-03-13 17:32:36'),
(6, 'who is this', 28, 33, '2021-03-13 18:05:15'),
(7, 'again this', 28, 34, '2021-03-13 18:07:17'),
(8, '3rd time this', 28, 36, '2021-03-13 18:08:30'),
(9, 'hum first', 23, 36, '2021-03-13 18:13:28'),
(10, 'second comment', 22, 35, '2021-03-13 18:15:32'),
(11, 'hum first', 29, 35, '2021-03-13 18:34:57'),
(13, '&lt;script&gt; alert(\"xss failed\") &lt;/script&gt;', 27, 35, '2021-03-13 19:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `sno` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `time` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'unable to install py-audio in windows', 'i am not able to install py-audio in windows can anyone help me in this problem', 1, 1, '2021-03-09 17:40:44'),
(2, 'how to download python', 'i am not unable to download python in my windows', 1, 2, '2021-03-09 17:57:13'),
(3, 'what is numpy', 'how can i download numpy', 1, 9, '2021-03-10 19:35:05'),
(14, 'this is title', 'this is my concern', 1, 10, '2021-03-10 19:50:40'),
(18, 'i am yashwant', 'who i am', 1, 11, '2021-03-10 21:00:59'),
(19, 'i am yashwant', 'who i am', 1, 26, '2021-03-10 21:01:33'),
(20, 'i am yashwant', 'who i am', 1, 32, '2021-03-10 21:04:59'),
(21, 'documentation of python', 'from where to download docs\r\n', 1, 33, '2021-03-11 11:57:46'),
(22, 'fetch api', 'how to use fetch api', 2, 34, '2021-03-11 11:59:58'),
(23, 'PYTHON forum', 'yashwant clear', 1, 35, '2021-03-13 12:08:57'),
(24, 'PYTHON forum', 'yashwant clear', 1, 32, '2021-03-13 12:09:42'),
(25, 'this is title ', 'elloborate\r\n', 1, 1, '2021-03-13 12:13:14'),
(26, 'this is title ', 'elloborate\r\n', 1, 2, '2021-03-13 12:13:43'),
(27, 'this is title ', 'elloborate\r\n', 1, 9, '2021-03-13 12:22:45'),
(28, 'PYTHON forum', 'python forum', 1, 35, '2021-03-13 18:03:18'),
(29, 'i am react js', 'ok', 2, 35, '2021-03-13 18:34:41'),
(30, 'hello', 'hello', 1, 35, '2021-03-13 19:20:05'),
(31, '&lt;script&gt;alert(\"hacked\");&lt;/script&gt;', '&lt;script&gt;alert(\"hacked\");&lt;/script&gt;', 1, 35, '2021-03-13 19:23:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno.` int(8) NOT NULL,
  `user_username` varchar(30) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno.`, `user_username`, `user_password`, `timestamp`) VALUES
(1, 'yashwant', '1234', '2021-03-11 13:31:43'),
(2, 'sanket', '$2y$10$TRxq1v8rTjSnVnWoUpbzAe4tPqkeDvGW8BoG3HuggX6S1xDDZKFPG', '2021-03-11 14:28:41'),
(9, 'vishal', '$2y$10$0UuyLYp5O0hqFBPrpU.BMOH3nIiL7szLMEasiOWW7Rg5Rrs6yHJq2', '2021-03-11 14:40:06'),
(10, 'swapnil', '$2y$10$N3G5NqJd/TMm6TsrAncOeuD8aLCI1KOloqqe6ftXDz076dLNUK9ru', '2021-03-11 14:40:53'),
(11, 'kishen', '$2y$10$L.BWBTMi/jduf05i/QGH8eD.4TE6qaGeSylKF9bPGF.kv62oe4Xei', '2021-03-11 14:46:06'),
(26, 'puffy', '$2y$10$ep.IMGuFmV/64HXz4y1bzuN9dmd.fgcN/2vdpAXLhyEc54FXkF68C', '2021-03-11 20:25:51'),
(32, 'jethalal', '$2y$10$lqUFonLK6nruAzYBnNYUj.mCZqPupQ5Wsj./LkaF1243.7V64phSW', '2021-03-11 20:45:43'),
(33, 'tarak', '$2y$10$TxYGZv6xoK25kZCuUJUaiOx9h1SZ6Z3V254FKQj8RI1v57pEOTmC6', '2021-03-11 20:48:12'),
(34, 'prabjot', '$2y$10$Ebn280G5H9tlTzFjhc8YGuwp1vW9y3DUfvWnoFN/Kd.XYGvS7LXve', '2021-03-11 20:49:00'),
(35, 'sodi', '$2y$10$UxV6ioeYHKfXDoVpRveXBO6OO35D0oVCqnPwwjhxgEAGWVFsRlOsu', '2021-03-11 20:52:44'),
(36, 'champak', '$2y$10$vVwfIBXeLCyK6K9tor1VAOshvQEnALrjVo5a0Iv.x768FP4bNWezS', '2021-03-14 21:37:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sno.`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`thread_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno.`),
  ADD UNIQUE KEY `user_username` (`user_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sno.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno.` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
