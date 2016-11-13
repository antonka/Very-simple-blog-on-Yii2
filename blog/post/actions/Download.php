<?php

namespace blog\post\actions;

use yii\web\Response;

/**
 * @author Anton Karamnov
 */
class Download extends \yii\base\Action
{
    public function run()
    {
        $post = \blog\post\Finder::findByHttpRequest();
        $response = new Response();
        $response->sendContentAsFile(
            $post->content, $post->title . '.md', 
            ['mimeType' => 'text/markdown']); 
        $response->send();
    }
}
