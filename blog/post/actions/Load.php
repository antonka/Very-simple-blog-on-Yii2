<?php

namespace blog\post\actions;

use blog\post\algorithms\PostLoadProcess;
use blog\post\helpers\PostUrl;
use blog\post\models\Post;
use Yii;

/**
 * @author Anton Karamnov
 */
class Load extends \blog\base\Action
{
    /**
     * @return \yii\web\Responce
     */
    public function run()
    {   
        $process = PostLoadProcess::build(new Post());
        
        if ($process->execute()) {
            Yii::$app->session->setFlash('success', 
                Yii::t('post', 'This post was loaded'));
            return $this->redirect(PostUrl::show($process->getPost()->id));
        }
        
        return $this->render('load', [
            'fileModel' => $process->getFileLoader()->getFileModel(),
            'postModel' => $process->getPost()
        ]);
    }
}