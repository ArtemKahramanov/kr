<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WriteOffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки на списание';
$this->params['breadcrumbs'][] = $this->title;

$write_off = [
    'class' => \yii\grid\ActionColumn::class,

    'template' => '{write-off}',

    'buttons' => [
        'write-off' => function ($url, $model, $key) {
            $ob = \app\models\Oborudovanie::findOne($model->oborudovanie_id);
            if(empty($ob->retired)) {
                $title = \Yii::t('yii', 'Списать');
                $options = [
                    'title' => $title,
                    'aria-label' => $title,
                    'data-pjax' => '0',
                ];
                $url = \yii\helpers\Url::to(['oborudovanie/write-off', 'id' => $model->oborudovanie_id]);
                $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-wrench"]);
                return Html::a($icon, $url, $options);
            }
        },
    ],
];
?>
<div class="write-off-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'number',
            'cabinet_id',
            ['attribute' => 'location_id', 'label' => 'Отдел', 'value' => 'location.name'],
//            ['attribute' => 'organizer_id', 'label' => 'Организатор', 'value' => 'organizer.name'],
            'created_at',
            $write_off
        ],
    ]); ?>
</div>
