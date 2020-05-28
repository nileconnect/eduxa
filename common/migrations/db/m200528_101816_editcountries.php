<?php

use yii\db\Migration;

/**
 * Class m200528_101816_editcountries
 */
class m200528_101816_editcountries extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `country`
ADD COLUMN `top_destination`  tinyint NULL DEFAULT 0 AFTER `status`;
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200528_101816_editcountries cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200528_101816_editcountries cannot be reverted.\n";

        return false;
    }
    */
}
