<?php


namespace app\components;

use Yii;

/**
 * @author Anton Karamnov
 */
class PostFinder
{
    /**
     * @return \app\models\Post
     * @throws \yii\web\HttpException
     */
    public static function findByHttpRequest()   
    {
        $postId = Yii::$app->request->get('post_id');
        $model = \app\models\Post::findOne($postId);
        if (is_null($model)) {
            throw new \yii\web\HttpException(
                404, 'The requested post could not be found'
            );
        }
        return $model;
    }       
}

