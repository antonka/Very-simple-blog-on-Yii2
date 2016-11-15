<?php

use yii\helpers\Html;
use yii\helpers\Markdown;
use blog\post\Helper;

$this->title = 'Load post';
$this->params['breadcrumbs'][] = [
    'label' => $postModel->title, 
    'url' => Helper::createPostUrl($postModel->id),
];
$this->params['breadcrumbs'][] = 'Reload';

?>
<div class="site-about">
    <h4>Load markdown file to update this post</h4>
    <div>
        <?= $this->render('_form', [
            'fileModel' => $fileModel,
            'postModel' => $postModel,
        ]); ?>
    </div>
    <div style="margin-top: 30px;">
        <p><i><?= Html::encode($postModel->created_at) ?></i></p>
        <div><?= Markdown::process($postModel->content); ?></div> 
    </div>
</div>

