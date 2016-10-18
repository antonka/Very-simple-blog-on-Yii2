<?php

namespace app\components;

use Yii;

/**
 * @author Anton Karamnov
 */
class PostHelper
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
    
    public static function redirectToPostPage($postId)
    {
        Yii::$app->getResponse()->redirect(
            self::createPostUrl($postId)
        ); 
    }
}
