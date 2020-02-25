<?php

use yii\db\Migration;

/**
 * Class m200225_213319_StatsChanges
 */
class m200225_213319_StatsChanges extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `university_programs`
ADD COLUMN `state_id`  int NULL AFTER `country_id`;


ALTER TABLE `schools`
ADD COLUMN `state_id`  int NULL AFTER `country_id`;
        
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200225_213319_StatsChanges cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200225_213319_StatsChanges cannot be reverted.\n";

        return false;
    }
    */
}
