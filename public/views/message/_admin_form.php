<?php
/**
 * @var array $messages
 * @var Message $message
 * @var Message $newMessage
 */

use app\models\Message;
use app\models\User;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\ActiveForm; ?>
    <div class="card-header">
        <h3 class="card-title">Chat</h3>
    </div>

    <div class="card-body">

        <div class="direct-chat-messages">
            <?php
            foreach ($messages as $message) {
                $isAdmin = $message->userTo->id == User::ADMIN_ID;
                ?>
                <?php if ($message->userTo->id != User::ADMIN_ID) ?>
                    <div class="direct-chat-msg <?= $isAdmin ? 'right' : '' ?>">
                <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-<?= $isAdmin ? 'right' : '' ?>"><?= $message->userTo->name ?></span>
                    <span class="direct-chat-timestamp float-<?= $isAdmin ? '' : 'right' ?>"><?= date('H:i:s | d:M:y', $message->created_at) ?></span>
                </div>
                <img class="direct-chat-img" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="message user image">
                <div class="direct-chat-text">
                    <?= $message->message ?>
                </div>

                </div>
            <?php } ?>
        </div>

    </div>

    <div class="card-footer">
        <?php $form = ActiveForm::begin();
        echo $form->field($newMessage, 'user_id_from')->widget(Select2::class, [
            'options' => ['placeholder' => 'Выберите пользователя'],
            'pluginOptions' => [
                'allowClear' => true,
                'minimumInputLength' => 1,
                'ajax' => [
                    'url' => Url::to('/user/user-list'),
                    'dataType' => 'json',
                    'data' => new JsExpression('function(params) { return {q:params.term}; }')
                ],
            ],
        ]);
        echo $form->field($newMessage, 'message');
        echo Html::submitButton('Отправить', ['class' => 'btn btn-primary']);
        $form = ActiveForm::end();
        ?>
    </div>
