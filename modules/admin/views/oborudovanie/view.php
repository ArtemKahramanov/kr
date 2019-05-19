<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Oborudovanie */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Oborudovanies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oborudovanie-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--        --><?//= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('Delete', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'catalog_oborudovania_id',
            'number',
            'retired',
            'cabinet_id',
        ],
    ]) ?>

</div>
