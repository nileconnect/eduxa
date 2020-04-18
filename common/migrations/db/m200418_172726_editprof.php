<?php

use yii\db\Migration;

/**
 * Class m200418_172726_editprof
 */
class m200418_172726_editprof extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->execute("
        ALTER TABLE `user_profile`
CHANGE COLUMN `interested_in` `interested_in_university`  tinyint(4) NULL DEFAULT NULL AFTER `communtication_channel`,
ADD COLUMN `interested_in_schools`  tinyint(4) NULL DEFAULT NULL AFTER `interested_in_university`;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200418_172726_editprof cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200418_172726_editprof cannot be reverted.\n";

        return false;
    }
    */
}
