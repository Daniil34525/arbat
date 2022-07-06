<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $title
 * @property string $author
 * @property integer $count
 * @property string $about
 * @property integer $data
 */
class Book extends ActiveRecord
{
    public static function tableName()
    {
        return 'book';
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at'
            ],
        ];
    }
    public function rules()
    {
        return [
            [['title', 'author', 'count', 'data'], 'required'],
            [['title', 'author', 'about'], 'string'],
            ['count', 'integer']
        ];
    }
    public function attributeLabels()
    {
        return [
            'title' => 'Название книги',
            'author' => 'ФИО автора',
            'count' => 'Количество страниц',
            'about' => 'Описание',
            'created_at' => 'Дата издания',
            'updated_at' => 'Дата изменения',
        ];
    }
}