<?php

use yii\db\Migration;

/**
 * Class m200720_230246_add_profile_precentage
 */
class m200720_230246_add_profile_precentage extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            ALTER TABLE `user_profile`
                ADD COLUMN `profile_percentage` int(3) DEFAULT '60' AFTER `gender`;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200720_230246_add_profile_precentage cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200720_230246_add_profile_precentage cannot be reverted.\n";

        return false;
    }
    */
}
