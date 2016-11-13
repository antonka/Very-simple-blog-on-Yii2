<?php

namespace blog\post;

/**
 * @author Anton Karamnov
 */
class LoaderFactory
{
    /**
     * @param \app\models\Post $post
     * @return \app\components\PostLoader
     */
    public static function build(\app\models\Post $post) 
    {
        return new Loader(
            $post, 
            \blog\base\MarkDownFileLoaderFactory::build(),
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
        return self::build(Finder::findByHttpRequest());
    }
}