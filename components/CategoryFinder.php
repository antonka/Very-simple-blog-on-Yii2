<?php

namespace app\components;

use Yii;

/**
 * @author Anton Karamnov
 */
class CategoryFinder extends Finder
{
    /**
     * @return \app\models\Post
     * @throws \yii\web\HttpException
     */
    public static function findByHttpRequest()   
    {
        return self::getFoundModelByHttpRequest(
            'category_id', \app\models\Category::className()
        );
    }       
}
