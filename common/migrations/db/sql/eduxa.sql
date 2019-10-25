/*
Navicat MySQL Data Transfer

Source Server         : Docker_Eduxa
Source Server Version : 50724
Source Host           : localhost:13806
Source Database       : eduxa

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-10-25 20:44:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `article`
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(1024) NOT NULL,
  `title` varchar(512) NOT NULL,
  `body` text NOT NULL,
  `view` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `thumbnail_base_url` varchar(1024) DEFAULT NULL,
  `thumbnail_path` varchar(1024) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `published_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_article_author` (`created_by`),
  KEY `fk_article_updater` (`updated_by`),
  KEY `fk_article_category` (`category_id`),
  CONSTRAINT `fk_article_author` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_article_category` FOREIGN KEY (`category_id`) REFERENCES `article_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_article_updater` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------

-- ----------------------------
-- Table structure for `article_attachment`
-- ----------------------------
DROP TABLE IF EXISTS `article_attachment`;
CREATE TABLE `article_attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `base_url` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_article_attachment_article` (`article_id`),
  CONSTRAINT `fk_article_attachment_article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article_attachment
-- ----------------------------

-- ----------------------------
-- Table structure for `article_category`
-- ----------------------------
DROP TABLE IF EXISTS `article_category`;
CREATE TABLE `article_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(1024) NOT NULL,
  `title` varchar(512) NOT NULL,
  `body` text,
  `parent_id` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_article_category_section` (`parent_id`),
  CONSTRAINT `fk_article_category_section` FOREIGN KEY (`parent_id`) REFERENCES `article_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article_category
-- ----------------------------

-- ----------------------------
-- Table structure for `city`
-- ----------------------------
DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of city
-- ----------------------------
INSERT INTO `city` VALUES ('1', 'Alex', '3', '', null, null);
INSERT INTO `city` VALUES ('2', 'cairo', '3', '', null, null);
INSERT INTO `city` VALUES ('3', 'tanta', '3', '', null, null);
INSERT INTO `city` VALUES ('5', 'usa1', '4', '', null, null);
INSERT INTO `city` VALUES ('6', 'usa2', '4', '', null, null);

-- ----------------------------
-- Table structure for `country`
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `image_base_url` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `intro` text,
  `details` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of country
-- ----------------------------
INSERT INTO `country` VALUES ('3', 'Egypt', 'EG', 'http://storage.eduxa.localhost/source', '/1/Fcz8NMi0JouvITjr5108CLSz6sA-jQpY.jpg', 'intro for country', '<p>country details </p>');
INSERT INTO `country` VALUES ('4', 'USA', 'us', 'http://storage.eduxa.localhost/source', '/1/BPR0ZEJ7Ydoz5TigTle4BVCurvQIpdsR.jpg', 'fefefefe', '<p>efefefe</p>');

-- ----------------------------
-- Table structure for `country_attachment`
-- ----------------------------
DROP TABLE IF EXISTS `country_attachment`;
CREATE TABLE `country_attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `path` varchar(255) NOT NULL,
  `base_url` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  CONSTRAINT `country_attachment_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of country_attachment
-- ----------------------------

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
-- Table structure for `file_storage_item`
-- ----------------------------
DROP TABLE IF EXISTS `file_storage_item`;
CREATE TABLE `file_storage_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `component` varchar(255) NOT NULL,
  `base_url` varchar(1024) NOT NULL,
  `path` varchar(1024) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `upload_ip` varchar(15) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of file_storage_item
-- ----------------------------
INSERT INTO `file_storage_item` VALUES ('1', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/hg_0Cnh1w2feQ_caHcU9srbWWqprVWxJ.jpg', 'image/jpeg', '29141', 'hg_0Cnh1w2feQ_caHcU9srbWWqprVWxJ', '192.168.16.1', '1572012936');
INSERT INTO `file_storage_item` VALUES ('2', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/pU_p4u-OLvzZ31rXoOb3Mt8TXmCteLRE.jpg', 'image/jpeg', '29374', 'pU_p4u-OLvzZ31rXoOb3Mt8TXmCteLRE', '192.168.16.1', '1572012991');
INSERT INTO `file_storage_item` VALUES ('3', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/cDwoizrK4v36JKm_lfeV7muY3XsmgYxJ.jpg', 'image/jpeg', '37901', 'cDwoizrK4v36JKm_lfeV7muY3XsmgYxJ', '192.168.16.1', '1572012991');
INSERT INTO `file_storage_item` VALUES ('4', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/8jMtsulCuwG0qpo63Rktk9mbHxoLDYuZ.jpg', 'image/jpeg', '29374', '8jMtsulCuwG0qpo63Rktk9mbHxoLDYuZ', '192.168.16.1', '1572012991');
INSERT INTO `file_storage_item` VALUES ('5', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/Jr9B4sdBvJycS6iE5kyXSC-53Z4HGHnv.jpg', 'image/jpeg', '24879', 'Jr9B4sdBvJycS6iE5kyXSC-53Z4HGHnv', '192.168.16.1', '1572012991');
INSERT INTO `file_storage_item` VALUES ('6', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/8zuA2xUm8onrWFubyVGarZD7-Hc25_Kb.jpg', 'image/jpeg', '29141', '8zuA2xUm8onrWFubyVGarZD7-Hc25_Kb', '192.168.16.1', '1572014523');
INSERT INTO `file_storage_item` VALUES ('7', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/RuiFIs40IWZFo0VPw1cY_C-5rptUmKbc.jpg', 'image/jpeg', '29141', 'RuiFIs40IWZFo0VPw1cY_C-5rptUmKbc', '192.168.16.1', '1572014586');
INSERT INTO `file_storage_item` VALUES ('8', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/06EigF3P-15QXqasxGBXVe9VbC_qFNzL.jpg', 'image/jpeg', '34942', '06EigF3P-15QXqasxGBXVe9VbC_qFNzL', '192.168.16.1', '1572014586');
INSERT INTO `file_storage_item` VALUES ('9', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/z7PZ8w2ZZkpZEbRbR9xz2aGq6Sft9x4i.jpg', 'image/jpeg', '29374', 'z7PZ8w2ZZkpZEbRbR9xz2aGq6Sft9x4i', '192.168.16.1', '1572014586');
INSERT INTO `file_storage_item` VALUES ('10', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/DvtucUKxoGUuGLCpdFT3Izg7pl9NBXIQ.jpg', 'image/jpeg', '37901', 'DvtucUKxoGUuGLCpdFT3Izg7pl9NBXIQ', '192.168.16.1', '1572014586');
INSERT INTO `file_storage_item` VALUES ('11', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/R011EvdWFPA9mQ5stttkEN55iPDvKYod.jpg', 'image/jpeg', '24879', 'R011EvdWFPA9mQ5stttkEN55iPDvKYod', '192.168.16.1', '1572017094');
INSERT INTO `file_storage_item` VALUES ('12', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/QNWg6KtJuzQUtcL9YrqrKUKxSbWYVxVT.jpg', 'image/jpeg', '27325', 'QNWg6KtJuzQUtcL9YrqrKUKxSbWYVxVT', '192.168.16.1', '1572017301');
INSERT INTO `file_storage_item` VALUES ('13', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/glJ6PNpriYvAkoTy2WMSecWva4UPLzQ4.jpg', 'image/jpeg', '36200', 'glJ6PNpriYvAkoTy2WMSecWva4UPLzQ4', '192.168.16.1', '1572017541');
INSERT INTO `file_storage_item` VALUES ('14', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/8W_TrDwXvRqT9Z-AN40jNwV2hZevi6DW.jpg', 'image/jpeg', '36129', '8W_TrDwXvRqT9Z-AN40jNwV2hZevi6DW', '192.168.16.1', '1572017624');
INSERT INTO `file_storage_item` VALUES ('15', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/C9wIEeGR2ZU8k3-eeDCjPiKOgeMBid6r.jpg', 'image/jpeg', '27325', 'C9wIEeGR2ZU8k3-eeDCjPiKOgeMBid6r', '192.168.16.1', '1572017906');
INSERT INTO `file_storage_item` VALUES ('16', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/dyogByuK3StZ4nOnkEiLWxaeteCoBN9w.jpg', 'image/jpeg', '21106', 'dyogByuK3StZ4nOnkEiLWxaeteCoBN9w', '192.168.16.1', '1572018013');
INSERT INTO `file_storage_item` VALUES ('17', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/GZNUMz6LrsXdJx6W12ZozMDjJUyhSUhW.jpg', 'image/jpeg', '27325', 'GZNUMz6LrsXdJx6W12ZozMDjJUyhSUhW', '192.168.16.1', '1572018220');
INSERT INTO `file_storage_item` VALUES ('18', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/mPLISV5AWBePiVubjZck55QEoShNHpbc.jpg', 'image/jpeg', '27325', 'mPLISV5AWBePiVubjZck55QEoShNHpbc', '192.168.16.1', '1572018576');
INSERT INTO `file_storage_item` VALUES ('19', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/Ni5y-923es1upuQl2w0nAXeLfrzWwrA0.jpg', 'image/jpeg', '37901', 'Ni5y-923es1upuQl2w0nAXeLfrzWwrA0', '192.168.16.1', '1572026873');
INSERT INTO `file_storage_item` VALUES ('20', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/98POZe5wgYVK-6eQKaZdf5Y51jLQ-ES6.jpg', 'image/jpeg', '34942', '98POZe5wgYVK-6eQKaZdf5Y51jLQ-ES6', '192.168.16.1', '1572026918');
INSERT INTO `file_storage_item` VALUES ('21', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/oQ0fphY4Choh0x_GcyjZ5Qdt-5H7DBk7.jpg', 'image/jpeg', '29374', 'oQ0fphY4Choh0x_GcyjZ5Qdt-5H7DBk7', '192.168.16.1', '1572026918');
INSERT INTO `file_storage_item` VALUES ('22', 'fileStorage', 'http://storage.eduxa.localhost/source', '/1/wOCZt6JDMpXUXlPT9z9AGD0Avlh6smek.jpg', 'image/jpeg', '37901', 'wOCZt6JDMpXUXlPT9z9AGD0Avlh6smek', '192.168.16.1', '1572026918');

-- ----------------------------
-- Table structure for `i18n_message`
-- ----------------------------
DROP TABLE IF EXISTS `i18n_message`;
CREATE TABLE `i18n_message` (
  `id` int(11) NOT NULL,
  `language` varchar(16) NOT NULL,
  `translation` text,
  PRIMARY KEY (`id`,`language`),
  CONSTRAINT `fk_i18n_message_source_message` FOREIGN KEY (`id`) REFERENCES `i18n_source_message` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of i18n_message
-- ----------------------------

-- ----------------------------
-- Table structure for `i18n_source_message`
-- ----------------------------
DROP TABLE IF EXISTS `i18n_source_message`;
CREATE TABLE `i18n_source_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(32) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of i18n_source_message
-- ----------------------------

-- ----------------------------
-- Table structure for `key_storage_item`
-- ----------------------------
DROP TABLE IF EXISTS `key_storage_item`;
CREATE TABLE `key_storage_item` (
  `key` varchar(128) NOT NULL,
  `value` text NOT NULL,
  `comment` text,
  `updated_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`key`),
  UNIQUE KEY `idx_key_storage_item_key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of key_storage_item
-- ----------------------------
INSERT INTO `key_storage_item` VALUES ('backend.layout-boxed', '0', null, null, null);
INSERT INTO `key_storage_item` VALUES ('backend.layout-collapsed-sidebar', '0', null, null, null);
INSERT INTO `key_storage_item` VALUES ('backend.layout-fixed', '0', null, null, null);
INSERT INTO `key_storage_item` VALUES ('backend.theme-skin', 'skin-blue', 'skin-blue, skin-black, skin-purple, skin-green, skin-red, skin-yellow', null, null);
INSERT INTO `key_storage_item` VALUES ('frontend.maintenance', 'disabled', 'Set it to \"enabled\" to turn on maintenance mode', null, null);

-- ----------------------------
-- Table structure for `page`
-- ----------------------------
DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(2048) NOT NULL,
  `title` varchar(512) NOT NULL,
  `body` text NOT NULL,
  `view` varchar(255) DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of page
-- ----------------------------
INSERT INTO `page` VALUES ('1', 'about', 'About', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', null, '1', '1564754243', '1564754243');

-- ----------------------------
-- Table structure for `rbac_auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `rbac_auth_assignment`;
CREATE TABLE `rbac_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `rbac_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `rbac_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rbac_auth_assignment
-- ----------------------------
INSERT INTO `rbac_auth_assignment` VALUES ('administrator', '1', '1564754247');
INSERT INTO `rbac_auth_assignment` VALUES ('manager', '2', '1564754247');
INSERT INTO `rbac_auth_assignment` VALUES ('universityManager', '10', '1572018311');
INSERT INTO `rbac_auth_assignment` VALUES ('universityManager', '11', '1572018430');
INSERT INTO `rbac_auth_assignment` VALUES ('universityManager', '12', '1572018465');
INSERT INTO `rbac_auth_assignment` VALUES ('universityManager', '13', '1572018509');
INSERT INTO `rbac_auth_assignment` VALUES ('universityManager', '14', '1572018593');
INSERT INTO `rbac_auth_assignment` VALUES ('universityManager', '4', '1570283380');
INSERT INTO `rbac_auth_assignment` VALUES ('universityManager', '5', '1572017563');
INSERT INTO `rbac_auth_assignment` VALUES ('universityManager', '6', '1572017639');
INSERT INTO `rbac_auth_assignment` VALUES ('universityManager', '7', '1572017921');
INSERT INTO `rbac_auth_assignment` VALUES ('universityManager', '8', '1572018027');
INSERT INTO `rbac_auth_assignment` VALUES ('universityManager', '9', '1572018241');
INSERT INTO `rbac_auth_assignment` VALUES ('user', '3', '1564754247');

-- ----------------------------
-- Table structure for `rbac_auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `rbac_auth_item`;
CREATE TABLE `rbac_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `rbac_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `rbac_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rbac_auth_item
-- ----------------------------
INSERT INTO `rbac_auth_item` VALUES ('administrator', '1', null, null, null, '1564754247', '1564754247');
INSERT INTO `rbac_auth_item` VALUES ('editOwnModel', '2', null, 'ownModelRule', null, '1564754247', '1564754247');
INSERT INTO `rbac_auth_item` VALUES ('loginToBackend', '2', null, null, null, '1564754247', '1564754247');
INSERT INTO `rbac_auth_item` VALUES ('manager', '1', 'Manager', null, null, '1564754246', '1564754246');
INSERT INTO `rbac_auth_item` VALUES ('referralCompany', '1', 'Referral Company', null, null, null, null);
INSERT INTO `rbac_auth_item` VALUES ('referralPerson', '1', 'Referral Person', null, null, null, null);
INSERT INTO `rbac_auth_item` VALUES ('universityManager', '1', 'University Manager', null, null, null, null);
INSERT INTO `rbac_auth_item` VALUES ('user', '1', 'Student', null, null, '1564754246', '1564754246');

-- ----------------------------
-- Table structure for `rbac_auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `rbac_auth_item_child`;
CREATE TABLE `rbac_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `rbac_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `rbac_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rbac_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `rbac_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rbac_auth_item_child
-- ----------------------------
INSERT INTO `rbac_auth_item_child` VALUES ('user', 'editOwnModel');
INSERT INTO `rbac_auth_item_child` VALUES ('administrator', 'loginToBackend');
INSERT INTO `rbac_auth_item_child` VALUES ('manager', 'loginToBackend');
INSERT INTO `rbac_auth_item_child` VALUES ('universityManager', 'loginToBackend');
INSERT INTO `rbac_auth_item_child` VALUES ('administrator', 'manager');
INSERT INTO `rbac_auth_item_child` VALUES ('administrator', 'user');
INSERT INTO `rbac_auth_item_child` VALUES ('manager', 'user');

-- ----------------------------
-- Table structure for `rbac_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `rbac_auth_rule`;
CREATE TABLE `rbac_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rbac_auth_rule
-- ----------------------------
INSERT INTO `rbac_auth_rule` VALUES ('ownModelRule', 0x4F3A32393A22636F6D6D6F6E5C726261635C72756C655C4F776E4D6F64656C52756C65223A333A7B733A343A226E616D65223B733A31323A226F776E4D6F64656C52756C65223B733A393A22637265617465644174223B693A313536343735343234373B733A393A22757064617465644174223B693A313536343735343234373B7D, '1564754247', '1564754247');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of school_photos
-- ----------------------------

-- ----------------------------
-- Table structure for `school_rating`
-- ----------------------------
DROP TABLE IF EXISTS `school_rating`;
CREATE TABLE `school_rating` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(10) unsigned NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment` text,
  `rating` float NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `SchoolID` (`school_id`) USING BTREE,
  CONSTRAINT `school_rating_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of school_rating
-- ----------------------------
INSERT INTO `school_rating` VALUES ('8', '3', null, 'Ahmed', 'test comment one', '5', '1', '2019-10-25 18:11:25', '2019-10-25 18:35:57', '1', '1');
INSERT INTO `school_rating` VALUES ('9', '3', null, 'Saad', 'test comment 2', '4', '1', '2019-10-25 18:11:25', '2019-10-25 18:35:57', '1', '1');

-- ----------------------------
-- Table structure for `school_videos`
-- ----------------------------
DROP TABLE IF EXISTS `school_videos`;
CREATE TABLE `school_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) unsigned DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `base_url` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `university_id` (`school_id`) USING BTREE,
  CONSTRAINT `school_videos_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of school_videos
-- ----------------------------
INSERT INTO `school_videos` VALUES ('1', '3', null, 'http://youtube.com', null, null, '1', null, null);

-- ----------------------------
-- Table structure for `schools`
-- ----------------------------
DROP TABLE IF EXISTS `schools`;
CREATE TABLE `schools` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `course_type` int(10) unsigned DEFAULT NULL,
  `details` text,
  `featured` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 yes 0 no',
  `location` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `image_base_url` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  `city_id` int(10) unsigned DEFAULT NULL,
  `min_age` int(11) DEFAULT NULL,
  `start_every` varchar(255) DEFAULT NULL,
  `study_time` varchar(255) DEFAULT NULL,
  `max_students_per_class` int(11) DEFAULT NULL,
  `avg_students_per_class` int(11) DEFAULT NULL,
  `lessons_per_week` int(11) DEFAULT NULL,
  `hours_per_week` float DEFAULT NULL,
  `accomodation_fees` float DEFAULT NULL,
  `registeration_fees` float DEFAULT NULL,
  `study_books_fees` float DEFAULT NULL,
  `fees_per_week` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `no_of_ratings` int(11) DEFAULT NULL,
  `total_rating` float DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_type` (`course_type`),
  CONSTRAINT `schools_ibfk_1` FOREIGN KEY (`course_type`) REFERENCES `schools_course_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of schools
-- ----------------------------
INSERT INTO `schools` VALUES ('3', 'School one', '1', 'English curse details', '1', 'CAIRO, EL KHALIFA، Egypt', '30.036551002721556', '31.248738288879395', 'http://storage.eduxa.localhost/source', '/1/Ni5y-923es1upuQl2w0nAXeLfrzWwrA0.jpg', '4', '6', null, '', '', null, null, null, null, null, null, null, null, '20', '2', '5', '1', '2019-10-25 18:11:25', '2019-10-25 18:35:57', '1', '1');

-- ----------------------------
-- Table structure for `schools_course_types`
-- ----------------------------
DROP TABLE IF EXISTS `schools_course_types`;
CREATE TABLE `schools_course_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of schools_course_types
-- ----------------------------
INSERT INTO `schools_course_types` VALUES ('1', 'General', '2019-10-05 22:53:56', '2019-10-25 18:17:01', '1', '1');
INSERT INTO `schools_course_types` VALUES ('2', 'Advanced', '2019-10-05 22:54:10', '2019-10-25 18:17:14', '1', '1');
INSERT INTO `schools_course_types` VALUES ('3', 'Conversation', '2019-10-25 18:17:36', '2019-10-25 18:17:36', '1', '1');


-- ----------------------------
-- Table structure for `system_log`
-- ----------------------------
DROP TABLE IF EXISTS `system_log`;
CREATE TABLE `system_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `level` int(11) DEFAULT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `log_time` double DEFAULT NULL,
  `prefix` text COLLATE utf8_unicode_ci,
  `message` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `idx_log_level` (`level`),
  KEY `idx_log_category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of system_log
-- ----------------------------
INSERT INTO `system_log` VALUES ('1', '1', 'yii\\base\\UnknownPropertyException', '1572012520.6536', '[backend][/university/view?id=2]', 'yii\\base\\UnknownPropertyException: Getting unknown property: backend\\models\\UniversityCountries::country in /var/www/html/vendor/yiisoft/yii2/base/Component.php:154\nStack trace:\n#0 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(298): yii\\base\\Component->__get(\'country\')\n#1 /var/www/html/vendor/yiisoft/yii2/helpers/BaseArrayHelper.php(209): yii\\db\\BaseActiveRecord->__get(\'country\')\n#2 /var/www/html/vendor/yiisoft/yii2/helpers/BaseArrayHelper.php(202): yii\\helpers\\BaseArrayHelper::getValue(Object(backend\\models\\UniversityCountries), \'country\', NULL)\n#3 /var/www/html/vendor/yiisoft/yii2/grid/DataColumn.php(232): yii\\helpers\\BaseArrayHelper::getValue(Object(backend\\models\\UniversityCountries), \'country.title\')\n#4 /var/www/html/vendor/yiisoft/yii2/grid/DataColumn.php(244): yii\\grid\\DataColumn->getDataCellValue(Object(backend\\models\\UniversityCountries), 0, 0)\n#5 /var/www/html/vendor/kartik-v/yii2-grid/src/DataColumn.php(242): yii\\grid\\DataColumn->renderDataCellContent(Object(backend\\models\\UniversityCountries), 0, 0)\n#6 /var/www/html/vendor/kartik-v/yii2-grid/src/GridView.php(1304): kartik\\grid\\DataColumn->renderDataCell(Object(backend\\models\\UniversityCountries), 0, 0)\n#7 /var/www/html/vendor/yiisoft/yii2/grid/GridView.php(494): kartik\\grid\\GridView->renderTableRow(Object(backend\\models\\UniversityCountries), 0, 0)\n#8 /var/www/html/vendor/kartik-v/yii2-grid/src/GridView.php(1284): yii\\grid\\GridView->renderTableBody()\n#9 /var/www/html/vendor/yiisoft/yii2/grid/GridView.php(358): kartik\\grid\\GridView->renderTableBody()\n#10 /var/www/html/vendor/yiisoft/yii2/widgets/BaseListView.php(160): yii\\grid\\GridView->renderItems()\n#11 /var/www/html/vendor/yiisoft/yii2/grid/GridView.php(326): yii\\widgets\\BaseListView->renderSection(\'{items}\')\n#12 /var/www/html/vendor/yiisoft/yii2/widgets/BaseListView.php(135): yii\\grid\\GridView->renderSection(\'{items}\')\n#13 [internal function]: yii\\widgets\\BaseListView->yii\\widgets\\{closure}(Array)\n#14 /var/www/html/vendor/yiisoft/yii2/widgets/BaseListView.php(138): preg_replace_callback(\'/{\\\\w+}/\', Object(Closure), \'<div class=\"pan...\')\n#15 /var/www/html/vendor/yiisoft/yii2/grid/GridView.php(301): yii\\widgets\\BaseListView->run()\n#16 /var/www/html/vendor/kartik-v/yii2-grid/src/GridView.php(1204): yii\\grid\\GridView->run()\n#17 /var/www/html/vendor/yiisoft/yii2/base/Widget.php(140): kartik\\grid\\GridView->run()\n#18 /var/www/html/backend/views/university/view.php(99): yii\\base\\Widget::widget(Array)\n#19 /var/www/html/vendor/yiisoft/yii2/base/View.php(348): require(\'/var/www/html/b...\')\n#20 /var/www/html/vendor/yiisoft/yii2/base/View.php(257): yii\\base\\View->renderPhpFile(\'/var/www/html/b...\', Array)\n#21 /var/www/html/vendor/yiisoft/yii2/base/View.php(156): yii\\base\\View->renderFile(\'/var/www/html/b...\', Array, Object(backend\\controllers\\UniversityController))\n#22 /var/www/html/vendor/yiisoft/yii2/base/Controller.php(386): yii\\base\\View->render(\'view\', Array, Object(backend\\controllers\\UniversityController))\n#23 /var/www/html/backend/controllers/UniversityController.php(132): yii\\base\\Controller->render(\'view\', Array)\n#24 [internal function]: backend\\controllers\\UniversityController->actionView(\'2\')\n#25 /var/www/html/vendor/yiisoft/yii2/base/InlineAction.php(57): call_user_func_array(Array, Array)\n#26 /var/www/html/vendor/yiisoft/yii2/base/Controller.php(157): yii\\base\\InlineAction->runWithParams(Array)\n#27 /var/www/html/vendor/yiisoft/yii2/base/Module.php(528): yii\\base\\Controller->runAction(\'view\', Array)\n#28 /var/www/html/vendor/yiisoft/yii2/web/Application.php(103): yii\\base\\Module->runAction(\'university/view\', Array)\n#29 /var/www/html/vendor/yiisoft/yii2/base/Application.php(386): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#30 /var/www/html/backend/web/index.php(23): yii\\base\\Application->run()\n#31 {main}');
INSERT INTO `system_log` VALUES ('2', '1', 'yii\\base\\UnknownPropertyException', '1572014434.2149', '[backend][/university]', 'yii\\base\\UnknownPropertyException: Setting unknown property: backend\\models\\University::title_en in /var/www/html/vendor/yiisoft/yii2/base/Component.php:209\nStack trace:\n#0 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(324): yii\\base\\Component->__set(\'title_en\', \'University one\')\n#1 /var/www/html/vendor/webvimark/multilanguage/MultiLanguageTrait.php(14): yii\\db\\BaseActiveRecord->__set(\'title_en\', \'University one\')\n#2 /var/www/html/vendor/webvimark/multilanguage/MultiLanguageBehavior.php(146): backend\\models\\University->__set(\'title_en\', \'University one\')\n#3 [internal function]: webvimark\\behaviors\\multilanguage\\MultiLanguageBehavior->mlAfterFind(Object(yii\\base\\Event))\n#4 /var/www/html/vendor/yiisoft/yii2/base/Component.php(627): call_user_func(Array, Object(yii\\base\\Event))\n#5 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(944): yii\\base\\Component->trigger(\'afterFind\')\n#6 /var/www/html/vendor/yiisoft/yii2/db/ActiveQuery.php(233): yii\\db\\BaseActiveRecord->afterFind()\n#7 /var/www/html/vendor/yiisoft/yii2/db/Query.php(238): yii\\db\\ActiveQuery->populate(Array)\n#8 /var/www/html/vendor/yiisoft/yii2/db/ActiveQuery.php(133): yii\\db\\Query->all(NULL)\n#9 /var/www/html/backend/models/activequery/UniversityQuery.php(24): yii\\db\\ActiveQuery->all(NULL)\n#10 /var/www/html/vendor/yiisoft/yii2/data/ActiveDataProvider.php(116): backend\\models\\activequery\\UniversityQuery->all(NULL)\n#11 /var/www/html/vendor/yiisoft/yii2/data/BaseDataProvider.php(101): yii\\data\\ActiveDataProvider->prepareModels()\n#12 /var/www/html/vendor/yiisoft/yii2/data/BaseDataProvider.php(114): yii\\data\\BaseDataProvider->prepare()\n#13 /var/www/html/vendor/yiisoft/yii2/data/BaseDataProvider.php(155): yii\\data\\BaseDataProvider->getModels()\n#14 /var/www/html/vendor/kartik-v/yii2-grid/src/GridView.php(1499): yii\\data\\BaseDataProvider->getCount()\n#15 /var/www/html/vendor/yiisoft/yii2/widgets/BaseListView.php(158): kartik\\grid\\GridView->renderSummary()\n#16 /var/www/html/vendor/yiisoft/yii2/grid/GridView.php(326): yii\\widgets\\BaseListView->renderSection(\'{summary}\')\n#17 /var/www/html/vendor/yiisoft/yii2/widgets/BaseListView.php(135): yii\\grid\\GridView->renderSection(\'{summary}\')\n#18 [internal function]: yii\\widgets\\BaseListView->yii\\widgets\\{closure}(Array)\n#19 /var/www/html/vendor/yiisoft/yii2/widgets/BaseListView.php(138): preg_replace_callback(\'/{\\\\w+}/\', Object(Closure), \'<div class=\"pan...\')\n#20 /var/www/html/vendor/yiisoft/yii2/grid/GridView.php(301): yii\\widgets\\BaseListView->run()\n#21 /var/www/html/vendor/kartik-v/yii2-grid/src/GridView.php(1204): yii\\grid\\GridView->run()\n#22 /var/www/html/vendor/yiisoft/yii2/base/Widget.php(140): kartik\\grid\\GridView->run()\n#23 /var/www/html/backend/views/university/index.php(95): yii\\base\\Widget::widget(Array)\n#24 /var/www/html/vendor/yiisoft/yii2/base/View.php(348): require(\'/var/www/html/b...\')\n#25 /var/www/html/vendor/yiisoft/yii2/base/View.php(257): yii\\base\\View->renderPhpFile(\'/var/www/html/b...\', Array)\n#26 /var/www/html/vendor/yiisoft/yii2/base/View.php(156): yii\\base\\View->renderFile(\'/var/www/html/b...\', Array, Object(backend\\controllers\\UniversityController))\n#27 /var/www/html/vendor/yiisoft/yii2/base/Controller.php(386): yii\\base\\View->render(\'index\', Array, Object(backend\\controllers\\UniversityController))\n#28 /var/www/html/backend/controllers/UniversityController.php(40): yii\\base\\Controller->render(\'index\', Array)\n#29 [internal function]: backend\\controllers\\UniversityController->actionIndex()\n#30 /var/www/html/vendor/yiisoft/yii2/base/InlineAction.php(57): call_user_func_array(Array, Array)\n#31 /var/www/html/vendor/yiisoft/yii2/base/Controller.php(157): yii\\base\\InlineAction->runWithParams(Array)\n#32 /var/www/html/vendor/yiisoft/yii2/base/Module.php(528): yii\\base\\Controller->runAction(\'\', Array)\n#33 /var/www/html/vendor/yiisoft/yii2/web/Application.php(103): yii\\base\\Module->runAction(\'university\', Array)\n#34 /var/www/html/vendor/yiisoft/yii2/base/Application.php(386): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#35 /var/www/html/backend/web/index.php(23): yii\\base\\Application->run()\n#36 {main}');
INSERT INTO `system_log` VALUES ('3', '1', 'Error', '1572015099.297', '[backend][/university/view?id=1]', 'Error: Call to a member function sum() on array in /var/www/html/backend/models/University.php:104\nStack trace:\n#0 /var/www/html/backend/controllers/UniversityController.php(110): backend\\models\\University->CalcRating()\n#1 [internal function]: backend\\controllers\\UniversityController->actionView(\'1\')\n#2 /var/www/html/vendor/yiisoft/yii2/base/InlineAction.php(57): call_user_func_array(Array, Array)\n#3 /var/www/html/vendor/yiisoft/yii2/base/Controller.php(157): yii\\base\\InlineAction->runWithParams(Array)\n#4 /var/www/html/vendor/yiisoft/yii2/base/Module.php(528): yii\\base\\Controller->runAction(\'view\', Array)\n#5 /var/www/html/vendor/yiisoft/yii2/web/Application.php(103): yii\\base\\Module->runAction(\'university/view\', Array)\n#6 /var/www/html/vendor/yiisoft/yii2/base/Application.php(386): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#7 /var/www/html/backend/web/index.php(23): yii\\base\\Application->run()\n#8 {main}');
INSERT INTO `system_log` VALUES ('4', '1', 'Error', '1572015827.1934', '[backend][/university/update?id=1]', 'Error: Maximum function nesting level of \'256\' reached, aborting! in /var/www/html/vendor/yiisoft/yii2/base/Component.php:178\nStack trace:\n#0 /var/www/html/vendor/yiisoft/yii2/base/Component.php(178): method_exists(Object(yii\\db\\Command), \'setsql\')\n#1 /var/www/html/vendor/yiisoft/yii2/BaseYii.php(546): yii\\base\\Component->__set(\'sql\', \'SELECT SUM(rati...\')\n#2 /var/www/html/vendor/yiisoft/yii2/base/BaseObject.php(107): yii\\BaseYii::configure(Object(yii\\db\\Command), Array)\n#3 [internal function]: yii\\base\\BaseObject->__construct(Array)\n#4 /var/www/html/vendor/yiisoft/yii2/di/Container.php(384): ReflectionClass->newInstanceArgs(Array)\n#5 /var/www/html/vendor/yiisoft/yii2/di/Container.php(156): yii\\di\\Container->build(\'yii\\\\db\\\\Command\', Array, Array)\n#6 /var/www/html/vendor/yiisoft/yii2/BaseYii.php(349): yii\\di\\Container->get(\'yii\\\\db\\\\Command\', Array, Array)\n#7 /var/www/html/vendor/yiisoft/yii2/db/Connection.php(737): yii\\BaseYii::createObject(Array)\n#8 /var/www/html/vendor/yiisoft/yii2/db/ActiveQuery.php(334): yii\\db\\Connection->createCommand(\'SELECT SUM(rati...\', Array)\n#9 /var/www/html/vendor/yiisoft/yii2/db/Query.php(456): yii\\db\\ActiveQuery->createCommand(Object(yii\\db\\Connection))\n#10 /var/www/html/vendor/yiisoft/yii2/db/ActiveQuery.php(352): yii\\db\\Query->queryScalar(\'SUM(rating)\', Object(yii\\db\\Connection))\n#11 /var/www/html/vendor/yiisoft/yii2/db/Query.php(364): yii\\db\\ActiveQuery->queryScalar(\'SUM(rating)\', Object(yii\\db\\Connection))\n#12 /var/www/html/backend/models/base/University.php(149): yii\\db\\Query->sum(\'rating\')\n#13 /var/www/html/vendor/yiisoft/yii2/base/Component.php(139): backend\\models\\base\\University->getUnversityRatingsSum()\n#14 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(298): yii\\base\\Component->__get(\'unversityRating...\')\n#15 /var/www/html/backend/models/University.php(103): yii\\db\\BaseActiveRecord->__get(\'unversityRating...\')\n#16 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#17 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#18 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#19 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#20 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#21 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#22 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#23 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#24 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#25 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#26 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#27 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#28 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#29 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#30 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#31 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#32 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#33 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#34 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#35 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#36 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#37 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#38 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#39 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#40 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#41 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#42 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#43 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#44 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#45 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#46 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#47 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#48 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#49 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#50 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#51 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#52 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#53 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#54 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#55 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#56 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#57 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#58 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#59 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#60 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#61 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#62 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#63 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#64 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#65 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#66 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#67 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#68 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#69 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#70 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#71 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#72 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#73 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#74 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#75 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#76 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#77 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#78 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#79 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#80 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#81 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#82 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#83 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#84 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#85 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#86 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#87 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#88 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#89 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#90 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#91 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#92 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#93 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#94 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#95 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#96 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#97 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#98 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#99 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#100 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#101 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#102 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#103 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#104 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#105 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#106 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#107 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#108 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#109 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#110 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#111 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#112 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#113 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#114 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#115 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#116 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#117 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#118 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#119 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#120 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#121 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#122 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#123 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#124 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#125 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#126 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#127 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#128 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#129 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#130 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#131 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#132 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#133 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#134 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#135 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#136 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#137 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#138 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#139 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#140 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#141 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#142 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#143 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#144 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#145 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#146 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#147 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#148 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#149 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#150 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#151 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#152 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#153 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#154 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#155 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#156 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#157 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#158 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#159 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#160 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#161 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#162 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#163 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#164 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#165 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#166 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#167 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#168 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#169 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#170 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#171 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#172 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#173 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#174 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#175 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#176 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#177 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#178 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#179 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#180 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#181 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#182 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#183 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#184 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#185 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#186 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#187 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#188 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#189 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#190 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#191 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#192 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#193 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#194 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#195 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#196 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#197 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#198 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#199 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#200 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#201 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#202 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#203 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#204 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#205 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#206 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#207 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#208 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#209 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#210 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#211 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#212 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#213 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#214 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#215 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#216 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#217 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#218 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#219 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#220 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#221 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#222 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#223 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#224 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#225 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#226 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#227 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#228 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#229 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#230 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#231 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#232 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#233 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#234 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#235 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#236 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(799): backend\\models\\University->afterSave(false, Array)\n#237 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#238 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#239 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#240 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(825): backend\\models\\University->afterSave(false, Array)\n#241 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#242 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(false, NULL)\n#243 /var/www/html/backend/models/University.php(106): yii\\db\\BaseActiveRecord->save(false)\n#244 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(825): backend\\models\\University->afterSave(false, Array)\n#245 /var/www/html/vendor/yiisoft/yii2/db/ActiveRecord.php(676): yii\\db\\BaseActiveRecord->updateInternal(NULL)\n#246 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(681): yii\\db\\ActiveRecord->update(true, NULL)\n#247 /var/www/html/vendor/mootensai/yii2-relation-trait/RelationTrait.php(166): yii\\db\\BaseActiveRecord->save()\n#248 /var/www/html/backend/controllers/UniversityController.php(182): backend\\models\\base\\University->saveAll()\n#249 [internal function]: backend\\controllers\\UniversityController->actionUpdate(\'1\')\n#250 /var/www/html/vendor/yiisoft/yii2/base/InlineAction.php(57): call_user_func_array(Array, Array)\n#251 /var/www/html/vendor/yiisoft/yii2/base/Controller.php(157): yii\\base\\InlineAction->runWithParams(Array)\n#252 /var/www/html/vendor/yiisoft/yii2/base/Module.php(528): yii\\base\\Controller->runAction(\'update\', Array)\n#253 /var/www/html/vendor/yiisoft/yii2/web/Application.php(103): yii\\base\\Module->runAction(\'university/upda...\', Array)\n#254 /var/www/html/vendor/yiisoft/yii2/base/Application.php(386): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#255 /var/www/html/backend/web/index.php(23): yii\\base\\Application->run()\n#256 {main}');
INSERT INTO `system_log` VALUES ('5', '1', 'yii\\base\\ErrorException:2', '1572015869.3346', '[backend][/university/update?id=1]', 'yii\\base\\ErrorException: Declaration of backend\\models\\University::beforeSave($insert, $changedAttributes) should be compatible with yii\\db\\BaseActiveRecord::beforeSave($insert) in /var/www/html/backend/models/University.php:16\nStack trace:\n#0 /var/www/html/backend/controllers/UniversityController.php(263): yii\\BaseYii::autoload()\n#1 /var/www/html/backend/controllers/UniversityController.php(263): ::spl_autoload_call()\n#2 /var/www/html/backend/controllers/UniversityController.php(180): backend\\controllers\\UniversityController->findModel()\n#3 /var/www/html/vendor/yiisoft/yii2/base/InlineAction.php(57): backend\\controllers\\UniversityController->actionUpdate()\n#4 /var/www/html/vendor/yiisoft/yii2/base/InlineAction.php(57): ::call_user_func_array:{/var/www/html/vendor/yiisoft/yii2/base/InlineAction.php:57}()\n#5 /var/www/html/vendor/yiisoft/yii2/base/Controller.php(157): yii\\base\\InlineAction->runWithParams()\n#6 /var/www/html/vendor/yiisoft/yii2/base/Module.php(528): backend\\controllers\\UniversityController->runAction()\n#7 /var/www/html/vendor/yiisoft/yii2/web/Application.php(103): yii\\web\\Application->runAction()\n#8 /var/www/html/vendor/yiisoft/yii2/base/Application.php(386): yii\\web\\Application->handleRequest()\n#9 /var/www/html/backend/web/index.php(23): yii\\web\\Application->run()\n#10 {main}');
INSERT INTO `system_log` VALUES ('6', '1', 'yii\\web\\HeadersAlreadySentException', '1572017439.1326', '[backend][/university/manager?id=1]', 'yii\\web\\HeadersAlreadySentException: Headers already sent in /var/www/html/backend/controllers/UniversityController.php on line 112. in /var/www/html/vendor/yiisoft/yii2/web/Response.php:366\nStack trace:\n#0 /var/www/html/vendor/yiisoft/yii2/web/Response.php(339): yii\\web\\Response->sendHeaders()\n#1 /var/www/html/vendor/yiisoft/yii2/base/Application.php(392): yii\\web\\Response->send()\n#2 /var/www/html/backend/web/index.php(23): yii\\base\\Application->run()\n#3 {main}');
INSERT INTO `system_log` VALUES ('7', '1', 'yii\\web\\HeadersAlreadySentException', '1572017525.6775', '[backend][/university/manager?id=1]', 'yii\\web\\HeadersAlreadySentException: Headers already sent in /var/www/html/backend/controllers/UniversityController.php on line 112. in /var/www/html/vendor/yiisoft/yii2/web/Response.php:366\nStack trace:\n#0 /var/www/html/vendor/yiisoft/yii2/web/Response.php(339): yii\\web\\Response->sendHeaders()\n#1 /var/www/html/vendor/yiisoft/yii2/base/Application.php(392): yii\\web\\Response->send()\n#2 /var/www/html/backend/web/index.php(23): yii\\base\\Application->run()\n#3 {main}');
INSERT INTO `system_log` VALUES ('8', '1', 'yii\\base\\UnknownMethodException', '1572017563.7738', '[backend][/university/manager?id=1]', 'yii\\base\\UnknownMethodException: Calling unknown method: backend\\models\\UserForm::getId() in /var/www/html/vendor/yiisoft/yii2/base/Component.php:300\nStack trace:\n#0 /var/www/html/backend/controllers/UniversityController.php(108): yii\\base\\Component->__call(\'getId\', Array)\n#1 [internal function]: backend\\controllers\\UniversityController->actionManager(\'1\')\n#2 /var/www/html/vendor/yiisoft/yii2/base/InlineAction.php(57): call_user_func_array(Array, Array)\n#3 /var/www/html/vendor/yiisoft/yii2/base/Controller.php(157): yii\\base\\InlineAction->runWithParams(Array)\n#4 /var/www/html/vendor/yiisoft/yii2/base/Module.php(528): yii\\base\\Controller->runAction(\'manager\', Array)\n#5 /var/www/html/vendor/yiisoft/yii2/web/Application.php(103): yii\\base\\Module->runAction(\'university/mana...\', Array)\n#6 /var/www/html/vendor/yiisoft/yii2/base/Application.php(386): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#7 /var/www/html/backend/web/index.php(23): yii\\base\\Application->run()\n#8 {main}');
INSERT INTO `system_log` VALUES ('9', '1', 'Error', '1572017639.7633', '[backend][/university/manager?id=1]', 'Error: Call to undefined function backend\\controllers\\save() in /var/www/html/backend/controllers/UniversityController.php:109\nStack trace:\n#0 [internal function]: backend\\controllers\\UniversityController->actionManager(\'1\')\n#1 /var/www/html/vendor/yiisoft/yii2/base/InlineAction.php(57): call_user_func_array(Array, Array)\n#2 /var/www/html/vendor/yiisoft/yii2/base/Controller.php(157): yii\\base\\InlineAction->runWithParams(Array)\n#3 /var/www/html/vendor/yiisoft/yii2/base/Module.php(528): yii\\base\\Controller->runAction(\'manager\', Array)\n#4 /var/www/html/vendor/yiisoft/yii2/web/Application.php(103): yii\\base\\Module->runAction(\'university/mana...\', Array)\n#5 /var/www/html/vendor/yiisoft/yii2/base/Application.php(386): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#6 /var/www/html/backend/web/index.php(23): yii\\base\\Application->run()\n#7 {main}');
INSERT INTO `system_log` VALUES ('10', '1', 'Error', '1572017921.9475', '[backend][/university/manager?id=1]', 'Error: Call to undefined function backend\\controllers\\save() in /var/www/html/backend/controllers/UniversityController.php:109\nStack trace:\n#0 [internal function]: backend\\controllers\\UniversityController->actionManager(\'1\')\n#1 /var/www/html/vendor/yiisoft/yii2/base/InlineAction.php(57): call_user_func_array(Array, Array)\n#2 /var/www/html/vendor/yiisoft/yii2/base/Controller.php(157): yii\\base\\InlineAction->runWithParams(Array)\n#3 /var/www/html/vendor/yiisoft/yii2/base/Module.php(528): yii\\base\\Controller->runAction(\'manager\', Array)\n#4 /var/www/html/vendor/yiisoft/yii2/web/Application.php(103): yii\\base\\Module->runAction(\'university/mana...\', Array)\n#5 /var/www/html/vendor/yiisoft/yii2/base/Application.php(386): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#6 /var/www/html/backend/web/index.php(23): yii\\base\\Application->run()\n#7 {main}');
INSERT INTO `system_log` VALUES ('11', '1', 'Error', '1572018027.9662', '[backend][/university/manager?id=1]', 'Error: Call to undefined function backend\\controllers\\save() in /var/www/html/backend/controllers/UniversityController.php:113\nStack trace:\n#0 [internal function]: backend\\controllers\\UniversityController->actionManager(\'1\')\n#1 /var/www/html/vendor/yiisoft/yii2/base/InlineAction.php(57): call_user_func_array(Array, Array)\n#2 /var/www/html/vendor/yiisoft/yii2/base/Controller.php(157): yii\\base\\InlineAction->runWithParams(Array)\n#3 /var/www/html/vendor/yiisoft/yii2/base/Module.php(528): yii\\base\\Controller->runAction(\'manager\', Array)\n#4 /var/www/html/vendor/yiisoft/yii2/web/Application.php(103): yii\\base\\Module->runAction(\'university/mana...\', Array)\n#5 /var/www/html/vendor/yiisoft/yii2/base/Application.php(386): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#6 /var/www/html/backend/web/index.php(23): yii\\base\\Application->run()\n#7 {main}');
INSERT INTO `system_log` VALUES ('12', '1', 'yii\\web\\HeadersAlreadySentException', '1572018291.6281', '[backend][/university/manager?id=1]', 'yii\\web\\HeadersAlreadySentException: Headers already sent in /var/www/html/backend/controllers/UniversityController.php on line 93. in /var/www/html/vendor/yiisoft/yii2/web/Response.php:366\nStack trace:\n#0 /var/www/html/vendor/yiisoft/yii2/web/Response.php(339): yii\\web\\Response->sendHeaders()\n#1 /var/www/html/vendor/yiisoft/yii2/base/Application.php(392): yii\\web\\Response->send()\n#2 /var/www/html/backend/web/index.php(23): yii\\base\\Application->run()\n#3 {main}');
INSERT INTO `system_log` VALUES ('13', '1', 'yii\\web\\HeadersAlreadySentException', '1572018311.6078', '[backend][/university/manager?id=1]', 'yii\\web\\HeadersAlreadySentException: Headers already sent in /var/www/html/backend/controllers/UniversityController.php on line 108. in /var/www/html/vendor/yiisoft/yii2/web/Response.php:366\nStack trace:\n#0 /var/www/html/vendor/yiisoft/yii2/web/Response.php(339): yii\\web\\Response->sendHeaders()\n#1 /var/www/html/vendor/yiisoft/yii2/base/Application.php(392): yii\\web\\Response->send()\n#2 /var/www/html/backend/web/index.php(23): yii\\base\\Application->run()\n#3 {main}');
INSERT INTO `system_log` VALUES ('14', '1', 'yii\\web\\HeadersAlreadySentException', '1572018465.8449', '[backend][/university/manager?id=1]', 'yii\\web\\HeadersAlreadySentException: Headers already sent in /var/www/html/backend/controllers/UniversityController.php on line 112. in /var/www/html/vendor/yiisoft/yii2/web/Response.php:366\nStack trace:\n#0 /var/www/html/vendor/yiisoft/yii2/web/Response.php(339): yii\\web\\Response->sendHeaders()\n#1 /var/www/html/vendor/yiisoft/yii2/base/Application.php(392): yii\\web\\Response->send()\n#2 /var/www/html/backend/web/index.php(23): yii\\base\\Application->run()\n#3 {main}');
INSERT INTO `system_log` VALUES ('15', '1', 'Error', '1572018510.4655', '[backend][/university]', 'Error: Call to a member function getPublicIdentity() on null in /var/www/html/backend/views/university/index.php:59\nStack trace:\n#0 [internal function]: yii\\base\\View->{closure}(Object(backend\\models\\University), 1, 0, Object(kartik\\grid\\DataColumn))\n#1 /var/www/html/vendor/yiisoft/yii2/grid/DataColumn.php(230): call_user_func(Object(Closure), Object(backend\\models\\University), 1, 0, Object(kartik\\grid\\DataColumn))\n#2 /var/www/html/vendor/yiisoft/yii2/grid/DataColumn.php(244): yii\\grid\\DataColumn->getDataCellValue(Object(backend\\models\\University), 1, 0)\n#3 /var/www/html/vendor/kartik-v/yii2-grid/src/DataColumn.php(242): yii\\grid\\DataColumn->renderDataCellContent(Object(backend\\models\\University), 1, 0)\n#4 /var/www/html/vendor/kartik-v/yii2-grid/src/GridView.php(1304): kartik\\grid\\DataColumn->renderDataCell(Object(backend\\models\\University), 1, 0)\n#5 /var/www/html/vendor/yiisoft/yii2/grid/GridView.php(494): kartik\\grid\\GridView->renderTableRow(Object(backend\\models\\University), 1, 0)\n#6 /var/www/html/vendor/kartik-v/yii2-grid/src/GridView.php(1284): yii\\grid\\GridView->renderTableBody()\n#7 /var/www/html/vendor/yiisoft/yii2/grid/GridView.php(358): kartik\\grid\\GridView->renderTableBody()\n#8 /var/www/html/vendor/yiisoft/yii2/widgets/BaseListView.php(160): yii\\grid\\GridView->renderItems()\n#9 /var/www/html/vendor/yiisoft/yii2/grid/GridView.php(326): yii\\widgets\\BaseListView->renderSection(\'{items}\')\n#10 /var/www/html/vendor/yiisoft/yii2/widgets/BaseListView.php(135): yii\\grid\\GridView->renderSection(\'{items}\')\n#11 [internal function]: yii\\widgets\\BaseListView->yii\\widgets\\{closure}(Array)\n#12 /var/www/html/vendor/yiisoft/yii2/widgets/BaseListView.php(138): preg_replace_callback(\'/{\\\\w+}/\', Object(Closure), \'<div class=\"pan...\')\n#13 /var/www/html/vendor/yiisoft/yii2/grid/GridView.php(301): yii\\widgets\\BaseListView->run()\n#14 /var/www/html/vendor/kartik-v/yii2-grid/src/GridView.php(1204): yii\\grid\\GridView->run()\n#15 /var/www/html/vendor/yiisoft/yii2/base/Widget.php(140): kartik\\grid\\GridView->run()\n#16 /var/www/html/backend/views/university/index.php(98): yii\\base\\Widget::widget(Array)\n#17 /var/www/html/vendor/yiisoft/yii2/base/View.php(348): require(\'/var/www/html/b...\')\n#18 /var/www/html/vendor/yiisoft/yii2/base/View.php(257): yii\\base\\View->renderPhpFile(\'/var/www/html/b...\', Array)\n#19 /var/www/html/vendor/yiisoft/yii2/base/View.php(156): yii\\base\\View->renderFile(\'/var/www/html/b...\', Array, Object(backend\\controllers\\UniversityController))\n#20 /var/www/html/vendor/yiisoft/yii2/base/Controller.php(386): yii\\base\\View->render(\'index\', Array, Object(backend\\controllers\\UniversityController))\n#21 /var/www/html/backend/controllers/UniversityController.php(60): yii\\base\\Controller->render(\'index\', Array)\n#22 [internal function]: backend\\controllers\\UniversityController->actionIndex()\n#23 /var/www/html/vendor/yiisoft/yii2/base/InlineAction.php(57): call_user_func_array(Array, Array)\n#24 /var/www/html/vendor/yiisoft/yii2/base/Controller.php(157): yii\\base\\InlineAction->runWithParams(Array)\n#25 /var/www/html/vendor/yiisoft/yii2/base/Module.php(528): yii\\base\\Controller->runAction(\'\', Array)\n#26 /var/www/html/vendor/yiisoft/yii2/web/Application.php(103): yii\\base\\Module->runAction(\'university\', Array)\n#27 /var/www/html/vendor/yiisoft/yii2/base/Application.php(386): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#28 /var/www/html/backend/web/index.php(23): yii\\base\\Application->run()\n#29 {main}');
INSERT INTO `system_log` VALUES ('16', '1', 'yii\\base\\UnknownPropertyException', '1572018756.2717', '[backend][/university/manager-view]', 'yii\\base\\UnknownPropertyException: Getting unknown property: backend\\models\\University::universityAccreditedCountries in /var/www/html/vendor/yiisoft/yii2/base/Component.php:154\nStack trace:\n#0 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(298): yii\\base\\Component->__get(\'universityAccre...\')\n#1 /var/www/html/backend/controllers/UniversityController.php(154): yii\\db\\BaseActiveRecord->__get(\'universityAccre...\')\n#2 [internal function]: backend\\controllers\\UniversityController->actionManagerView()\n#3 /var/www/html/vendor/yiisoft/yii2/base/InlineAction.php(57): call_user_func_array(Array, Array)\n#4 /var/www/html/vendor/yiisoft/yii2/base/Controller.php(157): yii\\base\\InlineAction->runWithParams(Array)\n#5 /var/www/html/vendor/yiisoft/yii2/base/Module.php(528): yii\\base\\Controller->runAction(\'manager-view\', Array)\n#6 /var/www/html/vendor/yiisoft/yii2/web/Application.php(103): yii\\base\\Module->runAction(\'university/mana...\', Array)\n#7 /var/www/html/vendor/yiisoft/yii2/base/Application.php(386): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#8 /var/www/html/backend/web/index.php(23): yii\\base\\Application->run()\n#9 {main}');
INSERT INTO `system_log` VALUES ('17', '1', 'yii\\base\\UnknownPropertyException', '1572023739.942', '[backend][/schools/create]', 'yii\\base\\UnknownPropertyException: Getting unknown property: backend\\models\\Schools::details_ar in /var/www/html/vendor/yiisoft/yii2/base/Component.php:154\nStack trace:\n#0 /var/www/html/vendor/yiisoft/yii2/db/BaseActiveRecord.php(298): yii\\base\\Component->__get(\'details_ar\')\n#1 /var/www/html/vendor/yiisoft/yii2/helpers/BaseHtml.php(2227): yii\\db\\BaseActiveRecord->__get(\'details_ar\')\n#2 /var/www/html/vendor/yiisoft/yii2/helpers/BaseHtml.php(1533): yii\\helpers\\BaseHtml::getAttributeValue(Object(backend\\models\\Schools), \'details_ar\')\n#3 /var/www/html/common/helpers/multiLang/MyMultiLanguageActiveField.php(52): yii\\helpers\\BaseHtml::activeTextarea(Object(backend\\models\\Schools), \'details_ar\', Array)\n#4 /var/www/html/common/helpers/multiLang/views/index.php(43): common\\helpers\\multiLang\\MyMultiLanguageActiveField->getInputField(\'details_ar\')\n#5 /var/www/html/vendor/yiisoft/yii2/base/View.php(348): require(\'/var/www/html/c...\')\n#6 /var/www/html/vendor/yiisoft/yii2/base/View.php(257): yii\\base\\View->renderPhpFile(\'/var/www/html/c...\', Array)\n#7 /var/www/html/vendor/yiisoft/yii2/base/View.php(156): yii\\base\\View->renderFile(\'/var/www/html/c...\', Array, Object(common\\helpers\\multiLang\\MyMultiLanguageActiveField))\n#8 /var/www/html/vendor/yiisoft/yii2/base/Widget.php(236): yii\\base\\View->render(\'index\', Array, Object(common\\helpers\\multiLang\\MyMultiLanguageActiveField))\n#9 /var/www/html/common/helpers/multiLang/MyMultiLanguageActiveField.php(39): yii\\base\\Widget->render(\'index\')\n#10 /var/www/html/vendor/yiisoft/yii2/base/Widget.php(140): common\\helpers\\multiLang\\MyMultiLanguageActiveField->run()\n#11 /var/www/html/vendor/yiisoft/yii2/widgets/ActiveField.php(792): yii\\base\\Widget::widget(Array)\n#12 /var/www/html/backend/views/schools/_form.php(111): yii\\widgets\\ActiveField->widget(\'common\\\\helpers\\\\...\', Array)\n#13 /var/www/html/vendor/yiisoft/yii2/base/View.php(348): require(\'/var/www/html/b...\')\n#14 /var/www/html/vendor/yiisoft/yii2/base/View.php(257): yii\\base\\View->renderPhpFile(\'/var/www/html/b...\', Array)\n#15 /var/www/html/vendor/yiisoft/yii2/base/View.php(156): yii\\base\\View->renderFile(\'/var/www/html/b...\', Array, NULL)\n#16 /var/www/html/backend/views/schools/create.php(18): yii\\base\\View->render(\'_form\', Array)\n#17 /var/www/html/vendor/yiisoft/yii2/base/View.php(348): require(\'/var/www/html/b...\')\n#18 /var/www/html/vendor/yiisoft/yii2/base/View.php(257): yii\\base\\View->renderPhpFile(\'/var/www/html/b...\', Array)\n#19 /var/www/html/vendor/yiisoft/yii2/base/View.php(156): yii\\base\\View->renderFile(\'/var/www/html/b...\', Array, Object(backend\\controllers\\SchoolsController))\n#20 /var/www/html/vendor/yiisoft/yii2/base/Controller.php(386): yii\\base\\View->render(\'create\', Array, Object(backend\\controllers\\SchoolsController))\n#21 /var/www/html/backend/controllers/SchoolsController.php(70): yii\\base\\Controller->render(\'create\', Array)\n#22 [internal function]: backend\\controllers\\SchoolsController->actionCreate()\n#23 /var/www/html/vendor/yiisoft/yii2/base/InlineAction.php(57): call_user_func_array(Array, Array)\n#24 /var/www/html/vendor/yiisoft/yii2/base/Controller.php(157): yii\\base\\InlineAction->runWithParams(Array)\n#25 /var/www/html/vendor/yiisoft/yii2/base/Module.php(528): yii\\base\\Controller->runAction(\'create\', Array)\n#26 /var/www/html/vendor/yiisoft/yii2/web/Application.php(103): yii\\base\\Module->runAction(\'schools/create\', Array)\n#27 /var/www/html/vendor/yiisoft/yii2/base/Application.php(386): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#28 /var/www/html/backend/web/index.php(23): yii\\base\\Application->run()\n#29 {main}');

-- ----------------------------
-- Table structure for `system_rbac_migration`
-- ----------------------------
DROP TABLE IF EXISTS `system_rbac_migration`;
CREATE TABLE `system_rbac_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system_rbac_migration
-- ----------------------------
INSERT INTO `system_rbac_migration` VALUES ('m000000_000000_base', '1564754244');
INSERT INTO `system_rbac_migration` VALUES ('m150625_214101_roles', '1564754247');
INSERT INTO `system_rbac_migration` VALUES ('m150625_215624_init_permissions', '1564754247');
INSERT INTO `system_rbac_migration` VALUES ('m151223_074604_edit_own_model', '1564754247');

-- ----------------------------
-- Table structure for `timeline_event`
-- ----------------------------
DROP TABLE IF EXISTS `timeline_event`;
CREATE TABLE `timeline_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application` varchar(64) NOT NULL,
  `category` varchar(64) NOT NULL,
  `event` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of timeline_event
-- ----------------------------
INSERT INTO `timeline_event` VALUES ('1', 'backend', 'user', 'signup', '{\"public_identity\":\"asd@asd.com\",\"user_id\":5,\"created_at\":1572017563}', '1572017563');
INSERT INTO `timeline_event` VALUES ('2', 'backend', 'user', 'signup', '{\"public_identity\":\"asd@asd.com\",\"user_id\":6,\"created_at\":1572017639}', '1572017639');
INSERT INTO `timeline_event` VALUES ('3', 'backend', 'user', 'signup', '{\"public_identity\":\"asd@asd.com\",\"user_id\":7,\"created_at\":1572017921}', '1572017921');
INSERT INTO `timeline_event` VALUES ('4', 'backend', 'user', 'signup', '{\"public_identity\":\"2e@t.k\",\"user_id\":8,\"created_at\":1572018027}', '1572018027');
INSERT INTO `timeline_event` VALUES ('5', 'backend', 'user', 'signup', '{\"public_identity\":\"asd@as22.com\",\"user_id\":9,\"created_at\":1572018241}', '1572018241');
INSERT INTO `timeline_event` VALUES ('6', 'backend', 'user', 'signup', '{\"public_identity\":\"superadminef@gg.k\",\"user_id\":10,\"created_at\":1572018311}', '1572018311');
INSERT INTO `timeline_event` VALUES ('7', 'backend', 'user', 'signup', '{\"public_identity\":\"superadmin@kk.ff\",\"user_id\":11,\"created_at\":1572018430}', '1572018430');
INSERT INTO `timeline_event` VALUES ('8', 'backend', 'user', 'signup', '{\"public_identity\":\"superadmin@rgrgr.grgr\",\"user_id\":12,\"created_at\":1572018465}', '1572018465');
INSERT INTO `timeline_event` VALUES ('9', 'backend', 'user', 'signup', '{\"public_identity\":\"superadmin@rr.kll\",\"user_id\":13,\"created_at\":1572018509}', '1572018509');
INSERT INTO `timeline_event` VALUES ('10', 'backend', 'user', 'signup', '{\"public_identity\":\"asd@asd.com\",\"user_id\":14,\"created_at\":1572018593}', '1572018593');

-- ----------------------------
-- Table structure for `translations_with_string`
-- ----------------------------
DROP TABLE IF EXISTS `translations_with_string`;
CREATE TABLE `translations_with_string` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(100) NOT NULL,
  `model_id` int(11) NOT NULL,
  `attribute` varchar(100) NOT NULL,
  `lang` varchar(6) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `attribute` (`attribute`),
  KEY `table_name` (`table_name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of translations_with_string
-- ----------------------------
INSERT INTO `translations_with_string` VALUES ('5', 'university_program_degree', '2', 'title', 'ar', 'بكاليريوس');
INSERT INTO `translations_with_string` VALUES ('6', 'university_program_degree', '3', 'title', 'ar', 'ماستر');
INSERT INTO `translations_with_string` VALUES ('7', 'university_program_majors', '5', 'title', 'ar', 'درجه اولى');
INSERT INTO `translations_with_string` VALUES ('8', 'university_program_majors', '6', 'title', 'ar', 'درجه ثانية');
INSERT INTO `translations_with_string` VALUES ('9', 'university_program_field', '1', 'title', 'ar', 'مجال 1 ');
INSERT INTO `translations_with_string` VALUES ('10', 'university_program_field', '2', 'title', 'ar', 'مجال 2');
INSERT INTO `translations_with_string` VALUES ('11', 'schools_course_types', '1', 'title', 'ar', 'عام');
INSERT INTO `translations_with_string` VALUES ('12', 'schools_course_types', '2', 'title', 'ar', 'متقدم');
INSERT INTO `translations_with_string` VALUES ('13', 'schools_course_types', '3', 'title', 'ar', 'محاذثه');

-- ----------------------------
-- Table structure for `translations_with_text`
-- ----------------------------
DROP TABLE IF EXISTS `translations_with_text`;
CREATE TABLE `translations_with_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(100) NOT NULL,
  `model_id` int(11) NOT NULL,
  `attribute` varchar(100) NOT NULL,
  `lang` varchar(6) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `attribute` (`attribute`),
  KEY `table_name` (`table_name`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of translations_with_text
-- ----------------------------
INSERT INTO `translations_with_text` VALUES ('8', 'university', '1', 'title', 'ar', 'جامعه تجريبية');
INSERT INTO `translations_with_text` VALUES ('9', 'university', '1', 'description', 'ar', 'وصف عن الجامعه ');
INSERT INTO `translations_with_text` VALUES ('10', 'university', '1', 'detailed_address', 'ar', 'عنوان تفصيلى');
INSERT INTO `translations_with_text` VALUES ('11', 'university_programs', '1', 'title', 'ar', 'برنامج تجريبى');
INSERT INTO `translations_with_text` VALUES ('16', 'schools', '3', 'title', 'ar', 'معهد لغات 1');
INSERT INTO `translations_with_text` VALUES ('17', 'schools', '3', 'details', 'ar', 'وصف للكورس هنا');

-- ----------------------------
-- Table structure for `tree`
-- ----------------------------
DROP TABLE IF EXISTS `tree`;
CREATE TABLE `tree` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique tree node identifier',
  `root` int(11) DEFAULT NULL COMMENT 'Tree root identifier',
  `lft` int(11) NOT NULL COMMENT 'Nested set left property',
  `rgt` int(11) NOT NULL COMMENT 'Nested set right property',
  `lvl` smallint(5) NOT NULL COMMENT 'Nested set level / depth',
  `name` varchar(60) NOT NULL COMMENT 'The tree node name / label',
  `icon` varchar(255) DEFAULT NULL COMMENT 'The icon to use for the node',
  `icon_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Icon Type: 1 = CSS Class, 2 = Raw Markup',
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Whether the node is active (will be set to false on deletion)',
  `selected` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether the node is selected/checked by default',
  `disabled` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether the node is enabled',
  `readonly` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether the node is read only (unlike disabled - will allow toolbar actions)',
  `visible` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Whether the node is visible',
  `collapsed` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether the node is collapsed by default',
  `movable_u` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Whether the node is movable one position up',
  `movable_d` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Whether the node is movable one position down',
  `movable_l` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Whether the node is movable to the left (from sibling to parent)',
  `movable_r` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Whether the node is movable to the right (from sibling to child)',
  `removable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Whether the node is removable (any children below will be moved as siblings before deletion)',
  `removable_all` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether the node is removable along with descendants',
  `child_allowed` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Whether to allow adding children to the node',
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_tree_NK1` (`root`),
  KEY `tbl_tree_NK2` (`lft`),
  KEY `tbl_tree_NK3` (`rgt`),
  KEY `tbl_tree_NK4` (`lvl`),
  KEY `tbl_tree_NK5` (`active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tree
-- ----------------------------

-- ----------------------------
-- Table structure for `university`
-- ----------------------------
DROP TABLE IF EXISTS `university`;
CREATE TABLE `university` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image_base_url` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `description` text,
  `detailed_address` varchar(255) DEFAULT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  `city_id` int(10) unsigned DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `total_rating` float DEFAULT NULL,
  `no_of_ratings` int(11) DEFAULT NULL,
  `recommended` tinyint(1) DEFAULT '0',
  `responsible_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  KEY `city_id` (`city_id`),
  CONSTRAINT `university_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `university_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of university
-- ----------------------------
INSERT INTO `university` VALUES ('1', 'Auburn University', 'http://storage.eduxa.localhost/source', '/1/8zuA2xUm8onrWFubyVGarZD7-Hc25_Kb.jpg', 'description goes here ', 'detailed address', null, null, 'Co Rd 361, Westcliffe, CO 81252, USA', '38.035785642420315', '-105.1575117111206', '5', '2', '1', '14', '1', '2019-10-25 14:41:50', '2019-10-25 15:49:53', '1', '1');

-- ----------------------------
-- Table structure for `university_countries`
-- ----------------------------
DROP TABLE IF EXISTS `university_countries`;
CREATE TABLE `university_countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `university_id` int(10) unsigned NOT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `university_id` (`university_id`) USING BTREE,
  CONSTRAINT `university_countries_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of university_countries
-- ----------------------------
INSERT INTO `university_countries` VALUES ('5', '1', '3', '2019-10-25 14:44:18', '2019-10-25 15:09:52', '1', '1');
INSERT INTO `university_countries` VALUES ('6', '1', '4', '2019-10-25 14:44:18', '2019-10-25 15:09:52', '1', '1');

-- ----------------------------
-- Table structure for `university_photos`
-- ----------------------------
DROP TABLE IF EXISTS `university_photos`;
CREATE TABLE `university_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `university_id` int(11) unsigned NOT NULL,
  `path` varchar(255) NOT NULL,
  `base_url` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `university_id` (`university_id`),
  CONSTRAINT `university_photos_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of university_photos
-- ----------------------------
INSERT INTO `university_photos` VALUES ('5', '1', '/1/RuiFIs40IWZFo0VPw1cY_C-5rptUmKbc.jpg', 'http://storage.eduxa.localhost/source', 'image/jpeg', '29141', '6.jpg', null, null);
INSERT INTO `university_photos` VALUES ('6', '1', '/1/06EigF3P-15QXqasxGBXVe9VbC_qFNzL.jpg', 'http://storage.eduxa.localhost/source', 'image/jpeg', '34942', '3.jpg', null, null);
INSERT INTO `university_photos` VALUES ('7', '1', '/1/z7PZ8w2ZZkpZEbRbR9xz2aGq6Sft9x4i.jpg', 'http://storage.eduxa.localhost/source', 'image/jpeg', '29374', 'germanny.jpg', null, null);
INSERT INTO `university_photos` VALUES ('8', '1', '/1/DvtucUKxoGUuGLCpdFT3Izg7pl9NBXIQ.jpg', 'http://storage.eduxa.localhost/source', 'image/jpeg', '37901', 'france.jpg', null, null);

-- ----------------------------
-- Table structure for `university_program_degree`
-- ----------------------------
DROP TABLE IF EXISTS `university_program_degree`;
CREATE TABLE `university_program_degree` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of university_program_degree
-- ----------------------------
INSERT INTO `university_program_degree` VALUES ('2', 'Bachelor', '2019-09-22 23:11:13', '2019-10-25 16:04:09', '1', '1');
INSERT INTO `university_program_degree` VALUES ('3', 'Master', '2019-10-25 14:19:53', '2019-10-25 16:04:23', '1', '1');

-- ----------------------------
-- Table structure for `university_program_field`
-- ----------------------------
DROP TABLE IF EXISTS `university_program_field`;
CREATE TABLE `university_program_field` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of university_program_field
-- ----------------------------
INSERT INTO `university_program_field` VALUES ('1', 'field 1', '2019-10-25 16:10:12', '2019-10-25 16:10:12', '1', '1');
INSERT INTO `university_program_field` VALUES ('2', 'field 2 ', '2019-10-25 16:10:47', '2019-10-25 16:10:47', '1', '1');

-- ----------------------------
-- Table structure for `university_program_majors`
-- ----------------------------
DROP TABLE IF EXISTS `university_program_majors`;
CREATE TABLE `university_program_majors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of university_program_majors
-- ----------------------------
INSERT INTO `university_program_majors` VALUES ('5', 'major1', '1', '2019-10-25 16:07:08', '2019-10-25 16:07:08', '1', '1');
INSERT INTO `university_program_majors` VALUES ('6', 'major2', '1', '2019-10-25 16:07:25', '2019-10-25 16:07:25', '1', '1');

-- ----------------------------
-- Table structure for `university_programs`
-- ----------------------------
DROP TABLE IF EXISTS `university_programs`;
CREATE TABLE `university_programs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `university_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `major_id` int(10) unsigned NOT NULL,
  `degree_id` int(255) unsigned NOT NULL,
  `field_id` int(11) unsigned DEFAULT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  `city_id` int(10) unsigned DEFAULT NULL,
  `study_start_date` varchar(255) DEFAULT NULL,
  `study_duration` varchar(255) DEFAULT NULL,
  `study_method` varchar(255) DEFAULT NULL,
  `attendance_type` varchar(255) DEFAULT NULL,
  `annual_cost` float DEFAULT NULL,
  `conditional_admissions` varchar(255) DEFAULT NULL,
  `toefl` varchar(255) DEFAULT NULL,
  `ielts` varchar(255) DEFAULT NULL,
  `bank_statment` varchar(255) DEFAULT NULL,
  `high_school_transcript` varchar(255) DEFAULT NULL,
  `bachelor_degree` varchar(255) DEFAULT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `note1` text,
  `note2` text,
  `total_rating` float DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `program_type` tinyint(4) DEFAULT '1' COMMENT '1 undergraduate 2 graduate',
  PRIMARY KEY (`id`),
  KEY `university_id` (`university_id`),
  KEY `major_id` (`major_id`),
  KEY `field_id` (`field_id`),
  KEY `degree_id` (`degree_id`),
  CONSTRAINT `university_programs_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `university_programs_ibfk_2` FOREIGN KEY (`major_id`) REFERENCES `university_program_majors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `university_programs_ibfk_3` FOREIGN KEY (`field_id`) REFERENCES `university_program_field` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `university_programs_ibfk_4` FOREIGN KEY (`degree_id`) REFERENCES `university_program_degree` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of university_programs
-- ----------------------------
INSERT INTO `university_programs` VALUES ('1', '1', 'program one', '5', '2', '1', '4', '5', '', '', '', '', null, '', '', '', '', '', '', '', '', '', null, null, null, null, null, '0');

-- ----------------------------
-- Table structure for `university_rating`
-- ----------------------------
DROP TABLE IF EXISTS `university_rating`;
CREATE TABLE `university_rating` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `university_id` int(10) unsigned NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment` text,
  `rating` float NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `university_id` (`university_id`),
  CONSTRAINT `university_rating_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of university_rating
-- ----------------------------
INSERT INTO `university_rating` VALUES ('2', '1', null, 'Amer', 'test comment 1 ', '5', '1', '2019-10-25 14:50:50', '2019-10-25 15:09:52', '1', '1');
INSERT INTO `university_rating` VALUES ('3', '1', null, 'Ahmed', 'test comment 2', '5', '1', '2019-10-25 14:50:50', '2019-10-25 15:09:52', '1', '1');

-- ----------------------------
-- Table structure for `university_videos`
-- ----------------------------
DROP TABLE IF EXISTS `university_videos`;
CREATE TABLE `university_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `university_id` int(11) unsigned NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `base_url` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `university_id` (`university_id`) USING BTREE,
  CONSTRAINT `university_videos_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of university_videos
-- ----------------------------
INSERT INTO `university_videos` VALUES ('2', '1', null, 'http://youtube.com', null, null, 'video 1 ', null, null);

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `auth_key` varchar(32) NOT NULL,
  `access_token` varchar(40) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `oauth_client` varchar(255) DEFAULT NULL,
  `oauth_client_user_id` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '2',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `logged_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'superadmin', 'JT1eK6y0yLH-1fhfOngyBPqiVAa7XGib', 'OJFTWK7sWqe3dcI_WeZZx6mIHvmSP8ilqkU8o9EX', '$2y$13$fkFWPM1Q7QBaAGgtNydkJuZmIKyJVYw1afR.RaSUS4KKmxSSkg6qu', null, null, 'webmaster@example.com', '2', '1564754241', '1564754241', '1572018837');
INSERT INTO `user` VALUES ('2', 'manager', 'mdK-I48T0qQQaXzrK-e6wwCeqBx4_lEi', 'imVvtMIkAUfJCfgssqtm_azOQevNGcEcFM-luntt', '$2y$13$4roOV2yb/CxZFX10lUa.u.GgJAEo2CAQPHlD8ocoTYOhzlNyVxyIa', null, null, 'manager@example.com', '2', '1564754242', '1564754242', '1567592996');
INSERT INTO `user` VALUES ('3', 'user', 'LtEF_PINuXO8tCFA10yaZAd9Yn6QvB3S', '9_FesaK3MUAqFs5SVz77IQrlGfi5ICVefCkJyY7G', '$2y$13$NIAQ1KWuw2lZsCIDCqjr2e2OZpjQ8iKosBS1qdGeqXL9beuF5FFfi', null, null, 'user@example.com', '2', '1564754243', '1564754243', null);
INSERT INTO `user` VALUES ('14', 'asd@asd.com', 'YBR1-cQYxbgqm5n_0Viy8L3eqm78M324', 'n682Dx1SXgSMkgaEYcOmSn-24C5IFoieaNxfMOLE', '$2y$13$YYieQha3gyzkjuqWaIh1nu6xr7HWus/d3Ef6pFxFrEBbjE55Yvxsq', null, null, 'asd@asd.com', '2', '1572018593', '1572018593', '1572018658');

-- ----------------------------
-- Table structure for `user_profile`
-- ----------------------------
DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE `user_profile` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `avatar_path` varchar(255) DEFAULT NULL,
  `avatar_base_url` varchar(255) DEFAULT NULL,
  `locale` varchar(32) NOT NULL,
  `gender` smallint(1) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `nationlaity` varchar(255) DEFAULT NULL,
  `complete_ratio` decimal(10,0) DEFAULT NULL,
  `find_us_from` tinyint(4) DEFAULT NULL,
  `communtication_channel` tinyint(4) DEFAULT NULL,
  `interested_in` tinyint(4) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `no_of_students` int(11) DEFAULT NULL,
  `students_nationalities` varchar(0) DEFAULT NULL,
  `expected_no_of_students` tinyint(4) DEFAULT NULL,
  `job_title` varchar(0) DEFAULT NULL,
  `telephone_no` varchar(0) DEFAULT NULL,
  `website` varchar(0) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_profile
-- ----------------------------
INSERT INTO `user_profile` VALUES ('1', 'John', null, 'Doe', null, null, 'en-US', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user_profile` VALUES ('2', null, null, null, null, null, 'en-US', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user_profile` VALUES ('3', null, null, null, null, null, 'en-US', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user_profile` VALUES ('14', 'ahmed', null, 'gad', '/1/mPLISV5AWBePiVubjZck55QEoShNHpbc.jpg', 'http://storage.eduxa.localhost/source', 'en-US', '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `user_token`
-- ----------------------------
DROP TABLE IF EXISTS `user_token`;
CREATE TABLE `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `token` varchar(40) NOT NULL,
  `expire_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_token
-- ----------------------------

-- ----------------------------
-- Table structure for `widget_carousel`
-- ----------------------------
DROP TABLE IF EXISTS `widget_carousel`;
CREATE TABLE `widget_carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `status` smallint(6) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of widget_carousel
-- ----------------------------
INSERT INTO `widget_carousel` VALUES ('1', 'index', '1');

-- ----------------------------
-- Table structure for `widget_carousel_item`
-- ----------------------------
DROP TABLE IF EXISTS `widget_carousel_item`;
CREATE TABLE `widget_carousel_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carousel_id` int(11) NOT NULL,
  `base_url` varchar(1024) DEFAULT NULL,
  `path` varchar(1024) DEFAULT NULL,
  `asset_url` varchar(1024) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `url` varchar(1024) DEFAULT NULL,
  `caption` varchar(1024) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `order` int(11) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_item_carousel` (`carousel_id`),
  CONSTRAINT `fk_item_carousel` FOREIGN KEY (`carousel_id`) REFERENCES `widget_carousel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of widget_carousel_item
-- ----------------------------
INSERT INTO `widget_carousel_item` VALUES ('1', '1', 'http://eduxa.localhost', 'img/yii2-starter-kit.gif', 'http://eduxa.localhost/img/yii2-starter-kit.gif', 'image/gif', '/', null, '1', '0', null, null);

-- ----------------------------
-- Table structure for `widget_menu`
-- ----------------------------
DROP TABLE IF EXISTS `widget_menu`;
CREATE TABLE `widget_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(32) NOT NULL,
  `title` varchar(255) NOT NULL,
  `items` text NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of widget_menu
-- ----------------------------
INSERT INTO `widget_menu` VALUES ('1', 'frontend-index', 'Frontend index menu', '[\n    {\n        \"label\": \"Get started with Yii2\",\n        \"url\": \"http://www.yiiframework.com\",\n        \"options\": {\n            \"tag\": \"span\"\n        },\n        \"template\": \"<a href=\\\"{url}\\\" class=\\\"btn btn-lg btn-success\\\">{label}</a>\"\n    },\n    {\n        \"label\": \"Yii2 Starter Kit on GitHub\",\n        \"url\": \"https://github.com/yii2-starter-kit/yii2-starter-kit\",\n        \"options\": {\n            \"tag\": \"span\"\n        },\n        \"template\": \"<a href=\\\"{url}\\\" class=\\\"btn btn-lg btn-primary\\\">{label}</a>\"\n    },\n    {\n        \"label\": \"Find a bug?\",\n        \"url\": \"https://github.com/yii2-starter-kit/yii2-starter-kit/issues\",\n        \"options\": {\n            \"tag\": \"span\"\n        },\n        \"template\": \"<a href=\\\"{url}\\\" class=\\\"btn btn-lg btn-danger\\\">{label}</a>\"\n    }\n]', '1');

-- ----------------------------
-- Table structure for `widget_text`
-- ----------------------------
DROP TABLE IF EXISTS `widget_text`;
CREATE TABLE `widget_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` smallint(6) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_widget_text_key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of widget_text
-- ----------------------------
INSERT INTO `widget_text` VALUES ('1', 'backend_welcome', 'Welcome to backend', '<p>Welcome to Yii2 Starter Kit Dashboard</p>', '1', '1564754243', '1564754243');
INSERT INTO `widget_text` VALUES ('2', 'ads-example', 'Google Ads Example Block', '<div class=\"lead\">\n                \n            \n            </div>', '0', '1564754243', '1564754243');
