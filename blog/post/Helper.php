<?php

namespace blog\post;

use Yii;
use app\models\Post;

/**
 * @author Anton Karamnov
 */
class Helper
{
    /**
     * @param integer $postId
     */
    public static function createPostUrl($postId)
    {
        return Yii::$app->urlManager->createUrl([
            '/public/post', 'post_id' => $postId
        ]);
    }
    
    /**
     * @param integer $postId
     */
    public static function redirectToPostPage($postId)
    {
        Yii::$app->getResponse()->redirect(self::createPostUrl($postId)); 
    }
    
    public static function redirectToPostListPage()
    {
        Yii::$app->getResponse()->redirect(['/public/index']); 
    }
    
    /**
     * @return \yii\data\ActiveDataProvider
     */
    public static function getPostsListActiveDataProvider()
    {
        return new \yii\data\ActiveDataProvider([
            'query' => Post::find()->orderBy('created_at DESC'),
            'pagination' => ['pageSize' => 10],
        ]);
    }
}