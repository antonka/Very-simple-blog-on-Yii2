<?php

use yii\helpers\Html;
use yii\helpers\Markdown;

$linkToPost = Html::a('Read more', ['/public/post', 'id' => $model->id]);

?>

<div class="post-list-item">
    <div><?= Markdown::process($model->content); ?></div>
    <div class="post-list-item__descr">
        <span>Created at <?= Html::encode($model->created_at) ?></span>
        <span>/</span>
        <span><?= $linkToPost ?></span>
    </div>
</div>