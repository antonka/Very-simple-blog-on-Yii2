<?php

namespace blog\user\actions;

use Yii;
use blog\base\traits\AuthenticatedAccess;

/**
 * @author Anton Karamnov
 */
class Logout extends \blog\base\Action
{
    use AuthenticatedAccess;
    
    public function run() 
    {
        Yii::$app->user->logout();
        return $this->controller->goHome();
    }
}

