<?php

use yii\db\Migration;

/**
 * Class m200102_215930_edit
 */
class m200102_215930_edit extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `university_programs`
ADD COLUMN `first_submission_date`  date NULL AFTER `study_start_date`,
ADD COLUMN `last_submission_date`  date NULL AFTER `first_submission_date`;
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200102_215930_edit cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200102_215930_edit cannot be reverted.\n";

        return false;
    }
    */
}
