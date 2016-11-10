<?php

use yii\helpers\Html;

$this->title = 'Load post';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div>
        <?= $this->render('_load_post_form', [
            'fileModel' => $fileModel,
        ]); ?>
    </div>
</div>