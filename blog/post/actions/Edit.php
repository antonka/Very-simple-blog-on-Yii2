<?php

namespace blog\post\actions;

use blog\base\traits\AuthenticatedAccess;
use blog\post\models\Post;
use Yii;

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
}