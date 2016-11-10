<?php

namespace app\actions;

use Yii;
use app\components\PostHelper;

/**
 * @author Anton Karamnov
 */
class ShowPostsList extends \yii\base\Action
{
    public function run()
    {
        return $this->controller->render('/posts_list/list', [
            'postsListActiveDataProvider' => PostHelper::getPostsListActiveDataProvider()
        ]);
    }
}
