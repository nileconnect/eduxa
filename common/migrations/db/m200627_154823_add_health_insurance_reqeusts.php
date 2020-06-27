<?php

use yii\db\Migration;

/**
 * Class m200627_154823_add_health_insurance_reqeusts
 */
class m200627_154823_add_health_insurance_reqeusts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            ALTER TABLE `requests`
                ADD COLUMN `health_insurance` tinyint(1) DEFAULT '0'  AFTER `number_of_weeks`;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200627_154823_add_health_insurance_reqeusts cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200627_154823_add_health_insurance_reqeusts cannot be reverted.\n";

        return false;
    }
    */
}
