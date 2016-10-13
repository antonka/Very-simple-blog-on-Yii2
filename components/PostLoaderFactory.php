<?php

namespace app\components;

/**
 * @author Anton Karamnov
 */
class PostLoaderFactory
{
    /**
     * @return \app\helpers\PostLoader
     */
    public static function build()
    {
        return new PostLoader(
            new \app\models\Post(),
            MarkDownFileLoaderFactory::build()
        );
    }
    
    /**
     * @param type $primaryKey
     * @return \app\helpers\PostLoader
     * @throws \yii\web\HttpException
     */
    public static function buildExistingPost($primaryKey)
    {
        $post = \app\models\Post::findOne($primaryKey);
        if (is_null($post)) {
            throw new \yii\web\HttpException(
                404, 'The requested post could not be found'
            );
        }
        
        return new PostLoader($post, MarkDownFileLoaderFactory::build());
    }
}