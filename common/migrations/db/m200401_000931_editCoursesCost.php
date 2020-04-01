<?php

use yii\db\Migration;

/**
 * Class m200401_000931_editCoursesCost
 */
class m200401_000931_editCoursesCost extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `school_course_session_cost`
-- ----------------------------
DROP TABLE IF EXISTS `school_course_session_cost`;
CREATE TABLE `school_course_session_cost` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `school_course_id` int(10) unsigned NOT NULL,
  `weeks_per_session` int(11) NOT NULL,
  `no_of_sessions` int(11) DEFAULT NULL,
  `session_cost` float DEFAULT NULL,
  `week_cost` float DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `school_course_id` (`school_course_id`) USING BTREE,
  CONSTRAINT `school_course_session_cost_ibfk_1` FOREIGN KEY (`school_course_id`) REFERENCES `school_course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of school_course_start_date
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of school_course_week_cost
-- ----------------------------
        
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200401_000931_editCoursesCost cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200401_000931_editCoursesCost cannot be reverted.\n";

        return false;
    }
    */
}
