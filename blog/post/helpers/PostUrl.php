<?php

namespace blog\post\helpers;

use blog\post\models\Post;

/**
 * @author Anton Karamnov
 */
class PostUrl extends \yii\helpers\Url
{
    /**
     * @param Post $post
     * @return string
     */
    public static function show(Post $post)
    {
        return self::toRoute(['post/show', 'slug' => $post->slug]);
    }
    
    /**
     * @param string $id
     * @return string
     */
    public static function download($id)
    {
        return self::toRoute(['post/download', 'post_id' => $id]);
    }
    
    /**
     * @param string $id
     * @return string
     */
    public static function load()
    {
        return self::toRoute(['post/load']);
    }
    
    /**
     * @param string $id
     * @return string
     */
    public static function reload($id)
    {
        return self::toRoute(['post/reload', 'post_id' => $id]);
    }
    
    /**
     * @param string $id
     * @return string
     */
    public static function delete($id)
    {
        return self::toRoute(['post/delete', 'post_id' => $id]);
    }
    
    /**
     * @return string
     */
    public static function showList()
    {
        return self::toRoute(['post/showList']);
    }
    
    /**
     * @param type $slug
     * @return string
     */
    public static function showListByCategory($slug)
    {
        return self::toRoute([
            'post/showListByCategory', 'slug' => $slug
        ]);
    }
    
    /**
     * @param type $id
     * @return string
     */
    public static function edit($id)
    {
        return self::toRoute(['post/edit', 'post_id' => $id]);
    }
}

