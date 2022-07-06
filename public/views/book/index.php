<?php

use app\models\UserSearch;
use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

/**
 * @var ActiveDataProvider $dataProvider
 * @var UserSearch $searchModel
 */

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'title',
        'author',
        'count',
        'about',
        'created_at:datetime',
        'updated_at:datetime',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            'buttons' => [
                'update' => function($url, $model){
                    return Html::a('редактировать', '/book/create-update?id=' . $model->id);
                }
            ]

        ],
    ]
]);