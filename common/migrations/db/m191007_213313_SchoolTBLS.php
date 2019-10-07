<?php

use yii\db\Migration;

/**
 * Class m191007_213313_SchoolTBLS
 */
class m191007_213313_SchoolTBLS extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql=file_get_contents(__DIR__ . '/sql/schoolTBLS.sql');
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191007_213313_SchoolTBLS cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191007_213313_SchoolTBLS cannot be reverted.\n";

        return false;
    }
    */
}
