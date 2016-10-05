<?php

use yii\helpers\Html;
use yii\helpers\Markdown;

$this->title = 'Load post';
$this->params['breadcrumbs'][] = $postModel->title;

?>
<div class="site-about">
    <h4>Load markdown file to update this post</h4>
    <div>
        <?= $this->render('_load_post_form', [
            'fileModel' => $fileModel,
        ]); ?>
    </div>
    <div style="margin-top: 30px;">
        <p><i><?= Html::encode($postModel->created_at) ?></i></p>
        <div><?= Markdown::process($postModel->content); ?></div> 
    </div>
</div>

