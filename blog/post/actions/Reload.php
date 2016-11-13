<?php

namespace blog\post\actions; 

use blog\post\LoaderFactory;
use blog\post\Helper;

/**
 * @author Anton Karamnov
 */
class Reload extends \blog\base\Action
{
    public function run()
    {
        $loader = LoaderFactory::buildWithFoundPostModelByHttpRequest();
        
        if ($loader->load()) {
            Helper::redirectToPostPage($loader->getModel()->id);
        }
        
        return $this->render('reload', [
            'fileModel' => $loader->getFileLoader()->getFileModel(),
            'postModel' => $loader->getModel(),
        ]);
    }
}

