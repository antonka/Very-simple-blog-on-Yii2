<?php

namespace app\actions;

use app\components\CategoryFinder;
use Yii;

/**
 * @author Anton Karamnov
 */
class EditCategory extends \yii\base\Action
{
    public function run()
    {
        $categoryModel = CategoryFinder::findByHttpRequest();
        if ($categoryModel->load(Yii::$app->request->post())
            && $categoryModel->save()
        ) {
            Yii::$app->session->setFlash('success', 'Category was updated');
        }
        return $this->controller->render('edit_category', [
            'categoryModel' => $categoryModel,
        ]);
    }
}

