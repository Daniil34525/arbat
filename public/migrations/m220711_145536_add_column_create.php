<?php

use yii\db\Migration;

/**
 * Class m220711_145536_add_column_create
 */
class m220711_145536_add_column_create extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('book', 'user_id', $this->integer());
        $this->addForeignKey(
            'fk-book-user_id',
            'book',
            'user_id',
            'user',
            'id',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220711_145536_add_column_create cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220711_145536_add_column_create cannot be reverted.\n";

        return false;
    }
    */
}
