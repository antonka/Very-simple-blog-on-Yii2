<?php

namespace blog\comment\actions;

use Yii;
use blog\comment\models\Comment;
use blog\post\models\Post;
use yii\web\HttpException;
use blog\post\helpers\PostUrl;

/**
 * @author Anton Karamnov
 */
class Add extends \blog\base\Action
{
    /**
     * @return \yii\web\Response 
     * @throws HttpException
     */
    public function run()
    {
        $request = Yii::$app->getRequest();
        
        if (!$request->isPost) {
            throw new HttpException(403, 'Request type is not post');
        }
        
        $post = Post::findOne(trim($request->get('post_id')));
        if (is_null($post)) {
            throw new HttpException(404);
        }
        
        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->status = Comment::STATUS_MODERATION;
        
        if (!$comment->load($request->post())) {
            throw new HttpException(403, 'Invalid incoming data');
        }
        
        if (!Yii::$app->user->isGuest) {
            $identity = Yii::$app->user->getIdentity();
            $comment->username = $identity->name;
            $comment->email = $identity->email;
        }
        
        if ($comment->save()) {
            Yii::$app->session->setFlash('success', Yii::t('comment', 
                'The comment was added'));
            return $this->redirect(PostUrl::show($post->id));
        }
        
        return $this->render('add', [
            'comment' => $comment,
        ]);
    }
}

