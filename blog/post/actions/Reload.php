<?php

namespace blog\post\actions; 

use blog\base\traits\AuthenticatedAccess;
use blog\post\models\UploadPostForm;
use Yii;
use yii\helpers\Url;

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
            return $this->redirect(Show::url($uploadPostForm));
        }
        
        return $this->render('load', [
            'uploadPostForm' => $uploadPostForm,
        ]);
    }
    
    /**
     * @param \blog\post\models\Post $post
     * @return string
     */
    public static function url(\blog\post\models\Post $post)
    {
       return Url::toRoute(['post/reload', 'post_id' => $post->id]); 
    }
}

