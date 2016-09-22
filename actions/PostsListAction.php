<?php

namespace app\actions;

use Yii;

class PostsListAction extends \yii\base\Action
{
    public function run()
    {
        return $this->controller->render('post_list.php');
    }
}