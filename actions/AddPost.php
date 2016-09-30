<?php

namespace app\actions;

use Yii;

/**
 * @author Anton Karamnov
 */
class AddPost extends \yii\base\Action
{
    public function run()
    {
        return $this->controller->render('add_post');
    }
}