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
            Yii::$app->session->setFlash('success', 
                $categoryModel->name . ' category was added'
            );
            return $this->controller->goHome();
        }
        return $this->controller->render('/category/add_category', [
            'categoryModel' => $categoryModel,
        ]);
    }
}