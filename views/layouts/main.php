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
    <div class="container footer__row">
        <section class="soc">
          <a href="https://vk.com/club3936162" target="_blank" class="soc__item"><img src="/img/vk.jpg" class="soc__img" alt="Соц Кнопка"> </a>
          <a href="https://ru-ru.facebook.com/profkomlebgok17/" target="_blank" class="soc__item"><img src="/img/fb.jpg" class="soc__img" alt="Соц Кнопка"> </a>
          <a href="https://ok.ru/lebedinskiygok" target="_blank" class="soc__item"><img src="/img/ok.png" class="soc__img" alt="Соц Кнопка"> </a>
        </section>
        <p class="pull-right">Проект создан для предприятия <a href="http://www.metalloinvest.com/business/mining-segment/lgok/" target="_blank"> ЛГОК </a> &copy; <?= date('Y')?> </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
