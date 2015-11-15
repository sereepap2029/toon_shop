/*
Navicat MySQL Data Transfer

Source Server         : AION
Source Server Version : 50702
Source Host           : localhost:3306
Source Database       : toon_shop

Target Server Type    : MYSQL
Target Server Version : 50702
File Encoding         : 65001

Date: 2015-11-15 19:11:43
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `bank`
-- ----------------------------
DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for `item_cart`
-- ----------------------------
DROP TABLE IF EXISTS `item_cart`;
CREATE TABLE `item_cart` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` bigint(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for `member`
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_access` bigint(11) DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for `member_address`
-- ----------------------------
DROP TABLE IF EXISTS `member_address`;
CREATE TABLE `member_address` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `province` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_usn` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for `member_order`
-- ----------------------------
DROP TABLE IF EXISTS `member_order`;
CREATE TABLE `member_order` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `member_usn` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `paid` enum('n','r','y') COLLATE utf8_unicode_ci DEFAULT 'n',
  `send` enum('n','y') COLLATE utf8_unicode_ci DEFAULT 'n',
  `amount` bigint(11) DEFAULT '0',
  `time` bigint(11) DEFAULT '0',
  `bank_id` bigint(11) DEFAULT NULL,
  `send_order_time` bigint(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for `member_order_item`
-- ----------------------------
DROP TABLE IF EXISTS `member_order_item`;
CREATE TABLE `member_order_item` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` bigint(11) DEFAULT '1',
  `order_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sub_des` text COLLATE utf8_unicode_ci,
  `des` text COLLATE utf8_unicode_ci,
  `real_price` float(11,2) NOT NULL,
  `sale_price` float(11,2) DEFAULT NULL,
  `sale_percent` float(11,2) DEFAULT NULL,
  `in_stock` enum('n','y') COLLATE utf8_unicode_ci DEFAULT 'y',
  `main_cat` bigint(11) NOT NULL DEFAULT '0',
  `sub_cat` bigint(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for `product_photo`
-- ----------------------------
DROP TABLE IF EXISTS `product_photo`;
CREATE TABLE `product_photo` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `product_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for `province`
-- ----------------------------
DROP TABLE IF EXISTS `province`;
CREATE TABLE `province` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for `sub_category`
-- ----------------------------
DROP TABLE IF EXISTS `sub_category`;
CREATE TABLE `sub_category` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_category` bigint(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` enum('viewer','clamer','admin','company','sadmin') COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_access` bigint(11) DEFAULT NULL,
  `company` varchar(600) COLLATE utf8_unicode_ci DEFAULT 'all',
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
