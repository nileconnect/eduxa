<?php

use yii\db\Migration;

/**
 * Class m200121_000547_AddRequests
 */
class m200121_000547_AddRequests extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        SET FOREIGN_KEY_CHECKS=0;

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
  `student_city_id` int(10) unsigned DEFAULT NULL,
  `student_nationality_id` int(11) DEFAULT NULL,
  `accomodation_option` varchar(255) DEFAULT NULL,
  `accomodation_option_cost` float DEFAULT NULL,
  `airport_pickup` varchar(255) DEFAULT NULL,
  `airport_pickup_cost` varchar(255) DEFAULT NULL,
  `course_start_date` varchar(255) DEFAULT NULL,
  `number_of_weeks` int(11) DEFAULT NULL,
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
  CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`student_city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `requests_ibfk_3` FOREIGN KEY (`requester_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200121_000547_AddRequests cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200121_000547_AddRequests cannot be reverted.\n";

        return false;
    }
    */
}
