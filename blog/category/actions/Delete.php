<?php

namespace blog\category\actions;

use blog\post\helpers\PostUrl;

/**
 * @author Anton Karamnov
 */
class Delete extends \blog\base\Action
{
    /**
     * @return \yii\web\Response
     */
    public function run() 
    {
        \blog\category\Finder::findByHttpRequest()->delete();
        return $this->redirect(PostUrl::showList());
    }
}