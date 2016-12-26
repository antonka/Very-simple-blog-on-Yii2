<?php

namespace blog\comment;

use blog\comment\models\AuthenticatedCommentForm as AuthenticatedCommentForm;
use blog\comment\models\GuestCommentForm as GuestCommentForm;
use Yii;

/**
 * @author Anton Karamnov
 */
class CommentFormFactory
{
    /**
     * @return AuthenticatedCommentForm|GuestCommentForm
     */
    public static function getCommentForm()
    {
        return Yii::$app->user->isGuest ? 
            new GuestCommentForm() : new AuthenticatedCommentForm();
    }
    
    /**
     * @return AuthenticatedCommentForm|GuestCommentForm
     */
    public static function getFilledCommentForm()
    {
        $commentForm = self::getCommentForm();
        $commentForm->load(Yii::$app->request->post());
        
        return $commentForm;
    }
}


