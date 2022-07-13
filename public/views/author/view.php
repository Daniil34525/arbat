<?php

use app\models\Book;
use yii\widgets\DetailView;

/**
 * @var Book $model
 */


echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'title',
        'author',
        'count',
        'about',
        'created_at:datetime',
        'updated_at:datetime',
        [
            'attribute' => 'name',
            'value' => \yii\helpers\Html::a($model->user->name, \yii\helpers\Url::to(['/user/view', 'id' => $model->user->id]), ['class' => 'btn btn-success']),
            'format' => 'raw',
        ],
    ]
]);