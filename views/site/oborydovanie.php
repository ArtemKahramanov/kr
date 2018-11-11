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
       ['attribute' => 'name', 'label'=>'Название'],
       ['attribute' => 'date_purchase', 'label'=>'Дата покупки'],
       ['attribute' => 'life', 'label'=>'Срок службы'],
       ['attribute' => 'organizer_name','label' => 'Организатор', 'value'=>'organizer.name'],
       ['attribute' => 'provider_name','label' => 'Провайдер', 'value'=>'provider.name'],
       ['attribute' => 'stock_name','label' => 'Поставщик', 'value'=>'stock.name'],
       ]
]);
?>
</div>
