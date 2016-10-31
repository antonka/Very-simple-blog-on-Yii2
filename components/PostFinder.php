<?php

namespace app\components;

use Yii;

/**
 * @author Anton Karamnov
 */
class PostFinder extends Finder
{
    /**
     * @return \app\models\Post
     * @throws \yii\web\HttpException
     */
    public static function findByHttpRequest()   
    {
        return self::getFoundModelByHttpRequest(
            'post_id', \app\models\Post::className()
        );
    }       
}

