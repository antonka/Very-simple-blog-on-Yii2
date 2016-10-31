<?php

namespace app\actions;

use app\components\PostHelper;
use app\components\CategoryFinder;

/**
 * @author Anton Karamnov
 */
class DeleteCategory extends \yii\base\Action
{
    public function run() 
    {
        CategoryFinder::findByHttpRequest()->delete();
        PostHelper::redirectToPostListPage();
    }
}