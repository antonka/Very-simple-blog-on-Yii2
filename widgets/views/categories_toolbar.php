<?php

use yii\bootstrap\Html;
use yii\helpers\Url;

if ($canSetRelation) {
    echo Html::beginForm([
        '/manage/savePostCategoriesRelation', 
        'post_id' => $postId
    ]);
}

?>

<div style="margin-bottom: 50px;">
    <div style="font-size: 16px;margin-bottom: 10px;">Categories</div>
    <div>
        <?php foreach ($categoriesList as $categoryRow): ?>
            <div>
                <?php
                
                if ($canSetRelation) {
                    echo Html::checkbox(
                        'categoryIds[' . $categoryRow['id'] . ']', 
                        in_array(
                            $categoryRow['id'], 
                            $currentPostBoundWithCategories    
                        )
                    );
                }
                
                echo Html::a($categoryRow['name'], '#'); 
                
                if ($canManageCategories) {
                    echo Html::a(
                        '<span class="glyphicon glyphicon-pencil"></span>', 
                        [
                            '/manage/editCategory', 
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
                } 
                ?>
            </div>
        
        <?php endforeach; ?>
    </div>
</div>

<?php 
if ($canSetRelation) {
    echo Html::submitButton('Save', ['class' => 'btn btn-primary']);
    echo Html::endForm();
}