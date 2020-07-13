<?php

use yii\db\Migration;

/**
 * Class m200713_003140_add_permissions_to_user_profile
 */
class m200713_003140_add_permissions_to_user_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            ALTER TABLE `user`
                ADD COLUMN `permissions`  varchar(255) NULL AFTER `email_verified`;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200713_003140_add_permissions_to_user_profile cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200713_003140_add_permissions_to_user_profile cannot be reverted.\n";

        return false;
    }
    */
}
