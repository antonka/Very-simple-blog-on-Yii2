<?php

namespace blog\category\actions;

use Yii;
use \blog\category\models\Category as Category;
/**
 * @author Anton Karamnov
 */
class Add extends \blog\base\Action
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
        return $this->render('add', [
            'categoryModel' => $categoryModel,
        ]);
    }
}