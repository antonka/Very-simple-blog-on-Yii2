<?php

namespace blog\comment;

/**
 * @author Anton Karamnov
 */
class Helper
{
    /**
     * @param integer $postId
     * @param string $content
     * @return boolean
     */
    public static function addComment($postId, $content)
    {
        $comment = new Comment();
        $comment->user_id = Yii::$app->user->getIdentity()->getId();
        $comment->post_id = $postId;
        $comment->content = $content;
        $comment->status = 'moderation';
        return $comment->save();
    }
}

