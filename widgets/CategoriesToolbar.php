<?php

namespace app\widgets;

use Yii;
use app\components\PostFinder;


/**
 * @author Anton Karamnov
 */
class CategoriesToolbar extends \yii\base\Widget
{
    /**
     * @var ActiveRecord
     */
    public $categoryModel;
    
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
        
        return $this->render('categories_toolbar', [
            'categoriesList' => $categoriesList,
            'categoryModel' => $this->categoryModel,
            'canManageCategories' => !Yii::$app->user->isGuest,
            'canSetRelation' => $canSetRelation,
            'currentPostBoundWithCategories' => $currentPostBoundWithCategories,
            'postId' => $postId,
        ]);
    }
}

