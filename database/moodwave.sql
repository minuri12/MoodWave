-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 20, 2024 at 01:59 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moodwave`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int(6) NOT NULL AUTO_INCREMENT,
  `creater_id` int(6) DEFAULT NULL,
  `song_name` varchar(1000) DEFAULT NULL,
  `song_writter` varchar(1000) DEFAULT NULL,
  `singers` varchar(1000) DEFAULT NULL,
  `music` varchar(1000) DEFAULT NULL,
  `workers_need` int(11) DEFAULT NULL,
  `workers_earn` int(11) DEFAULT NULL,
  `completed` int(11) NOT NULL DEFAULT '0',
  `placed_on` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `creater_id`, `song_name`, `song_writter`, `singers`, `music`, `workers_need`, `workers_earn`, `completed`, `placed_on`) VALUES
(2, 1, 'You Belong with Me', 'kmsm', 'mskm', 'wkkw', 100, 30, 50, '14-Jan-2024'),
(3, 1, 'Jocker And Queen', 'ddqd', 'wddd', '', 60, 50, 21, '14-Jan-2024'),
(4, 2, 'I Ain\'t Worried', 'djja', 'andn', '', 300, 40, 250, '14-Jan-2024'),
(5, 3, 'Baby', ',m,m', ';,;l', '', 100, 60, 30, '14-Jan-2024'),
(6, 4, 'Hay Stephen', 'lmmlm', 'lmlmm', '', 90, 40, 20, '14-Jan-2024'),
(7, 4, 'Believer', ',l,l,', 'l,,', '', 350, 10, 200, '14-Jan-2024'),
(8, 5, 'Fearless', 'akam', 'akmkam', '', 1000, 5, 560, '14-Jan-2024'),
(9, 5, 'Perfect', 'makma', 'amkkam', '', 600, 15, 500, '14-Jan-2024'),
(10, 1, 'I want You', 'amam', 'aam', '', 40, 100, 35, '14-Jan-2024'),
(11, 1, 'I will go', 'mmk', 'kkkm', '', 10, 200, 10, '15-Jan-2024'),
(12, 3, 'Someone need', 'mkmkmkm', 'nnnkm', 'njjn', 30, 20, 30, '15-Jan-2024'),
(13, 1, 'Good vibes', 'makma', 'mkamkma', '', 100, 20, 58, '15-Jan-2024'),
(14, 3, 'Need Love', 'sdksokd', 'sdks', '', 50, 60, 45, '15-Jan-2024'),
(15, 1, 'I will leave you', 'mskdms', 'sdk', 'Meowing-noise.mp3', 60, 45, 12, '15-Jan-2024'),
(16, 1, 'Nice Memories', 'lkdkd', 'kdkd', 'Meowing-noise.mp3', 100, 20, 40, '15-Jan-2024'),
(17, 2, 'Eat and Drink', 'kxcs', 'kkxc', 'Meowing-noise.mp3', 100, 10, 10, '15-Jan-2024'),
(18, 2, 'Nice Place', 'kmk', 'kk', 'Meowing-noise.mp3', 100, 20, 35, '15-Jan-2024'),
(19, 1, 'I with You', 'skjs', 'lksks', 'Meowing-noise.mp3', 100, 20, 85, '15-Jan-2024');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` varchar(11) NOT NULL,
  `creater_id` int(11) NOT NULL,
  `name_on_card` varchar(1000) NOT NULL,
  `card_details` varchar(1000) NOT NULL,
  `expiary` varchar(1000) NOT NULL,
  `cvv` int(11) NOT NULL,
  `placed_on` varchar(1000) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `job_id`, `creater_id`, `name_on_card`, `card_details`, `expiary`, `cvv`, `placed_on`) VALUES
(1, '0', 1, 'jnaja', 'jakja', '2024-01-23', 980, '15-Jan-2024'),
(2, '0', 1, 'akaj', 'aka', '2024-01-24', 990, '15-Jan-2024'),
(3, '0', 1, 'jaa', 'oakao', '2024-01-11', 900, '15-Jan-2024'),
(6, '0', 1, 'amama', 'ls,s', '2024-01-17', 222, '15-Jan-2024'),
(7, '\'19\'', 1, 'mmm', 'kmkmk', '2024-01-23', 555, '15-Jan-2024');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `user_type` varchar(1000) NOT NULL,
  `placed_on` varchar(1000) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `user_type`, `placed_on`) VALUES
(1, 'kushan', 'kushan@gmail.com', '123', 'Listener', '16-Jan-2024'),
(2, 'kushan', 'kushan2@gmail.com', '123', 'Creator', '16-Jan-2024'),
(3, 'dfd', 'kushan3@gmail.com', '123', 'Listener', '16-Jan-2024'),
(4, 'kushan@gmail.com', 'aka', 'aka', '', '20-Jan-2024'),
(5, '', '', '', '', '20-Jan-2024'),
(6, '', 'kma@hmail.com', '', 'Listener', '20-Jan-2024');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

DROP TABLE IF EXISTS `withdraw`;
CREATE TABLE IF NOT EXISTS `withdraw` (
  `withdraw_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` varchar(1000) NOT NULL,
  `listener_id` int(11) NOT NULL,
  `annotate` varchar(1000) NOT NULL,
  `comments` varchar(1000) NOT NULL,
  `name_on_card` varchar(1000) NOT NULL,
  `amount` int(11) NOT NULL,
  `card_details` varchar(1000) NOT NULL,
  `expiary` varchar(1000) NOT NULL,
  `cvv` int(11) NOT NULL,
  `placed_on` varchar(1000) NOT NULL,
  PRIMARY KEY (`withdraw_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`withdraw_id`, `job_id`, `listener_id`, `annotate`, `comments`, `name_on_card`, `amount`, `card_details`, `expiary`, `cvv`, `placed_on`) VALUES
(1, '1', 1, '', '', 'dsdds', 50, 'gfsdfsdfds', '2024-01-17', 333, '16-Jan-2024'),
(2, '2', 1, 'sad-calm', 'nice song', 'visa', 78, '9888 687 809', '2024-01-17', 900, '20-Jan-2024');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
