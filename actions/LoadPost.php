<?php

namespace app\actions;

use Yii;
use app\helpers\PostLoader;
use app\models\PostFileForm;

/**
 * @author Anton Karamnov
 */
class LoadPost extends \yii\base\Action
{
    public function run()
    {
        $postLoader = new PostLoader(new PostFileForm);
        
        // \app\helpers\FileLoader::loadFile();
        
        return $this->controller->render('load_post');
    }
}