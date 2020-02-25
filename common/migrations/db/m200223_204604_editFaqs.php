<?php

use yii\db\Migration;

/**
 * Class m200223_204604_editFaqs
 */
class m200223_204604_editFaqs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        ALTER TABLE `faq`
CHANGE COLUMN `cat_id` `country_id`  int(10) UNSIGNED NOT NULL AFTER `id`;

ALTER TABLE `faq` DROP FOREIGN KEY `faq_ibfk_1`;

ALTER TABLE `faq` ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `country` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
DROP TABLE faq_cat;

        
        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200223_204604_editFaqs cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200223_204604_editFaqs cannot be reverted.\n";

        return false;
    }
    */
}
