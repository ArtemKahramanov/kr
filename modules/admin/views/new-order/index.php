<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'New Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create New Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'catalog_oborudovania_id',
            'kol',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
