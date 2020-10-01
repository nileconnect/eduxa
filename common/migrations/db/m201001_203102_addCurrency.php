<?php

use yii\db\Migration;

/**
 * Class m201001_203102_addCurrency
 */
class m201001_203102_addCurrency extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        INSERT INTO `currency` VALUES ('6', 'Argentine Peso', 'ARS', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('7', 'Australian Dollar', 'AUD', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('8', 'Azerbaijanian Manat', 'AZN', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('9', 'Bahraini Dinar', 'BHD', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('10', 'Brazilian Real', 'BRL', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('11', 'Canadian Dollar', 'CAD', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('12', 'Yuan Renminbi', 'CNY', '1', null, '', null, null, null);
INSERT INTO `currency` VALUES ('13', 'Colombian Peso', 'COP', '1', null, '', null, null, null);
INSERT INTO `currency` VALUES ('16', 'Hong Kong Dollar', 'HKD', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('17', 'Indian Rupee', 'INR', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('18', 'Yen', 'JPY', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('19', 'Jordanian Dinar', 'JOD', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('20', 'Tenge', 'KZT', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('21', 'Won', 'KRW', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('22', 'Malaysian Ringgit', 'MYR', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('23', 'Mexican Peso', 'MXN', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('24', 'Moroccan Dirham', 'MAD', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('25', 'New Zealand Dollar', 'NZD', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('26', 'Rial Omani', 'OMR', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('27', 'Pakistan Rupee', 'PKR', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('28', 'Philippine Peso', 'PHP', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('29', 'Zloty', 'PLN', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('30', 'Qatari Rial', 'QAR', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('31', 'Romanian Leu', 'RON', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('32', 'Russian Ruble', 'RUB', '1', null, null, null, null, null);
INSERT INTO `currency` VALUES ('34', 'Singapore Dollar', 'SGD', 1, null, null, null, null, null);
INSERT INTO `currency` VALUES ('35', 'Rand', 'ZAR', 1, null, null, null, null, null);
INSERT INTO `currency` VALUES ('36', 'Swiss Franc', 'CHF', 1, null, null, null, null, null);
INSERT INTO `currency` VALUES ('37', 'New Taiwan Dollar', 'TWD', 1, null, null, null, null, null);
INSERT INTO `currency` VALUES ('38', 'Baht', 'THB', 1, null, null, null, null, null);
INSERT INTO `currency` VALUES ('39', 'Tunisian Dinar', 'TND', 1, null, null, null, null, null);
INSERT INTO `currency` VALUES ('40', 'Turkish Lira', 'TRY', 1, null, null, null, null, null);
INSERT INTO `currency` VALUES ('41', 'UAE Dirham', 'AED', 1, null, null, null, null, null);
INSERT INTO `currency` VALUES ('42', 'Pound Sterling', 'GBP', 1, null, null, null, null, null);
        
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201001_203102_addCurrency cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201001_203102_addCurrency cannot be reverted.\n";

        return false;
    }
    */
}
