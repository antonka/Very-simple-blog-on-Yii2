<?php

namespace blog\user\actions;

use Yii;

/**
 * @author Anton Karamnov
 */
class Login extends \blog\base\Action
{
    public function run()
    {
        $loginForm = new \blog\user\models\LoginForm();
        
        if ($loginForm->load(Yii::$app->request->post())
            && $loginForm->validate()
        ) {
            $userModel = \blog\user\models\User::find()->where([
                'email' => $loginForm->email
            ])->one();
            
            if ($userModel 
                && Yii::$app->security->validatePassword(
                    $loginForm->password, $userModel->password_hash
                )
            ) {
                Yii::$app->user->login($userModel);
                return $this->controller->goHome();
            }
            
            Yii::$app->session->addFlash(
                'error', 'User was not authenticated' 
            );
            return $this->controller->refresh();
        }
        
        return $this->render('login', [
            'loginForm' => $loginForm,
        ]);
    }
}

