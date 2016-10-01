<?php

namespace app\actions;

use Yii;
use app\helpers\PostFactory;

/**
 * @author Anton Karamnov
 */
class LoadPost extends \yii\base\Action
{
    public function run()
    {   
        $post = PostFactory::build();
        if ($post->load()) {
            $this->controller->redirect(['/public']);
        }
        
        return $this->controller->render('load_post', [
            'fileModel' => $post->getfileLoader()->getFileModel()
        ]);
    }
}