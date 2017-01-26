<?php

namespace blog\post\actions; 

use blog\post\algorithms\PostLoadProcess;
use blog\post\helpers\PostUrl;
use blog\post\models\Post;

/**
 * @author Anton Karamnov
 */
class Reload extends \blog\base\Action
{
    /**
     * @return \yii\web\Response
     */
    public function run()
    {
        $post = Post::findByUrlQueryParam('post_id');
        $process = PostLoadProcess::build($post);
        
        if ($process->execute()) {
            return $this->redirect(PostUrl::show($process->getPost()->id));
        }
        
        return $this->render('reload', [
            'fileModel' => $process->getFileLoader()->getFileModel(),
            'postModel' => $process->getPost(),
        ]);
    }
}

