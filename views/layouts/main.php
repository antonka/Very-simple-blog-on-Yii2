<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use blog\post\helpers\PostUrl;


$topNavItems = [];
if (!Yii::$app->user->isGuest) {
    $topNavItems[] = ['label' => 'Load post', 'url' => PostUrl::load()];
    $topNavItems[] = ['label' => 'Add category', 'url' => ['/blog/addCategory']];
    $topNavItems[] = ['label' => 'Log out', 'url' => ['/blog/logout']];
}

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Simple Blog',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-inverse navbar-fixed-top',],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $topNavItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) 
                ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
        <?= blog\base\widgets\AlertBlock::widget() ?> 
        
        <div class="row">
            <div class="col-sm-8">
                <?= $content ?>
            </div>
            <div class="col-sm-3">
                <?= \blog\category\widgets\CategoriesList::widget() ?>
            </div>
        </div>
    </div>
    
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">
            &copy; <?= Yii::$app->params['username'] . ' ' . date('Y') ?>
        </p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
