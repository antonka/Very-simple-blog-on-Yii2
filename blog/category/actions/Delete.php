<?php

namespace blog\category\actions;

use blog\post\Helper as PostHelper; 

/**
 * @author Anton Karamnov
 */
class Delete extends \yii\base\Action
{
    public function run() 
    {
        \blog\category\Finder::findByHttpRequest()->delete();
        PostHelper::redirectToPostListPage();
    }
}