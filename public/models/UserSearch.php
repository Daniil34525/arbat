<?php

namespace app\models;

use yii\data\ActiveDataProvider;
use yii\data\Sort;

class UserSearch extends User
{
    public $bookTitle;
    public $bookAuthor;

    public function rules()
    {
        return [
            [['id', 'name', 'surname', 'phone', 'email', 'created_at', 'updated_at', 'bookTitle', 'bookAuthor'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        $attributes = array_merge(parent::attributeLabels(), ['bookTitle' => 'Название книги', 'bookAuthor' => 'Автор книги']);
        return $attributes;
    }

    public function search($params)
    {
        $query = self::find()->joinWith('book');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 1000,
            ],
        ]);
        $sort = array_merge($dataProvider->getSort()->attributes, [
                'bookAuthor' => [
                    'asc' => ['book.author' => SORT_ASC],
                    'desc' => ['book.author' => SORT_DESC]
                ],
            'bookTitle' => [
                'asc' => ['book.title' => SORT_ASC],
                'desc' => ['book.title' => SORT_DESC]
            ],
        ]);
        $dataProvider->getSort()->attributes = $sort;
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
        $query->andFilterWhere(['between', 'user.created_at', strtotime($this->created_at), strtotime($this->created_at . '+ 1 day')]);
        $query->andFilterWhere(['between', 'user.updated_at', strtotime($this->updated_at), strtotime($this->updated_at . '+ 1 day')]);
        $query->andFilterWhere(['like', 'book.title', $this->bookTitle]);
        $query->andFilterWhere(['like', 'book.author', $this->bookAuthor]);

        return $dataProvider;
    }
}