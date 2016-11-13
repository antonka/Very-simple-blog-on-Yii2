<?php

namespace blog\post\actions;

use blog\post\LoaderFactory;
use blog\post\Helper;

/**
 * @author Anton Karamnov
 */
class Load extends \yii\base\Action
{
    public function run()
    {   
        $postLoader = LoaderFactory::buildWithNewPostModel();
        
        if ($postLoader->load()) {
            Helper::redirectToPostPage($postLoader->getModel()->id);
        }
        
        return $this->controller->render('@blog/post/views/load', [
            'fileModel' => $postLoader->getFileLoader()->getFileModel()
        ]);
    }
}