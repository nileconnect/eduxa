<?php

use yii\db\Migration;

/**
 * Class m200105_205804_editProf
 */
class m200105_205804_editProf extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `user_profile`
       CHANGE COLUMN `nationlaity` `nationality`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL AFTER `city_id`;


        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200105_205804_editProf cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200105_205804_editProf cannot be reverted.\n";

        return false;
    }
    */
}
