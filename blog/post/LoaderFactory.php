<?php

namespace blog\post;

/**
 * @author Anton Karamnov
 */
class LoaderFactory
{
    /**
     * @param \blog\post\models\Post $model
     * @return \blog\post\Loader
     */
    public static function build(models\Post $model) 
    {
        return new Loader(
            $model, 
            \blog\base\MarkDownFileLoaderFactory::build(),
            \Yii::$app->user->getIdentity()
        );
    }
 
    /**
     * @return \blog\post\Loader
     */
    public static function buildWithNewPostModel() 
    {
        return self::build(new models\Post());
    }
    
    /**
     * @return \blog\post\Loader
     */
    public static function buildWithFoundPostModelByHttpRequest()
    {
        return self::build(Finder::findByHttpRequest());
    }
}