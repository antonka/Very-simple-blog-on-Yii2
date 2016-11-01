<?php

use \yii\bootstrap\Html;
use yii\widgets\Pjax;

?>

<div style="margin-bottom: 50px;">
    <div style="font-size: 16px;margin-bottom: 10px;">Categories</div>
    <div>
        <?php foreach ($categoriesList as $categoryRow): ?>
            <div>
                <?= Html::a($categoryRow['name'], '#'); ?>
                <?php 
                if (!Yii::$app->user->isGuest) {
                    echo Html::a(
                        '<span class="glyphicon glyphicon-pencil"></span>', 
                        [
                            'manage/editCategory', 
                            'category_id' => $categoryRow['id'],
                        ]
                    ); 
                    echo Html::a(
                        '<span class="glyphicon glyphicon-trash"></span>', 
                        [
                            '/manage/deleteCategory', 
                            'category_id' => $categoryRow['id'],
                        ]
                    );
                } ?>
            </div>
        
        <?php endforeach; ?>
    </div>
</div>