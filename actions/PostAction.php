<?php

namespace app\actions;

use Yii;

class PostAction extends \yii\base\Action
{
    public function run() 
    {
        return $this->controller->render('post');
    }
}

