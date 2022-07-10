-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 09, 2022 at 08:48 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movierama`
--

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `user_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating_action` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`user_id`, `post_id`, `rating_action`) VALUES
('james', 1, 'like'),
('james', 2, 'dislike'),
('james', 4, 'dislike'),
('james', 5, 'like'),
('james', 7, 'dislike'),
('mario', 1, 'like'),
('mario', 2, 'like'),
('mario', 3, 'dislike'),
('mario', 5, 'like'),
('mario', 6, 'dislike'),
('mario', 7, 'dislike'),
('mario', 9, 'like'),
('mario', 10, 'like'),
('ponnynoob', 1, 'like'),
('ponnynoob', 3, 'dislike'),
('ponnynoob', 4, 'like'),
('ponnynoob', 6, 'like'),
('ponnynoob', 9, 'like'),
('qwerty', 2, 'like'),
('qwerty', 4, 'like'),
('qwerty', 5, 'like'),
('qwerty', 6, 'dislike'),
('qwerty', 7, 'dislike');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD UNIQUE KEY `UC_rating_info` (`user_id`,`post_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
