<?php

namespace app\controllers;

use app\models\Message;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class MessageController extends Controller
{
    const ADMIN_ID = 2;
    public function actionIndex(int $id = null)
    {
        $isAdmin = false;
        $newMessage = new Message();
        if(is_null($id))
        {
            $isAdmin = true;
            $id = self::ADMIN_ID;
            $messages = Message::find()->with(['userTo', 'userFrom'])->all();
        } else {
            $messages = Message::find()
                ->where(['user_id_to' => $id])
                ->orWhere(['user_id_from' => $id])
                ->with(['userTo', 'userFrom'])
                ->all();
            $newMessage->user_id_from = self::ADMIN_ID;
        }
        $newMessage->user_id_to = $id;

        if($newMessage->load(Yii::$app->request->post()) && $newMessage->save())
        {
            return $this->redirect(Url::current(Yii::$app->request->queryParams));
        }
        return $this->render('index', ['messages' => $messages, 'newMessage' => $newMessage, 'isAdmin' => $isAdmin], );
    }
}