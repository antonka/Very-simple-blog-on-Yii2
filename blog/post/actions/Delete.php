<?php

namespace blog\post\actions;

use blog\post\models\Post;
use blog\post\Helper;

/**
 * @author Anton Karamnov
 */
class Delete extends \yii\base\Action
{
    public function run()
    {
        Post::findByUrlQueryParam('post_id')->delete();
        Helper::redirectToPostListPage();
    }
}
