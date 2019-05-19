<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use \yii\bootstrap\ActiveForm;

$this->title = 'Заявка на списание';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($claim, 'location_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Location::find()->all(), 'id', 'name')) ?>

    <?= $form->field($claim, 'cabinet_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Cabinet::find()->all(), 'id', 'name')) ?>

    <?= $form->field($claim, 'number')->textInput(['autofocus' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
