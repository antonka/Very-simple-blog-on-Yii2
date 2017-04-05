<?php

namespace blog\user\actions;

use Yii;
use blog\base\traits\AuthenticatedAccess;

/**
 * @author Anton Karamnov
 */
class ChangeProfile extends \blog\base\Action
{
    use AuthenticatedAccess;
    
    public function run()
    {
        $userModel = Yii::$app->user->getIdentity();
        if ($userModel->load(Yii::$app->request->post())
            && $userModel->update(true, ['email', 'name'])
        ) {
            Yii::$app->session->setFlash('success', Yii::t('user', 
                'The profile was changed'));
        }
        
        return $this->render('changeProfile', [
            'userModel' => $userModel,
        ]);
        
    }
}

