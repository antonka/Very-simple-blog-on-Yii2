<?php

namespace app\widgets;

use Yii;

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
     
        $canSetRelation = false;
        if (Yii::$app->controller->action->id == 'post'
            && !Yii::$app->user->isGuest
        ) {
            $canSetRelation = true;
        }
        // echo Yii::$app->controller->action->id; exit;
        
        return $this->render('categories_toolbar', [
            'categoriesList' => $categoriesList,
            'categoryModel' => $this->categoryModel,
            'canManageCategories' => !Yii::$app->user->isGuest,
            'canSetRelation' => $canSetRelation,
        ]);
    }
}

