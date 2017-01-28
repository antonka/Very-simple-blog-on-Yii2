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
     
        $postId = Yii::$app->request->get('post_id');
        $canSetRelation = false;
        $postBoundWithCategoryIds = [];
        
        if (Yii::$app->controller->action->id == 'show'
            && !Yii::$app->user->isGuest
        ) {
            $canSetRelation = true;
            $postBoundWithCategoryIds = Post::getBoundCategoryIdsByPk($postId);
        }
        
        return $this->render('categories_list', [
            'categoriesList' => $categoriesList,
            'categoryModel' => new \blog\category\models\Category(),
            'canManageCategories' => !Yii::$app->user->isGuest,
            'canSetRelation' => $canSetRelation,
            'postBoundWithCategoryIds' => $postBoundWithCategoryIds,
            'postId' => $postId,
        ]);
    }
}

