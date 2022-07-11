<?php

namespace app\widgets;

use app\models\Book;
use yii\base\Widget;
use yii\helpers\HTML;

class BookListWidget extends Widget
{
    public $models;
    public $button;

    public $btnTypes = [
            'success' => 'btn-success',
            'primary' => 'btn-primary'
    ];

    public function init()
    {
        parent::init();
        if($this->button === null)
            $this->button = [
                'view' => 'success',
                'create' => 'primary'
            ];
    }


    public function run()
    {?>
    <div class="row">
        <?php
        /** @var Book $model */
        foreach($this->models as $model){?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $model->title ?></h5>
                    <p class="card-text"> Описание: <?= $model->about ?></p>
                    <p>Добавил: <?= isset($model->user) ? $model->user->name : '-' ?></p>

                    <a href="/book/view?id=<?=$model->id?>" class="btn
                    <?=$this->btnTypes[$this->button['view']]  ?>">Подробнее</a>

                    <a href="/book/create-update?id=<?=$model->id?>" class="btn
                    <?=$this->btnTypes[$this->button['create']]  ?>">Редактировать</a>
                </div>
            </div>
        <?php }?>
    </div>
    <?php }
}