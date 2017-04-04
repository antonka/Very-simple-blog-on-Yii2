<?php

namespace blog\base\traits;

use Yii;

/**
 * @author Anton Karamnov
 */
trait AuthenticatedAccess
{
    /**
     * @return \yii\filters\AccessControl
     */
    public function getAccessControllBehavior()
    {
        return Yii::createObject([
            'class' => \yii\filters\AccessControl::className(),
            'only' => [$this->id],
            'rules' => [
                ['allow' => true, 'roles' => ['@']],
            ],
        ]);
    }
}
