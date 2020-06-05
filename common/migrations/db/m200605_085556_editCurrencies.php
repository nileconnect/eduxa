<?php

use yii\db\Migration;

/**
 * Class m200605_085556_editCurrencies
 */
class m200605_085556_editCurrencies extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `currency`
-- ----------------------------
DROP TABLE IF EXISTS `currency`;
CREATE TABLE `currency` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `currency` varchar(255) DEFAULT NULL,
  `currency_code` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `conversion_rate` float DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of currency
-- ----------------------------
INSERT INTO `currency` VALUES ('1', 'US Dollar', 'USD', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('2', 'Euro', 'EUR', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('3', 'Egyptian Pound', 'EGP', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('4', 'Kuwaiti Dinar', 'KWD', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('5', 'Saudi Riyal', 'SAR', '1', null, null, null, null, null);
        
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200605_085556_editCurrencies cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200605_085556_editCurrencies cannot be reverted.\n";

        return false;
    }
    */
}
