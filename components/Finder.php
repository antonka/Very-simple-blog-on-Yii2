<?php

namespace app\components;

use Yii;

/**
 * @author Anton Karamnov
 */
class Finder
{
    /**
     * @param string $getRequestParamName
     * @param string $modelClassName
     * @return \app\models\Post
     * @throws \yii\web\HttpException
     */
    public static function getFoundModelByHttpRequest($getRequestParamName, $modelClassName)   
    {
        /*
        $postId = Yii::$app->request->get('post_id');
        $model = \app\models\Post::findOne($postId);
        if (is_null($model)) {
            throw new \yii\web\HttpException(
                404, 'The requested post could not be found'
            );
        }
        return $model;
         * 
         */
        $model = $modelClassName::findOne(
            Yii::$app->request->get($getRequestParamName)
        );
        if (is_null($model)) {
            throw new \yii\web\HttpException(404);
        }
        return $model;
    }       
}

