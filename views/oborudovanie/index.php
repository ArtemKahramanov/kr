<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\data\ActiveDataProvider;

$this->title = 'Орудование в наличии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            ['attribute' => 'name', 'label'=>'Название'],
            ['attribute' => 'number', 'label'=>'Серийный номер'],
            ['attribute' => 'cabinet_id','label' => 'Кабинет', 'value'=>'cabinet.name'],
            ['attribute' => 'location_id','label' => 'Отделение', 'value'=>'location.name'],
            ['attribute' => 'catalog_oborudovania_id','label' => 'Каталог оборудования', 'value'=>'catalogOborudovania.name'],
        ]
    ]);
    ?>
</div>
