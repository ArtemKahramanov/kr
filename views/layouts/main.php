<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Menu;
use app\modules\menu\models\menu as MenuModel;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
  <nav class="navbar">
      <div class="container navbar__content">
          <a href="#"><img src="/img/logo.jpg" class="logo" alt=""></a>
          <button class="btn btn--menu">
            <span class="line1"></span>
            <span class="line2"></span>
            <span class="line3"></span>
          </button>
          <?php
          $items = MenuModel::getMenu();

          echo Menu::widget([
              'items' => $items,
              'options' => [
                  'class' => 'menu'
              ],
              'submenuTemplate' => "<ul class='drop-menu'>\n{items}\n</ul>\n",
          ]); ?>
      </div>
  </nav>

<div class="container">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?= $content ?>
</div>
</div>
<footer class="footer">
    <div class="container">
        <p class="pull-left">Выполнил студент Группы ИС 15-2 Кахраманов Артём </p>
        <p class="pull-right">&copy; Курсовая работа <?= date('Y')?> </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
