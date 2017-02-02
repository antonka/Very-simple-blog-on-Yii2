<?php
use \yii\bootstrap\Html;
use Yii;
?>

<style>
    .post-toolbar-link {
        margin-right: 20px;
    }
</style>

<div class="panel panel-default">
    <div class="panel-heading"><?= Yii::t('post', 'Post toolbar'); ?></div>
    <div class="panel-body">
       <?php
       foreach ($links as $link) {
           echo Html::a($link[0], $link[1], ['class'=>'post-toolbar-link']);
       }
       ?>
    </div>
</div>





