<?php

namespace blog\category\widgets;

use Yii;
use blog\post\models\Post;

/**
 * @author Anton Karamnov
 */
class CategoriesList extends \yii\base\Widget
{    
    public function run()
    {
        $categoriesList = Yii::$app->db->createCommand('
            SELECT * FROM categories ORDER BY name
        ')->queryAll();
     
        $postBoundWithCategoryIds = [];
        $post = null;
                
        if (Yii::$app->controller->action->id == 'show'
            && !Yii::$app->user->isGuest
        ) {
            $post = Yii::$app->controller->action->getPost();
            $postBoundWithCategoryIds = $post->getBoundCategoryIds();
        }
        
        return $this->render('categories_list', [
            'categoriesList' => $categoriesList,
            'postBoundWithCategoryIds' => $postBoundWithCategoryIds,
            'post' => $post,
        ]);
    }
}

