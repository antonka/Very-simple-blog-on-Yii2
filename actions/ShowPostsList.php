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
        return $this->controller->render('post_list.php', [
            'postsListActiveDataProvider' => PostHelper::getPostsListActiveDataProvider()
        ]);
    }
}
