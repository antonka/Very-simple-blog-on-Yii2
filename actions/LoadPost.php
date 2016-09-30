<?php

namespace app\actions;

use Yii;

/**
 * @author Anton Karamnov
 */
class LoadPost extends \yii\base\Action
{
    public function run()
    {
        $postLoader = \app\helpers\PostLoaderFactory::build();
        
        return $this->controller->render('load_post', [
            'postFile' => $postLoader->getPostFileModel()
        ]);
    }
}