<?php

/**
 * @var array $messages
 * @var Message $message
 * @var Message $newMessage
 * @var bool $isAdmin
 */

use app\models\Message;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

foreach ($messages as $message){?>
    <div class="alert alert-primary d-flex justify-content-between" role="alert">
        <span><?= $message->userTo->name?> : </span>
        <span style="flex: 1; justify-self: start; margin-left: 5px;"><?= $message->message ?> </span>
        <span><?=  date('H:i:s | d:M:y',$message->created_at)?> </span>
    </div>

<?php };

$form = ActiveForm::begin();
if($isAdmin) {
    echo $form->field($newMessage, 'user_id_from')->dropDownList(User::getUserList());
}
echo $form->field($newMessage, 'message');
echo Html::submitButton('Отправить', ['class' => 'btn btn-primary']);
$form = ActiveForm::end();