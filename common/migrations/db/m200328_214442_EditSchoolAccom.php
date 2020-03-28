<?php

use yii\db\Migration;

/**
 * Class m200328_214442_EditSchoolAccom
 */
class m200328_214442_EditSchoolAccom extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `school_accomodation`
DROP COLUMN `room_size`,
DROP COLUMN `min_age`,
ADD COLUMN `fees`  float NULL AFTER `cost_per_duration_unit`,
ADD COLUMN `facility_id`  int NULL AFTER `fees`,
ADD COLUMN `room_cat_id`  int NULL AFTER `facility_id`,
ADD COLUMN `special_diet`  float NULL AFTER `room_cat_id`;
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200328_214442_EditSchoolAccom cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200328_214442_EditSchoolAccom cannot be reverted.\n";

        return false;
    }
    */
}
