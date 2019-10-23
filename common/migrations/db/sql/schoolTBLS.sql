/*
Navicat MySQL Data Transfer

Source Server         : Docker_Eduxa
Source Server Version : 50724
Source Host           : localhost:13806
Source Database       : eduxa

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-10-07 23:32:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `faq`
-- ----------------------------
DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) unsigned NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `faq_cat` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of faq
-- ----------------------------

-- ----------------------------
-- Table structure for `faq_cat`
-- ----------------------------
DROP TABLE IF EXISTS `faq_cat`;
CREATE TABLE `faq_cat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of faq_cat
-- ----------------------------

-- ----------------------------
-- Table structure for `school_photos`
-- ----------------------------
DROP TABLE IF EXISTS `school_photos`;
CREATE TABLE `school_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) unsigned NOT NULL,
  `path` varchar(255) NOT NULL,
  `base_url` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `university_id` (`school_id`) USING BTREE,
  CONSTRAINT `school_photos_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of school_photos
-- ----------------------------

-- ----------------------------
-- Table structure for `school_videos`
-- ----------------------------
DROP TABLE IF EXISTS `school_videos`;
CREATE TABLE `school_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) unsigned NOT NULL,
  `path` varchar(255) NOT NULL,
  `base_url` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `university_id` (`school_id`) USING BTREE,
  CONSTRAINT `school_videos_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of school_videos
-- ----------------------------
