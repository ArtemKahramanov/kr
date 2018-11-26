<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Oborudovanie */

$this->title = 'Create Oborudovanie';
$this->params['breadcrumbs'][] = ['label' => 'Oborudovanies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oborudovanie-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
