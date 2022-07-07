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
        $query = self::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        $this->load($params);
        if(!$this->validate())
        {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'id', $this->id]);
        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'surname', $this->surname]);
        $query->andFilterWhere(['like', 'phone', $this->phone]);
        $query->andFilterWhere(['like', 'email', $this->email]);
        $query->andFilterWhere(['between', 'created_at', strtotime($this->created_at), strtotime($this->created_at . '+ 1 day')]);
        $query->andFilterWhere(['between', 'updated_at', strtotime($this->updated_at), strtotime($this->updated_at . '+ 1 day')]);

        return $dataProvider;
    }
}