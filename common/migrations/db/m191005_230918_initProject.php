<?php

use yii\db\Migration;

/**
 * Class m191005_230918_initProject
 */
class m191005_230918_initProject extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql=file_get_contents(__DIR__ . '/sql/eduxa.sql');
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191005_230918_initProject cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191005_230918_initProject cannot be reverted.\n";

        return false;
    }
    */
}
