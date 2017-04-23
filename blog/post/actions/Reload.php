<?php

namespace blog\post\actions; 

use blog\base\traits\AuthenticatedAccess;
use blog\post\helpers\PostUrl;
use blog\post\models\UploadPostForm;
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
        $uploadPostForm = UploadPostForm::findByUrlQueryParam('post_id');

        if ($uploadPostForm->loadPost()) {
            Yii::$app->session->setFlash('success', 
                Yii::t('post', 'This post was reloaded'));
            return $this->redirect(PostUrl::show($uploadPostForm));
        }
        
        return $this->render('load', [
            'uploadPostForm' => $uploadPostForm,
        ]);
    }
}

