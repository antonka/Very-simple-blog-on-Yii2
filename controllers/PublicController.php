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
        ]; 
    }
    
    
    public function actionLogin()
    {
        $loginForm = new LoginForm();
        
        if ($loginForm->load(Yii::$app->request->post())
            && $loginForm->validate()
        ) {
            Yii::$app->user->login(User::findIdentity());
            return $this->goHome();
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
