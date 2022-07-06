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
    ]
]);