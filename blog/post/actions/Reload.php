<?php

namespace blog\post\actions; 

use blog\post\algorithms\PostLoadProcess;
use blog\post\helpers\PostUrl;
use blog\post\models\Post;
use Yii;

/**
 * @author Anton Karamnov
 */
class Reload extends \blog\base\Action
{
    use AuthenticatedAccess;
    
    /**
     * @return \yii\web\Response
     */
    public function run()
    {
        $post = Post::findByUrlQueryParam('post_id');
        $process = PostLoadProcess::build($post);
        
        if ($process->execute()) {
            Yii::$app->session->setFlash('success', 
                Yii::t('post', 'This post was reloaded'));
            return $this->redirect(PostUrl::show($process->getPost()));
        }
        
        return $this->render('reload', [
            'fileModel' => $process->getFileLoader()->getFileModel(),
            'postModel' => $process->getPost(),
        ]);
    }
}

