<?php

use yii\bootstrap\Html;
use blog\category\helpers\CategoryUrl;
use blog\post\helpers\PostUrl;

?>

<div style="margin-bottom: 50px;">
    
    <div style="font-size: 16px;margin-bottom: 10px;">
        <?= Yii::t('category', 'Categories') ?>
    </div>
    
    <div style="margin-bottom: 10px;">
        <?php foreach ($categoriesList as $categoryRowData): ?>
            <div>
                <?php
                  
                echo Html::a(
                    $categoryRowData['name'], 
                    PostUrl::showListByCategory($categoryRowData['slug'])
                ); 
                
                if ($canDeleteCategory) {
                    echo Html::a(
                        '<span class="glyphicon glyphicon-trash"></span>', 
                        CategoryUrl::delete($categoryRowData['id'])
                    );
                } 
                ?>
            </div>
        
        <?php endforeach; ?>
    </div>
    
</div>

