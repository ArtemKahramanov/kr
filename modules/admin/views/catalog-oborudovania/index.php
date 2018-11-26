<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatalogOborudovaniaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Каталог оборудования';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-oborudovania-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Catalog Oborudovania', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['attribute' => 'groups_id', 'label'=>'Группа', 'value'=>'groups.name'],

            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
