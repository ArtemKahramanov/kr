<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Oborudovanie */

$this->title = 'Update Oborudovanie: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Oborudovanies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="oborudovanie-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
