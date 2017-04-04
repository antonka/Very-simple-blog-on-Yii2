<?php

namespace blog\category\actions;

use Yii;
use \blog\category\models\Category as Category;
use blog\base\traits\AuthenticatedAccess;

/**
 * @author Anton Karamnov
 */
class Add extends \blog\base\Action
{
    use AuthenticatedAccess;
    
    public function run()
    {
        $category = new Category();
        if ($category->load(Yii::$app->request->post()) 
            && $category->save()
        ) {
            Yii::$app->session->setFlash('success', 
                Yii::t('category', 'This category was added')
            );
            return $this->controller->goHome();
        }
        return $this->render('add', [
            'categoryModel' => $category,
        ]);
    }
}