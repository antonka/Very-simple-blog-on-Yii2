<?php

namespace blog\category\actions;

use Yii;
use blog\category\models\Category;

/**
 * @author Anton Karamnov
 */
class Edit extends \blog\base\Action
{
    public function run()
    {
        $category = Category::findByUrlQueryParam('category_id');
        if ($category->load(Yii::$app->request->post())
            && $category->save()
        ) {
            Yii::$app->session->setFlash('success', 
                Yii::t('category', 'Category was updated'));
            return $this->controller->refresh();
        }
        return $this->render('edit', [
            'categoryModel' => $category,
        ]);
    }
}

