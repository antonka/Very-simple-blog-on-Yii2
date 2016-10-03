<?php

use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = 'List of Posts';
$this->params['breadcrumbs'][] = $this->title;

?>

<style>
    .post-list-item {}
    .post-list-item__descr {
        color: gray;
        font-style: italic;
    }
</style> 

<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <div>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_post_list_item',
        ]) ?>
    </div>
</div>