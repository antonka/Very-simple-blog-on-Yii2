<?php

namespace blog\comment\actions;

use Yii;
use blog\comment\models\Comment;
use blog\base\traits\AuthenticatedAccess;
use yii\helpers\Url;

/**
 * @author Anton Karamnov
 */
class Delete extends \blog\base\Action {

    use AuthenticatedAccess;

    public function run() 
    {
        $comment = Comment::findByUrlQueryParam('comment_id');
        $comment->delete();
        Yii::$app->session->setFlash('success', Yii::t('comment', 'The comment
            was deleted'));
        $this->redirect(ShowGrid::url());
    }
    
    /**
     * @param integer $commentId
     * @return string
     */
    static public function url($commentId)
    {        
        return Url::toRoute(['comment/delete', 'comment_id' => $commentId]);
    }
            
}

