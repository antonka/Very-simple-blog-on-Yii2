<?php

use yii\helpers\Html;
use yii\helpers\Markdown;
use blog\post\helpers\PostUrl;
use Yii;

$this->title = 'Load post';
$this->params['breadcrumbs'][] = [
    'label' => $postModel->title, 
    'url' => PostUrl::show($postModel),
];
$this->params['breadcrumbs'][] = Yii::t('post', 'Reload');

?>
<div class="site-about">
    <h4><?= Yii::t('post', 'Load markdown file to update this post'); ?></h4>
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

