<?php

namespace blog\user\helpers;

/**
 * @author Anton Karamnov
 */
class UserUrl extends \yii\helpers\Url
{
    /**
     * @return string
     */
    public static function logout()
    {
        return self::toRoute(['user/logout']);
    }
}

