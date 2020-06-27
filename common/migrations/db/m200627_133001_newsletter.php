<?php

use yii\db\Migration;

/**
 * Class m200627_133001_newsletter
 */
class m200627_133001_newsletter extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            -- ----------------------------
            -- Table structure for `newsletter`
            -- ----------------------------
            DROP TABLE IF EXISTS `newsletter`;
            CREATE TABLE `newsletter` (
            `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `email` varchar(255) NOT NULL,
            `created_at` varchar(255) DEFAULT NULL,
            `updated_at` varchar(255) DEFAULT NULL,
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200627_133001_newsletter cannot be reverted.\n";

        return false;
    }

    /*
// Use up()/down() to run migration code without a transaction.
public function up()
{

}

public function down()
{
echo "m200627_133001_newsletter cannot be reverted.\n";

return false;
}
 */
}
