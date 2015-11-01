/*
Navicat MySQL Data Transfer

Source Server         : AION
Source Server Version : 50702
Source Host           : localhost:3306
Source Database       : toon_shop

Target Server Type    : MYSQL
Target Server Version : 50702
File Encoding         : 65001

Date: 2015-11-01 21:53:40
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bank
-- ----------------------------
INSERT INTO `bank` VALUES ('2', 'กสิกรไทย', '631-207-6-045', 'เสรีภาพ คำสี');

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
  `qty` bigint(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
INSERT INTO `member` VALUES ('sereepap2029', '827ccb0eea8a706c4c34a16891f84e7b', 'Sereepap', 'Khamsee', '1446381438', 'sereepap2029@hotmail.com', '232123212');

-- ----------------------------
-- Table structure for `member_address`
-- ----------------------------
DROP TABLE IF EXISTS `member_address`;
CREATE TABLE `member_address` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `province` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_usn` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of member_address
-- ----------------------------
INSERT INTO `member_address` VALUES ('2', 'มหาสารคาม', 'atom', '0804032819', 'sereepap2029', '44130');

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
-- Records of member_order
-- ----------------------------
INSERT INTO `member_order` VALUES ('f275f0fd13', 'sereepap2029', 'atom มหาสารคาม 44130', 'r', 'y', '1103000', '1446388381', '2', '1446388415');
INSERT INTO `member_order` VALUES ('f323f2b132', 'sereepap2029', 'atom มหาสารคาม 44130', 'r', 'y', '62100', '1446382801', '2', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of member_order_item
-- ----------------------------
INSERT INTO `member_order_item` VALUES ('1', '71735b881e', '2', 'f323f2b132');
INSERT INTO `member_order_item` VALUES ('2', '1f0e3f2388', '10', 'f323f2b132');
INSERT INTO `member_order_item` VALUES ('3', '568f1b7791', '10', 'f323f2b132');
INSERT INTO `member_order_item` VALUES ('4', '263014406e', '10', 'f323f2b132');
INSERT INTO `member_order_item` VALUES ('5', '71735b881e', '1', 'f275f0fd13');
INSERT INTO `member_order_item` VALUES ('6', '729abe2c90', '1', 'f275f0fd13');
INSERT INTO `member_order_item` VALUES ('7', '7836ce84d0', '1', 'f275f0fd13');
INSERT INTO `member_order_item` VALUES ('8', '50968a9240', '1', 'f275f0fd13');
INSERT INTO `member_order_item` VALUES ('9', '3dc8237d88', '1', 'f275f0fd13');
INSERT INTO `member_order_item` VALUES ('10', 'ae6aa2f740', '1', 'f275f0fd13');

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
-- Table structure for `province`
-- ----------------------------
DROP TABLE IF EXISTS `province`;
CREATE TABLE `province` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of province
-- ----------------------------
INSERT INTO `province` VALUES ('1', 'นครราชสีมา');
INSERT INTO `province` VALUES ('2', 'เชียงใหม่');
INSERT INTO `province` VALUES ('3', 'กาญจนบุรี');
INSERT INTO `province` VALUES ('4', 'ตาก');
INSERT INTO `province` VALUES ('5', 'อุบลราชธานี');
INSERT INTO `province` VALUES ('6', 'สุราษฎร์ธานี');
INSERT INTO `province` VALUES ('7', 'ชัยภูมิ');
INSERT INTO `province` VALUES ('8', 'แม่ฮ่องสอน');
INSERT INTO `province` VALUES ('9', 'เพชรบูรณ์');
INSERT INTO `province` VALUES ('10', 'ลำปาง');
INSERT INTO `province` VALUES ('11', 'อุดรธานี');
INSERT INTO `province` VALUES ('12', 'เชียงราย');
INSERT INTO `province` VALUES ('13', 'น่าน');
INSERT INTO `province` VALUES ('14', 'เลย');
INSERT INTO `province` VALUES ('15', 'ขอนแก่น');
INSERT INTO `province` VALUES ('16', 'พิษณุโลก');
INSERT INTO `province` VALUES ('17', 'บุรีรัมย์');
INSERT INTO `province` VALUES ('18', 'นครศรีธรรมราช');
INSERT INTO `province` VALUES ('19', 'สกลนคร');
INSERT INTO `province` VALUES ('20', 'นครสวรรค์');
INSERT INTO `province` VALUES ('21', 'ศรีสะเกษ');
INSERT INTO `province` VALUES ('22', 'กำแพงเพชร');
INSERT INTO `province` VALUES ('23', 'ร้อยเอ็ด');
INSERT INTO `province` VALUES ('24', 'สุรินทร์');
INSERT INTO `province` VALUES ('25', 'อุตรดิตถ์');
INSERT INTO `province` VALUES ('26', 'สงขลา');
INSERT INTO `province` VALUES ('27', 'สระแก้ว');
INSERT INTO `province` VALUES ('28', 'กาฬสินธุ์');
INSERT INTO `province` VALUES ('29', 'อุทัยธานี');
INSERT INTO `province` VALUES ('30', 'สุโขทัย');
INSERT INTO `province` VALUES ('31', 'แพร่');
INSERT INTO `province` VALUES ('32', 'ประจวบคีรีขันธ์');
INSERT INTO `province` VALUES ('33', 'จันทบุรี');
INSERT INTO `province` VALUES ('34', 'พะเยา');
INSERT INTO `province` VALUES ('35', 'เพชรบุรี');
INSERT INTO `province` VALUES ('36', 'ลพบุรี');
INSERT INTO `province` VALUES ('37', 'ชุมพร');
INSERT INTO `province` VALUES ('38', 'นครพนม');
INSERT INTO `province` VALUES ('39', 'สุพรรณบุรี');
INSERT INTO `province` VALUES ('40', 'ฉะเชิงเทรา');
INSERT INTO `province` VALUES ('41', 'มหาสารคาม');
INSERT INTO `province` VALUES ('42', 'ราชบุรี');
INSERT INTO `province` VALUES ('43', 'ตรัง');
INSERT INTO `province` VALUES ('44', 'ปราจีนบุรี');
INSERT INTO `province` VALUES ('45', 'กระบี่');
INSERT INTO `province` VALUES ('46', 'พิจิตร');
INSERT INTO `province` VALUES ('47', 'ยะลา');
INSERT INTO `province` VALUES ('48', 'ลำพูน');
INSERT INTO `province` VALUES ('49', 'นราธิวาส');
INSERT INTO `province` VALUES ('50', 'ชลบุรี');
INSERT INTO `province` VALUES ('51', 'มุกดาหาร');
INSERT INTO `province` VALUES ('52', 'บึงกาฬ');
INSERT INTO `province` VALUES ('53', 'พังงา');
INSERT INTO `province` VALUES ('54', 'ยโสธร');
INSERT INTO `province` VALUES ('55', 'หนองบัวลำภู');
INSERT INTO `province` VALUES ('56', 'สระบุรี');
INSERT INTO `province` VALUES ('57', 'ระยอง');
INSERT INTO `province` VALUES ('58', 'พัทลุง');
INSERT INTO `province` VALUES ('59', 'ระนอง');
INSERT INTO `province` VALUES ('60', 'อำนาจเจริญ');
INSERT INTO `province` VALUES ('61', 'หนองคาย');
INSERT INTO `province` VALUES ('62', 'ตราด');
INSERT INTO `province` VALUES ('63', 'พระนครศรีอยุธยา');
INSERT INTO `province` VALUES ('64', 'สตูล');
INSERT INTO `province` VALUES ('65', 'ชัยนาท');
INSERT INTO `province` VALUES ('66', 'นครปฐม');
INSERT INTO `province` VALUES ('67', 'นครนายก');
INSERT INTO `province` VALUES ('68', 'ปัตตานี');
INSERT INTO `province` VALUES ('69', 'กรุงเทพมหานคร');
INSERT INTO `province` VALUES ('70', 'ปทุมธานี');
INSERT INTO `province` VALUES ('71', 'สมุทรปราการ');
INSERT INTO `province` VALUES ('72', 'อ่างทอง');
INSERT INTO `province` VALUES ('73', 'สมุทรสาคร');
INSERT INTO `province` VALUES ('74', 'สิงห์บุรี');
INSERT INTO `province` VALUES ('75', 'นนทบุรี');
INSERT INTO `province` VALUES ('76', 'ภูเก็ต');
INSERT INTO `province` VALUES ('77', 'สมุทรสงคราม');

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
INSERT INTO `user` VALUES ('sereepap2029', '123456789', 'atom', 'atom', 'sadmin', '1446387772', 'all', null);
