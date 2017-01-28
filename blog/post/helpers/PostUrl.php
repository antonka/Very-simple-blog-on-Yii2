<?php

namespace blog\post\helpers;

/**
 * @author Anton Karamnov
 */
class PostUrl extends \yii\helpers\Url
{
    /**
     * @param string $id
     * @return string
     */
    public static function show($id)
    {
        return self::toRoute(['post/show', 'post_id' => $id]);
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
     * @param type $categoryId
     * @return string
     */
    public static function showListByCategory($categoryId)
    {
        return self::toRoute([
            'post/showListByCategory', 'category_id' => $categoryId
        ]);
    }
}

