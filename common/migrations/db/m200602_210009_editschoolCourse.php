<?php

use yii\db\Migration;

/**
 * Class m200602_210009_editschoolCourse
 */
class m200602_210009_editschoolCourse extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `school_course`
ADD COLUMN `slug`  varchar(255) NULL AFTER `title`;
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200602_210009_editschoolCourse cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200602_210009_editschoolCourse cannot be reverted.\n";

        return false;
    }
    */
}
