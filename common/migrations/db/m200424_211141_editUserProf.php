<?php

use yii\db\Migration;

/**
 * Class m200424_211141_editUserProf
 */
class m200424_211141_editUserProf extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `user_profile`
MODIFY COLUMN `telephone_no`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL AFTER `mobile`,
MODIFY COLUMN `no_of_students`  int(11) NULL DEFAULT NULL AFTER `telephone_no`,
MODIFY COLUMN `website`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
ADD COLUMN `company_name`  varchar(255) NULL AFTER `job_title`;
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200424_211141_editUserProf cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200424_211141_editUserProf cannot be reverted.\n";

        return false;
    }
    */
}
