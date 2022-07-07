<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $password
 * @property string $phone
 * @property string $email
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends ActiveRecord
{
    public static function tableName()
    {
        return 'user';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
            ],
        ];
    }

    public function rules()
    {
        return [
            [['name', 'password', 'phone', 'email'], 'required'],
            [['name', 'surname', 'password', 'phone', 'email'], 'string'],
            ['email', 'email'],
            ['email', 'unique'],
            //['phone', 'lenght', 'values' => ['phone']]
            
        ];
    }
    public function lenght($number)
    {
        $r = $number[strlen(($this->$number))] ;
        if(is_numeric($r));
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'password' => 'Пароль',
            'phone' => 'Телефон',
            'email' => 'Почта',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата изменения',
        ];
    }

    public function hashPassword()
    {
        $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
    }

    public function beforeSave($insert)
    {
        if($insert) $this->hashPassword();
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

}