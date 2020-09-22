<?php

use yii\db\Migration;

/**
 * Class m200922_002412_editprof
 */
class m200922_002412_editprof extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `user_profile`
ADD COLUMN `country_code`  varchar(255) NULL AFTER `interested_in_schools`;
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200922_002412_editprof cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200922_002412_editprof cannot be reverted.\n";

        return false;
    }
    */
}
