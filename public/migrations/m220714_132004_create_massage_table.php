<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%massage}}`.
 */
class m220714_132004_create_massage_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%message}}', [
            'id' => $this->primaryKey(),
            'user_id_from' =>$this->integer()->notNull(),
            'user_id_to' =>$this->integer()->notNull(),
            'message' => $this->text()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
//        $this->addForeignKey(
//            'fk-message-user_id',
//            'message',
//            'user_id',
//            'user',
//            'id',
//            'CASCADE',
//        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //$this->dropForeignKey('fk-message-user_id','message');
        $this->dropTable('{{%message}}');
    }
}
