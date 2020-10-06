<?php

use yii\db\Migration;

/**
 * Class m201006_074607_editCoursePrice
 */
class m201006_074607_editCoursePrice extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `school_course`
ADD COLUMN `min_price`  varchar(255) NULL AFTER `begining_of_study`;
        
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201006_074607_editCoursePrice cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201006_074607_editCoursePrice cannot be reverted.\n";

        return false;
    }
    */
}
