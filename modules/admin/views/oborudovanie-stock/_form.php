<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\web\JsExpression;
$url = \yii\helpers\Url::to(['catalog']);
$url_cab = \yii\helpers\Url::to(['cabinet']);

/* @var $this yii\web\View */
/* @var $model app\models\Oborudovanie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oborudovanie-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'catalog_oborudovania_id')->widget(Select2::classname(), [
        'initValueText' => 'Выберите оборудование', // set the initial display text
        'options' => ['placeholder' => 'Поиск ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 3,
            'language' => [
                'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
            ],
            'ajax' => [
                'url' => $url,
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term}; }')
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('function(city) { return city.text; }'),
            'templateSelection' => new JsExpression('function (city) { return city.text; }'),
        ],
    ]);
    ?>
    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>


    <?php
    echo $form->field($model, 'cabinet_id')->widget(Select2::classname(), [
        'initValueText' => 'Выберите кабинет', // set the initial display text
        'options' => ['placeholder' => 'Поиск ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 0,
            'language' => [
                'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
            ],
            'ajax' => [
                'url' => $url_cab,
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term}; }')
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('function(city) { return city.text; }'),
            'templateSelection' => new JsExpression('function (city) { return city.text; }'),
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
