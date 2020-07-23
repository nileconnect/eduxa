/*
Navicat MySQL Data Transfer

Source Server         : Docker
Source Server Version : 50730
Source Host           : localhost:13888
Source Database       : eduxa_qc

Target Server Type    : MYSQL
Target Server Version : 50730
File Encoding         : 65001

Date: 2020-07-24 00:44:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cities`
-- ----------------------------
DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `state_id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`),
  CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cities
-- ----------------------------

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
  `status` tinyint(4) DEFAULT '1',
  `top_destination` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of country
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of country_attachment
-- ----------------------------

-- ----------------------------
-- Table structure for `currency`
-- ----------------------------
DROP TABLE IF EXISTS `currency`;
CREATE TABLE `currency` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `currency` varchar(255) DEFAULT NULL,
  `currency_code` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `conversion_rate` float DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of currency
-- ----------------------------
INSERT INTO `currency` VALUES ('1', 'US Dollar', 'USD', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('2', 'Euro', 'EUR', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('3', 'Egyptian Pound', 'EGP', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('4', 'Kuwaiti Dinar', 'KWD', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('5', 'Saudi Riyal', 'SAR', '1', null, null, null, null, null);

-- ----------------------------
-- Table structure for `faq`
-- ----------------------------
DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of file_storage_item
-- ----------------------------

-- ----------------------------
-- Table structure for `key_storage_item`
-- ----------------------------
DROP TABLE IF EXISTS `key_storage_item`;
CREATE TABLE `key_storage_item` (
  `key` varchar(128) NOT NULL,
  `value` text,
  `comment` text,
  `updated_at` int(11) DEFAULT NULL,
  `created_atti` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `item_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`key`),
  UNIQUE KEY `idx_key_storage_item_key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of key_storage_item
-- ----------------------------
INSERT INTO `key_storage_item` VALUES ('backend.layout-boxed', '0', null, null, null, '0', null);
INSERT INTO `key_storage_item` VALUES ('backend.layout-collapsed-sidebar', '0', null, null, null, '0', null);
INSERT INTO `key_storage_item` VALUES ('backend.layout-fixed', '0', null, null, null, '0', null);
INSERT INTO `key_storage_item` VALUES ('backend.theme-skin', 'skin-blue', 'skin-blue, skin-black, skin-purple, skin-green, skin-red, skin-yellow', null, null, '0', null);
INSERT INTO `key_storage_item` VALUES ('email', 'info@eduxa.com', null, null, null, '1', null);
INSERT INTO `key_storage_item` VALUES ('facebook', 'http://www.facebook.com', '', '1594066865', null, '1', null);
INSERT INTO `key_storage_item` VALUES ('frontend.maintenance', 'disabled', 'Set it to \"enabled\" to turn on maintenance mode', null, null, '0', null);
INSERT INTO `key_storage_item` VALUES ('instagram', 'https://www.linkedin.com/feed/', '', '1594066939', null, '1', null);
INSERT INTO `key_storage_item` VALUES ('linkedin', 'http://www.linkedin.com', '', '1594066881', null, '1', null);
INSERT INTO `key_storage_item` VALUES ('phone', '01111111111', '', '1590956916', null, '1', null);
INSERT INTO `key_storage_item` VALUES ('twitter', 'http://www.twitter.com', 'www.twitter.com', '1594066898', null, '1', null);

-- ----------------------------
-- Table structure for `newsletter`
-- ----------------------------
DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE `newsletter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of newsletter
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of page
-- ----------------------------
INSERT INTO `page` VALUES ('100', 'how-we-work', 'How we work', '\r\n	<section class=\"section\">\r\n		<div class=\"container\">\r\n			<h2 class=\"title text-center\">How It Work</h2>\r\n\r\n			<div class=\"row\">\r\n				<div class=\"col-sm-4 mtsm\">\r\n					<div class=\"ptxlg prlg pllg pbxlg text-white bg-primary text-center\">\r\n						<div style=\"font-size:3em;height:88px;\"><i class=\"fas fa-search\"></i></div>\r\n						<h3>Search</h3>\r\n						<div class=\"mtmd\" style=\"color:#f0f0f0\">\r\n							Most people feel they have some basic flaws with their appearance, and the truth is that the stars \r\n						</div>\r\n					</div>\r\n				</div>\r\n				<div class=\"col-sm-4 mtsm\">\r\n					<div class=\"ptxlg prlg pllg pbxlg text-white bg-primary text-center\">\r\n						<div style=\"font-size:3em;height:88px;\"><i class=\"fas fa-desktop\"></i></div>\r\n						<h3>Review & Compare</h3>\r\n						<div class=\"mtmd\" style=\"color:#f0f0f0\">\r\n							Most people feel they have some basic flaws with their appearance, and the truth is that the stars \r\n						</div>\r\n					</div>\r\n				</div>\r\n				<div class=\"col-sm-4 mtsm\">\r\n					<div class=\"ptxlg prlg pllg pbxlg text-white bg-primary text-center\">\r\n						<div style=\"font-size:3em;height:88px;\"><i class=\"fab fa-wpforms\"></i></div>\r\n						<h3>Submit form</h3>\r\n						<div class=\"mtmd\" style=\"color:#f0f0f0\">\r\n							Most people feel they have some basic flaws with their appearance, and the truth is that the stars \r\n						</div>\r\n					</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</section>\r\n\r\n	<section class=\"section\">\r\n		<div class=\"container\">\r\n			\r\n			<div class=\"embed-responsive embed-responsive-16by9\">\r\n				<iframe class=\"embed-responsive-item\" src=\"https://www.youtube.com/embed/zpOULjyy-n8?rel=0\" allowfullscreen></iframe>\r\n			</div>\r\n\r\n		</div>\r\n	</section>', '', '1', '1564754243', '1594247844');
INSERT INTO `page` VALUES ('101', 'terms', 'Terms & Policy', '	\r\n	<section class=\"section\">\r\n		<div class=\"container\">\r\n			\r\n			<div class=\"row mbxlg\">\r\n				<div class=\"col-sm-8 mbmd\">\r\n					<h3 class=\"title title-sm\">About Us</h3>\r\n					<div class=\"text-large\">\r\n						Differentiate and you stand out in a crowded marketplace. Present your uniqueness and emphasize your rare attributes in your sales copy and promotions and you’ll capture the imagination and interest of those you want to reach. In a world of copycats, it pays to be an original. It’s usually the creator of a new concept who gets the most mileage from it. Innovative entrepreneurs often become market leaders while competitors keep doing things the same old way. who gets the most mileage from it. Innovative entrepreneurs often become market leaders.\r\n					</div>\r\n				</div>\r\n				<div class=\"col-sm-4\">\r\n					<figure class=\"img\">\r\n						<img src=\"img/391.jpg\" alt=\"\">\r\n					</figure>\r\n				</div>\r\n			</div>\r\n\r\n			<div class=\"row mblg\">\r\n				<div class=\"col-sm-6 mtmd mbmd\">\r\n					<h3 class=\"title title-sm\">Our Vision</h3>\r\n					<div class=\"text-large\">\r\n						The power of testimonials can never be underestimated. People, especially nowadays, will only purchase products or avail services which have been referred to them by people whom they know. But most of the times, this is not an option that is in the hands of the business owner, he has to do the next best thing, which is to get testimonials from his past clients. Testimonials are living statements from past customers or clients which states  that they were satisfied by the product/ service. Every business must have testimonials.\r\n					</div>\r\n				</div>\r\n				<div class=\"col-sm-6 mbmd\">\r\n					<h3 class=\"title title-sm\">Out Mision</h3>\r\n					<div class=\"text-large\">\r\n						The power of testimonials can never be underestimated. People, especially nowadays, will only purchase products or avail services which have been referred to them by people whom they know. But most of the times, this is not an option that is in the hands of the business owner, he has to do the next best thing, which is to get testimonials from his past clients. Testimonials are living statements from past customers or clients which states  that they were satisfied by the product/ service. Every business must have testimonials.\r\n					</div>\r\n				</div>\r\n			</div>\r\n\r\n			<div>\r\n				<h3 class=\"title title-sm\">About The Company</h3>\r\n				<div class=\"text-large mbmd\">\r\n					This article is floated online with an aim to help you find the best dvd printing solution. Dvd printing is an important feature used by large and small DVD production houses to print information on DVDs. Actually, dvd printing is a labeling technique that helps to identify DVDs. Thus, dvd printing is essential part of your commercial DVD production.\r\n				</div>\r\n				<div class=\"text-large mbmd\">\r\n					Your DVDs usually come coated with directly printable lacquer films with ability to absorb ink, and the process of directly printing the lacquer films on your DVDs is technically known as dvd printing. Your dvd printing solution lies in – inkjet dvd printing, thermal transfer dvd printing, screen dvd printing, and offset dvd printing – which you may choose according to need and requirement. The printing process using CMYK Inkjet printers is known as inkjet printing. The inkjet dvd printing offers you the stunning results with high resolution and vibrant colors. The inkjet dvd printing is good choice for small runs of dvds, or when you need fast printing results. Inkjet dvd printing is not suited for large number of dvds, as it is uneconomical as compared to silkscreen cd printing, or lithographic cd printing.  The printing process based on melting a coating of colored ribbon onto your dvd surfaces is known as Thermal transfer dvd printing. The thermal transfer is a popular dvd printing technique that is cost effective for small runs and offers you the finishing superior even to lithographic dvd printing. The thermal transfer dvd printing offers fast and wonderful results, and thus it has grown very popular for small runs of DVDs. The printmaking technique that creates a sharp-edged image using stencils is known as screen printing. Screen printing is popular dvd printing technique suitable for large DVD runs. Screen dvd printing is a cost-effective method for larger quantities of DVDs. Screen dvd printing offers you the remarkable and vivid results. In screen dvd printing, your “per unit” costs significantly drop, when you order over 1000 units of DVDs. The printmaking technique where the inked image is transferred (or “offset”) from a plate to a rubber blanket, then to the printing surface is known as Offset printing, and it is known as Lithographic (Offset) printing, when used in combination with the lithographic process. It is widely popular dvd printing technique. Offset dvd printing is well suited for the high volumes of DVDs. Offset dvd printing offers you outstanding results and conspicuous images. This is the perfect option for over 1,000 units of DVDs. Your dvd printing and dvd printing services mainly depend on your needs and requirements. You may find a lot of dvd printing services. You can also hire dvd printing services online. You can find a number of online dvd printing companies offering you dvd printing services online.\r\n				</div>\r\n			</div>\r\n\r\n		</div>\r\n	</section>\r\n\r\n	\r\n	<section class=\"section\">\r\n		<div class=\"container\">\r\n			<h2 class=\"title\">Our offices</h2>\r\n\r\n			<div class=\"row\">\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/us.png\" alt=\"\"> USA</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">United States</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 444 Leon Lakes Apt. 288</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/fr.png\" alt=\"\"> France</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">France</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 738 Kunze Well</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/de.png\" alt=\"\"> Germany</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">Germany</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 5309 Adell Row</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</section>', null, '1', '1564754243', '1594248123');
INSERT INTO `page` VALUES ('102', 'privacy', 'Privacy', '	\r\n	<section class=\"section\">\r\n		<div class=\"container\">\r\n			\r\n			<div class=\"row mbxlg\">\r\n				<div class=\"col-sm-8 mbmd\">\r\n					<h3 class=\"title title-sm\">About Us</h3>\r\n					<div class=\"text-large\">\r\n						Differentiate and you stand out in a crowded marketplace. Present your uniqueness and emphasize your rare attributes in your sales copy and promotions and you’ll capture the imagination and interest of those you want to reach. In a world of copycats, it pays to be an original. It’s usually the creator of a new concept who gets the most mileage from it. Innovative entrepreneurs often become market leaders while competitors keep doing things the same old way. who gets the most mileage from it. Innovative entrepreneurs often become market leaders.\r\n					</div>\r\n				</div>\r\n				<div class=\"col-sm-4\">\r\n					<figure class=\"img\">\r\n						<img src=\"img/391.jpg\" alt=\"\">\r\n					</figure>\r\n				</div>\r\n			</div>\r\n\r\n			<div class=\"row mblg\">\r\n				<div class=\"col-sm-6 mtmd mbmd\">\r\n					<h3 class=\"title title-sm\">Our Vision</h3>\r\n					<div class=\"text-large\">\r\n						The power of testimonials can never be underestimated. People, especially nowadays, will only purchase products or avail services which have been referred to them by people whom they know. But most of the times, this is not an option that is in the hands of the business owner, he has to do the next best thing, which is to get testimonials from his past clients. Testimonials are living statements from past customers or clients which states  that they were satisfied by the product/ service. Every business must have testimonials.\r\n					</div>\r\n				</div>\r\n				<div class=\"col-sm-6 mbmd\">\r\n					<h3 class=\"title title-sm\">Out Mision</h3>\r\n					<div class=\"text-large\">\r\n						The power of testimonials can never be underestimated. People, especially nowadays, will only purchase products or avail services which have been referred to them by people whom they know. But most of the times, this is not an option that is in the hands of the business owner, he has to do the next best thing, which is to get testimonials from his past clients. Testimonials are living statements from past customers or clients which states  that they were satisfied by the product/ service. Every business must have testimonials.\r\n					</div>\r\n				</div>\r\n			</div>\r\n\r\n			<div>\r\n				<h3 class=\"title title-sm\">About The Company</h3>\r\n				<div class=\"text-large mbmd\">\r\n					This article is floated online with an aim to help you find the best dvd printing solution. Dvd printing is an important feature used by large and small DVD production houses to print information on DVDs. Actually, dvd printing is a labeling technique that helps to identify DVDs. Thus, dvd printing is essential part of your commercial DVD production.\r\n				</div>\r\n				<div class=\"text-large mbmd\">\r\n					Your DVDs usually come coated with directly printable lacquer films with ability to absorb ink, and the process of directly printing the lacquer films on your DVDs is technically known as dvd printing. Your dvd printing solution lies in – inkjet dvd printing, thermal transfer dvd printing, screen dvd printing, and offset dvd printing – which you may choose according to need and requirement. The printing process using CMYK Inkjet printers is known as inkjet printing. The inkjet dvd printing offers you the stunning results with high resolution and vibrant colors. The inkjet dvd printing is good choice for small runs of dvds, or when you need fast printing results. Inkjet dvd printing is not suited for large number of dvds, as it is uneconomical as compared to silkscreen cd printing, or lithographic cd printing.  The printing process based on melting a coating of colored ribbon onto your dvd surfaces is known as Thermal transfer dvd printing. The thermal transfer is a popular dvd printing technique that is cost effective for small runs and offers you the finishing superior even to lithographic dvd printing. The thermal transfer dvd printing offers fast and wonderful results, and thus it has grown very popular for small runs of DVDs. The printmaking technique that creates a sharp-edged image using stencils is known as screen printing. Screen printing is popular dvd printing technique suitable for large DVD runs. Screen dvd printing is a cost-effective method for larger quantities of DVDs. Screen dvd printing offers you the remarkable and vivid results. In screen dvd printing, your “per unit” costs significantly drop, when you order over 1000 units of DVDs. The printmaking technique where the inked image is transferred (or “offset”) from a plate to a rubber blanket, then to the printing surface is known as Offset printing, and it is known as Lithographic (Offset) printing, when used in combination with the lithographic process. It is widely popular dvd printing technique. Offset dvd printing is well suited for the high volumes of DVDs. Offset dvd printing offers you outstanding results and conspicuous images. This is the perfect option for over 1,000 units of DVDs. Your dvd printing and dvd printing services mainly depend on your needs and requirements. You may find a lot of dvd printing services. You can also hire dvd printing services online. You can find a number of online dvd printing companies offering you dvd printing services online.\r\n				</div>\r\n			</div>\r\n\r\n		</div>\r\n	</section>\r\n\r\n	\r\n	<section class=\"section\">\r\n		<div class=\"container\">\r\n			<h2 class=\"title\">Our offices</h2>\r\n\r\n			<div class=\"row\">\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/us.png\" alt=\"\"> USA</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">United States</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 444 Leon Lakes Apt. 288</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/fr.png\" alt=\"\"> France</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">France</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 738 Kunze Well</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/de.png\" alt=\"\"> Germany</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">Germany</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 5309 Adell Row</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</section>', null, '1', '1564754243', '1594247586');
INSERT INTO `page` VALUES ('103', 'contact', 'Contact', '	\r\n	<section class=\"section\">\r\n		<div class=\"container\">\r\n			\r\n			<div class=\"row mbxlg\">\r\n				<div class=\"col-sm-8 mbmd\">\r\n					<h3 class=\"title title-sm\">About Us</h3>\r\n					<div class=\"text-large\">\r\n						Differentiate and you stand out in a crowded marketplace. Present your uniqueness and emphasize your rare attributes in your sales copy and promotions and you’ll capture the imagination and interest of those you want to reach. In a world of copycats, it pays to be an original. It’s usually the creator of a new concept who gets the most mileage from it. Innovative entrepreneurs often become market leaders while competitors keep doing things the same old way. who gets the most mileage from it. Innovative entrepreneurs often become market leaders.\r\n					</div>\r\n				</div>\r\n				<div class=\"col-sm-4\">\r\n					<figure class=\"img\">\r\n						<img src=\"img/391.jpg\" alt=\"\">\r\n					</figure>\r\n				</div>\r\n			</div>\r\n\r\n			<div class=\"row mblg\">\r\n				<div class=\"col-sm-6 mtmd mbmd\">\r\n					<h3 class=\"title title-sm\">Our Vision</h3>\r\n					<div class=\"text-large\">\r\n						The power of testimonials can never be underestimated. People, especially nowadays, will only purchase products or avail services which have been referred to them by people whom they know. But most of the times, this is not an option that is in the hands of the business owner, he has to do the next best thing, which is to get testimonials from his past clients. Testimonials are living statements from past customers or clients which states  that they were satisfied by the product/ service. Every business must have testimonials.\r\n					</div>\r\n				</div>\r\n				<div class=\"col-sm-6 mbmd\">\r\n					<h3 class=\"title title-sm\">Out Mision</h3>\r\n					<div class=\"text-large\">\r\n						The power of testimonials can never be underestimated. People, especially nowadays, will only purchase products or avail services which have been referred to them by people whom they know. But most of the times, this is not an option that is in the hands of the business owner, he has to do the next best thing, which is to get testimonials from his past clients. Testimonials are living statements from past customers or clients which states  that they were satisfied by the product/ service. Every business must have testimonials.\r\n					</div>\r\n				</div>\r\n			</div>\r\n\r\n			<div>\r\n				<h3 class=\"title title-sm\">About The Company</h3>\r\n				<div class=\"text-large mbmd\">\r\n					This article is floated online with an aim to help you find the best dvd printing solution. Dvd printing is an important feature used by large and small DVD production houses to print information on DVDs. Actually, dvd printing is a labeling technique that helps to identify DVDs. Thus, dvd printing is essential part of your commercial DVD production.\r\n				</div>\r\n				<div class=\"text-large mbmd\">\r\n					Your DVDs usually come coated with directly printable lacquer films with ability to absorb ink, and the process of directly printing the lacquer films on your DVDs is technically known as dvd printing. Your dvd printing solution lies in – inkjet dvd printing, thermal transfer dvd printing, screen dvd printing, and offset dvd printing – which you may choose according to need and requirement. The printing process using CMYK Inkjet printers is known as inkjet printing. The inkjet dvd printing offers you the stunning results with high resolution and vibrant colors. The inkjet dvd printing is good choice for small runs of dvds, or when you need fast printing results. Inkjet dvd printing is not suited for large number of dvds, as it is uneconomical as compared to silkscreen cd printing, or lithographic cd printing.  The printing process based on melting a coating of colored ribbon onto your dvd surfaces is known as Thermal transfer dvd printing. The thermal transfer is a popular dvd printing technique that is cost effective for small runs and offers you the finishing superior even to lithographic dvd printing. The thermal transfer dvd printing offers fast and wonderful results, and thus it has grown very popular for small runs of DVDs. The printmaking technique that creates a sharp-edged image using stencils is known as screen printing. Screen printing is popular dvd printing technique suitable for large DVD runs. Screen dvd printing is a cost-effective method for larger quantities of DVDs. Screen dvd printing offers you the remarkable and vivid results. In screen dvd printing, your “per unit” costs significantly drop, when you order over 1000 units of DVDs. The printmaking technique where the inked image is transferred (or “offset”) from a plate to a rubber blanket, then to the printing surface is known as Offset printing, and it is known as Lithographic (Offset) printing, when used in combination with the lithographic process. It is widely popular dvd printing technique. Offset dvd printing is well suited for the high volumes of DVDs. Offset dvd printing offers you outstanding results and conspicuous images. This is the perfect option for over 1,000 units of DVDs. Your dvd printing and dvd printing services mainly depend on your needs and requirements. You may find a lot of dvd printing services. You can also hire dvd printing services online. You can find a number of online dvd printing companies offering you dvd printing services online.\r\n				</div>\r\n			</div>\r\n\r\n		</div>\r\n	</section>\r\n\r\n	\r\n	<section class=\"section\">\r\n		<div class=\"container\">\r\n			<h2 class=\"title\">Our offices</h2>\r\n\r\n			<div class=\"row\">\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/us.png\" alt=\"\"> USA</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">United States</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 444 Leon Lakes Apt. 288</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/fr.png\" alt=\"\"> France</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">France</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 738 Kunze Well</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/de.png\" alt=\"\"> Germany</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">Germany</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 5309 Adell Row</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</section>', '', '1', '1564754243', '1594248225');
INSERT INTO `page` VALUES ('104', 'about', 'about', '	\r\n	<section class=\"section\">\r\n		<div class=\"container\">\r\n			\r\n			<div class=\"row mbxlg\">\r\n				<div class=\"col-sm-8 mbmd\">\r\n					<h3 class=\"title title-sm\">About Us</h3>\r\n					<div class=\"text-large\">\r\n						Differentiate and you stand out in a crowded marketplace. Present your uniqueness and emphasize your rare attributes in your sales copy and promotions and you’ll capture the imagination and interest of those you want to reach. In a world of copycats, it pays to be an original. It’s usually the creator of a new concept who gets the most mileage from it. Innovative entrepreneurs often become market leaders while competitors keep doing things the same old way. who gets the most mileage from it. Innovative entrepreneurs often become market leaders.\r\n					</div>\r\n				</div>\r\n				<div class=\"col-sm-4\">\r\n					<figure class=\"img\">\r\n						<img src=\"img/391.jpg\" alt=\"\">\r\n					</figure>\r\n				</div>\r\n			</div>\r\n\r\n			<div class=\"row mblg\">\r\n				<div class=\"col-sm-6 mtmd mbmd\">\r\n					<h3 class=\"title title-sm\">Our Vision</h3>\r\n					<div class=\"text-large\">\r\n						The power of testimonials can never be underestimated. People, especially nowadays, will only purchase products or avail services which have been referred to them by people whom they know. But most of the times, this is not an option that is in the hands of the business owner, he has to do the next best thing, which is to get testimonials from his past clients. Testimonials are living statements from past customers or clients which states  that they were satisfied by the product/ service. Every business must have testimonials.\r\n					</div>\r\n				</div>\r\n				<div class=\"col-sm-6 mbmd\">\r\n					<h3 class=\"title title-sm\">Out Mision</h3>\r\n					<div class=\"text-large\">\r\n						The power of testimonials can never be underestimated. People, especially nowadays, will only purchase products or avail services which have been referred to them by people whom they know. But most of the times, this is not an option that is in the hands of the business owner, he has to do the next best thing, which is to get testimonials from his past clients. Testimonials are living statements from past customers or clients which states  that they were satisfied by the product/ service. Every business must have testimonials.\r\n					</div>\r\n				</div>\r\n			</div>\r\n\r\n			<div>\r\n				<h3 class=\"title title-sm\">About The Company</h3>\r\n				<div class=\"text-large mbmd\">\r\n					This article is floated online with an aim to help you find the best dvd printing solution. Dvd printing is an important feature used by large and small DVD production houses to print information on DVDs. Actually, dvd printing is a labeling technique that helps to identify DVDs. Thus, dvd printing is essential part of your commercial DVD production.\r\n				</div>\r\n				<div class=\"text-large mbmd\">\r\n					Your DVDs usually come coated with directly printable lacquer films with ability to absorb ink, and the process of directly printing the lacquer films on your DVDs is technically known as dvd printing. Your dvd printing solution lies in – inkjet dvd printing, thermal transfer dvd printing, screen dvd printing, and offset dvd printing – which you may choose according to need and requirement. The printing process using CMYK Inkjet printers is known as inkjet printing. The inkjet dvd printing offers you the stunning results with high resolution and vibrant colors. The inkjet dvd printing is good choice for small runs of dvds, or when you need fast printing results. Inkjet dvd printing is not suited for large number of dvds, as it is uneconomical as compared to silkscreen cd printing, or lithographic cd printing.  The printing process based on melting a coating of colored ribbon onto your dvd surfaces is known as Thermal transfer dvd printing. The thermal transfer is a popular dvd printing technique that is cost effective for small runs and offers you the finishing superior even to lithographic dvd printing. The thermal transfer dvd printing offers fast and wonderful results, and thus it has grown very popular for small runs of DVDs. The printmaking technique that creates a sharp-edged image using stencils is known as screen printing. Screen printing is popular dvd printing technique suitable for large DVD runs. Screen dvd printing is a cost-effective method for larger quantities of DVDs. Screen dvd printing offers you the remarkable and vivid results. In screen dvd printing, your “per unit” costs significantly drop, when you order over 1000 units of DVDs. The printmaking technique where the inked image is transferred (or “offset”) from a plate to a rubber blanket, then to the printing surface is known as Offset printing, and it is known as Lithographic (Offset) printing, when used in combination with the lithographic process. It is widely popular dvd printing technique. Offset dvd printing is well suited for the high volumes of DVDs. Offset dvd printing offers you outstanding results and conspicuous images. This is the perfect option for over 1,000 units of DVDs. Your dvd printing and dvd printing services mainly depend on your needs and requirements. You may find a lot of dvd printing services. You can also hire dvd printing services online. You can find a number of online dvd printing companies offering you dvd printing services online.\r\n				</div>\r\n			</div>\r\n\r\n		</div>\r\n	</section>\r\n\r\n	\r\n	<section class=\"section\">\r\n		<div class=\"container\">\r\n			<h2 class=\"title\">Our offices</h2>\r\n\r\n			<div class=\"row\">\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/us.png\" alt=\"\"> USA</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">United States</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 444 Leon Lakes Apt. 288</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/fr.png\" alt=\"\"> France</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">France</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 738 Kunze Well</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/de.png\" alt=\"\"> Germany</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">Germany</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 5309 Adell Row</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</section>', null, '1', null, '1594248100');
INSERT INTO `page` VALUES ('105', 'contact-ar', 'اتصل بنا', '<p>اتصل بنا</p>', null, '1', null, '1595361400');
INSERT INTO `page` VALUES ('106', 'privacy-ar', 'سياسة الخصوصيه', '<p>سياسة الخصوصيه</p>', null, '1', null, '1595361441');
INSERT INTO `page` VALUES ('107', 'terms-ar', 'الشروط والاحكام', '<p>الشروط والاحكام</p>', null, '1', null, '1595361453');
INSERT INTO `page` VALUES ('108', 'how-we-work-ar', 'كيف  نعمل', '<p>كيف  نعمل</p>', null, '1', null, '1595361462');
INSERT INTO `page` VALUES ('109', 'about-us', 'عنا', '<p>عنا</p>', null, '1', null, '1595361473');

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
INSERT INTO `rbac_auth_assignment` VALUES ('user', '3', '1579565901');

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
-- Table structure for `requests`
-- ----------------------------
DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model_name` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 school course 1 programe',
  `model_id` int(11) NOT NULL COMMENT 'program or course id ',
  `model_parent_id` int(11) DEFAULT NULL COMMENT 'school or univeristy',
  `request_by_role` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 stident 1 referral company 2 referal person',
  `student_id` int(11) DEFAULT NULL,
  `requester_id` int(11) NOT NULL,
  `request_notes` text,
  `admin_notes` text,
  `student_first_name` varchar(255) DEFAULT NULL,
  `student_last_name` varchar(255) DEFAULT NULL,
  `student_gender` tinyint(4) DEFAULT NULL,
  `student_email` varchar(255) DEFAULT NULL,
  `student_mobile` varchar(255) DEFAULT NULL,
  `student_country_id` int(10) unsigned DEFAULT NULL,
  `student_state_id` int(11) DEFAULT NULL,
  `student_city_id` int(10) unsigned DEFAULT NULL,
  `student_nationality_id` varchar(25) DEFAULT NULL,
  `accomodation_option` varchar(255) DEFAULT NULL,
  `accomodation_option_cost` float DEFAULT NULL,
  `accomodation_period` varchar(255) DEFAULT NULL,
  `airport_pickup` varchar(255) DEFAULT NULL,
  `airport_pickup_cost` varchar(255) DEFAULT NULL,
  `course_start_date` varchar(255) DEFAULT NULL,
  `number_of_weeks` int(11) DEFAULT NULL,
  `number_of_sessions` int(11) DEFAULT NULL,
  `health_insurance` tinyint(1) DEFAULT '0',
  `total` float DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_country_id` (`student_country_id`),
  KEY `student_city_id` (`student_city_id`),
  KEY `requester_id` (`requester_id`),
  CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`student_country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`student_city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `requests_ibfk_3` FOREIGN KEY (`requester_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of requests
-- ----------------------------

-- ----------------------------
-- Table structure for `school_accomodation`
-- ----------------------------
DROP TABLE IF EXISTS `school_accomodation`;
CREATE TABLE `school_accomodation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `booking_cycle` tinyint(4) DEFAULT '1' COMMENT '1 weekly 2 monthly',
  `min_booking_duraion` int(11) DEFAULT NULL,
  `max_age` int(11) DEFAULT NULL,
  `distance_from_school` float DEFAULT NULL COMMENT 'in minuts',
  `cost_per_duration_unit` float NOT NULL,
  `fees` float DEFAULT NULL,
  `facility_id` int(11) DEFAULT NULL,
  `room_cat_id` int(11) DEFAULT NULL,
  `special_diet` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`),
  CONSTRAINT `school_accomodation_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of school_accomodation
-- ----------------------------

-- ----------------------------
-- Table structure for `school_airport_pickup`
-- ----------------------------
DROP TABLE IF EXISTS `school_airport_pickup`;
CREATE TABLE `school_airport_pickup` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `service_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 one way 1 two way',
  `cost` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`) USING BTREE,
  CONSTRAINT `school_airport_pickup_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of school_airport_pickup
-- ----------------------------

-- ----------------------------
-- Table structure for `school_course`
-- ----------------------------
DROP TABLE IF EXISTS `school_course`;
CREATE TABLE `school_course` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `school_course_type_id` int(10) unsigned DEFAULT NULL,
  `school_course_study_language_id` int(10) unsigned DEFAULT NULL,
  `information` text NOT NULL COMMENT '0 one way 1 two way',
  `requirments` text,
  `cost_type` tinyint(1) DEFAULT '1' COMMENT '1 cost per week  2 cost per session',
  `lessons_per_week` int(11) DEFAULT NULL,
  `lesson_duration` float DEFAULT NULL,
  `min_no_of_students_per_class` int(11) DEFAULT NULL,
  `avg_no_of_students_per_class` int(11) DEFAULT NULL,
  `max_no_of_students_per_class` int(11) DEFAULT NULL,
  `min_age` int(11) DEFAULT NULL,
  `required_level` tinyint(4) DEFAULT '1' COMMENT '1 begiiner 2 intermediat 3 prof',
  `time_of_course` tinyint(4) DEFAULT '1' COMMENT '1 morning 2 evening',
  `registeration_fees` float DEFAULT NULL,
  `study_books_fees` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '0 not active 1 active',
  `pricing_method` tinyint(4) DEFAULT '0' COMMENT '0 weeks 1 sessions',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`) USING BTREE,
  KEY `school_course_type_id_ibfk_1` (`school_course_type_id`),
  KEY `school_course_study_language_id_ibfk_1` (`school_course_study_language_id`),
  CONSTRAINT `school_course_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `school_course_study_language_id_ibfk_1` FOREIGN KEY (`school_course_study_language_id`) REFERENCES `school_course_study_language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `school_course_type_id_ibfk_1` FOREIGN KEY (`school_course_type_id`) REFERENCES `school_course_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of school_course
-- ----------------------------

-- ----------------------------
-- Table structure for `school_course_session_cost`
-- ----------------------------
DROP TABLE IF EXISTS `school_course_session_cost`;
CREATE TABLE `school_course_session_cost` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `school_course_id` int(10) unsigned NOT NULL,
  `weeks_per_session` int(11) DEFAULT NULL,
  `no_of_sessions` int(11) DEFAULT NULL,
  `max_no_of_sessions` int(11) DEFAULT NULL,
  `session_cost` float DEFAULT NULL,
  `week_cost` float DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `school_course_id` (`school_course_id`) USING BTREE,
  CONSTRAINT `school_course_session_cost_ibfk_1` FOREIGN KEY (`school_course_id`) REFERENCES `school_course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of school_course_session_cost
-- ----------------------------

-- ----------------------------
-- Table structure for `school_course_start_date`
-- ----------------------------
DROP TABLE IF EXISTS `school_course_start_date`;
CREATE TABLE `school_course_start_date` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `school_course_id` int(10) unsigned NOT NULL,
  `course_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `school_course_id` (`school_course_id`),
  CONSTRAINT `school_course_start_date_ibfk_1` FOREIGN KEY (`school_course_id`) REFERENCES `school_course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of school_course_start_date
-- ----------------------------

-- ----------------------------
-- Table structure for `school_course_study_language`
-- ----------------------------
DROP TABLE IF EXISTS `school_course_study_language`;
CREATE TABLE `school_course_study_language` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of school_course_study_language
-- ----------------------------

-- ----------------------------
-- Table structure for `school_course_type`
-- ----------------------------
DROP TABLE IF EXISTS `school_course_type`;
CREATE TABLE `school_course_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of school_course_type
-- ----------------------------

-- ----------------------------
-- Table structure for `school_course_week_cost`
-- ----------------------------
DROP TABLE IF EXISTS `school_course_week_cost`;
CREATE TABLE `school_course_week_cost` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `school_course_id` int(10) unsigned NOT NULL,
  `min_no_of_weeks` int(11) NOT NULL,
  `max_no_of_weeks` int(11) DEFAULT NULL,
  `cost` float DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `school_course_id` (`school_course_id`) USING BTREE,
  CONSTRAINT `school_course_week_cost_ibfk_1` FOREIGN KEY (`school_course_id`) REFERENCES `school_course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of school_course_week_cost
-- ----------------------------

-- ----------------------------
-- Table structure for `school_facilities`
-- ----------------------------
DROP TABLE IF EXISTS `school_facilities`;
CREATE TABLE `school_facilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `university_id` (`school_id`) USING BTREE,
  CONSTRAINT `school_facilities_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of school_facilities
-- ----------------------------

-- ----------------------------
-- Table structure for `school_next_to`
-- ----------------------------
DROP TABLE IF EXISTS `school_next_to`;
CREATE TABLE `school_next_to` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `university_id` (`school_id`) USING BTREE,
  CONSTRAINT `school_next_to_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of school_next_to
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of school_rating
-- ----------------------------

-- ----------------------------
-- Table structure for `school_room_category`
-- ----------------------------
DROP TABLE IF EXISTS `school_room_category`;
CREATE TABLE `school_room_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `university_id` (`school_id`) USING BTREE,
  CONSTRAINT `school_room_category_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of school_room_category
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of school_videos
-- ----------------------------

-- ----------------------------
-- Table structure for `schools`
-- ----------------------------
DROP TABLE IF EXISTS `schools`;
CREATE TABLE `schools` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `next_to` int(11) DEFAULT NULL,
  `details` text,
  `featured` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 yes 0 no',
  `detailed_address` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `image_base_url` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(10) unsigned DEFAULT NULL,
  `min_age` int(11) DEFAULT NULL,
  `max_students_per_class` int(11) DEFAULT NULL,
  `avg_students_per_class` int(11) DEFAULT NULL,
  `accomodation_fees` float DEFAULT NULL,
  `registeration_fees` float DEFAULT NULL,
  `study_books_fees` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `no_of_ratings` int(11) DEFAULT NULL,
  `total_rating` float DEFAULT NULL,
  `accomodation_reservation_fees` float DEFAULT NULL,
  `has_health_insurance` tinyint(1) DEFAULT NULL,
  `health_insurance_cost` float DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of schools
-- ----------------------------

-- ----------------------------
-- Table structure for `state`
-- ----------------------------
DROP TABLE IF EXISTS `state`;
CREATE TABLE `state` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of state
-- ----------------------------

-- ----------------------------
-- Table structure for `student_certificate`
-- ----------------------------
DROP TABLE IF EXISTS `student_certificate`;
CREATE TABLE `student_certificate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `certificate_name` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `university_or_school` varchar(255) DEFAULT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `student_certificate_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student_certificate
-- ----------------------------

-- ----------------------------
-- Table structure for `student_test_results`
-- ----------------------------
DROP TABLE IF EXISTS `student_test_results`;
CREATE TABLE `student_test_results` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `test_name` varchar(255) DEFAULT NULL,
  `score` float(11,0) DEFAULT NULL,
  `test_date` varchar(255) DEFAULT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `student_test_results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of student_test_results
-- ----------------------------

-- ----------------------------
-- Table structure for `system_db_migration`
-- ----------------------------
DROP TABLE IF EXISTS `system_db_migration`;
CREATE TABLE `system_db_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system_db_migration
-- ----------------------------
INSERT INTO `system_db_migration` VALUES ('m191005_230918_initProject', '1572029827');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of system_log
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of timeline_event
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of translations_with_string
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of translations_with_text
-- ----------------------------

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
  `slug` varchar(255) DEFAULT NULL,
  `image_base_url` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `currency_id` int(11) NOT NULL,
  `next_to` int(11) NOT NULL,
  `description` text,
  `detailed_address` varchar(255) DEFAULT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  `state_id` int(10) unsigned DEFAULT NULL,
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
  KEY `state_id` (`state_id`),
  CONSTRAINT `university_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `university_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `university_ibfk_3` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of university
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of university_countries
-- ----------------------------

-- ----------------------------
-- Table structure for `university_lang_of_study`
-- ----------------------------
DROP TABLE IF EXISTS `university_lang_of_study`;
CREATE TABLE `university_lang_of_study` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of university_lang_of_study
-- ----------------------------

-- ----------------------------
-- Table structure for `university_next_to`
-- ----------------------------
DROP TABLE IF EXISTS `university_next_to`;
CREATE TABLE `university_next_to` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `university_id` int(11) unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `university_id` (`university_id`) USING BTREE,
  CONSTRAINT `university_next_to_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of university_next_to
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of university_photos
-- ----------------------------

-- ----------------------------
-- Table structure for `university_prog_startdate`
-- ----------------------------
DROP TABLE IF EXISTS `university_prog_startdate`;
CREATE TABLE `university_prog_startdate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `university_prog_id` int(10) unsigned DEFAULT NULL,
  `m_1` tinyint(4) DEFAULT NULL,
  `m_2` tinyint(4) DEFAULT NULL,
  `m_3` tinyint(4) DEFAULT NULL,
  `m_4` tinyint(4) DEFAULT NULL,
  `m_5` tinyint(4) DEFAULT NULL,
  `m_6` tinyint(4) DEFAULT NULL,
  `m_7` tinyint(4) DEFAULT NULL,
  `m_8` tinyint(4) DEFAULT NULL,
  `m_9` tinyint(4) DEFAULT NULL,
  `m_10` tinyint(4) DEFAULT NULL,
  `m_11` tinyint(4) DEFAULT NULL,
  `m_12` tinyint(4) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `university_prog_id` (`university_prog_id`),
  CONSTRAINT `university_prog_startdate_ibfk_1` FOREIGN KEY (`university_prog_id`) REFERENCES `university_programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of university_prog_startdate
-- ----------------------------

-- ----------------------------
-- Table structure for `university_program_conditional_admission`
-- ----------------------------
DROP TABLE IF EXISTS `university_program_conditional_admission`;
CREATE TABLE `university_program_conditional_admission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of university_program_conditional_admission
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of university_program_degree
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of university_program_field
-- ----------------------------

-- ----------------------------
-- Table structure for `university_program_format`
-- ----------------------------
DROP TABLE IF EXISTS `university_program_format`;
CREATE TABLE `university_program_format` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of university_program_format
-- ----------------------------

-- ----------------------------
-- Table structure for `university_program_ilets`
-- ----------------------------
DROP TABLE IF EXISTS `university_program_ilets`;
CREATE TABLE `university_program_ilets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of university_program_ilets
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of university_program_majors
-- ----------------------------

-- ----------------------------
-- Table structure for `university_program_medium_of_study`
-- ----------------------------
DROP TABLE IF EXISTS `university_program_medium_of_study`;
CREATE TABLE `university_program_medium_of_study` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of university_program_medium_of_study
-- ----------------------------

-- ----------------------------
-- Table structure for `university_program_method_of_study`
-- ----------------------------
DROP TABLE IF EXISTS `university_program_method_of_study`;
CREATE TABLE `university_program_method_of_study` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of university_program_method_of_study
-- ----------------------------

-- ----------------------------
-- Table structure for `university_programs`
-- ----------------------------
DROP TABLE IF EXISTS `university_programs`;
CREATE TABLE `university_programs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `university_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `major_id` int(10) unsigned NOT NULL,
  `degree_id` int(255) unsigned NOT NULL,
  `field_id` int(11) unsigned DEFAULT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(10) unsigned DEFAULT NULL,
  `study_start_date` varchar(255) DEFAULT NULL,
  `first_submission_date` date DEFAULT NULL,
  `first_submission_date_active` tinyint(4) DEFAULT NULL,
  `last_submission_date` date DEFAULT NULL,
  `last_submission_date_active` tinyint(4) DEFAULT NULL,
  `study_duration_no` int(11) DEFAULT NULL,
  `study_duration` int(4) DEFAULT '0',
  `study_method` int(4) DEFAULT NULL,
  `attendance_type` varchar(255) DEFAULT NULL,
  `annual_cost` float DEFAULT NULL,
  `conditional_admissions` varchar(255) DEFAULT NULL,
  `toefl` varchar(255) DEFAULT NULL,
  `ielts` varchar(255) DEFAULT NULL,
  `bank_statment` varchar(255) DEFAULT NULL,
  `high_school_transcript` varchar(255) DEFAULT NULL,
  `bachelor_degree` varchar(255) DEFAULT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `medium_of_study` int(11) DEFAULT NULL,
  `program_format` int(11) DEFAULT NULL,
  `note1` text,
  `note2` text,
  `total_rating` float DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `program_type` tinyint(4) DEFAULT '1' COMMENT '1 undergraduate 2 graduate',
  `lang_of_study` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `university_id` (`university_id`),
  KEY `major_id` (`major_id`),
  KEY `field_id` (`field_id`),
  KEY `degree_id` (`degree_id`),
  CONSTRAINT `university_programs_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `university_programs_ibfk_2` FOREIGN KEY (`major_id`) REFERENCES `university_program_majors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `university_programs_ibfk_3` FOREIGN KEY (`field_id`) REFERENCES `university_program_field` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `university_programs_ibfk_4` FOREIGN KEY (`degree_id`) REFERENCES `university_program_degree` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of university_programs
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of university_rating
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of university_videos
-- ----------------------------

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
  `permissions` varchar(255) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '2',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `logged_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'Super_admin', 'JT1eK6y0yLH-1fhfOngyBPqiVAa7XGib', 'OJFTWK7sWqe3dcI_WeZZx6mIHvmSP8ilqkU8o9EX', '$2y$13$hDZiFtCliq3WS/J9F6NyA.dyycE4A9MYcroqK.HhkQsbdkX/tjoKq', null, null, 'Super_Admin@Eduxa.com', '', '2', '1564754241', '1593862724', '1595442415');
INSERT INTO `user` VALUES ('2', 'manager', 'mdK-I48T0qQQaXzrK-e6wwCeqBx4_lEi', 'imVvtMIkAUfJCfgssqtm_azOQevNGcEcFM-luntt', '$2y$13$4roOV2yb/CxZFX10lUa.u.GgJAEo2CAQPHlD8ocoTYOhzlNyVxyIa', null, null, 'manager@example.com', null, '1', '1564754242', '1593863214', '1567592996');
INSERT INTO `user` VALUES ('3', 'user@example.com', 'LtEF_PINuXO8tCFA10yaZAd9Yn6QvB3S', '9_FesaK3MUAqFs5SVz77IQrlGfi5ICVefCkJyY7G', '$2y$13$NIAQ1KWuw2lZsCIDCqjr2e2OZpjQ8iKosBS1qdGeqXL9beuF5FFfi', null, null, 'user@example.com', null, '2', '1564754243', '1579565901', null);

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
  `profile_percentage` int(3) DEFAULT '60',
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `complete_ratio` decimal(10,0) DEFAULT NULL,
  `find_us_from` tinyint(4) DEFAULT NULL,
  `communtication_channel` tinyint(4) DEFAULT NULL,
  `interested_in_university` tinyint(4) DEFAULT NULL,
  `interested_in_schools` tinyint(4) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `telephone_no` varchar(255) DEFAULT NULL,
  `no_of_students` int(11) DEFAULT NULL,
  `students_nationalities` varchar(255) DEFAULT NULL,
  `expected_no_of_students` int(11) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_profile
-- ----------------------------
INSERT INTO `user_profile` VALUES ('1', 'Super', null, 'Admin', '/1/v2c2vDcZIYndJIrbT2vtDKV_nZWVbC6_.jpeg', 'http://storage.ahmedabdelaziz.net/source', 'en-US', '1', '60', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user_profile` VALUES ('2', null, null, null, null, null, 'en-US', null, '60', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user_profile` VALUES ('3', 'Ahmed', null, 'Gad', null, null, 'en-US', '2', '60', null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

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