<?php

namespace blog\category\widgets;

use Yii;
use blog\post\Finder as PostFinder; 


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
        $currentPostBoundWithCategories = [];
        if (Yii::$app->controller->action->id == 'post'
            && !Yii::$app->user->isGuest
        ) {
            $canSetRelation = true;
            $currentPostBoundWithCategories = array_map(function($rowData) {
                return $rowData['id'];
            }, PostFinder::findBoundCategories($postId));
        }
        
        return $this->render('categories_list', [
            'categoriesList' => $categoriesList,
            'categoryModel' => new \blog\category\models\Category(),
            'canManageCategories' => !Yii::$app->user->isGuest,
            'canSetRelation' => $canSetRelation,
            'currentPostBoundWithCategories' => $currentPostBoundWithCategories,
            'postId' => $postId,
        ]);
    }
}

