<?php

use yii\db\Migration;

/**
 * Class m190311_131410_schoolsData
 */
class m190311_131410_schoolsData extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $sql=file_get_contents(__DIR__ . '/sql/schoolsData.sql');
        $this->execute($sql);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190311_131410_schoolsData cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190311_131410_schoolsData cannot be reverted.\n";

        return false;
    }
    */
}
