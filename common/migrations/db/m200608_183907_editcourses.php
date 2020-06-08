<?php

use yii\db\Migration;

/**
 * Class m200608_183907_editcourses
 */
class m200608_183907_editcourses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `school_course`
ADD COLUMN `pricing_method`  tinyint NULL DEFAULT 0 COMMENT '0 weeks 1 sessions' AFTER `status`;

        
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200608_183907_editcourses cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200608_183907_editcourses cannot be reverted.\n";

        return false;
    }
    */
}
