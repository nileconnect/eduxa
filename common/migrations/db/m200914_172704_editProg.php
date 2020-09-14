<?php

use yii\db\Migration;

/**
 * Class m200914_172704_editProg
 */
class m200914_172704_editProg extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("ALTER TABLE `university_programs`
MODIFY COLUMN `title`  varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `university_id`;");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200914_172704_editProg cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200914_172704_editProg cannot be reverted.\n";

        return false;
    }
    */
}
