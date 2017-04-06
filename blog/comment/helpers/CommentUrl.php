<?php

namespace blog\comment\helpers;

use blog\comment\models\Comment;

/**
 * @author Anton Karamnov
 */
class CommentUrl extends \yii\helpers\Url
{
    /**
     * @param Comment $comment
     * @return string
     */
    public static function show(Comment $comment)
    {
        return self::toRoute(['comment/show', 'comment_id' => $comment->id]);
    }
    
    /**
     * @return string
     */
    public static function showGrid()
    {
        return self::toRoute(['comment/showGrid']);
    }
    
    /**
     * @param Comment $comment
     * @return string
     */
    public static function delete(Comment $comment)
    {
        return self::toRoute(['comment/delete', 'comment_id' => $comment->id]);
    }
    
    /**
     * @param Comment $comment
     * @return string
     */
    public static function publicate(Comment $comment)
    {
        return self::toRoute(['comment/publicate', 'comment_id' => $comment->id]);
    }
}

