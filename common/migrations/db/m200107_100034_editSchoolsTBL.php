<?php

use yii\db\Migration;

/**
 * Class m200107_100034_editSchoolsTBL
 */
class m200107_100034_editSchoolsTBL extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            SET FOREIGN_KEY_CHECKS=0;
            
            ALTER TABLE `schools` 
            DROP INDEX `course_type`,
            DROP FOREIGN KEY `schools_ibfk_1`,
            ADD COLUMN `accomodation_reservation_fees`  float NULL AFTER `total_rating`,
            ADD COLUMN `has_health_insurance`  tinyint(1) NULL AFTER `accomodation_reservation_fees`,
            ADD COLUMN `health_insurance_cost`  float NULL AFTER `has_health_insurance`,
            DROP COLUMN `course_type`,
            DROP COLUMN `start_every`,
            DROP COLUMN `study_time`,
            DROP COLUMN `lessons_per_week`,
            DROP COLUMN `hours_per_week`,
            DROP COLUMN `fees_per_week`;
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200107_100034_editSchoolsTBL cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200107_100034_editSchoolsTBL cannot be reverted.\n";

        return false;
    }
    */
}
