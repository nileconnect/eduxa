<?php

use yii\db\Migration;

/**
 * Class m191016_221024_EditVideos
 */
class m191016_221024_EditVideos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `university_videos`
MODIFY COLUMN `path`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL AFTER `university_id`;

        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191016_221024_EditVideos cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191016_221024_EditVideos cannot be reverted.\n";

        return false;
    }
    */
}
