<?php

use app\models\User;
use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/**
 * @var User $model
 */
$form = ActiveForm::begin();
echo $form->field($model, 'name');
echo $form->field($model, 'surname');
if(!$model->id) echo $form->field($model, 'password')->input('password');
echo $form->field($model, 'phone')->widget(MaskedInput::class, ['mask' => '+7 999 999-99-99']);
echo $form->field($model, 'email');
echo Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'id' => 'r']);
ActiveForm::end();
