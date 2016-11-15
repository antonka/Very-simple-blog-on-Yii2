<?php

namespace blog\post\actions;

use blog\post\LoaderFactory;
use blog\post\Helper;

/**
 * @author Anton Karamnov
 */
class Load extends \blog\base\Action
{
    public function run()
    {   
        $loader = LoaderFactory::buildWithNewPostModel();
        
        if ($loader->load()) {
            Helper::redirectToPostPage($loader->getModel()->id);
        }
        
        return $this->render('load', [
            'fileModel' => $loader->getFileLoader()->getFileModel(),
            'postModel' => $loader->getModel()
        ]);
    }
}