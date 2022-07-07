<?php

use app\models\BookSearch;
use app\models\UserSearch;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

/**
 * @var ActiveDataProvider $dataProvider
 * @var BookSearch $searchModel
 */

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'title',
        'author',
        'count',
        'about',
//        'created_at:datetime',
        [
            'attribute' => ' created_at',
            'format' => 'date',
            'value' => 'created_at',
            'filter' => DatePicker::widget([
                ''
            ])
        ],
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