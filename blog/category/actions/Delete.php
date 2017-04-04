<?php

namespace blog\category\actions;

use Yii;
use blog\post\helpers\PostUrl;
use blog\category\models\Category;
use blog\base\traits\AuthenticatedAccess;

/**
 * @author Anton Karamnov
 */
class Delete extends \blog\base\Action
{
    use AuthenticatedAccess;
    
    /**
     * @return \yii\web\Response
     */
    public function run() 
    {
        Category::findByUrlQueryParam('category_id')->delete();
        Yii::$app->session->setFlash('success', 
            Yii::t('category', 'This category was removed'));
        return $this->redirect(PostUrl::showList());
    }
}