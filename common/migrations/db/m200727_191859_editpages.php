<?php

use yii\db\Migration;

/**
 * Class m200727_191859_editpages
 */
class m200727_191859_editpages extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->execute("
        INSERT INTO `page` (`id`,`slug`, `title`, `body`, `status`) VALUES (110 ,'footer-content', 'App Footer text arabic', 'I was always somebody who felt quite sorry for myself, what I had not got compared to my friends, how much of a struggle my life seemed to be compared to others. I was caught up in a web of negativity', '1');


INSERT INTO `page` (`id`, `slug`, `title`, `body`, `status`) VALUES (111 ,'footer-content-ar', 'App Footer text', 'I was always somebody who felt quite sorry for myself, what I had not got compared to my friends, how much of a struggle my life seemed to be compared to others. I was caught up in a web of negativity', '1');
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200727_191859_editpages cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200727_191859_editpages cannot be reverted.\n";

        return false;
    }
    */
}
