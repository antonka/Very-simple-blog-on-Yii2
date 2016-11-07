<?php

namespace app\components;

use Yii;
use app\models\Category;

/**
 * @author Anton Karamnov
 */
class CategoryFinder extends Finder
{
    /**
     * @return \app\models\Post
     * @throws \yii\web\HttpException
     */
    public static function findByHttpRequest()   
    {
        return self::getFoundModelByHttpRequest(
            'category_id', Category::className()
        );
    }
    
    /**
     * @return array
     */
    public static function getAllCategoryIds()
    {
        return Yii::$app->db->createCommand(
            'SELECT id FROM ' . Category::tableName()
        )->queryColumn();
    }
}
