<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EquipmentStockSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipment-stock-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'organizer_id') ?>

    <?= $form->field($model, 'date_purchase') ?>

    <?= $form->field($model, 'life') ?>

    <?php // echo $form->field($model, 'data_end') ?>

    <?php // echo $form->field($model, 'kol') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
