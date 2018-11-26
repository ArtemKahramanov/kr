<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\data\ActiveDataProvider;

$this->title = 'Группы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

<?php echo yii\grid\GridView::widget([
  'dataProvider' => $provider,
  'columns' => [
       ['attribute' => 'name', 'label'=>'Название'],
       ['attribute' => 'provider_id', 'label'=>'Поставщик', 'value'=>'provider.name'],
       ['attribute' => 'organizer_id', 'label'=>'Организатор', 'value'=>'organizer.name'],
//       ['attribute' => 'orders_id', 'label'=>'Заказы', 'value'=>'orders.name'],
  ]
]);
?>
</div>
