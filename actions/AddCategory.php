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
            $this->respondSuccess();
        }
        return $this->controller->render('add_category', [
            'categoryModel' => $categoryModel,
        ]);
    }
    
    protected function respondSuccess()
    {
        if (Yii::$app->request->isPjax) {
            Yii::$app->session->setFlash('success', 'Category was added');
            return $this->controller->renderPartial('_category_form', [
                'categoryModel' => new Category(),
            ]);
        }
        
        $this->controller->goHome();
        
    }
}