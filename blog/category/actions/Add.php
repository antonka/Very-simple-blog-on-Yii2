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