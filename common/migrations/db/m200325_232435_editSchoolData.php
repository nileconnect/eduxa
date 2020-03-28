<?php

use yii\db\Migration;

/**
 * Class m200325_232435_editSchoolData
 */
class m200325_232435_editSchoolData extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        
SET FOREIGN_KEY_CHECKS=0;

        
   
        ALTER TABLE `schools`
ADD COLUMN `next_to`  int(11) NULL AFTER `currency_id`;
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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of school_next_to
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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

        
        

        
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200325_232435_editSchoolData cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200325_232435_editSchoolData cannot be reverted.\n";

        return false;
    }
    */
}
