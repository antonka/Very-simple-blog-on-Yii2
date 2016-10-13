<?php

namespace app\actions;

use app\components\PostLoaderFactory;

/**
 * @author Anton Karamnov
 */
class LoadPost extends \yii\base\Action
{
    public function run()
    {   
        $postLoader = PostLoaderFactory::build();
        
        if ($postLoader->load()) {
            $this->controller->redirect([
                '/public/post', 'id' => $postLoader->getModel()->id 
            ]);
        }
        
        return $this->controller->render('load_post', [
            'fileModel' => $postLoader->getfileLoader()->getFileModel()
        ]);
    }
}