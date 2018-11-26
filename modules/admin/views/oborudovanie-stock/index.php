<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OborudovanieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Оборудование';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oborudovanie-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Oborudovanie', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['attribute' => 'catalog_oborudovania_id', 'label'=>'Название', 'value'=>'catalogOborudovania.name'],
            'number',
            'retired',
            ['attribute' => 'cabinet_id', 'label'=>'Кабинет', 'value'=>'cabinet.name'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
