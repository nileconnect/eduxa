<?php

use yii\db\Migration;

/**
 * Class m200619_201927_school_course_type
 */
class m200619_201927_school_course_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
                -- ----------------------------
                -- Table structure for `school_course_type`
                -- ----------------------------
                DROP TABLE IF EXISTS `school_course_type`;
                CREATE TABLE `school_course_type` (
                `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                `title` varchar(255) NOT NULL,
                `created_at` varchar(255) DEFAULT NULL,
                `updated_at` varchar(255) DEFAULT NULL,
                `created_by` int(11) DEFAULT NULL,
                `updated_by` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200619_201927_school_course_type cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200619_201927_school_course_type cannot be reverted.\n";

        return false;
    }
    */
}
