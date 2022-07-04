<?php

use app\models\User;
use yii\db\Migration;

/**
 * Class m220704_143743_create_fake_users
 */
class m220704_143743_create_fake_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new User();
        $user->name = 'daniil';
        $user->password = 'qwerty';
        $user->surname = 'f';
        $user->email = 'd@mail.ru';
        $user->phone = '89995554433';
        $user->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220704_143743_create_fake_users cannot be reverted.\n";

        return false;
    }
}
