<?php

namespace blog\post\actions; 

use blog\post\LoaderFactory;
use blog\post\Helper;

/**
 * @author Anton Karamnov
 */
class Reload extends \yii\base\Action
{
    public function run()
    {
        $postLoader = LoaderFactory::buildWithFoundPostModelByHttpRequest();
        
        if ($postLoader->load()) {
            Helper::redirectToPostPage($postLoader->getModel()->id);
        }
        
        return $this->controller->render('/post/reload_post', [
            'fileModel' => $postLoader->getFileLoader()->getFileModel(),
            'postModel' => $postLoader->getModel(),
        ]);
    }
}

