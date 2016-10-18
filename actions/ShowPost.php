<?php

namespace app\actions;

use Yii;
use app\components\PostFinder;

/**
 * @author Anton Karamnov
 */
class ShowPost extends \yii\base\Action
{
    public function run() 
    {
        return $this->controller->render('post', [
            'post' => PostFinder::findByHttpRequest(),
        ]);
    }
}

