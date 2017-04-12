<?php

use yii\helpers\Html;
use blog\comment\widgets\Comment;
use blog\post\helpers\PostUrl;

$this->title = $post->title;
$this->params['breadcrumbs'] = [
    [
        'label' => $category['name'], 
        'url' => PostUrl::showListByCategory($category['slug'])
    ],
    $this->title,
];
?>

<?= \blog\post\widgets\Toolbar::widget(['postId' => $post->id]); ?>

<div class="site-about"> 
    <p><i><?= $post->created_at ?></i></p>
    <h1><?= $post->title ?></h1>
    <div><?= $post->content ?></div>
</div>

<?= Comment::widget(['postId' => $post->id]) ?>

