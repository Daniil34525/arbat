<?php

namespace app\widgets;

use yii\base\Widget;

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
    {
        return $this->render('book_list' , ['models' => $this->models, 'btnTypes' => $this->btnTypes, 'button' => $this->button]);
    }
}