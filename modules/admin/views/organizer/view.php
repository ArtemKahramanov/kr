<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Organizer */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Organizers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if($model->date_dismissal === null){ ?>
            <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Уволить', ['dismissal', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
//            'date_dismissal',
            ['attribute' => 'date_dismissal', 'label' => 'Дата увольнения'],

        ],
    ]) ?>

</div>
