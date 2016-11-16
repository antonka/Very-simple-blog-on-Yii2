<?php

namespace blog\category;

use Yii;

/**
 * @author Anton Karamnov
 */
class Finder extends \blog\base\Finder
{
    /**
     * @return \app\models\Post
     * @throws \yii\web\HttpException
     */
    public static function findByHttpRequest()   
    {
        return self::getFoundModelByHttpRequest(
            'category_id', models\Category::className()
        );
    }
    
    /**
     * @return array
     */
    public static function getAllCategoryIds()
    {
        return Yii::$app->db->createCommand(
            'SELECT id FROM ' . models\Category::tableName()
        )->queryColumn();
    }
}
