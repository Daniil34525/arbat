<?php
use app\models\Book;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var array $models;
 * @var array $btnTypes;
 * @var array $button;
 */



?>
<div class="row">
<?php foreach($models as $model){?>
    <div class="card" style="width: 18rem;">
    <div class="card-body">
    <h5 class="card-title"><?= $model->title ?></h5>
    <p class="card-text"> Описание: <?= $model->about ?></p>
    <p>Добавил: <?= isset($model->user)
            ? Html::a(
                $model->user->name,
                Url::to([
                    '/user/view',
                    'id' => $model->user->id
                ]),
                ['class' => 'btn btn-primary']
            ) : '-' ?></p>

    <a href="/book/view?id=<?=$model->id?>" class="btn<?=$btnTypes[$button['view']]  ?>">Подробнее</a>

    <a href="/book/create-update?id=<?=$model->id?>" class="btn <?=$btnTypes[$button['create']]  ?>">Редактировать</a>
    </div>
    </div>
<?php }?>
</div>