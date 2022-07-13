<?php

namespace app\models;

use yii\data\ActiveDataProvider;

class AuthorSearch extends Author
{
    public function rules()
    {
        return [
            [['id', 'name', 'age', 'email'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = self::find()->joinWith('author');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 1000,
            ],
        ]);
        $this->load($params);
        if(!$this->validate())
        {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'id', $this->id]);
        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'age', $this->age]);
        $query->andFilterWhere(['like', 'email', $this->email]);
        return $dataProvider;
    }
}