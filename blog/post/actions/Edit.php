<?php

namespace blog\post\actions;

use blog\base\traits\AuthenticatedAccess;
use blog\post\models\Post;
use Yii;
use yii\helpers\Url;

/**
 * @author Anton Karamnov
 */
class Edit extends \blog\base\Action
{
    use AuthenticatedAccess;
    
    /**
     * @return \yii\web\Responce
     */
    public function run()
    {
        $post = Post::findByUrlQueryParam('post_id');
        if ($post->load(Yii::$app->request->post())
            && $post->save()
        ) {
            Yii::$app->session->setFlash('success', 
                Yii::t('post', 'This post was updated'));
        }
        
        return $this->render('edit', [
            'post' => $post,
        ]);
    }
    
    /**
     * @param Post $post
     * @return string
     */
    public static function url(Post $post) 
    {
        return Url::toRoute(['post/edit', 'post_id' => $post->id]);
    }
}