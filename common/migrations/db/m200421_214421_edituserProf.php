<?php

use yii\db\Migration;

/**
 * Class m200421_214421_edituserProf
 */
class m200421_214421_edituserProf extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("

ALTER TABLE `user_profile`
MODIFY COLUMN `students_nationalities`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL AFTER `no_of_students`,
MODIFY COLUMN `expected_no_of_students`  int(11) NULL DEFAULT NULL AFTER `students_nationalities`,
MODIFY COLUMN `job_title`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL AFTER `expected_no_of_students`,
MODIFY COLUMN `telephone_no`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL AFTER `job_title`,
MODIFY COLUMN `city_id`  int(11) NULL DEFAULT NULL ,
ADD COLUMN `state_id`  int(11) NULL AFTER `country_id`,
MODIFY COLUMN `website`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL AFTER `telephone_no`;

        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200421_214421_edituserProf cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200421_214421_edituserProf cannot be reverted.\n";

        return false;
    }
    */
}
