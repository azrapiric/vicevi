-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2016 at 05:45 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `leftor2`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `image`, `active`) VALUES
(1, 'zivotinjski', '', 0),
(2, 'policajci', '', 0),
(14, 'nova', 'nova.jpg', 1),
(15, 'sds', 'sds.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `joke_id` int(11) NOT NULL,
  `aprooved` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `user_id`, `datetime`, `joke_id`, `aprooved`, `active`) VALUES
(1, 'kljlkhdkjgkhfj', 1, '2016-01-27 00:00:00', 1, 1, 0),
(2, 'kljlkhdkjgkhfj', 1, '2016-01-27 00:00:00', 1, 1, 0),
(9, 'Azra :)', 1, '2016-01-27 00:00:00', 1, 1, 0),
(10, 'ccccccccccc', 1, '2016-01-27 00:00:00', 8, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `joke`
--

CREATE TABLE IF NOT EXISTS `joke` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `create_date` datetime NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '1',
  `person_id` int(11) DEFAULT NULL,
  `active_from` datetime DEFAULT NULL,
  `active_to` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `joke`
--

INSERT INTO `joke` (`id`, `name`, `content`, `create_date`, `views`, `active`, `person_id`, `active_from`, `active_to`) VALUES
(1, 'Medo i zeko', 'Idu medo i zeko :)', '2016-01-13 00:00:00', 0, 1, 1, NULL, NULL),
(2, 'Dva policajca', 'Trce dva policajca :)', '2016-01-21 00:00:00', 0, 1, 1, NULL, NULL),
(4, 'aaaa', 'Azra', '2016-01-05 05:25:03', 0, 2, 1, NULL, NULL),
(5, 'aaaa', 'aaaa', '0000-00-00 00:00:00', 0, 3, 1, NULL, NULL),
(6, 's', 's', '0000-00-00 00:00:00', 0, 3, 1, NULL, NULL),
(7, 'aaaa', 'aaa', '0000-00-00 00:00:00', 0, 3, 1, NULL, NULL),
(8, 'aaaa', 'aaa', '0000-00-00 00:00:00', 0, 3, 1, NULL, NULL),
(9, 'aaaa', 'aaa', '0000-00-00 00:00:00', 0, 3, 1, NULL, NULL),
(10, 'aaaa', 'aaa', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(11, 'aaaa', 'aaa', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(12, 'aaaa', 'aaa', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(13, 'aaaa', 'aaa', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(14, 'aaaa', 's', '2016-01-02 12:12:12', 1, 3, 1, NULL, NULL),
(15, 'aaaa', 's', '0000-00-00 00:00:00', 1, 1, 1, NULL, NULL),
(16, 'aaaa', 's', '0000-00-00 00:00:00', 1, 1, 1, NULL, NULL),
(17, 'a', 's', '0000-00-00 00:00:00', 0, 3, 1, NULL, NULL),
(18, 'a', 's', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(19, 'aaaaa', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(20, 'aaaaa', 'a', '2016-01-02 12:12:12', 0, 1, 1, NULL, NULL),
(21, 'aaaaa', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(22, 'a', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(23, 'a', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(24, 'a', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(25, 'a', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(26, 'a', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(27, 'a', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(28, 'a', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(29, 'a', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(30, 'a', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(31, 'a', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(32, 'a', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(33, 'a', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(34, 'a', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(35, 'a', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(36, 'a', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(37, 'a', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(38, 'a', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(39, 'a', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(40, 'a', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(41, 'a', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(42, 'uspjeh', ':)', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(43, 'kkk', 'sss', '0000-00-00 00:00:00', 1, 1, 1, NULL, NULL),
(44, '2', '2', '0000-00-00 00:00:00', 2, 2, 1, NULL, NULL),
(45, 'aaaaa', 'a', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(46, 'a', 's', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(47, 'a', 's', '2016-01-02 00:00:00', 0, 2, 1, NULL, NULL),
(48, 'a', 's', '2016-01-02 00:00:00', 0, 2, 1, NULL, NULL),
(49, 'a', 's', '2016-01-02 00:00:00', 0, 2, 1, NULL, NULL),
(50, 'a', 's', '2016-01-02 00:00:00', 0, 2, 1, NULL, NULL),
(51, 'aaaaa', 'aaa', '0000-00-00 00:00:00', 0, 2, 1, NULL, NULL),
(52, 'aaaaa', 'ghdhgd', '2016-01-02 12:12:12', 0, 1, 1, NULL, NULL),
(53, 'aaaaa', 'ghdhgd', '2016-01-02 12:12:12', 0, 1, 1, NULL, NULL),
(54, 'aaaaa', 'ghdhgd', '2016-01-02 12:12:12', 0, 1, 1, NULL, NULL),
(55, 'aaaaa', 'ghdhgd', '2016-01-02 12:12:12', 0, 1, 1, NULL, NULL),
(56, 'aaaa', 'aaa', '2016-01-02 12:12:12', 1, 1, 1, NULL, NULL),
(57, 'aaaa', 'aaa', '2016-01-02 12:12:12', 1, 1, 1, NULL, NULL),
(58, 'aaaaa', 'ssss', '2016-01-02 12:12:12', 1, 1, 1, NULL, NULL),
(59, 'aaaaa', 'ssss', '2016-01-02 12:12:12', 1, 1, 1, NULL, NULL),
(60, 'ggg', 'hhhh', '2016-01-02 00:00:00', 0, 1, 1, NULL, NULL),
(61, 'ggg', 'hhhh', '2016-01-02 12:12:12', 0, 1, 1, NULL, NULL),
(62, 's', 's', '2016-01-02 12:12:12', 0, 1, 1, NULL, NULL),
(63, 'fdddg', 'ggggdg', '2016-01-02 12:12:12', 0, 1, 1, NULL, NULL),
(64, 'sffs', 'dsssd', '2016-01-02 12:12:12', 0, 1, 1, NULL, NULL),
(65, 'sddadad', 'dadda', '2016-01-02 12:12:12', 0, 1, 1, NULL, NULL),
(66, 'vhmvhj', 'lkhklh', '2016-01-02 12:12:12', 0, 1, 1, NULL, NULL),
(67, 'adada', 'ssds', '2016-01-02 09:30:19', 0, 1, 1, NULL, NULL),
(68, 'Novi vic', '<p>aafdfdsfdgsdg</p>', '2016-01-12 13:25:00', 0, 1, 1, NULL, NULL),
(69, 'ggug', '<p>khfjhdjd</p>', '2016-01-04 10:45:17', 0, 1, 1, NULL, NULL),
(70, 'ssddsds', '<p>dfdffsfs</p>', '2016-01-24 11:02:27', 0, 1, 1, NULL, NULL),
(71, 'ddd', '<p>&nbsp;ycycycy</p>', '2016-01-27 00:53:56', 0, 1, 1, '2016-01-27 00:53:30', '2016-02-11 10:50:31'),
(72, 'novi', '<p>aaaa</p>', '2016-01-30 11:11:03', 0, 1, NULL, '2016-01-30 11:10:26', NULL),
(73, 'pokusaj', '<p>asadsfdfdyfs dodatak</p>', '2016-01-30 22:15:43', 0, 1, NULL, '2016-01-30 22:15:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `joke_category`
--

CREATE TABLE IF NOT EXISTS `joke_category` (
`id` int(11) NOT NULL,
  `joke_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `joke_category`
--

INSERT INTO `joke_category` (`id`, `joke_id`, `category_id`) VALUES
(47, 1, 2),
(46, 2, 2),
(49, 4, 1),
(35, 63, 1),
(34, 64, 1),
(38, 65, 1),
(39, 65, 2),
(42, 66, 1),
(48, 67, 1),
(50, 68, 1),
(51, 69, 1),
(52, 70, 1),
(53, 71, 1),
(54, 72, 14),
(55, 73, 1);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
`id` int(11) NOT NULL,
  `nick` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `nick`, `email`, `password`, `role`, `active`) VALUES
(1, 'snowflake', 'ccccc@bbb.com', 'a1s2d3', 1, 0),
(2, 'person1', 'aaaa', 'a1s2d3', 2, 0),
(3, 'aaaaaaaa', 'aaaaaaa', '$2y$13$82Jy1/eyUWkp9yVE8GDNK.p99zi/lHv0Kg96XiOhTc8PW/7RqkhEO', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`id`), ADD KEY `joke_id` (`joke_id`);

--
-- Indexes for table `joke`
--
ALTER TABLE `joke`
 ADD PRIMARY KEY (`id`), ADD KEY `person_id` (`person_id`), ADD KEY `person_id_2` (`person_id`);

--
-- Indexes for table `joke_category`
--
ALTER TABLE `joke_category`
 ADD PRIMARY KEY (`id`), ADD KEY `joke_id` (`joke_id`,`category_id`), ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `joke`
--
ALTER TABLE `joke`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `joke_category`
--
ALTER TABLE `joke_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`joke_id`) REFERENCES `joke` (`id`);

--
-- Constraints for table `joke`
--
ALTER TABLE `joke`
ADD CONSTRAINT `joke_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `joke_category`
--
ALTER TABLE `joke_category`
ADD CONSTRAINT `joke_category_ibfk_1` FOREIGN KEY (`joke_id`) REFERENCES `joke` (`id`),
ADD CONSTRAINT `joke_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
