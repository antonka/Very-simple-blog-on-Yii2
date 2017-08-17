<?php

namespace blog\comment\actions;

use Yii;
use blog\comment\models\Comment;
use blog\base\traits\AuthenticatedAccess;
use yii\helpers\Url;

/**
 * @author Anton Karamnov
 */
class Show extends \blog\base\Action {

    use AuthenticatedAccess;

    public function run() 
    {
        $comment = Comment::findByUrlQueryParam('comment_id');
        
        return $this->render('show', [
            'comment' => $comment,
        ]);
    }
    
    /**
     * @param integer $commentId
     * @return string
     */
    static public function url($commentId)
    {
        return Url::toRoute(['comment/show', 'comment_id' => $commentId]);
    }
}
