<?php

use app\models\User;
use app\models\UserSearch;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\widgets\Pjax;

/**
 * @var ActiveDataProvider $dataProvider
 * @var UserSearch $searchModel
 */
Pjax::begin(['timeout' => 10000]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'name',
        'surname',
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
        [
            'attribute' => 'bookTitle',
            'value' => function($model)
            {
                $books = [];
                foreach ($model->book as $book){
                    $books[] = Html::a($book->title, Url::to(['/book/view', 'id' => $book->id]), ['class' => 'btn btn-success' ,'target'=>'_blank']);
                }
                return implode(' ', $books);
            },
            'format' => 'raw',
        ],
        [
            'attribute' => 'bookAuthor',
            'value' => function($model)
            {
                $authors = [];
                foreach($model->book as $book)
                {
                    $authors[] = $book->author;
                }
                return implode($authors);
            }
        ],
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
Pjax::end();