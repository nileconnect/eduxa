<?php

use yii\db\Migration;

/**
 * Class m200619_213427_school_course_add_column_cost_type
 */
class m200619_213427_school_course_add_column_cost_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `school_course`
            ADD COLUMN `cost_type` tinyint(1) DEFAULT '1' COMMENT '1 cost per week  2 cost per session' AFTER `requirments`;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200619_213427_school_course_add_column_cost_type cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200619_213427_school_course_add_column_cost_type cannot be reverted.\n";

        return false;
    }
    */
}
