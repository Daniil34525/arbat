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
        'updated_at:datetime'
    ]
]);