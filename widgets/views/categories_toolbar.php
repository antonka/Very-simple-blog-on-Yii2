<?php

use yii\bootstrap\Html;


if ($canSetRelation) {
    echo Html::beginForm();
    echo Html::hiddenInput('post_id', Yii::$app->request->get('post_id'));
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
                        'categories[' . $categoryRow['id'] . ']', false
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