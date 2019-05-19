<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\data\ActiveDataProvider;

$this->title = 'Оборудование в наличии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Чтобы проверить наличие оборудования, заолните форму</p>
    <div class="row">
        <div class="col-lg-5">

            <?php $form = \yii\widgets\ActiveForm::begin(); ?>

            <?= $form->field($model, 'location')->dropDownList(
                \yii\helpers\ArrayHelper::map(\app\models\Location::find()->all(), 'id', 'name'),
                [
                    'prompt' => 'Выбор Отделения',
                ]) ?>


            <?= $form->field($model, 'cabinet_id') ?>

            <div class="form-group">
                <?= Html::submitButton('Вперед', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php \yii\widgets\ActiveForm::end(); ?>

        </div>
    </div>
</div>
