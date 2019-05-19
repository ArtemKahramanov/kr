<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Oborudovanie */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Oborudovanies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oborudovanie-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'catalog_oborudovania_id',
            'number',
            'retired',
            'cabinet_id',
        ],
    ]) ?>

</div>
