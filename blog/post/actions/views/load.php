<?php

use yii\helpers\Html;
use Yii;

$this->title = Yii::t('post', 'Load post');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div>
        <?= $this->render('_form', [
            'uploadPostForm' => $uploadPostForm,
        ]); ?>
    </div>
</div>