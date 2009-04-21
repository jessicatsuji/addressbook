-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Apr 20, 2009 at 03:26 PM
-- Server version: 5.0.41
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `addressbook`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `contacts`
-- 

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL auto_increment,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) default NULL,
  `phone_one` int(11) default NULL,
  `phone_two` int(11) default NULL,
  `phone_three` int(11) default NULL,
  `email` varchar(50) default NULL,
  `company` varchar(50) default NULL,
  `address_one` varchar(75) default NULL,
  `address_two` varchar(75) default NULL,
  `city` varchar(50) default NULL,
  `state` varchar(2) default NULL,
  `zip_code` int(11) default NULL,
  `notes` text,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `contact_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- 
-- Dumping data for table `contacts`
-- 

INSERT INTO `contacts` VALUES (26, 'new', 'CONTACT', 823, 232, 2934, 'ema@a.il', 'super awesome', '', '', '', '1', 0, '', 1);
INSERT INTO `contacts` VALUES (27, 'jess', '', 0, 0, 0, '', '', '', '', '', '2', 0, '', 1);
INSERT INTO `contacts` VALUES (28, 'jess2', '', 0, 0, 0, '', '', '', '', '', '1', 0, '', 1);
INSERT INTO `contacts` VALUES (29, 'new', '', 0, 0, 0, '', '', '', '', '', '1', 0, '', 1);
INSERT INTO `contacts` VALUES (30, 'new contact', 'lastname', 239, 923, 2938, ';saldfka@laksjdf2.sda', 'alskdf', '', '', '', '1', 0, '', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `user_name` varchar(256) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `logged_in` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (1, 'admin', 'Kellan', 'Craddock', '21OZ4/WxREgV.', 1);
INSERT INTO `users` VALUES (2, 'jess', 'jess', '', '43gmvmg7ubF16', 0);
