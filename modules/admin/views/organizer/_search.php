<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrganizerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organizer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'date_dismissal')->checkbox([
        'template' => '<div class="col-md-6">{input}{label}</div><div class="col-md-6">{error}</div>'
    ])?>


    <div class="form-group">
        <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
