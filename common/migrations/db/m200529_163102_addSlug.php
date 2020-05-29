<?php

use yii\db\Migration;

/**
 * Class m200529_163102_addSlug
 */
class m200529_163102_addSlug extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `university`
ADD COLUMN `slug`  varchar(255) NULL AFTER `title`;

ALTER TABLE `schools`
ADD COLUMN `slug`  varchar(255) NULL AFTER `title`;

ALTER TABLE `university_programs`
ADD COLUMN `slug`  varchar(255) NULL AFTER `title`;

        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200529_163102_addSlug cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200529_163102_addSlug cannot be reverted.\n";

        return false;
    }
    */
}
