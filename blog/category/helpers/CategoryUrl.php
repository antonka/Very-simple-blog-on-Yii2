<?php

namespace blog\category\helpers;

/**
 * @author Anton Karamnov
 */
class CategoryUrl extends \yii\helpers\Url
{
    /**
     * @return string
     */
    public static function add()
    {
        return self::toRoute(['category/add']);
    }
    
    /**
     * @param integer $categoryId
     * @return string
     */
    public static function edit($categoryId)
    {
        return self::toRoute(['category/edit', 'category_id' => $categoryId]);
    }
    
    /**
     * @param integer $categoryId
     * @return string
     */
    public static function delete($categoryId)
    {
        return self::toRoute(['category/delete', 'category_id' => $categoryId]);
    }
}

