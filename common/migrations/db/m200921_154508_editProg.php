<?php

use yii\db\Migration;

/**
 * Class m200921_154508_editProg
 */
class m200921_154508_editProg extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        
        ALTER TABLE `university_programs`
ADD COLUMN `bank_statment_active`  tinyint NULL AFTER `ielts`;
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200921_154508_editProg cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200921_154508_editProg cannot be reverted.\n";

        return false;
    }
    */
}
