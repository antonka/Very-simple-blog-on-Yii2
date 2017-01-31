<?php

namespace blog\category\actions;

use blog\post\helpers\PostUrl;
use blog\category\models\Category;

/**
 * @author Anton Karamnov
 */
class Delete extends \blog\base\Action
{
    /**
     * @return \yii\web\Response
     */
    public function run() 
    {
        Category::findByUrlQueryParam('category_id')->delete();
        return $this->redirect(PostUrl::showList());
    }
}