<?php

namespace blog\comment\actions;

use Yii;
use blog\comment\CommentFormFactory as CommentFormFactory;
use blog\comment\models\GuestCommentForm as GuestCommentForm;
use blog\comment\models\AuthenticatedCommentForm as AuthenticatedCommentForm;
use blog\comment\models\Comment as Comment;

/**
 * @author Anton Karamnov
 */
class Add extends \blog\base\Action
{
    public function run()
    {
        $request = Yii::$app->getRequest();
        if (!$request->isPost) {
            throw new \yii\web\HttpException(403, 'Request type is not post');
        }
        
        $commentForm = CommentFormFactory::getFilledCommentForm();
        if ($commentForm->validate()) {
            if ($commentForm instanceof GuestCommentForm) {
                /**
                 * @todo 
                 * 1. Send confirmation email
                 * 2. Check link
                 * 3. Create a user
                 * 4. Authenticate a user
                 * 5. Add a comment
                 */
                throw new \yii\base\ExitException('Guest can not add a comment');
            }
            else {
                $this->addComment($commentForm);
                Yii::$app->session->setFlash('Comment was added');
                return \blog\post\Helper::redirectToPostPage($commentForm->postId);
            }
        }
      
        return $this->render('add', [
            'commentForm' => $commentForm,
        ]);
    }
    
    /**
     * @param AuthenticatedCommentForm $commentForm
     * @throws \yii\base\ExitException
     */
    protected function addComment(AuthenticatedCommentForm $commentForm)
    {
        $comment = new Comment();
        $comment->user_id = Yii::$app->user->getId();
        $comment->post_id = $commentForm->postId;
        $comment->content = $commentForm->content;
        $comment->status = 'moderation';
        
        if (!$comment->save()) {
            throw new \yii\base\ExitException('Comment was not saved');
        }
    }
}

