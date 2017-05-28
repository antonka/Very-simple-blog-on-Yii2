<?php

namespace blog\post\helpers;

use blog\post\models\Post;

/**
 * @author Anton Karamnov
 */
class PostUrl extends \yii\helpers\Url
{           
    /**
     * @return string
     */
    public static function showList()
    {
        return self::toRoute(['post/showList']);
    }
    
    /**
     * @param type $slug
     * @return string
     */
    public static function showListByCategory($slug)
    {
        return self::toRoute([
            'post/showListByCategory', 'slug' => $slug
        ]);
    }
}

