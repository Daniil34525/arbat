<?php

namespace app\controllers;

use app\models\Book;
use app\models\BookSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class BookController extends Controller
{
    public function actionIndex(): string
    {
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',
            [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel
            ]);
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