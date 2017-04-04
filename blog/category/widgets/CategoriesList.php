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
        list($currentRoute) = Yii::$app->urlManager->parseRequest(
            Yii::$app->request);
        $canEditCategory = false;
        
        if (!Yii::$app->user->isGuest) {
            if ($currentRoute == 'post/show') {
                $post = Yii::$app->controller->action->getPost();
                $postBoundWithCategoryIds = $post->getBoundCategoryIds();
            }
            $canEditCategory = true;
        }
        
        return $this->render('categories_list', [
            'categoriesList' => $categoriesList,
            'postBoundWithCategoryIds' => $postBoundWithCategoryIds,
            'post' => $post,
            'canEditCategory' => $canEditCategory,
        ]);
    }
}

