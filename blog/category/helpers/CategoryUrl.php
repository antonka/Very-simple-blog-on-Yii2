<?php

namespace blog\category\helpers;

/**
 * @author Anton Karamnov
 */
class CategoryUrl extends \yii\helpers\Url
{
    public static function add()
    {
        return self::toRoute(['category/add']);
    }
}

