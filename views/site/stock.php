<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\data\ActiveDataProvider;

$this->title = 'Склады';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

<?php echo yii\grid\GridView::widget([
  'dataProvider' => $provider,
    'columns' => [
        ['attribute' => 'name', 'label'=>'Название'],
        ['attribute' => 'kol', 'label'=>'Кол-во'],
        ['attribute' => 'ed', 'label'=>'Ед. измерения'],

        [
            'attribute'=>'parent_id',
            'label'=>'Наличие',
            'format'=>'text', // Возможные варианты: raw, html
            'content'=>function($model){
                return $model->getEquipmentCount($model);
            },
        ],],
        ]);
?>
</div>
