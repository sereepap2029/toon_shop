/*
Navicat MySQL Data Transfer

Source Server         : AION
Source Server Version : 50702
Source Host           : localhost:3306
Source Database       : toon_shop

Target Server Type    : MYSQL
Target Server Version : 50702
File Encoding         : 65001

Date: 2015-10-25 23:50:35
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('4', 'Food');
INSERT INTO `category` VALUES ('5', 'Vehicle');
INSERT INTO `category` VALUES ('6', 'weapons');
INSERT INTO `category` VALUES ('7', 'ammo');
INSERT INTO `category` VALUES ('8', 'armor');

-- ----------------------------
-- Table structure for `item_cart`
-- ----------------------------
DROP TABLE IF EXISTS `item_cart`;
CREATE TABLE `item_cart` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of item_cart
-- ----------------------------

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
INSERT INTO `member` VALUES ('sereepap2029', '827ccb0eea8a706c4c34a16891f84e7b', 'Sereepap', 'Khamsee', '1445788831', 'sereepap2029@hotmail.com', '232123212');

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
INSERT INTO `product` VALUES ('0af3dc385b', 'm1a3 abrams', 'm1a3 abrams', '<p><br></p>', '20000000.00', '20000000.00', '0.00', 'y', '5', '25');
INSERT INTO `product` VALUES ('19bcd5b233', 'MRE', 'MRE', '<p><br></p>', '300.00', '300.00', '0.00', 'y', '4', '31');
INSERT INTO `product` VALUES ('1f0e3f2388', '.50 bmg', '.50 bmg', '<p><br></p>', '100.00', '100.00', '0.00', 'y', '7', '16');
INSERT INTO `product` VALUES ('251aa00424', 'humvee', 'humvee', '<p><br></p>', '4000000.00', '4000000.00', '0.00', 'y', '5', '28');
INSERT INTO `product` VALUES ('263014406e', '7.62 mm', '7.62 mm', '<p><br></p>', '60.00', '60.00', '0.00', 'y', '7', '15');
INSERT INTO `product` VALUES ('3dc8237d88', 'm40a3', 'm40a3', '<p><br></p>', '60000.00', '60000.00', '0.00', 'y', '6', '20');
INSERT INTO `product` VALUES ('50968a9240', 'M107', 'M107', '<p><br></p>', '1000000.00', '1000000.00', '0.00', 'y', '6', '20');
INSERT INTO `product` VALUES ('568f1b7791', '5.56 mm', '5.56 mm', '<p><br></p>', '50.00', '50.00', '0.00', 'y', '7', '15');
INSERT INTO `product` VALUES ('71735b881e', 'Armor1', 'armor', '<p><br></p>', '30000.00', '30000.00', '0.00', 'y', '8', '21');
INSERT INTO `product` VALUES ('729abe2c90', 'Agis', 'agis', '<p><br></p>', '5000.00', '5000.00', '0.00', 'y', '8', '0');
INSERT INTO `product` VALUES ('74e40a6dc3', 'food can', 'food can', '<p><br></p>', '100.00', '100.00', '0.00', 'y', '4', '30');
INSERT INTO `product` VALUES ('7836ce84d0', 'glock18', 'glock', '<p>just glock</p>', '3000.00', '3000.00', '0.00', 'y', '6', '19');
INSERT INTO `product` VALUES ('ae6aa2f740', 'M4a1', 'just m4a1', '<p>test</p>', '10000.00', '5000.00', '50.00', 'y', '6', '11');

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
INSERT INTO `product_photo` VALUES ('10a6dbae23', '3dc8237d88_10a6dbae23.jpg', '3', '3dc8237d88');
INSERT INTO `product_photo` VALUES ('173a2377cc', '19bcd5b233_173a2377cc.jpg', '1', '19bcd5b233');
INSERT INTO `product_photo` VALUES ('1a2410493d', '74e40a6dc3_1a2410493d.jpg', '2', '74e40a6dc3');
INSERT INTO `product_photo` VALUES ('237568d2dc', '0af3dc385b_237568d2dc.jpg', '1', '0af3dc385b');
INSERT INTO `product_photo` VALUES ('2b438c51ac', '19bcd5b233_2b438c51ac.jpg', '2', '19bcd5b233');
INSERT INTO `product_photo` VALUES ('3209877504', '0af3dc385b_3209877504.jpg', '2', '0af3dc385b');
INSERT INTO `product_photo` VALUES ('37adbdbf3c', '7836ce84d0_37adbdbf3c.jpg', '2', '7836ce84d0');
INSERT INTO `product_photo` VALUES ('3e876989dc', '3dc8237d88_3e876989dc.jpg', '2', '3dc8237d88');
INSERT INTO `product_photo` VALUES ('48d2de2a02', '71735b881e_48d2de2a02.jpg', '1', '71735b881e');
INSERT INTO `product_photo` VALUES ('6a305c5010', '74e40a6dc3_6a305c5010.jpg', '1', '74e40a6dc3');
INSERT INTO `product_photo` VALUES ('6aea6f15b0', '7836ce84d0_6aea6f15b0.jpg', '1', '7836ce84d0');
INSERT INTO `product_photo` VALUES ('7115a340f7', '3dc8237d88_7115a340f7.jpg', '1', '3dc8237d88');
INSERT INTO `product_photo` VALUES ('75596f1bc9', '251aa00424_75596f1bc9.jpg', '1', '251aa00424');
INSERT INTO `product_photo` VALUES ('80f88cb375', 'ae6aa2f740_80f88cb375.jpg', '3', 'ae6aa2f740');
INSERT INTO `product_photo` VALUES ('8d9490fd0d', 'ae6aa2f740_8d9490fd0d.jpg', '2', 'ae6aa2f740');
INSERT INTO `product_photo` VALUES ('8fd2616cfe', '19bcd5b233_8fd2616cfe.jpg', '3', '19bcd5b233');
INSERT INTO `product_photo` VALUES ('93d69c4c69', '50968a9240_93d69c4c69.jpg', '2', '50968a9240');
INSERT INTO `product_photo` VALUES ('9528709cff', 'ae6aa2f740_9528709cff.jpg', '1', 'ae6aa2f740');
INSERT INTO `product_photo` VALUES ('99b41a8733', '50968a9240_99b41a8733.jpg', '1', '50968a9240');
INSERT INTO `product_photo` VALUES ('a295759953', '263014406e_a295759953.jpg', '1', '263014406e');
INSERT INTO `product_photo` VALUES ('a8b9649486', '1f0e3f2388_a8b9649486.jpg', '1', '1f0e3f2388');
INSERT INTO `product_photo` VALUES ('c44d35baec', '729abe2c90_c44d35baec.jpg', '1', '729abe2c90');
INSERT INTO `product_photo` VALUES ('d6d4168fa8', '568f1b7791_d6d4168fa8.jpg', '1', '568f1b7791');
INSERT INTO `product_photo` VALUES ('e72ebfd1f0', '251aa00424_e72ebfd1f0.jpg', '2', '251aa00424');
INSERT INTO `product_photo` VALUES ('ece73a7733', '7836ce84d0_ece73a7733.jpg', '3', '7836ce84d0');

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
-- Records of sub_category
-- ----------------------------
INSERT INTO `sub_category` VALUES ('10', 'Sweet1', '4');
INSERT INTO `sub_category` VALUES ('11', 'M4A1', '6');
INSERT INTO `sub_category` VALUES ('12', 'AK107', '6');
INSERT INTO `sub_category` VALUES ('13', 'USA', '6');
INSERT INTO `sub_category` VALUES ('14', 'Russia', '6');
INSERT INTO `sub_category` VALUES ('15', 'Rifle', '7');
INSERT INTO `sub_category` VALUES ('16', 'sniper', '7');
INSERT INTO `sub_category` VALUES ('17', 'artillery', '7');
INSERT INTO `sub_category` VALUES ('18', 'Pistol', '7');
INSERT INTO `sub_category` VALUES ('19', 'Pistol', '6');
INSERT INTO `sub_category` VALUES ('20', 'sniper', '6');
INSERT INTO `sub_category` VALUES ('21', 'bullet proof', '8');
INSERT INTO `sub_category` VALUES ('22', 'plate', '8');
INSERT INTO `sub_category` VALUES ('23', 'leather', '8');
INSERT INTO `sub_category` VALUES ('24', 'uniform', '8');
INSERT INTO `sub_category` VALUES ('25', 'Tank', '5');
INSERT INTO `sub_category` VALUES ('26', 'Car', '5');
INSERT INTO `sub_category` VALUES ('27', 'Truck', '5');
INSERT INTO `sub_category` VALUES ('28', 'off road', '5');
INSERT INTO `sub_category` VALUES ('29', 'ship', '5');
INSERT INTO `sub_category` VALUES ('30', 'can', '4');
INSERT INTO `sub_category` VALUES ('31', 'MRE', '4');

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
INSERT INTO `user` VALUES ('sereepap2029', '123456789', 'atom', 'atom', 'sadmin', '1445768009', 'all', null);
