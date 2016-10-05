<?php

namespace app\actions;

use Yii;
use app\helpers\PostLoaderFactory;

/**
 * @author Anton Karamnov
 */
class ReloadPost extends \yii\base\Action
{
    public function run()
    {
        $postId = Yii::$app->request->get('id');
        $postLoader = PostLoaderFactory::buildExistingPost([$postId]);
        
        if ($postLoader->load()) {
            $this->controller->redirect([
                '/public/post', 'id' => $postLoader->getModel()->id
            ]);
        }
        
        return $this->controller->render('reload_post', [
            'fileModel' => $postLoader->getFileLoader()->getFileModel(),
            'postModel' => $postLoader->getModel(),
        ]);
    }
}

