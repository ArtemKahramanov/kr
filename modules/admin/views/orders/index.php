<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['attribute' => 'catalog_oborudovania_id', 'label'=>'Категория', 'value'=>'catalogOborudovania.name'],
            ['attribute' => 'name', 'label'=>'Сообщение', 'value'=>'name'],
            'kol',
            'status',
            ['attribute' => 'organizer_id', 'label'=>'Организатор', 'value'=>'organizer.name'],
            ['attribute' => 'location_id', 'label'=>'Отделение', 'value'=>'location.name'],
            'cabinet_id',
            'created_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
