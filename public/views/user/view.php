<?php

use app\models\User;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/**
 * @var User $model
 */
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'name',
        'surname',
        //'password',
        'phone',
        'email',
        'created_at:datetime',
        'updated_at:datetime',
        [
            'attribute' => 'books',
            'value' => function($model){
                $books = [];
                foreach ($model->book as $book){
                    $books[] = \yii\helpers\Html::a($book->title, \yii\helpers\Url::to(['/book/view', 'id' => $book->id]), ['class' => 'btn btn-success']);
                }
                return implode(' ', $books);
            },
            'format' => 'raw'
        ],
    ]
]);