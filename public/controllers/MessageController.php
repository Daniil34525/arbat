<?php

namespace app\controllers;

use app\models\Message;
use app\models\User;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class MessageController extends Controller
{
    public function actionIndex(int $id = null)
    {
        $isAdmin = false;
        $newMessage = new Message();
        if(is_null($id))
        {
            $isAdmin = true;
            $id = User::ADMIN_ID;
            $messages = Message::find()->with(['userTo', 'userFrom'])->all();
        } else {
            $messages = Message::find()
                ->where(['user_id_to' => $id])
                ->orWhere(['user_id_from' => $id])
                ->with(['userTo', 'userFrom'])
                ->all();
            $newMessage->user_id_from = User::ADMIN_ID;
        }
        $newMessage->user_id_to = $id;

        if($newMessage->load(Yii::$app->request->post()) && $newMessage->save())
        {
            return $this->redirect(Url::current(Yii::$app->request->queryParams));
        }
        return $this->render('index', ['messages' => $messages, 'newMessage' => $newMessage, 'isAdmin' => $isAdmin], );
    }
}