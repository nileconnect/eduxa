<?php

use yii\db\Migration;

/**
 * Class m200619_210522_school_course_add_column_type_study_language
 */
class m200619_210522_school_course_add_column_type_study_language extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            ALTER TABLE `school_course`
                ADD COLUMN `school_course_type_id` int(10) unsigned AFTER `slug`,
                ADD COLUMN `school_course_study_language_id` int(10) unsigned AFTER `school_course_type_id`,
                
                ADD CONSTRAINT `school_course_type_id_ibfk_1` FOREIGN KEY (`school_course_type_id`) REFERENCES
                `school_course_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                
                ADD CONSTRAINT `school_course_study_language_id_ibfk_1` FOREIGN KEY (`school_course_study_language_id`)
                REFERENCES `school_course_study_language` (`id`) ON
                DELETE CASCADE ON UPDATE CASCADE
                ;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200619_210522_school_course_add_column_type_study_language cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200619_210522_school_course_add_column_type_study_language cannot be reverted.\n";

        return false;
    }
    */
}
