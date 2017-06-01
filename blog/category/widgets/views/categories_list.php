<?php

use yii\bootstrap\Html;
use blog\category\helpers\CategoryUrl;

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
                    blog\post\actions\ShowListByCategory::url($categoryRowData['slug'])
                ); 
                
                if ($canManageCategories) {
                    echo Html::a(
                        '<span class="glyphicon glyphicon-pencil"></span>', 
                        CategoryUrl::edit($categoryRowData['id'])
                    );
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

