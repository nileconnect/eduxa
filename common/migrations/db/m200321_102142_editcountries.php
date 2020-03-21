<?php

use yii\db\Migration;

/**
 * Class m200321_102142_editcountries
 */
class m200321_102142_editcountries extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `country`
ADD COLUMN `status`  tinyint NULL DEFAULT 1 AFTER `details`;
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200321_102142_editcountries cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200321_102142_editcountries cannot be reverted.\n";

        return false;
    }
    */
}
