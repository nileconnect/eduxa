<?php

use yii\db\Migration;

/**
 * Class m200325_215616_edituniversityprog
 */
class m200325_215616_edituniversityprog extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of university_lang_of_study
-- ----------------------------
INSERT INTO `university_lang_of_study` VALUES ('8', 'English', '1', '2020-03-25 21:46:28', '2020-03-25 22:00:16', '1', '1');
INSERT INTO `university_lang_of_study` VALUES ('9', 'Arabic', '1', '2020-03-25 21:47:08', '2020-03-25 21:47:08', '1', '1');
        
ALTER TABLE `university_programs`
ADD COLUMN `lang_of_study`  tinyint(4) NULL AFTER `program_type`;

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200325_215616_edituniversityprog cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200325_215616_edituniversityprog cannot be reverted.\n";

        return false;
    }
    */
}
