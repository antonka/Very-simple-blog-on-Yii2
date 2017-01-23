<?php

namespace blog\post\actions;

use blog\post\models\Post;

/**
 * @author Anton Karamnov
 */
class Show extends \blog\base\Action
{
    public function run() 
    {
        return $this->render('show', [
            'post' => Post::findByUrlQueryParam('post_id'),
        ]);
    }
}
