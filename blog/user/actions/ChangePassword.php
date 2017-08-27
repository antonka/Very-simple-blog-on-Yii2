<?php

namespace blog\user\actions;

use Yii;
use blog\base\traits\AuthenticatedAccess;
use blog\user\models\ChangePasswordForm;
use yii\helpers\Url;

/**
 * @author Anton Karamnov
 */
class ChangePassword extends \blog\base\Action
{
    use AuthenticatedAccess;
    
    public function run()
    {
        $changePasswordForm = new ChangePasswordForm();
        
        if ($changePasswordForm->load(Yii::$app->request->post())) {
            $changePasswordForm->setUser(Yii::$app->user->getIdentity());
            if ($changePasswordForm->validate() 
                && $changePasswordForm->saveNewPassword()
            ) {
                Yii::$app->session->setFlash('success', Yii::t('user', 
                    'The password was changed'));
            }
        }
        
        return $this->render('changePassword', [
            'changePasswordForm' => $changePasswordForm,
        ]);
    }
    
    /**
     * @return string
     */
    public static function url()
    {
        return Url::toRoute(['user/changePassword']);
    }
            
}
