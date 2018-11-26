<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\data\ActiveDataProvider;

$this->title = 'Оборудование в наличии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

<?php echo yii\grid\GridView::widget([
  'dataProvider' => $provider,
  'columns' => [
       ['attribute' => 'name', 'label'=>'Номер'],
       ['attribute' => 'location_id', 'label'=>'Расположение', 'value'=>'location.name'],
//       ['attribute' => 'orders_id', 'label'=>'Заказы', 'value'=>'orders.name'],
  ]
]);
?>
</div>
