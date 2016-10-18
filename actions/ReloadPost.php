<?php

namespace app\actions;

use Yii;
use app\components\PostLoaderFactory;
use app\components\PostHelper;

/**
 * @author Anton Karamnov
 */
class ReloadPost extends \yii\base\Action
{
    public function run()
    {
        $postLoader = PostLoaderFactory::buildWithFoundPostModelByHttpRequest();
        
        if ($postLoader->load()) {
            PostHelper::redirectToPostPage($postLoader->getModel()->id);
        }
        
        return $this->controller->render('reload_post', [
            'fileModel' => $postLoader->getFileLoader()->getFileModel(),
            'postModel' => $postLoader->getModel(),
        ]);
    }
}

