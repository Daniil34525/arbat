<?php

use app\models\User;
use app\models\UserSearch;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/**
 * @var ActiveDataProvider $dataProvider
 * @var UserSearch $searchModel
 */

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'name',
        'surname',
        'password',
        'phone',
        'email',
        'created_at:datetime',
        'updated_at:datetime',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            'buttons' => [
                'update' => function($url, $model){
                    return Html::a('редактировать', '/user/create-update?id=' . $model->id);
                }
            ]

        ],
    ]
]);