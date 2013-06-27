-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 27, 2013 at 11:29 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `aco`
--

CREATE TABLE IF NOT EXISTS `aco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `collection_id` int(11) NOT NULL,
  `path` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `aco_collection_id` (`collection_id`),
  KEY `path` (`path`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `aco_collection`
--

CREATE TABLE IF NOT EXISTS `aco_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(20) NOT NULL,
  `model` varchar(15) NOT NULL,
  `foreign_key` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `alias` (`alias`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE IF NOT EXISTS `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`id`, `name`, `created`) VALUES
(5, 'create', 0),
(6, 'read', 0),
(7, 'update', 0),
(8, 'delete', 0),
(9, 'grant', 0);

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `rate` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `answer`, `rate`, `active`, `created`, `modified`, `question_id`) VALUES
(1, 1, 'my answer is ', 0, 0, '2013-04-26 11:51:58', '2013-04-26 11:51:58', 10),
(2, 1, 'pakula', 0, 0, '2013-04-26 11:59:44', '2013-04-26 11:59:44', 10),
(3, 1, 'test', 0, 0, '2013-04-26 14:06:25', '2013-04-26 14:06:25', 10),
(4, 1, 'pata ni kayko', 0, 0, '2013-04-26 14:20:24', '2013-04-26 14:20:24', 10),
(5, 1, 'aur batao kya haal h', 0, 0, '2013-04-26 14:22:55', '2013-04-26 14:22:55', 14),
(6, 1, 'test', 0, 0, '2013-04-26 16:25:53', '2013-04-26 16:25:53', 14),
(7, 1, 'i dont know', 0, 0, '2013-04-26 16:27:31', '2013-04-26 16:27:31', 16),
(8, 1, '<div align="center"><ol><li>to me kya karu karte k<span style="color:rgb(255,0,0);"><i style="color: rgb(255, 0, 0);">yun ho login db se</i></span><i></i></li><li>ma<b>t karo na</b><br></li></ol></div>', 0, 0, '2013-04-26 16:46:30', '2013-04-26 16:46:30', 16),
(9, 1, 'ek kaam kato bata bhi do<br>', 0, 1, '2013-04-29 15:37:58', '2013-04-29 15:37:58', 21),
(10, 1, 'chalo theek h<br>', 0, 0, '2013-04-29 15:38:26', '2013-04-29 15:38:26', 21),
(11, 1, 'ka theek h<br>', 0, 0, '2013-04-30 07:52:46', '2013-04-30 07:52:46', 21),
(12, 1, 'chal to be<br>', 0, 1, '2013-04-30 08:12:03', '2013-04-30 08:12:03', 21),
(13, 1, 'bata na<br>', 0, 0, '2013-05-04 09:49:21', '2013-05-04 09:49:21', 21),
(14, 1, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>', 0, 1, '2013-06-26 16:21:15', '2013-06-26 16:21:15', 10),
(15, 1, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>', 0, 1, '2013-06-26 16:21:57', '2013-06-26 16:21:57', 10),
(16, 1, 'hi dear<br>', 0, 0, '2013-06-27 09:50:02', '2013-06-27 09:50:02', 29),
(17, 1, 'popo', 0, 0, '2013-06-27 09:51:57', '2013-06-27 09:51:57', 29);

-- --------------------------------------------------------

--
-- Table structure for table `aro`
--

CREATE TABLE IF NOT EXISTS `aro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `collection_id` int(11) NOT NULL,
  `path` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `aco_collection_id` (`collection_id`),
  KEY `path` (`path`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `aro_collection`
--

CREATE TABLE IF NOT EXISTS `aro_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(20) NOT NULL,
  `model` varchar(15) NOT NULL,
  `foreign_key` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `alias` (`alias`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `author` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comment_post` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `status`, `create_time`, `author`, `email`, `url`, `post_id`) VALUES
(1, 'This is a test comment.', 2, 1230952187, 'Tester', 'tester@example.com', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'User', '2013-05-14 13:29:26', '2013-05-14 13:29:26');

-- --------------------------------------------------------

--
-- Table structure for table `lookup`
--

CREATE TABLE IF NOT EXISTS `lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `lookup`
--

INSERT INTO `lookup` (`id`, `name`, `code`, `type`, `position`) VALUES
(1, 'Draft', 1, 'PostStatus', 1),
(2, 'Published', 2, 'PostStatus', 2),
(3, 'Archived', 3, 'PostStatus', 3),
(4, 'Pending Approval', 1, 'CommentStatus', 1),
(5, 'Approved', 2, 'CommentStatus', 2);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aco_id` int(11) NOT NULL,
  `aro_id` int(11) NOT NULL,
  `aco_path` varchar(11) NOT NULL,
  `aro_path` varchar(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `aco_id` (`aco_id`,`aro_id`,`aco_path`,`aro_path`),
  KEY `action_id` (`action_id`),
  KEY `created` (`created`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_post_author` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `tags`, `status`, `create_time`, `update_time`, `author_id`) VALUES
(1, 'Welcome!', 'This blog system is developed using Yii. It is meant to demonstrate how to use Yii to build a complete real-world application. Complete source code may be found in the Yii releases.\n\nFeel free to try this system by writing new posts and posting comments.', 'yii, blog', 2, 1230952187, 1230952187, 1),
(2, 'A Test Post', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'test', 2, 1230952187, 1230952187, 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `question_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `question_title`, `description`, `active`, `created`, `modified`) VALUES
(10, 1, 'why people are showing so much', 'while people can be simple and honest why they are trying to be best than other, why they want that much.', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 1, 'test', 'tetsgdfhgsdfd <br>', 1, '2013-04-29 15:14:24', '2013-04-29 15:14:24'),
(18, 1, 'mera question ye h', 'tu kayko beech beech me...<br>', 1, '2013-04-29 15:15:12', '2013-04-29 15:15:12'),
(19, 1, 'cis question', 'nice question nice<b><span style="color:rgb(61,133,198);"> question hello heloo</span></b><br>', 1, '2013-04-29 15:19:50', '2013-04-29 15:19:50'),
(21, 20, 'batana be', '<b>ka bataye</b> kachu bhi batao<br>', 1, '2013-04-29 15:28:59', '2013-04-29 15:28:59'),
(22, 0, 'how to create role in yii', 'plz help if any one can suggest in this<br>', 1, '2013-05-13 16:20:23', '2013-05-13 16:20:23'),
(24, 13, 'wamp', 'wamp', 0, '2013-06-15 12:14:03', '2013-06-15 12:14:03'),
(25, 0, 'test', 'test', 1, '2013-06-15 12:14:28', '2013-06-15 12:14:28'),
(26, 1, 'test', 'test<p></p>', 1, '2013-06-26 09:14:09', '2013-06-26 09:14:09'),
(27, 1, 'what is Testing?', '<a href="http://testing.com/">Testing.com</a>', 1, '2013-06-26 16:23:28', '2013-06-26 16:23:28'),
(28, 0, 'hello', 'hello world<br>', 0, '2013-06-27 08:47:14', '2013-06-27 08:47:14'),
(29, 0, 'world', '<span style="color: rgb(153, 0, 0);">hello<span style="color: rgb(255, 0, 0);"><span style="color:rgb(255,0,0);">&nbsp;</span></span></span>', 1, '2013-06-27 08:55:48', '2013-06-27 08:55:48'),
(30, 0, 'test', 'test', 0, '2013-06-27 08:59:42', '2013-06-27 08:59:42'),
(31, 0, 'wow', 'wow', 0, '2013-06-27 09:00:23', '2013-06-27 09:00:23'),
(32, 0, 'mm', 'mm', 0, '2013-06-27 09:02:31', '2013-06-27 09:02:31'),
(33, 0, 'lal', 'lalala', 0, '2013-06-27 09:05:01', '2013-06-27 09:05:01'),
(34, 0, 'popo', 'po', 0, '2013-06-27 09:08:03', '2013-06-27 09:08:03'),
(35, 0, 'bvcbc', 'vbvcbvc', 0, '2013-06-27 09:09:28', '2013-06-27 09:09:28'),
(36, 0, 'saasdsad', 'asdsa', 0, '2013-06-27 09:30:08', '2013-06-27 09:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `frequency` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`, `frequency`) VALUES
(1, 'yii', 1),
(2, 'blog', 1),
(3, 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `profile` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `group_id`, `username`, `password`, `email`, `profile`) VALUES
(1, 1, 'admin', '$1$9u6diYDN$kT2CRLz6KDc3wrRLa4ZTQ1', 'webmaster@example.com', NULL),
(13, 2, 'jitz', '$1$fEZr65Dh$wAFo82.dtR50RIkTsoVVL0', 'jitz@jidsfhjh', NULL),
(14, 2, 'kdjafh', '$1$3Ysy9bwe$EFjzddXi2YOpjjWZmXVEa.', 'djsfklh@jgh', NULL),
(15, 2, 'dfgfdg', '$1$k3QmQBBM$9EGUF8RxMxF56XC/SgDKL/', 'dfgfd@hgffdg', NULL),
(16, 2, 'sdfsdfd', '123456', 'gfgfg@fgfdgfdg', NULL),
(17, 2, 'gfdg', '1234567', 'dfgfd@hgffdg', NULL),
(18, 2, 'sfsdfdsf', '123456', 'jitz@jidsfhjh', NULL),
(19, 2, 'loga', '$1$kdiWmli1$cqHzz5co9uQNCkB4pbK/w.', 'loga@jdsfh', NULL),
(20, 2, 'cis', '$1$1BfhaiBz$kJdoMSDfdHasUHhpSJzHZ1', 'cis@cis.com', NULL),
(21, 2, 'vikash', '$1$pZXEwv29$iG9VP8tYU6oY5ZskCEIR2.', 'vikash.v@cisinlabs.com', NULL),
(22, 2, 'test', '$1$9u6diYDN$kT2CRLz6KDc3wrRLa4ZTQ1', 'test@test.com', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_comment_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_post_author` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
