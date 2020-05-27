<?php

use yii\db\Migration;

/**
 * Class m200527_185231_editsettings
 */
class m200527_185231_editsettings extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('
        
SET FOREIGN_KEY_CHECKS=0;

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
  `status` tinyint(4) DEFAULT \'0\',
  `item_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`key`),
  UNIQUE KEY `idx_key_storage_item_key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of key_storage_item
-- ----------------------------
INSERT INTO `key_storage_item` VALUES (\'backend.layout-boxed\', \'0\', null, null, null, \'0\', null);
INSERT INTO `key_storage_item` VALUES (\'backend.layout-collapsed-sidebar\', \'0\', null, null, null, \'0\', null);
INSERT INTO `key_storage_item` VALUES (\'backend.layout-fixed\', \'0\', null, null, null, \'0\', null);
INSERT INTO `key_storage_item` VALUES (\'backend.theme-skin\', \'skin-blue\', \'skin-blue, skin-black, skin-purple, skin-green, skin-red, skin-yellow\', null, null, \'0\', null);
INSERT INTO `key_storage_item` VALUES (\'email\', \'info@eduxa.com\', null, null, null, \'1\', null);
INSERT INTO `key_storage_item` VALUES (\'facebook\', null, null, null, null, \'1\', null);
INSERT INTO `key_storage_item` VALUES (\'frontend.maintenance\', \'disabled\', \'Set it to \"enabled\" to turn on maintenance mode\', null, null, \'0\', null);
INSERT INTO `key_storage_item` VALUES (\'instagram\', null, null, null, null, \'1\', null);
INSERT INTO `key_storage_item` VALUES (\'linkedin\', null, null, null, null, \'1\', null);
INSERT INTO `key_storage_item` VALUES (\'phone\', \'+966xxxxx\', null, null, null, \'1\', null);
INSERT INTO `key_storage_item` VALUES (\'twitter\', null, null, null, null, \'1\', null);
        ');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200527_185231_editsettings cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200527_185231_editsettings cannot be reverted.\n";

        return false;
    }
    */
}
