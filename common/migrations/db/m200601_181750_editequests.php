<?php

use yii\db\Migration;

/**
 * Class m200601_181750_editequests
 */
class m200601_181750_editequests extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
ALTER TABLE `requests`
MODIFY COLUMN `student_nationality_id`  varchar(25) NULL DEFAULT NULL AFTER `student_city_id`,
ADD COLUMN `student_state_id`  int NULL AFTER `student_country_id`;

ALTER TABLE `requests` DROP FOREIGN KEY `requests_ibfk_2`;

ALTER TABLE `requests` ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`student_city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `requests` ADD FOREIGN KEY (`student_state_id`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;



  ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200601_181750_editequests cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200601_181750_editequests cannot be reverted.\n";

        return false;
    }
    */
}
