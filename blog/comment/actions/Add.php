<?php

namespace blog\comment\actions;

use Yii;
use blog\comment\models\CommentForm;
use blog\comment\models\Comment;

/**
 * @author Anton Karamnov
 */
class Add extends \blog\base\Action
{
    public function run()
    {
        $request = Yii::$app->getRequest();
        if (!$request->isPost) {
            throw new \yii\web\HttpException(403, 'Request is not post');
        }
        
        $commentForm = new CommentForm();
        
        if (Yii::$app->user->isGuest) {
            $commentForm->setScenario('need_to_authenticate_user');
        }
        
        if ($commentForm->load($request->post())
            && $commentForm->validate()
        ) {
            if ($commentForm->getScenario() == 'need_to_authenticate_user') {
                // redirect to authenticate user
            }
            else {
                $comment = new Comment();
                $comment->user_id = Yii::$app->user->getIdentity()->getId();
                $comment->content = $commentForm->content;
                $comment->status = 'moderation';
                if ($comment->save()) {
                    Yii::$app->session->setFlash('Comment was added');
                    return \blog\post\Helper::redirectToPostPage($commentForm->postId);
                }
            }
        }
        
        return $this->render('add', [
            'commentForm' => $commentForm,
        ]);
    }
}

