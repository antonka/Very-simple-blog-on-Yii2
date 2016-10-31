<?php

namespace app\components;

use Yii;

/**
 * @author Anton Karamnov
 */
class CategoryFinder
{
    /**
     * @return \app\models\Post
     * @throws \yii\web\HttpException
     */
    public static function findByHttpRequest()   
    {
        $postId = Yii::$app->request->get('category_id');
        $model = \app\models\Category::findOne($postId);
        if (is_null($model)) {
            throw new \yii\web\HttpException(
                404, 'The requested category could not be found'
            );
        }
        return $model;
    }       
}
