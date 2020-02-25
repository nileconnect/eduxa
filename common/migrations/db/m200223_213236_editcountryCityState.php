<?php

use yii\db\Migration;

/**
 * Class m200223_213236_editcountryCityState
 */
class m200223_213236_editcountryCityState extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        RENAME TABLE city to state;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `university`
ADD COLUMN `state_id`  int UNSIGNED NULL AFTER `country_id`;

ALTER TABLE `university` DROP FOREIGN KEY `university_ibfk_2`;

ALTER TABLE `university` ADD CONSTRAINT `university_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `university` ADD FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;



        ");


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200223_213236_editcountryCityState cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200223_213236_editcountryCityState cannot be reverted.\n";

        return false;
    }
    */
}
