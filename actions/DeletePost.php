<?php

namespace app\actions;

use app\components\PostHelper;
use app\components\PostFinder;

/**
 * @author Anton Karamnov
 */
class DeletePost extends \yii\base\Action
{
    public function run()
    {
        PostFinder::findByHttpRequest()->delete();
        PostHelper::redirectToPostListPage();
    }
}
