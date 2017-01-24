<?php

namespace blog\post\actions;

use blog\post\models\Post;
use blog\post\helpers\PostUrl;

/**
 * @author Anton Karamnov
 */
class Delete extends \blog\base\Action
{
    /**
     * @return \yii\web\Responce
     */
    public function run()
    {
        Post::findByUrlQueryParam('post_id')->delete();
        return $this->redirect(PostUrl::showList());
    }
}
