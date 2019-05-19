<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OborudovanieSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oborudovanie-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<!--    --><?//= $form->field($model, 'catalog_oborudovania_id') ?>

<!--    --><?//= $form->field($model, 'number') ?>

<!--    --><?//= $form->field($model, 'retired') ?>

<!--    --><?//= $form->field($model, 'cabinet_id') ?>

    <?= $form->field($model, 'retired')->checkbox([
        'template' => '<div class="col-md-1">{label}</div><div class="col-md-5">{input}</div><div class="col-md-6">{error}</div>'
    ])?>

    <div class="form-group">
        <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::resetButton('Очистить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
