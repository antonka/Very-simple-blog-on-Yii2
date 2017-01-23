<?php

namespace blog\post;

use blog\post\models\Post;
use blog\base\MarkDownFileLoaderFactory;

/**
 * @author Anton Karamnov
 */
class LoaderFactory
{
    /**
     * @param \blog\post\models\Post $model
     * @return \blog\post\Loader
     */
    public static function build(Post $model) 
    {
        return new Loader(
            $model, 
            MarkDownFileLoaderFactory::build(),
            \Yii::$app->user->getIdentity()
        );
    }
 
    /**
     * @return \blog\post\Loader
     */
    public static function buildWithNewPostModel() 
    {
        return self::build(new Post());
    }
    
    /**
     * @return \blog\post\Loader
     */
    public static function buildWithFoundPostModelByHttpRequest()
    {
        return self::build(Post::findByUrlQueryParam('post_id'));
    }
}