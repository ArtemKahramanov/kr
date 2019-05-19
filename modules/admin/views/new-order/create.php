<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NewOrder */

$this->title = 'Create New Order';
$this->params['breadcrumbs'][] = ['label' => 'New Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
