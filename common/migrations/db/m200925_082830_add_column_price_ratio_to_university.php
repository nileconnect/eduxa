<?php

use yii\db\Migration;

/**
 * Class m200925_082830_add_column_price_ratio_to_university
 */
class m200925_082830_add_column_price_ratio_to_university extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `university`
            ADD COLUMN `price_ratio`  varchar(20) NULL AFTER `currency_id`;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200925_082830_add_column_price_ratio_to_university cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200925_082830_add_column_price_ratio_to_university cannot be reverted.\n";

        return false;
    }
    */
}
