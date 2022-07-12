<?php

namespace app\models;

use yii\data\ActiveDataProvider;

class BookSearch extends Book
{
    public function rules()
    {
        return[
            [['id', 'title', 'author', 'count', 'created_at', 'updated_at', 'about', 'user_id'],'safe'],
        ];
    }
    public function search($params)
    {
        $query = self::find()->with('user');
        $dataProvider = new ActiveDataProvider([
           'query' => $query,
           'pagination' =>[
               'pageSize' => 100
           ]
        ]);
        $this->load($params);
        if(!$this->validate()) return $dataProvider;

        $query->andFilterWhere(['like', 'id', $this->id]);
        $query->andFilterWhere(['like', 'title', $this->title]);
        $query->andFilterWhere(['like', 'author', $this->author]);
        $query->andFilterWhere(['like', 'count', $this->count]);
        $query->andFilterWhere(['like', 'about', $this->about]);
        $query->andFilterWhere(['like', 'user_id', $this->user_id]);


        return $dataProvider;
    }
}