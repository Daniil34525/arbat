<?php

use app\models\Author;
use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;

/**
 * @var Author $model
 */
$form = ActiveForm::begin();
echo $form->field($model, 'name');
echo $form->field($model, 'age');
echo $form->field($model, 'email');
echo $form->field($model, 'password');
echo Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'id' => 'r']);
ActiveForm::end();
