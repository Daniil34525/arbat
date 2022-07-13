<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $name
 * @property integer $age
 * @property string $email
 * @property string $password
 * @property integer $bookCount
 */

class Author extends ActiveRecord
{
    public static function tableName()
    {
        return 'author';
    }

    public function rules()
    {
        return
        [
            [['id', 'name', 'password', 'email'], ['required', 'string']],
            ['age' , ['required', 'integer']],
            ['email', ['email', 'unique']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'ФИО',
            'age' => 'Возраст',
            'password' => 'Пароль',
            'bookCount' => 'Колличество выпущенных книг',
        ];
    }

    public function hashPassword()
    {
        $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
    }

    public function beforeSave($insert)
    {
        if ($insert) $this->hashPassword();
        return parent::beforeSave($insert);
    }
}