-- phpMyAdmin SQL Dump
-- version 4.1.0-alpha2
-- http://www.phpmyadmin.net
--
-- Host: 121.248.63.106
-- Generation Time: Apr 26, 2014 at 02:31 AM
-- Server version: 5.5.12-log
-- PHP Version: 5.4.9-4ubuntu2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `herald_vote`
--

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `type` int(11) NOT NULL,
  `limit` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `create_time` date NOT NULL,
  `experied_time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`id`, `topic`, `user_id`, `description`, `type`, `limit`, `image`, `create_time`, `experied_time`) VALUES
(1, '测试投票', '213111517', '测试投票', 1, 1, '', '2014-04-24', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `vote_action`
--

CREATE TABLE IF NOT EXISTS `vote_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `vote_id` int(11) NOT NULL,
  `vote_time` datetime NOT NULL,
  `vote_item_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vote_action`
--

INSERT INTO `vote_action` (`id`, `user_id`, `vote_id`, `vote_time`, `vote_item_id`) VALUES
(2, '213111517', 1, '0000-00-00 00:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `vote_item`
--

CREATE TABLE IF NOT EXISTS `vote_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vote_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `vote_item`
--

INSERT INTO `vote_item` (`id`, `vote_id`, `name`, `attachment`) VALUES
(1, 1, '测试投票', ''),
(2, 1, '测试投票', ''),
(3, 1, '测试投票', ''),
(4, 1, '测试投票', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
