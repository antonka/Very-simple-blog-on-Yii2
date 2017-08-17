<?php

namespace blog\comment\actions;

use Yii;
use blog\comment\models\Comment;
use blog\base\traits\AuthenticatedAccess;
use yii\helpers\Url;

/**
 * @author Anton Karamnov
 */
class Publicate extends \blog\base\Action {

    use AuthenticatedAccess;

    public function run() 
    {
        $comment = Comment::findByUrlQueryParam('comment_id');
        $comment->publicate();
        Yii::$app->session->setFlash('success', Yii::t('comment', 'The comment
            was publicated'));
        $this->redirect(Show::url($comment->id));
    }
    
    /**
     * @param integer $commentId
     * @return string
     */
    static public function url($commentId)
    {
        return Url::toRoute(['comment/publicate', 'comment_id' => $commentId]);
    }
            
}