<?php

namespace blog\post\actions; 

use blog\post\LoaderFactory;
use blog\post\helpers\PostUrl;

/**
 * @author Anton Karamnov
 */
class Reload extends \blog\base\Action
{
    /**
     * @return \yii\web\Response
     */
    public function run()
    {
        $loader = LoaderFactory::buildWithFoundPostModelByHttpRequest();
        
        if ($loader->load()) {
            return $this->redirect(PostUrl::show($loader->getModel()->id));
        }
        
        return $this->render('reload', [
            'fileModel' => $loader->getFileLoader()->getFileModel(),
            'postModel' => $loader->getModel(),
        ]);
    }
}

