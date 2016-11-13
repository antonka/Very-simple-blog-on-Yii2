<?php

namespace app\components;

/**
 * @author Anton Karamnov
 */
class PostLoaderFactory
{
    /**
     * @param \app\models\Post $post
     * @return \app\components\PostLoader
     */
    public static function build(\app\models\Post $post) 
    {
        return new PostLoader(
            $post, 
            MarkDownFileLoaderFactory::build(),
            \Yii::$app->user->getIdentity()
        );
    }
 
    /**
     * @return \app\components\PostLoader
     */
    public static function buildWithNewPostModel() 
    {
        return self::build(new \app\models\Post());
    }
    
    
    /**
     * @return \app\components\PostLoader
     */
    public static function buildWithFoundPostModelByHttpRequest()
    {
        return self::build(PostFinder::findByHttpRequest());
    }
}