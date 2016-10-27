<?php

namespace app\widgets;

use Yii;

/**
 * @author Anton Karamnov
 */
class CategoriesNavigation extends \yii\base\Widget
{
    public function run()
    {
        $categoriesList = Yii::$app->db->createCommand('
            SELECT * FROM categories ORDER BY name
        ')->queryAll();
        
        return $this->render('categories_navigation', [
            'categoriesList' => $categoriesList,
        ]);
    }
}

