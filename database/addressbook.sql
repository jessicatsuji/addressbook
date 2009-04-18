-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Apr 17, 2009 at 07:55 PM
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
  `contact_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `contact_id` (`contact_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `contacts`
-- 


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (1, 'admin', 'Kellan', 'Craddock', '21OZ4/WxREgV.', 0);
