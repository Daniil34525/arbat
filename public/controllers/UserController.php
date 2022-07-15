<?php

namespace app\controllers;

use app\models\User;
use app\models\UserSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;

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

    public function actionUserList($q = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('id, name AS text')
                ->from('user')
                ->where(['like', 'name', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        return $out;
    }
}