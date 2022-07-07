<?php

use app\models\User;
use app\models\UserSearch;
use kartik\date\DatePicker;
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
//        [
//            'attribute' => 'password',
//            'value' => 'password',
//            'contentOptions' => [
//                'style' => 'width: 0%; white-space: normal;',
//            ]
//        ],
        [
            'attribute' => 'phone',
            'format' => 'raw',
            'value' => function($model, $id){
                return Html::tag('span', $model->phone, ['class' => 'badge badge-primary']);
            },
            'contentOptions' => [
                'style' => 'width: 10%',
            ]
        ],
        'email',
        [
            'attribute' => 'created_at',
            'format' => 'date',
            'value' => 'created_at',
            'filter' => DatePicker::widget([
                'model' => $searchModel,
                'attribute' => 'created_at',
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-MM-yyyy'
                ],
                'convertFormat' => true,
            ])
        ],
//        'created_at:datetime',
        [
            'attribute' => 'updated_at',
            'format' => 'date',
            'value' => 'updated_at',
            'filter' => DatePicker::widget([
                'model' => $searchModel,
                'attribute' => 'updated_at',
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'auroclose' => true,
                    'format' => 'dd-MM-yyyy'
                ],
                'convertFormat' => true,
            ])
        ],
//        'updated_at:datetime',
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