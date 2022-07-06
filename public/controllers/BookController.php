<?php

namespace app\controllers;

use app\models\Book;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class BookController extends Controller
{
    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Book::find(),
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }
    public function actionCreateUpdate($id = null)
    {
        $model = is_null($id) ? new Book() : Book::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save(false))
        {
            return $this->redirect('/book/index');
        }
        return $this->render('create', ['model' => $model]);
    }
    public function actionView($id): string
    {
        $model = Book::findOne($id);
        return  $this->render('view', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $book = Book::findOne($id);
        $book->delete();
        return  $this->redirect('/book/index');
    }
}