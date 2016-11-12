<?php

namespace app\controllers;

use Yii;
use app\models\LoginForm;
use app\models\User;


/**
 * @author Anton Karamnov
 */
class PublicController extends \yii\web\Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => ['class' => \yii\web\ErrorAction::className()],
            'index' => ['class' => \app\actions\ShowPostsList::className()],
            'post' =>  ['class'=> \app\actions\ShowPost::className()],
            'category' => [
                'class' => \app\actions\ShowPostsListByCategory::className()
            ],
        ]; 
    }
    
    public function actionLogin()
    {
        $loginForm = new LoginForm();
        
        if ($loginForm->load(Yii::$app->request->post())
            && $loginForm->validate()
        ) {
            $userModel = User::find()->where([
                'email' => $loginForm->email
            ])->one();
            
            if ($userModel 
                && Yii::$app->security->validatePassword(
                    $loginForm->password, $userModel->password_hash
                )
            ) {
                Yii::$app->user->login($userModel);
                return $this->goHome();
            }
            
            Yii::$app->session->addFlash(
                'error', 'User was not authenticated' 
            );
            return $this->refresh();
        }
        
        return $this->render('login', [
            'loginForm' => $loginForm,
        ]);
    }
    
    public function actionLogout() 
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
    
        
}
