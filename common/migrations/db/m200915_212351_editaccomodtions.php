<?php

use yii\db\Migration;

/**
 * Class m200915_212351_editaccomodtions
 */
class m200915_212351_editaccomodtions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `school_accomodation`
MODIFY COLUMN `special_diet`  varchar(255) NULL DEFAULT NULL AFTER `room_cat_id`;
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200915_212351_editaccomodtions cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200915_212351_editaccomodtions cannot be reverted.\n";

        return false;
    }
    */
}
