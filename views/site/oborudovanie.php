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
            ['attribute' => 'number', 'label'=>'Название'],
            ['attribute' => 'cabinet_id','label' => 'Каталог оборудования', 'value'=>'cabinet.name'],
            ['attribute' => 'catalog_oborudovania_id','label' => 'Каталог оборудования', 'value'=>'catalogOborudovania.name'],
        ]
    ]);
    ?>
</div>
