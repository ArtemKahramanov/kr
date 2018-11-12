<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EquipmentStockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Оборудование в наличии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-stock-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            'organizer_id',
            'date_purchase',
            'life',
            'retired',
            'stock_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
