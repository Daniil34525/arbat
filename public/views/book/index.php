<?php

use app\models\BookSearch;
use app\models\UserSearch;
use app\widgets\BookListWidget;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

/**
 * @var ActiveDataProvider $dataProvider
 * @var BookSearch $searchModel
 */
$models = $dataProvider->models;
    echo BookListWidget::widget([
        'models' => $models,
        'button' => [
            'view' => 'primary',
            'create' => 'success'
        ]
    ]);
