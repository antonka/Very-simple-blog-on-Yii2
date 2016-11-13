<?php

namespace blog\post;

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
            'post_id', \app\models\Post::className()
        );
    }
    
    /**
     * @param string $postId
     * @return array
     */
    public static function findBoundCategories($postId)
    {
        return Yii::$app->db->createCommand('
            SELECT c.id, c.name
            FROM posts_categories AS rel
            JOIN categories AS c
                ON c.id = rel.category_id
            WHERE rel.post_id = :post_id
        ')->bindValue(':post_id', $postId)->queryAll();
    }
}

