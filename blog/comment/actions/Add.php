<?php

namespace blog\comment\actions;

use Yii;
use blog\comment\models\CommentForm;
use blog\comment\Helper;

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
                Yii::$app->session->set('comment', [
                    'post_id' => $commentForm->postId,
                    'content' => $commentForm->content   
                ]);
                Yii::$app->session->set('user', [
                    'username' => $commentForm->username,
                    'email' => $commentForm->email,
                ]);
            }
            else {
                if (Helper::addComment(
                        $commentForm->postId, 
                        $commentForm->content
                    )
                ) {
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

