-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2019 at 02:54 AM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fortifyDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE IF NOT EXISTS `following` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(36) NOT NULL,
  `following_id` varchar(36) NOT NULL,
  PRIMARY KEY (`follow_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `following`
--

INSERT INTO `following` (`follow_id`, `user_id`, `following_id`) VALUES
(1, 'test1', 'test2'),
(2, 'test2', 'test1'),
(3, 'test1', 'test3'),
(4, 'test4', 'test4'),
(5, 'test1', 'test4'),
(6, 'test1', 'test6'),
(7, 'test1', 'test5'),
(8, 'test1', 'test7'),
(9, 'test1', 'test2'),
(10, '102788898124719387246', 'AgUACASRzjVHkjKvTIpbF3ibQPec');

-- --------------------------------------------------------

--
-- Table structure for table `player_stats`
--

CREATE TABLE IF NOT EXISTS `player_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` varchar(38) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pictureUrl` varchar(300) DEFAULT NULL,
  `win_rate` double NOT NULL,
  `kill_death_ratio` double NOT NULL,
  `players_outlived` int(40) NOT NULL,
  `place_top25` int(30) NOT NULL,
  `place_top12` int(20) NOT NULL,
  `place_top6` int(20) NOT NULL,
  `place_top3` int(20) NOT NULL,
  `place_top1` int(11) NOT NULL,
  `time_played` int(50) NOT NULL,
  `minutes_played` int(50) NOT NULL,
  `matches_played` int(50) NOT NULL,
  `score` int(50) NOT NULL,
  `kills` int(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `player_stats`
--

INSERT INTO `player_stats` (`id`, `player_id`, `username`, `pictureUrl`, `win_rate`, `kill_death_ratio`, `players_outlived`, `place_top25`, `place_top12`, `place_top6`, `place_top3`, `place_top1`, `time_played`, `minutes_played`, `matches_played`, `score`, `kills`) VALUES
(1, 'test2', 'test1', 'meh', 3.1, 0.231, 5, 2, 8, 0, 1, 4, 8123, 128391283, 12093, 12390, 378912),
(2, 'test3', 'test3', 'oaisjdadsjio', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 'test5', 'test5', 'ihiu', 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `search_query`
--

CREATE TABLE IF NOT EXISTS `search_query` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `search` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;