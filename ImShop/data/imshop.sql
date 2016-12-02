-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-01 15:50:45
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imshop`
--

-- --------------------------------------------------------

--
-- 表的结构 `im_admin`
--

CREATE TABLE IF NOT EXISTS `im_admin` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `username` varchar(20) NOT NULL COMMENT '管理员姓名，唯一索引',
  `password` varchar(32) NOT NULL COMMENT '管理员密码',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `im_album`
--

CREATE TABLE IF NOT EXISTS `im_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `pid` int(11) NOT NULL COMMENT '商品的id',
  `albumpath` varchar(50) NOT NULL COMMENT '图片路径',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品相册表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `im_cate`
--

CREATE TABLE IF NOT EXISTS `im_cate` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cname` varchar(30) NOT NULL COMMENT '分类名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='分类表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `im_pro`
--

CREATE TABLE IF NOT EXISTS `im_pro` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `pname` varchar(50) NOT NULL COMMENT '商品名称',
  `psn` varchar(50) NOT NULL COMMENT '商品货号',
  `pnum` smallint(6) NOT NULL DEFAULT '0' COMMENT '商品数量',
  `mprice` decimal(10,2) NOT NULL COMMENT '市场价',
  `iprice` decimal(10,2) NOT NULL COMMENT '网站价',
  `pdesc` text COMMENT '商品简介',
  `pimg` varchar(255) NOT NULL COMMENT '商品图片',
  `pubtime` int(10) unsigned NOT NULL COMMENT '商品上架时间',
  `isshow` tinyint(1) unsigned NOT NULL COMMENT '商品是否上架',
  `ishot` tinyint(1) unsigned NOT NULL COMMENT '销量好的商品',
  `cid` int(11) NOT NULL COMMENT '所属分类ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `im_user`
--

CREATE TABLE IF NOT EXISTS `im_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `sex` enum('男','女','保密') NOT NULL DEFAULT '男' COMMENT '性别',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `face` varchar(255) NOT NULL COMMENT '头像',
  `regtime` int(10) unsigned NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
