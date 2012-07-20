-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 20, 2012 at 04:02 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rage_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `rage_characters`
--

CREATE TABLE IF NOT EXISTS `rage_characters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(36) NOT NULL,
  `email` varchar(256) NOT NULL,
  `credits` int(11) NOT NULL,
  `pixels` int(11) NOT NULL,
  `ticket` varchar(36) NOT NULL,
  `regular_ip` varchar(15) NOT NULL,
  `look` varchar(100) NOT NULL,
  `motto` varchar(50) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `created` varchar(9) NOT NULL,
  `last_online` varchar(9) NOT NULL,
  `respect` int(11) NOT NULL,
  `online` enum('0','1') NOT NULL,
  `home` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `web_articles`
--

CREATE TABLE IF NOT EXISTS `web_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(36) NOT NULL,
  `author` int(11) NOT NULL,
  `description` text NOT NULL,
  `publishing_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `article` text NOT NULL,
  `image` varchar(52) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `web_articles_comments`
--

CREATE TABLE IF NOT EXISTS `web_articles_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` int(11) NOT NULL,
  `publishing_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` text NOT NULL,
  `unused` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `web_fuse_rights`
--

CREATE TABLE IF NOT EXISTS `web_fuse_rights` (
  `string` varchar(52) NOT NULL,
  `minimum_rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_users`
--

CREATE TABLE IF NOT EXISTS `web_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e-mail` varchar(256) NOT NULL,
  `password` varchar(32) NOT NULL,
  `language` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
