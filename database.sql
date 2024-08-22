/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 80027
 Source Host           : localhost:3306
 Source Schema         : doan2

 Target Server Type    : MySQL
 Target Server Version : 80027
 File Encoding         : 65001

 Date: 06/12/2021 23:13:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_admin
-- ----------------------------
DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE `tbl_admin`  (
  `adminId` int NOT NULL AUTO_INCREMENT,
  `adminName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `adminEmail` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `adminUser` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `adminPass` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`adminId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_admin
-- ----------------------------
INSERT INTO `tbl_admin` VALUES (1, 'phu', 'phu@gmail.com', 'phuAdmin', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `tbl_admin` VALUES (2, 'admin', 'admin@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `tbl_admin` VALUES (3, 'duong', 'duong@gmail.com', 'duongAdmin', '202cb962ac59075b964b07152d234b70');

-- ----------------------------
-- Table structure for tbl_cart
-- ----------------------------
DROP TABLE IF EXISTS `tbl_cart`;
CREATE TABLE `tbl_cart`  (
  `cartId` int NOT NULL AUTO_INCREMENT,
  `productId` int NOT NULL,
  `sId` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `productName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cartId`) USING BTREE,
  INDEX `productId`(`productId`) USING BTREE,
  CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_cart
-- ----------------------------
INSERT INTO `tbl_cart` VALUES (17, 2, 'g1t1jue8jfpm71a78msqv9r7m1', 'Asus Zenbook UX425EA i5 1135G7/8GB/512GB SSD/Win 10', '23999000', 1, '637387847968338274_637335980720863180_asus-zenbook-ux425ja-xam-1.png');
INSERT INTO `tbl_cart` VALUES (18, 2, '1dhl9r3vrhjdrbte4sfh7aajed', 'Asus Zenbook UX425EA i5 1135G7/8GB/512GB SSD/Win 10', '23999000', 1, '637387847968338274_637335980720863180_asus-zenbook-ux425ja-xam-1.png');
INSERT INTO `tbl_cart` VALUES (23, 2, 'humsrtn2171fb60n318kkamlp5', 'Asus Zenbook UX425EA i5 1135G7/8GB/512GB SSD/Win 10', '23999000', 1, '637387847968338274_637335980720863180_asus-zenbook-ux425ja-xam-1.png');
INSERT INTO `tbl_cart` VALUES (28, 4, '5is4rpnb8st9fb0u7rkvkfunjv', 'Laptop Acer Swift X SFX14-41G-R61A R5 5600U/16GB/1TB SSD/RTX 3050 Ti 4GB/Win10', '29999000', 2, '637681141749185285_acer-swift-x-sfx14-41g-vang-1.jpg');
INSERT INTO `tbl_cart` VALUES (30, 2, '5is4rpnb8st9fb0u7rkvkfunjv', 'Asus Zenbook UX425EA i5 1135G7/8GB/512GB SSD/Win 10', '23999000', 1, '637387847968338274_637335980720863180_asus-zenbook-ux425ja-xam-1.png');
INSERT INTO `tbl_cart` VALUES (31, 4, '6jp2jkhrvfqe5b0fd0sseinbje', 'Laptop Acer Swift X SFX14-41G-R61A R5 5600U/16GB/1TB SSD/RTX 3050 Ti 4GB/Win10', '29999000', 1, '637681141749185285_acer-swift-x-sfx14-41g-vang-1.jpg');

-- ----------------------------
-- Table structure for tbl_category
-- ----------------------------
DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category`  (
  `catId` int NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`catId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_category
-- ----------------------------
INSERT INTO `tbl_category` VALUES (5, 'Mobile Phones');
INSERT INTO `tbl_category` VALUES (6, 'Accessories');
INSERT INTO `tbl_category` VALUES (7, 'Software');
INSERT INTO `tbl_category` VALUES (15, 'Dell');
INSERT INTO `tbl_category` VALUES (16, 'Asus');
INSERT INTO `tbl_category` VALUES (17, 'Acer');
INSERT INTO `tbl_category` VALUES (18, 'Apple');
INSERT INTO `tbl_category` VALUES (21, 'MSI');

-- ----------------------------
-- Table structure for tbl_comment
-- ----------------------------
DROP TABLE IF EXISTS `tbl_comment`;
CREATE TABLE `tbl_comment`  (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `productId` int NOT NULL,
  `userName` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `type` int NULL DEFAULT NULL,
  `reply` int NULL DEFAULT NULL,
  PRIMARY KEY (`comment_id`) USING BTREE,
  INDEX `productId`(`productId`) USING BTREE,
  CONSTRAINT `tbl_comment_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_comment
-- ----------------------------
INSERT INTO `tbl_comment` VALUES (44, 2, 'Duong Nguyen Dai', 'bbbbbbbbbbbbbb', '2021-11-17 07:37:55', 0, 0);
INSERT INTO `tbl_comment` VALUES (45, 2, 'duong', '....................', '2021-11-17 07:39:53', 1, 44);
INSERT INTO `tbl_comment` VALUES (46, 2, 'Duong Nguyen Dai', 'ooooo', '2021-11-17 07:49:13', 0, 44);
INSERT INTO `tbl_comment` VALUES (47, 4, 'Nguyễn Anh Tú', '20 triệu thì mua', '2021-11-29 17:26:53', 0, 0);
INSERT INTO `tbl_comment` VALUES (48, 4, 'duong', 'Bạn chờ thêm 3 năm nữa nhé!', '2021-11-29 17:27:35', 1, 47);

-- ----------------------------
-- Table structure for tbl_customer
-- ----------------------------
DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE `tbl_customer`  (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`customer_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_customer
-- ----------------------------
INSERT INTO `tbl_customer` VALUES (3, 'Nguyễn Anh Tú', 'lam', 'TPHCM', 'hcm', '700000', '099999123', 'thanhviendangki@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `tbl_customer` VALUES (4, 'Bờ Văn Cờ', 'kam', 'TPHCM', 'hcm', '700000', '522525294', 'hoathuytinh071@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `tbl_customer` VALUES (5, 'Sinn', 'dhwquihduwiq', 'TPHCM', 'hcm', '700000', '0522525294', 'abc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `tbl_customer` VALUES (6, 'Duong Nguyen Dai', 'abcdef', 'Da Nangggggg', 'VI', '50000', '0912321123', 'duong@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `tbl_customer` VALUES (7, 'dai duong', 'qqqq', 'abc', 'AL', '80000', '123456789', 'duongpro@gmail.com', '202cb962ac59075b964b07152d234b70');
INSERT INTO `tbl_customer` VALUES (8, 'duong fake', 'abcdefghjklmwqwq', 'da nangggggg', 'VI', '700000', '0912346543', 'duongfake@gmail.com', '202cb962ac59075b964b07152d234b70');
INSERT INTO `tbl_customer` VALUES (9, 'duong real', 'dựqidowqio', 'da nnnang', 'BD', '10000', '123123123123', 'duongreal@gmail.com', '202cb962ac59075b964b07152d234b70');

-- ----------------------------
-- Table structure for tbl_history
-- ----------------------------
DROP TABLE IF EXISTS `tbl_history`;
CREATE TABLE `tbl_history`  (
  `history_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `productId` int NOT NULL,
  `quantity` int NOT NULL,
  `date` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`history_id`) USING BTREE,
  INDEX `customer_id`(`customer_id`) USING BTREE,
  INDEX `productId`(`productId`) USING BTREE,
  CONSTRAINT `tbl_history_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tbl_history_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_history
-- ----------------------------
INSERT INTO `tbl_history` VALUES (1, 6, 1, 2, '2021-11-07 14:38:31');
INSERT INTO `tbl_history` VALUES (2, 5, 1, 1, '2021-11-08 09:34:16');
INSERT INTO `tbl_history` VALUES (3, 6, 2, 3, '2021-12-06 12:27:52');
INSERT INTO `tbl_history` VALUES (4, 6, 2, 3, '2021-12-06 12:27:52');
INSERT INTO `tbl_history` VALUES (5, 6, 4, 1, '2021-12-06 12:27:59');

-- ----------------------------
-- Table structure for tbl_order
-- ----------------------------
DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE `tbl_order`  (
  `orderId` int NOT NULL AUTO_INCREMENT,
  `productId` int NOT NULL,
  `productName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT 0,
  `date_order` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`orderId`) USING BTREE,
  INDEX `productId`(`productId`) USING BTREE,
  INDEX `customer_id`(`customer_id`) USING BTREE,
  CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_order
-- ----------------------------
INSERT INTO `tbl_order` VALUES (6, 1, 'MacBook Pro 16\" 2021 M1 Max 1TB', 6, 2, '185998000', '637703174146015116_macbook-pro-16-2021-xam-dd.jpg', 2, '2021-11-07 14:38:20');
INSERT INTO `tbl_order` VALUES (8, 2, 'Asus Zenbook UX425EA i5 1135G7/8GB/512GB SSD/Win 10', 6, 3, '71997000', '637387847968338274_637335980720863180_asus-zenbook-ux425ja-xam-1.png', 2, '2021-11-17 08:38:01');
INSERT INTO `tbl_order` VALUES (9, 4, 'Laptop Acer Swift X SFX14-41G-R61A R5 5600U/16GB/1TB SSD/RTX 3050 Ti 4GB/Win10', 6, 1, '29999000', '637681141749185285_acer-swift-x-sfx14-41g-vang-1.jpg', 2, '2021-11-30 16:00:33');
INSERT INTO `tbl_order` VALUES (10, 6, 'MSI Stealth 15M A11SDK 061VN i7 1185G7/16GB/512GB/GTX1660Ti MaxQ 6GB/Win 10', 3, 1, '34490000', '637522644736551890_msi-stealth-15m-xam-1.jpg', 0, '2021-12-06 22:43:12');

-- ----------------------------
-- Table structure for tbl_product
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE `tbl_product`  (
  `productId` int NOT NULL AUTO_INCREMENT,
  `productName` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `productQuantity` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_soldout` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '0',
  `product_remain` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `catId` int NOT NULL,
  `brandId` int NULL DEFAULT NULL,
  `product_desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` int NOT NULL,
  `price` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `image2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `image3` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `image4` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `image5` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`productId`) USING BTREE,
  INDEX `catId`(`catId`) USING BTREE,
  CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `tbl_category` (`catId`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_product
-- ----------------------------
INSERT INTO `tbl_product` VALUES (1, 'MacBook Pro 16\" 2021 M1 Max 1TB', 'Apple0001', '7', '3', '4', 18, NULL, '<p>CPU&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span>Apple M1 Max</span></p>\r\n<p><span><span>RAM&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;32GB</span></span></p>\r\n<p><span><span><span>M&agrave;n h&igrave;nh&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span>16.2\", 3456 x 2234 Pixel</span></span></span></span></p>\r\n<p><span><span><span><span>Đồ họa&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span>Apple M1</span></span></span></span></span></p>\r\n<p><span><span><span><span><span>Ổ cứng&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span>SSD 1 TB</span></span></span></span></span></span></p>\r\n<p><span><span><span><span><span><span>Hệ điều h&agrave;nh&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; MAC OS</span></span></span></span></span></span></p>\r\n<p><span><span><span><span><span><span><span>Trọng lượng (kg)&nbsp; &nbsp; &nbsp;<span>2.129</span></span></span></span></span></span></span></span></p>\r\n<p><span>Xuất xứ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span>Trung Quốc</span></span></p>\r\n<p><span><span>Năm ra mắt&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2021</span></span></p>', 1, '92999000', '637703174146015116_macbook-pro-16-2021-xam-dd.jpg', '637702682507677814_macbook-pro-16-2021-xam-2.jpg', '637702682508615222_macbook-pro-16-2021-xam-1.jpg', '637702682511584031_macbook-pro-16-2021-xam-4.jpg', '637702682505958965_macbook-pro-16-2021-xam-3.jpg');
INSERT INTO `tbl_product` VALUES (2, 'Asus Zenbook UX425EA i5 1135G7/8GB/512GB SSD/Win 10', 'Asus0001', '7', '6', '1', 16, NULL, '<p><span>CPU&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span>Intel Core i5-1135G7</span></span></p>\r\n<p>RAM&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span>8 GB, LPDDR4X, 3200 MHz</span></p>\r\n<p>M&agrave;n h&igrave;nh&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span>14.0\", 1920 x 1080 Pixel, IPS, 60 Hz, 400 nits, Anti-glare LED-backlit</span></p>\r\n<p>Đồ họa&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span>Intel Iris Xe Graphics</span></p>\r\n<p>Ổ Cứng&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span>SSD 512 GB</span></p>\r\n<p>Hệ điều h&agrave;nh&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span>Windows 10</span></p>\r\n<p>Trọng lượng (kg)&nbsp; &nbsp; &nbsp;1.17</p>\r\n<p>K&iacute;ch thước (mm)&nbsp; &nbsp; &nbsp;<span>319 x 208 x 13.9</span></p>\r\n<p>Xuất sứ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Trung Quốc</p>\r\n<p>Năm ra mắt&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2021</p>', 1, '23999000', '637387847968338274_637335980720863180_asus-zenbook-ux425ja-xam-1.png', '637387847968494606_637335980720467274_asus-zenbook-ux425ja-xam-2.png', '637387847968494606_637335980720078468_asus-zenbook-ux425ja-xam-4.png', '637387847968494606_637335980720682971_asus-zenbook-ux425ja-xam-3.png', '637387847968494606_637335980720078468_asus-zenbook-ux425ja-xam-4.png');
INSERT INTO `tbl_product` VALUES (4, 'Laptop Acer Swift X SFX14-41G-R61A R5 5600U/16GB/1TB SSD/RTX 3050 Ti 4GB/Win10', 'Acer0001', '10', '1', '9', 17, NULL, '<p><span>CPU&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span>AMD Ryzen 5-5600U</span></span></p>\r\n<p><span><span>RAM&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span>16 GB, LPDDR4X, 2666 MHz</span></span></span></p>\r\n<p><span><span><span>M&agrave;n h&igrave;nh&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span>14.0\", 1920 x 1080 Pixel, IPS, 60 Hz, Acer ComfyView LED-backlit</span></span></span></span></p>\r\n<p><span><span><span><span>Đồ họa&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span>NVIDIA GeForce RTX 3050Ti 4 GB</span></span></span></span></span></p>\r\n<p><span>Hệ điều h&agrave;nh&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span>Windows 10</span></span></p>\r\n<p><span><span>Trọng lượng (kg)&nbsp; &nbsp;&nbsp;<span>1.39</span></span></span></p>\r\n<p><span><span><span>K&iacute;ch thước (mm)&nbsp; &nbsp;<span>322.8 x 212.2 x 17.9</span></span></span></span></p>\r\n<p><span><span><span><span>Xuất xứ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span>Trung Quốc</span></span></span></span></span></p>\r\n<p><span><span><span><span><span>Năm ra mắt&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span>2021</span></span></span></span></span></span></p>', 1, '29999000', '637681141749185285_acer-swift-x-sfx14-41g-vang-1.jpg', '637681141748560247_acer-swift-x-sfx14-41g-vang-2.jpg', '637681141742935323_acer-swift-x-sfx14-41g-vang-3.jpg', '637681141747466549_acer-swift-x-sfx14-41g-vang-4.jpg', '637681141746685277_acer-swift-x-sfx14-41g-vang-5.jpg');
INSERT INTO `tbl_product` VALUES (5, 'Dell Inspiron N5515 R7 5700U/8GB/512GB/15.6FHD/Win 10', 'Dell0001', '0', '0', '0', 15, NULL, '<p>CPU&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span>AMD Ryzen 7-5700U</span></p>\r\n<p><span>RAM&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span>8 GB, DDR4, 3200 MHz</span></span></p>\r\n<p><span><span>M&agrave;n h&igrave;nh&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span>15.6\", 1920 x 1080 Pixel, 60 Hz, 250 nits, Anti-glare LED-backlit</span></span></span></p>\r\n<p><span><span><span>Ổ cứng&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span>SSD 512 GB</span></span></span></span></p>\r\n<p><span><span><span><span><span>Hệ điều h&agrave;nh&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span>Windows 10</span></span></span></span></span></span></p>\r\n<p><span><span><span><span><span><span>Trọng lượng (kg)&nbsp; &nbsp; &nbsp;<span>1.75</span></span></span></span></span></span></span></p>\r\n<p><span><span><span><span><span><span><span>K&iacute;ch thước (mm)&nbsp; &nbsp; &nbsp;<span>357 x 228 x 14.7</span></span></span></span></span></span></span></span></p>\r\n<p><span><span><span><span><span><span><span><span>Xuất xứ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span>Trung Quốc</span></span></span></span></span></span></span></span></span></p>\r\n<p><span><span><span><span><span><span><span><span><span>Năm ra mắt&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span>2021</span></span></span></span></span></span></span></span></span></span></p>', 1, '24299000', '637599033251451664_dell-inspiron-n55xxA-bac-1.jpg', '637599033250982923_dell-inspiron-n55xxA-bac-2.jpg', '637599031141738914_dell-inspiron-n55xxA-bac-3.jpg', '637599033255514204_dell-inspiron-n55xxA-bac-4.jpg', '637599033250357908_dell-inspiron-n55xxA-bac-5.jpg');
INSERT INTO `tbl_product` VALUES (6, 'MSI Stealth 15M A11SDK 061VN i7 1185G7/16GB/512GB/GTX1660Ti MaxQ 6GB/Win 10', 'MSI0001', '7', '0', '7', 21, NULL, '<p><span>CPU&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span>Intel Core i7-1185G7</span></span></p>\r\n<p><span><span>RAM&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span>DDR4, 2666 MHz</span></span></span></p>\r\n<p><span><span><span>M&agrave;n h&igrave;nh&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span>15.6\", 1920 x 1080 Pixel, 144 Hz, IPS LCD LED Backlit, True Tone</span></span></span></span></p>\r\n<p><span><span><span><span>Đồ họa&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span>NVIDIA GeForce GTX 1660Ti Max-Q 6 GB &amp; Intel UHD Graphics</span></span></span></span></span></p>\r\n<p><span><span><span><span><span>Ổ cứng&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span>SSD 512 GB</span></span></span></span></span></span></p>\r\n<p><span><span><span><span><span><span>Hệ điều h&agrave;nh&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span>Windows 10</span></span></span></span></span></span></span></p>\r\n<p><span><span><span><span><span><span><span>Trọng lượng (kg)&nbsp; &nbsp;<span>1.693</span></span></span></span></span></span></span></span></p>\r\n<p><span><span><span><span><span><span><span><span>K&iacute;ch thước (mm)&nbsp; &nbsp;<span>358 x 248 x 15.9</span></span></span></span></span></span></span></span></span></p>\r\n<p><span><span><span><span><span><span><span><span><span>Xuất xứ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span>Trung Quốc</span></span></span></span></span></span></span></span></span></span></p>\r\n<p><span><span><span><span><span><span><span><span><span><span>Năm ra mắt&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span>2021</span></span></span></span></span></span></span></span></span></span></span></p>', 0, '34490000', '637522644736551890_msi-stealth-15m-xam-1.jpg', '637522644736239219_msi-stealth-15m-xam-2.jpg', '637522644735770479_msi-stealth-15m-xam-3.jpg', '637522644736239219_msi-stealth-15m-xam-4.jpg', '637522644735614439_msi-stealth-15m-xam-5.jpg');

-- ----------------------------
-- Table structure for tbl_warehouse
-- ----------------------------
DROP TABLE IF EXISTS `tbl_warehouse`;
CREATE TABLE `tbl_warehouse`  (
  `id_warehouse` int NOT NULL AUTO_INCREMENT,
  `productId` int NOT NULL,
  `sl_nhap` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sl_ngaynhap` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `sl_truocnhap` int NOT NULL,
  PRIMARY KEY (`id_warehouse`) USING BTREE,
  INDEX `productId`(`productId`) USING BTREE,
  CONSTRAINT `tbl_warehouse_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_warehouse
-- ----------------------------
INSERT INTO `tbl_warehouse` VALUES (3, 1, '5', '2021-11-07 14:37:39', 0);
INSERT INTO `tbl_warehouse` VALUES (4, 1, '2', '2021-11-08 22:19:00', 5);
INSERT INTO `tbl_warehouse` VALUES (5, 2, '7', '2021-11-08 22:47:40', 0);
INSERT INTO `tbl_warehouse` VALUES (6, 4, '10', '2021-11-29 17:53:05', 0);
INSERT INTO `tbl_warehouse` VALUES (7, 6, '7', '2021-12-06 12:47:37', 0);

SET FOREIGN_KEY_CHECKS = 1;
