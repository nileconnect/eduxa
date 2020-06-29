<?php

use yii\db\Migration;

/**
 * Class m200629_221631_EditSessionCost
 */
class m200629_221631_EditSessionCost extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `school_course_session_cost`
        
MODIFY COLUMN `weeks_per_session`  int(11) NULL AFTER `school_course_id`;
ALTER TABLE `school_course_session_cost`
MODIFY COLUMN `weeks_per_session`  int(11) NULL AFTER `school_course_id`;
        ");


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200629_221631_EditSessionCost cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200629_221631_EditSessionCost cannot be reverted.\n";

        return false;
    }
    */
}
