<?php

use yii\helpers\Html;
use yii\helpers\Markdown;
use blog\post\helpers\PostUrl;

$content = empty($model->cutted_content) ? $model->content : $model->cutted_content;
$showPostUrl = PostUrl::show($model->id);
?>

<div class="post-list-item">
    <?= Html::a("<h2>{$model->title}</h2>", $showPostUrl, [
        'class' => 'post-list-item__title'
    ]); ?>
    <div class="post-list-item__cut">
        <?= Markdown::process($content); ?>
    </div>
    <div class="post-list-item__descr">
        <span>Created at <?= Html::encode($model->created_at) ?></span>
        <span>/</span>
        <span>
            <?= Html::a('Read more', $showPostUrl); ?>
        </span>
    </div>
</div>