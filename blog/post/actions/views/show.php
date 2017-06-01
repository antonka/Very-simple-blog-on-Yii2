<?php

use yii\helpers\Html;
use blog\comment\widgets\Comment;
use blog\post\helpers\PostUrl;

$this->title = $post->title;
$this->params['breadcrumbs'] = [
    [
        'label' => $category['name'], 
        'url' => blog\post\actions\ShowListByCategory::url($category['slug']),
    ],
    $this->title,
];
if ($post->description) {
    $this->registerMetaTag([
        'name' => 'description',
        'content' => $post->description,
    ]);
}
?>

<?= \blog\post\widgets\Toolbar::widget(['post' => $post]); ?>

<div class="site-about"> 
    <p><i><?= $post->created_at ?></i></p>
    <h1><?= $post->title ?></h1>
    <div><?= $post->content ?></div>
</div>

<?= Comment::widget(['postId' => $post->id]) ?>

