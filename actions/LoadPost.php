<?php

namespace app\actions;

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
            $this->controller->redirect([
                '/public/post', 'id' => $post->getModel()->id 
            ]);
        }
        
        return $this->controller->render('load_post', [
            'fileModel' => $post->getfileLoader()->getFileModel()
        ]);
    }
}