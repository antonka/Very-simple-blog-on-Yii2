<?php

use yii\helpers\Html;
use yii\helpers\Markdown;
use app\components\PostHelper;

$content = empty($model->cutted_content) ? $model->content : $model->cutted_content;

?>

<div class="post-list-item">
    <div><?= Markdown::process($content); ?></div>
    <div class="post-list-item__descr">
        <span>Created at <?= Html::encode($model->created_at) ?></span>
        <span>/</span>
        <span>
            <?= Html::a('Read more', PostHelper::createPostUrl($model->id)); ?>
        </span>
    </div>
</div>