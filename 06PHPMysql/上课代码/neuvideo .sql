-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 04 月 11 日 12:33
-- 服务器版本: 5.1.53
-- PHP 版本: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `neuvideo`
--

-- --------------------------------------------------------

--
-- 表的结构 `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `adminid` int(11) NOT NULL AUTO_INCREMENT,
  `adminname` varchar(40) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `admins`
--

INSERT INTO `admins` (`adminid`, `adminname`, `password`) VALUES
(1, '邹昌宏', '123456'),
(2, '吴诗帆', '654321');

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(600) COLLATE utf8_bin NOT NULL,
  `cdate` date NOT NULL,
  `uid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`cid`, `content`, `cdate`, `uid`, `vid`) VALUES
(1, '不是很好看，我还得看PHP', '2016-04-02', 1, 3);

-- --------------------------------------------------------

--
-- 表的结构 `levels`
--

CREATE TABLE IF NOT EXISTS `levels` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `vid` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '打分用户',
  `score` int(11) NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `levels`
--

INSERT INTO `levels` (`lid`, `vid`, `uid`, `score`) VALUES
(1, 1, 1, 10);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `uname` varchar(40) COLLATE utf8_bin NOT NULL COMMENT '用户',
  `password` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '密码',
  `gender` tinyint(4) NOT NULL COMMENT '性别',
  `birthdate` date NOT NULL,
  `hobby` varchar(50) COLLATE utf8_bin NOT NULL,
  `degree` tinyint(4) NOT NULL,
  `intro` text COLLATE utf8_bin NOT NULL,
  `pic` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`uid`, `uname`, `password`, `gender`, `birthdate`, `hobby`, `degree`, `intro`, `pic`) VALUES
(1, '邹昌宏', '123456', 1, '2016-04-01', 'woman', 2, 'hello world', 'nihaoa'),
(2, 'liuxiang', '123', 1, '2016-04-06', 'man', 2, 'ffff', 'fff');

-- --------------------------------------------------------

--
-- 表的结构 `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
  `tid` varchar(50) COLLATE utf8_bin NOT NULL,
  `videoname` varchar(30) COLLATE utf8_bin NOT NULL,
  `pic` varchar(30) COLLATE utf8_bin NOT NULL,
  `intro` varchar(2000) COLLATE utf8_bin NOT NULL,
  `uploaddate` date NOT NULL,
  `uploadadmin` int(11) NOT NULL,
  `hittimes` int(11) NOT NULL DEFAULT '0',
  `downtimes` int(11) NOT NULL DEFAULT '0',
  `address` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`vid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `videos`
--

INSERT INTO `videos` (`vid`, `tid`, `videoname`, `pic`, `intro`, `uploaddate`, `uploadadmin`, `hittimes`, `downtimes`, `address`) VALUES
(1, '1', 'Hero', '2', '2', '2016-04-01', 2, 20, 1, ''),
(2, '2', '亮剑', '1', '1', '2016-04-01', 1, 0, 20, ''),
(3, '3', 'hello panda', '1', '1', '2016-04-01', 1, 0, 30, '');

-- --------------------------------------------------------

--
-- 表的结构 `videotype`
--

CREATE TABLE IF NOT EXISTS `videotype` (
  `tid` int(11) NOT NULL AUTO_INCREMENT COMMENT '视频ID',
  `typename` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '视频类型名',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `videotype`
--

INSERT INTO `videotype` (`tid`, `typename`) VALUES
(1, '电影'),
(2, '电视剧'),
(3, '动画片');
