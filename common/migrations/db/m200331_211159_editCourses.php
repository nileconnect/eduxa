<?php

use yii\db\Migration;

/**
 * Class m200331_211159_editCourses
 */
class m200331_211159_editCourses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
       ALTER TABLE `school_course`
DROP COLUMN `course_start_every`,
DROP COLUMN `hours_per_week`,
DROP COLUMN `cost_per_week`,
DROP COLUMN `no_of_weeks`,
DROP COLUMN `required_attendance_duraion`,
ADD COLUMN `lesson_duration`  float NULL AFTER `lessons_per_week`,
ADD COLUMN `max_no_of_students_per_class`  int NULL AFTER `avg_no_of_students_per_class`,
ADD COLUMN `study_books_fees`  float NULL AFTER `registeration_fees`;

        
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200331_211159_editCourses cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200331_211159_editCourses cannot be reverted.\n";

        return false;
    }
    */
}
