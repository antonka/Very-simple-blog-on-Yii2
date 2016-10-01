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
        $fileLoader = \app\helpers\MarkDownFileLoaderFactory::build();
        if ($fileLoader->loadFile()) {
            echo $fileLoader->getFileContent();
            exit;
        }
        
        return $this->controller->render('load_post', [
            'fileModel' => $fileLoader->getFileModel()
        ]);
    }
}