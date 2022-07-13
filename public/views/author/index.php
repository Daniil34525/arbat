<?php

use app\models\AuthorSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

/**
 * @var ActiveDataProvider $dataProvider
 * @var AuthorSearch $searchModel
 */
$models = $dataProvider->models;
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' =>
        [
            'id',
            'name',
            'age',
            'email',
            'bookCount'
        ],
    ]);
