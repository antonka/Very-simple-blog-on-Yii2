<?php

namespace blog\post\actions;

use blog\base\traits\AuthenticatedAccess;
use yii\web\Response;
use blog\post\models\Post;
use yii\helpers\Url;

/**
 * @author Anton Karamnov
 */
class Download extends \yii\base\Action
{
    use AuthenticatedAccess;
    
    public function run()
    {
        $post = Post::findByUrlQueryParam('post_id');
        $response = new Response();
        $response->sendContentAsFile(
            $post->content, $post->title . '.md', 
            ['mimeType' => 'text/markdown']
        ); 
        $response->send();
    }
    
    /**
     * @param Post $post
     * @return string
     */
    public static function url(Post $post)
    {
        return Url::toRoute(['post/download', 'post_id' => $post->id]);
    }
     
}
