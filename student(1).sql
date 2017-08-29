-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-08-29 12:37:02
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stuid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stunum` varchar(20) NOT NULL,
  `stuname` varchar(50) NOT NULL,
  `stuage` int(11) NOT NULL,
  `stusex` varchar(4) NOT NULL,
  `stuclass` varchar(20) NOT NULL,
  `sutremark` text,
  PRIMARY KEY (`stuid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`stuid`, `stunum`, `stuname`, `stuage`, `stusex`, `stuclass`, `sutremark`) VALUES
(1, '20171001', '李晓明', 6, '1', '一年级', NULL),
(2, '20171002', '张小雅', 6, '0', '一年级', '好学生');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lasttime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`uid`, `username`, `password`, `lasttime`) VALUES
(1, 'admin', 'fa78fe90368f2369eafdfb80e14abcaf', '2017-08-29 17:00:36'),
(2, 'test', 'a5a5397266cd2885d51fb4afd87637cc', '2017-08-29 17:32:36');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
