<?php

namespace app\actions;

use Yii;
use app\models\Post;
use yii\web\HttpException;

/**
 * @author Anton Karamnov
 */
class ShowPost extends \yii\base\Action
{
    public function run() 
    {
        $postId = Yii::$app->request->get('id');
        $post = Post::findOne($postId);
        
        if (is_null($post)) {
            throw new HttpException(404, 'The requested post could not be found');
        }
        
        return $this->controller->render('post', [
            'title' => $post->title,
            'content' => $post->content,
            'created_at' => $post->created_at,
        ]);
    }
}

