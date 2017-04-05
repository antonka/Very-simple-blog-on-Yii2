<?php

namespace blog\user\actions;

use Yii;
use blog\base\traits\AuthenticatedAccess;

/**
 * @author Anton Karamnov
 */
class ChangeEmail extends \blog\base\Action
{
    use AuthenticatedAccess;
    
    public function run()
    {
        $userModel = Yii::$app->user->getIdentity();
        if ($userModel->load(Yii::$app->request->post())
            && $userModel->update(true, ['email'])
        ) {
            Yii::$app->session->setFlash('success', Yii::t('user', 
                'The email was changed'));
        }
        
        return $this->render('changeEmail', [
            'userModel' => $userModel,
        ]);
        
    }
}

