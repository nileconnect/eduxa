<?php

use yii\db\Migration;

/**
 * Class m200925_105722_add_column_price_ratio_to_school
 */
class m200925_105722_add_column_price_ratio_to_school extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `schools`
            ADD COLUMN `price_ratio`  varchar(20) NULL AFTER `currency_id`;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200925_105722_add_column_price_ratio_to_school cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200925_105722_add_column_price_ratio_to_school cannot be reverted.\n";

        return false;
    }
    */
}
