<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\data\ActiveDataProvider;

$this->title = 'Заказы борудования';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
  <h1><?= Html::encode($this->title) ?></h1>
  <?php echo yii\grid\GridView::widget([
    'dataProvider' => $provider,
    'columns' => [
         ['attribute' => 'id', 'label'=>'Номер'],
         ['attribute' => 'name', 'label'=>'Название'],
         ['attribute' => 'price_one','label' => 'Цена'],
         ['attribute' => 'kol','label' => 'Колличество'],
         ['attribute' => 'organizer_name','label' => 'Организатор', 'value'=>'organizer.name'],
         ['class' => 'yii\grid\ActionColumn']]
  ]);
  ?>
</div>
