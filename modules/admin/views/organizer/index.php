<style>
    .retired {
        color: #ff0e29;
    }
</style>
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrganizerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$buttons = ['class' => 'yii\grid\ActionColumn',
    'template' => '{view} {update} {dismissal}',

    'buttons' => [
        'dismissal' => function ($url, $model, $key) {
            if($model->date_dismissal === null) {
                $title = \Yii::t('yii', 'Уволен');
                $class = 'dismissal';
                $options = [
                    'title' => $title,
                    'aria-label' => $title,
                    'data-pjax' => '0',
                    'class' => $class,
                    'data' => [
                        'confirm' => 'Вы уверены что сотрудник уволен?',
                        'method' => 'post',
                    ],
                ];
                $url = Url::to(['organizer/dismissal', 'id' => $model->id]);
                $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-remove"]);
                return Html::a($icon, $url, $options);
            }
        },
    ],
];

$this->title = 'Организатор';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить организатора', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            $buttons,
        ],
        'rowOptions' => function ($model) {
            if ($model->date_dismissal !== null) {
                return ['class' => 'retired'];
            }
        }
    ]); ?>
</div>
