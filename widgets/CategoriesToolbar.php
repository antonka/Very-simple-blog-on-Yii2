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
        
        return $this->render('categories_toolbar', [
            'categoriesList' => $categoriesList,
            'categoryModel' => $this->categoryModel,
        ]);
    }
}

