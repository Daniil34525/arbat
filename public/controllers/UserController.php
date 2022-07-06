<?php

namespace app\controllers;

use app\models\User;
use app\models\UserSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class UserController extends Controller
{
    public function actionIndex(): string
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',
            [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel
            ]);
    }

//    public function actionCreate()
//    {
//        return $this->actionCreateUpdate(null);
//        /*
//        $model = new User();
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect('/user/index');
//        }
//        return $this->render('create', ['model' => $model]);*/
//    }

//    public function actionUpdate($id)
//    {
//        return $this->actionCreateUpdate($id);
//        /*$model = User::findOne($id);
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect('/user/index');
//        }
//        return  $this->render('create', ['model' => $model]);*/
//    }
    public function actionCreateUpdate($id = null)
    {
        $model = is_null($id) ? new User() : User::findOne($id);
        if ($model->load(Yii::$app->request->post())) {
            if(!$model->id) $model->hashPassword();
            if ($model->save()) {
                return $this->redirect('/user/index');
            }
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionView($id): string
    {
        $model = User::findOne($id);
        return  $this->render('view', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $user = User::findOne($id);
        $user->delete();
        return  $this->redirect('/user/index');
    }

}