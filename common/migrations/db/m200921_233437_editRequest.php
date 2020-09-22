<?php

use yii\db\Migration;

/**
 * Class m200921_233437_editRequest
 */
class m200921_233437_editRequest extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            ALTER TABLE `requests`
ADD COLUMN `user_notes`  text NULL AFTER `status`;
        
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200921_233437_editRequest cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200921_233437_editRequest cannot be reverted.\n";

        return false;
    }
    */
}
