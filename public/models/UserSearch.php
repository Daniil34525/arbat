<?php

namespace app\models;

use yii\data\ActiveDataProvider;

class UserSearch extends User
{
    public function rules()
    {
        return [
            [['id', 'name', 'surname', 'phone', 'email', 'created_at', 'updated_at'], 'safe'],
        ];
    }
    public function search($params)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => self::find(),
        ]);
        return $dataProvider;
    }
}