<?php

namespace blog\comment\actions;

use Yii;
use blog\comment\models\Comment;
use \blog\comment\helpers\CommentUrl;
use blog\base\traits\AuthenticatedAccess;

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
        $this->redirect(CommentUrl::show($comment));
    }
}