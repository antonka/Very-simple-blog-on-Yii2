<?php

namespace blog\user\actions;

use Yii;

/**
 * @author Anton Karamnov
 */
class Logout extends \blog\base\Action
{
    public function run() 
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}

