<?php

namespace blog\post\actions;

use blog\base\traits\AuthenticatedAccess;
use blog\post\helpers\PostUrl;
use blog\base\FileLoader;
use blog\post\models\UploadPostForm;
use Yii;

/**
 * @author Anton Karamnov
 */
class Load extends \blog\base\Action
{
    use AuthenticatedAccess;

    /**
     * @return \yii\web\Responce
     */
    public function run()
    {   
        $uploadPostForm = new UploadPostForm();
        $fileLoader = new FileLoader($uploadPostForm, 'file');
        if (Yii::$app->request->isPost) {
            $fileLoader->loadFile();
            if ($uploadPostForm->save()) {
                Yii::$app->session->setFlash('success', 
                    Yii::t('post', 'This post was loaded'));
                return $this->redirect(PostUrl::show($uploadPostForm));
            }
        } 
        
        return $this->render('load', [
            'uploadPostForm' => $uploadPostForm,
        ]);
    }
}