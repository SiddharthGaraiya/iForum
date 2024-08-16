-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2024 at 09:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `timestamp`) VALUES
(1, 'Python', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation. Python is dynamically typed and garbage-collected.', '2024-06-19 05:51:48'),
(2, 'JavaScript', 'JavaScript, often abbreviated as JS, is a programming language and core technology of the World Wide Web, alongside HTML and CSS. As of 2024, 98.9% of websites use JavaScript on the client side for webpage behavior.', '2024-06-19 05:51:48'),
(3, 'Java', 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.', '2024-06-19 05:52:16'),
(4, 'PHP', 'PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995.', '2024-06-19 05:52:16'),
(5, 'C Programming', 'C is a general-purpose programming language created by Dennis Ritchie at the Bell Laboratories in 1972.\r\n\r\nIt is a very popular language, despite being old. The main reason for its popularity is because it is a fundamental language in the field of computer science.\r\n\r\nC is strongly associated with UNIX, as it was developed to write the UNIX operating system.', '2024-06-26 06:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `user_id`, `timestamp`) VALUES
(1, 'This is the first comment.', 3, 0, '2024-06-20 06:07:47'),
(2, 'This is the second comment.', 3, 0, '2024-06-20 06:19:26'),
(3, 'This is the third comment.', 3, 0, '2024-06-20 06:25:15'),
(4, 'This is the fourth comment.', 3, 0, '2024-06-20 06:27:58'),
(6, 'This is the first comment.', 13, 0, '2024-06-20 06:33:48'),
(9, 'This is a comment by User 003.', 3, 3, '2024-06-26 04:50:00'),
(10, 'javascript is mostly used language in web development\r\n', 22, 11, '2024-07-12 08:32:17'),
(11, 'parthiv\r\n', 27, 11, '2024-07-31 07:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(11) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_description`, `user_id`, `category_id`, `timestamp`) VALUES
(3, 'This is the title of the first Python thread.', 'This is the Description of the first Python thread.', 0, 1, '2024-06-19 07:31:14'),
(4, 'This is the second thread.', 'This is the description of the second thread.', 0, 1, '2024-06-19 07:31:34'),
(5, 'This is the third thread of python forum.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ad consequatur illum exercitationem accusantium obcaecati accusamus cumque explicabo corrupti nostrum dicta minus culpa totam sint aliquam, aperiam, consectetur eaque asperiores. Suscipit illo, ab aliquam facere quisquam adipisci fugiat enim molestias similique ipsa nobis id ipsam sapiente ducimus quo deleniti nihil recusandae et. Reprehenderit, delectus sapiente doloribus sunt, tenetur consequatur voluptas, laboriosam inventore ipsa expedita nihil ea? Et saepe aut excepturi eaque corrupti tempora aspernatur, amet voluptatum inventore quod, quaerat enim accusamus ipsum nobis quas eveniet debitis non necessitatibus. Quo in alias aliquid labore autem, eos sint cupiditate enim! Unde, adipisci.\r\n', 0, 1, '2024-06-20 05:25:18'),
(6, 'this is the fourth thread', 'This is the description of the fourth thread.', 0, 1, '2024-06-20 05:44:44'),
(7, 'This is the first thread for php forum', 'This is the description of the first thread of the php forum.', 0, 4, '2024-06-20 05:51:20'),
(12, 'This is the first Thread in JS forum', 'This is the description of said thread,', 0, 2, '2024-06-20 06:32:55'),
(13, 'This is the second thread.', 'This is the description for the second thread.', 0, 2, '2024-06-20 06:33:29'),
(14, 'This is another thread', 'This is the description of said thread.', 0, 1, '2024-06-20 06:43:08'),
(15, 'Another thread', 'This is another another thread.', 3, 1, '2024-06-24 06:56:09'),
(16, 'This is a Thread by user003', 'This is the description of the thread.', 3, 1, '2024-06-26 04:50:30'),
(17, 'This is the second thread in the php category.', 'This is the description of the second thread in the php category.', 5, 4, '2024-06-26 05:14:36'),
(19, 'Another thread', 'Hello Friend\'s', 5, 1, '2024-06-26 05:52:22'),
(20, 'This is the First Thread in C Programming.', 'This is the description of the first thread in C programming.', 5, 5, '2024-06-26 06:04:56'),
(21, 'Problems Related JavaScript', 'everyone is free to ask question related javascript in this Thread', 11, 2, '2024-07-12 08:29:57'),
(22, 'Suggetion Related Javascript', 'you can provide your suggetion here', 11, 2, '2024-07-12 08:31:01'),
(23, 'a', 'a', 11, 2, '2024-07-15 04:55:39'),
(24, 'siddharth', 'created by siddharth', 12, 2, '2024-07-15 05:39:05'),
(25, 'another thread for js', 'share anything\r\n\r\n\r\n', 11, 2, '2024-07-15 05:51:55'),
(26, 'java question', 'abdc', 11, 3, '2024-07-31 07:07:10'),
(27, 'gave your suggetion on javascript', 'anyone can comment', 11, 2, '2024-07-31 07:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `password`, `timestamp`) VALUES
(1, 'user 001', 'user001', 'user001@gmail.com', 'User@001', '2024-06-22 06:29:59'),
(2, 'user 002', 'user002', 'user002@gmail.com', 'User@002', '2024-06-22 06:30:29'),
(3, 'user 003', 'user003', 'user003@gmail.com', '$2y$10$7ws7QazdKVgK7ECbZ/pL8.o2hexcciWd.ylvplIlV5K5H8UBjDSCC', '2024-06-22 06:31:44'),
(5, 'Arslan khan', 'Arslan', 'Arslan001@gmail.com', '$2y$10$oxfNVhsbyOtj2KRTEE7ZP.6oqNj3QtZwxrx2JKBdMCOW/VrzOso5C', '2024-06-26 05:02:53'),
(6, 'Admin', 'Admin', 'Admin@gmail.com', 'admin', '2024-06-24 06:48:55'),
(11, 'Siddharth garaiya', 'smg', 'smg@gmail.com', '$2y$10$cKZQUYIP4.CHq74jyJiX0eOrXBZCPe2sUhGxTrt5jKR7498d2ZSye', '2024-07-12 08:28:24'),
(12, 'abc', 'Siddharth Garaiya', 'abac@fjka.com', '$2y$10$Y35lB6ndQfUjxk5SrnwS7OyymZd/oHVMAE664MtT0KEVPtaP/WtnS', '2024-07-15 05:37:03'),
(13, 'test', 'test', 'test@test.com', '$2y$10$uFjP6JL7goeS9LPf/YWuwOA9qTYiCjzYLfaTcc0uOg9gEtk/WfMcW', '2024-07-22 10:49:17'),
(14, 'Siddharth garaiya', 'smgsmg', 'smgsmg@gmail.com', '$2y$10$lw7ttINyA4GXvytXDUD4H.wtPW66UYpqryGpO9Z8.DzQx12EYkcOu', '2024-07-24 08:19:36');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_description`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
