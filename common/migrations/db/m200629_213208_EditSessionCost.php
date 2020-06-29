<?php

use yii\db\Migration;

/**
 * Class m200629_213208_EditSessionCost
 */
class m200629_213208_EditSessionCost extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `school_course_session_cost`
ADD COLUMN `max_no_of_sessions`  int NULL AFTER `no_of_sessions`;
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200629_213208_EditSessionCost cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200629_213208_EditSessionCost cannot be reverted.\n";

        return false;
    }
    */
}
