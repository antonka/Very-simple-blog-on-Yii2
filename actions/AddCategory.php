<?php

namespace app\actions;

use Yii;
use \app\models\Category;

/**
 * @author Anton Karamnov
 */
class AddCategory extends \yii\base\Action
{
    public function run()
    {
        $categoryModel = new Category();
        if ($categoryModel->load(Yii::$app->request->post()) 
            && $categoryModel->save()
        ) {
            echo 'New category was created';
            exit;
        }
        return $this->controller->render('add_category', [
            'categoryModel' => $categoryModel,
        ]);
    }
}