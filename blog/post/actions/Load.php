<?php

namespace blog\post\actions;

use blog\post\LoaderFactory;
use blog\post\helpers\PostUrl;

/**
 * @author Anton Karamnov
 */
class Load extends \blog\base\Action
{
    /**
     * @return \yii\web\Responce
     */
    public function run()
    {   
        $loader = LoaderFactory::buildWithNewPostModel();
        
        if ($loader->load()) {
            return $this->redirect(PostUrl::show($loader->getModel()->id));
        }
        
        return $this->render('load', [
            'fileModel' => $loader->getFileLoader()->getFileModel(),
            'postModel' => $loader->getModel()
        ]);
    }
}