<?php

use yii\db\Migration;

/**
 * Class m200921_175624_editcourse
 */
class m200921_175624_editcourse extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `school_course`
ADD COLUMN `begining_of_study`  varchar(255) NULL AFTER `pricing_method`;
        
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200921_175624_editcourse cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200921_175624_editcourse cannot be reverted.\n";

        return false;
    }
    */
}
