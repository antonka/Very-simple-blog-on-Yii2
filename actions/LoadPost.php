<?php

namespace app\actions;

use app\components\PostLoaderFactory;
use app\components\PostHelper;

/**
 * @author Anton Karamnov
 */
class LoadPost extends \yii\base\Action
{
    public function run()
    {   
        $postLoader = PostLoaderFactory::buildWithNewPostModel();
        
        if ($postLoader->load()) {
            PostHelper::redirectToPostPage($postLoader->getModel()->id);
        }
        
        return $this->controller->render('load_post', [
            'fileModel' => $postLoader->getFileLoader()->getFileModel()
        ]);
    }
}