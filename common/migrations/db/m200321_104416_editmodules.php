<?php

use yii\db\Migration;

/**
 * Class m200321_104416_editmodules
 */
class m200321_104416_editmodules extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `university_next_to`
-- ----------------------------
DROP TABLE IF EXISTS `university_next_to`;
CREATE TABLE `university_next_to` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `university_id` int(11) unsigned NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `university_id` (`university_id`) USING BTREE,
  CONSTRAINT `university_next_to_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of university_next_to
-- ----------------------------

        
ALTER TABLE `university`
ADD COLUMN `currency_id`  int NOT NULL AFTER `image_path`,
ADD COLUMN `next_to`  int NOT NULL AFTER `currency_id`;

ALTER TABLE `schools`
ADD COLUMN `currency_id`  int NULL AFTER `title`,
ADD COLUMN `detailed_address`  varchar(255) NULL AFTER `featured`;
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200321_104416_editmodules cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200321_104416_editmodules cannot be reverted.\n";

        return false;
    }
    */
}
