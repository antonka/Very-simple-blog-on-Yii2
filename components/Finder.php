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
        $model = $modelClassName::findOne(
            Yii::$app->request->get($getRequestParamName)
        );
        if (is_null($model)) {
            throw new \yii\web\HttpException(404);
        }
        return $model;
    }       
}

