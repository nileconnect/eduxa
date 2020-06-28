<?php

use yii\db\Migration;

/**
 * Class m200628_220008_editREquest
 */
class m200628_220008_editREquest extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `requests`
ADD COLUMN `accomodation_period`  varchar(255) NULL AFTER `accomodation_option_cost`,
ADD COLUMN `number_of_sessions`  int NULL AFTER `number_of_weeks`,
ADD COLUMN `total`  float NULL AFTER `health_insurance`;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200628_220008_editREquest cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200628_220008_editREquest cannot be reverted.\n";

        return false;
    }
    */
}
