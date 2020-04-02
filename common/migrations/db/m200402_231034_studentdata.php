<?php

use yii\db\Migration;

/**
 * Class m200402_231034_studentdata
 */
class m200402_231034_studentdata extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of student_test_results
-- ----------------------------
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200402_231034_studentdata cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200402_231034_studentdata cannot be reverted.\n";

        return false;
    }
    */
}
