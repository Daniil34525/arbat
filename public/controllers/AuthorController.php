<?php

namespace app\controllers;

use app\models\Author;
use Yii;
use yii\web\Controller;

class AuthorController extends Controller
{
    public function actionCreateUpdate($id = null){
        $model = is_null($id) ? new Author() : Author::findOne($id);
        if($model->load(Yii::$app->request->post())){
            if(!$model->id) $model->hashPassword();
            if($model->save()) return $this->redirect('/author/index');
        }
    }

}