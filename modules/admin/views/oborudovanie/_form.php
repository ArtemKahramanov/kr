<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use \yii\helpers\ArrayHelper;
use app\models\Organizer;
use app\models\Provider;
use app\models\Stock;

/* @var $this yii\web\View */
/* @var $model app\models\EquipmentStock */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipment-stock-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'organizer_id')->dropDownList(ArrayHelper::map(Organizer::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'retired')->dropDownList(ArrayHelper::map($model::$retired, 'id', 'statys')) ?>

    <?= $form->field($model, 'provider_id')->dropDownList(ArrayHelper::map(Provider::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'date_purchase')->widget(DatePicker::className(), [
        'attribute' => 'from_date',
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',

    ]) ?>

    <?= $form->field($model, 'life')->textInput() ?>

<!--    --><?//= $form->field($model, 'data_end')->textInput() ?>

<!--    --><?//= $form->field($model, 'kol')->textInput() ?>

    <?= $form->field($model, 'stock_id')->dropDownList(ArrayHelper::map(Stock::find()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
