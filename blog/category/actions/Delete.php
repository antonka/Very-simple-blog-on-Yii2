<?php

namespace blog\category\actions;

use Yii;
use blog\category\models\Category;
use blog\base\traits\AuthenticatedAccess;
use yii\helpers\Url;

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
        return $this->redirect(\blog\post\actions\ShowList::url());
    }
    
    /**
     * @param integer $categoryId
     * @return string
     */
    public static function url($categoryId)
    {
        return Url::toRoute(['category/delete', 'category_id' => $categoryId]);
    }
}