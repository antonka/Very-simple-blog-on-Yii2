<?php

namespace app\actions;

use Yii;
use app\helpers\PostLoader;
use app\models\PostFile;

/**
 * @author Anton Karamnov
 */
class LoadPost extends \yii\base\Action
{
    public function run()
    {
        $postFile = new PostFile();
        $postLoader = new PostLoader($postFile);
        
        return $this->controller->render('load_post', [
            'postFile' => $postFile
        ]);
    }
}