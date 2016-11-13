<?php

namespace blog\post\actions;

/**
 * @author Anton Karamnov
 */
class Show extends \yii\base\Action
{
    public function run() 
    {
        return $this->controller->render('@blog/post/views/show', [
            'post' => \blog\post\Finder::findByHttpRequest()
        ]);
    }
}

