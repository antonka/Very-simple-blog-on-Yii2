<?php

namespace blog\category\actions;

use Yii;

/**
 * @author Anton Karamnov
 */
class Edit extends \blog\base\Action
{
    public function run()
    {
        $categoryModel = \blog\category\Finder::findByHttpRequest();
        if ($categoryModel->load(Yii::$app->request->post())
            && $categoryModel->save()
        ) {
            Yii::$app->session->setFlash('success', 'Category was updated');
            return $this->controller->refresh();
        }
        return $this->render('edit', [
            'categoryModel' => $categoryModel,
        ]);
    }
}

