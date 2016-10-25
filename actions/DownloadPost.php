<?php

namespace app\actions;

use yii\web\Response;

/**
 * @author Anton Karamnov
 */
class DownloadPost extends \yii\base\Action
{
    public function run()
    {
        $post = \app\components\PostFinder::findByHttpRequest();
        $response = new Response();
        $response->sendContentAsFile($post->content, $post->title . '.md', [
            'mimeType' => 'text/markdown',
        ]); 
        $response->send();
    }
}
