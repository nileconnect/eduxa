<?php

use yii\db\Migration;

/**
 * Class m200107_154826_SchoolExtraTBLS
 */
class m200107_154826_SchoolExtraTBLS extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        SET FOREIGN_KEY_CHECKS=0;
drop table  schools_course_types;
-- ----------------------------
-- Table structure for `school_accomodation`
-- ----------------------------
DROP TABLE IF EXISTS `school_accomodation`;
CREATE TABLE `school_accomodation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `room_size` varchar(255) DEFAULT NULL,
  `booking_cycle` tinyint(4) DEFAULT '1' COMMENT '1 weekly 2 monthly',
  `min_booking_duraion` int(11) DEFAULT NULL,
  `min_age` int(11) DEFAULT NULL,
  `max_age` int(11) DEFAULT NULL,
  `distance_from_school` float DEFAULT NULL COMMENT 'in minuts',
  `cost_per_duration_unit` float NOT NULL,
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
  `information` text NOT NULL COMMENT '0 one way 1 two way',
  `requirments` text,
  `course_start_every` varchar(255) DEFAULT NULL COMMENT 'day name',
  `lessons_per_week` int(11) DEFAULT NULL,
  `hours_per_week` float DEFAULT NULL,
  `min_no_of_students_per_class` int(11) DEFAULT NULL,
  `avg_no_of_students_per_class` int(11) DEFAULT NULL,
  `min_age` int(11) DEFAULT NULL,
  `required_level` tinyint(4) DEFAULT '1' COMMENT '1 begiiner 2 intermediat 3 prof',
  `time_of_course` tinyint(4) DEFAULT '1' COMMENT '1 morning 2 evening',
  `registeration_fees` float DEFAULT NULL,
  `cost_per_week` float NOT NULL,
  `no_of_weeks` int(11) DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `required_attendance_duraion` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '0 not active 1 active',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`) USING BTREE,
  CONSTRAINT `school_course_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of school_course
-- ----------------------------
        
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200107_154826_SchoolExtraTBLS cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200107_154826_SchoolExtraTBLS cannot be reverted.\n";

        return false;
    }
    */
}
