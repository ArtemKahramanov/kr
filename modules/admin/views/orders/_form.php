<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use app\models\Organizer;
use app\models\Provider;
/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'organizer_id')->dropDownList(ArrayHelper::map(Organizer::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'provider_id')->dropDownList(ArrayHelper::map(Provider::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'price_one')->textInput() ?>

    <?= $form->field($model, 'kol')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
