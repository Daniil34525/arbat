<?php

use app\models\Book;
use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;

/**
 * @var Book $model
 */
$form = ActiveForm::begin();
echo $form->field($model, 'title');
echo $form->field($model, 'author');
echo $form->field($model, 'count');
echo $form->field($model, 'about');
echo Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'id' => 'r']);
ActiveForm::end();
