/*
Navicat MySQL Data Transfer

Source Server         : AION
Source Server Version : 50702
Source Host           : localhost:3306
Source Database       : toon_shop

Target Server Type    : MYSQL
Target Server Version : 50702
File Encoding         : 65001

Date: 2015-10-24 14:29:12
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('4', 'Food');

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
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('sereepap1001', '827ccb0eea8a706c4c34a16891f84e7b', 'Sereepap', 'Khamsee', null, 'sereepap2029@gmail.com', '0804032819');
INSERT INTO `member` VALUES ('sereepap2029', '827ccb0eea8a706c4c34a16891f84e7b', 'Sereepap', 'Khamsee', null, 'sereepap2029@hotmail.com', '232123212');

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
-- Records of product
-- ----------------------------

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
-- Records of product_photo
-- ----------------------------

-- ----------------------------
-- Table structure for `sub_category`
-- ----------------------------
DROP TABLE IF EXISTS `sub_category`;
CREATE TABLE `sub_category` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_category` bigint(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sub_category
-- ----------------------------
INSERT INTO `sub_category` VALUES ('10', 'Sweet1', '4');

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

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('sadmin', 'sadmin', 'sadmin', 'sadmin', 'sadmin', '1426166350', null, '');
INSERT INTO `user` VALUES ('sereepap2029', '123456789', 'atom', 'atom', 'sadmin', '1444377340', 'all', null);
