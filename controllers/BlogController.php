<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;

/**
 * @author Anton Karamnov
 */
class BlogController extends \yii\web\Controller
{
    /**
     * @return array
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'loadPost', 'reloadPost', 'deletePost', 
                            'downloadPost', 'savePostCategoriesRelation',
                            'addCategory', 'deleteCategory', 'editCategory',
                            'logout',
                        ],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => [
                            'error', 'index', 'category', 'post', 'login',
                            'addComment',
                        ],
                    ]
                ],
            ],
        ];
    }
    
    public function actions()
    {
        return include Yii::getAlias('@app') . '/config/base_action_map.php';
    }
    
    public function actionLogout() 
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
    
}

