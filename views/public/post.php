<?php

use yii\helpers\Html;

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-about">
    <h1><?= Html::encode($title) ?></h1>
    <p><i><?= Html::encode($created_at) ?></i></p>
    <p><?= Html::encode($content) ?></p>
</div>