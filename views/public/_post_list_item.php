<?php

use yii\helpers\Html;
use yii\helpers\Markdown;

$content = empty($model->cutted_content) ? $model->content : $model->cutted_content;

?>

<div class="post-list-item">
    <div><?= Markdown::process($content); ?></div>
    <div class="post-list-item__descr">
        <span>Created at <?= Html::encode($model->created_at) ?></span>
        <span>/</span>
        <span>
            <?= Html::a('Read more', ['/public/post', 'id' => $model->id]); ?>
        </span>
        <span>/</span>
        <span>
            <?= Html::a('Reload post', [
                'manage/reloadPost', 'id' => $model->id
            ]); ?>
        </span>
    </div>
</div>