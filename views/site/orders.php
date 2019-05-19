<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use \yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\web\JsExpression;

$url = \yii\helpers\Url::to(['catalog']);

$this->title = 'Заказ борудования';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

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

    <?= $form->field($model, 'kol')->textInput(['autofocus' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
