<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property integer $user_id_from
 * @property integer $user_id_to
 * @property string $message
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $userTo
 * @property User $userFrom
 */

class Message extends ActiveRecord
{
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

    public static function tableName()
    {
        return 'message';
    }

    public function rules()
    {
        return [
            [['user_id_from', 'user_id_to', 'message'],'required'],
            [['user_id_from', 'user_id_to'], 'integer'],
            ['message', 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'user_id_from' => 'Получатель',
            'user_id_to' => 'Отправитель',
            'message' => 'Сообщение',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата изменения',
        ];
    }

    public function getUserTo(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id_to']);
    }

    public function getUserFrom(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id_from']);
    }
}