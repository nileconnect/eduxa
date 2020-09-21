<?php

use yii\db\Migration;

/**
 * Class m200921_203215_add_health_insurance_to_course
 */
class m200921_203215_add_health_insurance_to_course extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `school_course`
            ADD COLUMN `health_insurance`  varchar(255) DEFAULT '0' AFTER `pricing_method`;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200921_203215_add_health_insurance_to_course cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200921_203215_add_health_insurance_to_course cannot be reverted.\n";

        return false;
    }
    */
}
