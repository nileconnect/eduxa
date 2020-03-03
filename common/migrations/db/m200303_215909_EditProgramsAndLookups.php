<?php

use yii\db\Migration;

/**
 * Class m200303_215909_EditProgramsAndLookups
 */
class m200303_215909_EditProgramsAndLookups extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        SET FOREIGN_KEY_CHECKS=0;

        ALTER TABLE `university_programs`
MODIFY COLUMN `study_duration`  int(4) NULL DEFAULT 0 ,
MODIFY COLUMN `study_method`  int(4)   NULL AFTER `study_duration`,
ADD COLUMN `last_submission_date_active`  tinyint NULL AFTER `last_submission_date`,
ADD COLUMN `study_duration_no`  int NULL AFTER `last_submission_date_active`,
ADD COLUMN `medium_of_study`  int NULL AFTER `certificate`,
ADD COLUMN `first_submission_date_active`  tinyint NULL AFTER `first_submission_date`;
ADD COLUMN `program_format`  int NULL AFTER `medium_of_study`;



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of university_program_conditional_admission
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of university_program_ilets
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of university_program_method_of_study
-- ----------------------------


        
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200303_215909_EditProgramsAndLookups cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200303_215909_EditProgramsAndLookups cannot be reverted.\n";

        return false;
    }
    */
}
