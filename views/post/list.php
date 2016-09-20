<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'List of Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Demo post', ['/post/', 'id'=>1]) ?>
    </p>
</div>