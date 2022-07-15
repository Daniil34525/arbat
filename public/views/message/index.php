<?php

use app\models\Message;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\web\View;

/**
 * @var array $messages
 * @var Message $message
 * @var Message $newMessage
 * @var bool $isAdmin
 * @var View $this
 * @var ActiveDataProvider $dataProvider
 */
$this->registerJs(<<<JS
    $.get('/user/user-list', {q: "дан"}, function (data){
        alert(data);
    })
    
JS, View::POS_READY);
$path = $isAdmin ? '_admin_form' : '_user_form';
//if($isAdmin){
//    echo GridView::widget([
//        'dataProvider' => $dataProvider,
//        'columns' => [
//                'user_id_from'
//            ]
//    ]);
//}

echo $this->render($path, ['messages' => $messages, 'newMessage' => $newMessage]);
