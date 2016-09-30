<?php

namespace app\actions;

use Yii;

/**
 * @author Anton Karamnov
 */
class LoadPost extends \yii\base\Action
{
    public function run()
    {
        return $this->controller->render('load_post');
    }
}