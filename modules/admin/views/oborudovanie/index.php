<style>
    .retired {
        color: red;
    }
</style>
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OborudovanieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// Заполнение GridView
$column = [
    ['attribute' => 'catalog_oborudovania_id', 'label' => 'Категория', 'value' => 'catalogOborudovania.name'],
    'number',
    ['attribute' => 'cabinet_id', 'label' => 'Кабинет', 'value' => 'cabinet.name'],
];
$life = [
    ['attribute' => 'life', 'label' => 'Срок службы', 'value' => 'catalogOborudovania.life'],
];
$retired = [
    ['attribute' => 'retired', 'label' => 'Дата списания', 'value' => 'retired'],
];

$write_off = [
    'class' => \yii\grid\ActionColumn::class,

    'template' => '{write-off}',

    'buttons' => [
        'write-off' => function ($url, $model, $key) {
            $title = \Yii::t('yii', 'Списать');
            $options = [
                'title' => $title,
                'aria-label' => $title,
                'data-pjax' => '0',
            ];
            $url = Url::to(['oborudovanie/write-off', 'id' => $model->id]);
            $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-wrench"]);
            return Html::a($icon, $url, $options);
        },
    ],
];

// Варинанты отображения страницы, в зависимости от переданного  Get параметра
if ($searchModel->status == 'off') {
    array_splice($column, 2, 0, $retired);
    $this->title = 'Списанное борудование';
} else {
    array_splice($column, 3, 0, 'start_operation');
    array_splice($column, 5, 0, 'date_end');
    array_splice($column, 4, 0, $life);
    array_push($column, $write_off);
    $this->title = 'Оборудование в наличии';
}

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oborudovanie-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ($searchModel->status !== 'off') { ?>
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        <p>
            <?= Html::a('Добавить оборудование', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php } ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $column,
        // Выделить оборудование, срок службы которых подходит к концу
        'rowOptions' => function ($model, $key, $index, $grid) {
            if ((date('Y-m-d') >= $model->date_end) && $model->retired == null) {
                return ['class' => 'retired'];
            }
        }
    ]); ?>
</div>
