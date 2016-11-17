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
    
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            
            // Public
            'error' => ['class' => \yii\web\ErrorAction::className()],
            'index' => ['class' => \blog\post\actions\ShowList::className()],
            'post' =>  ['class'=> \blog\post\actions\Show::className()],
            'category' => [
                'class' => \blog\post\actions\ShowListByCategory::className()
            ],
            'login' => ['class' => \blog\user\actions\Login::className()],
            'addComment' => ['class' => \blog\comment\actions\Add::className()],
            
            // Protected
            'loadPost' => ['class' => \blog\post\actions\Load::className()],
            'reloadPost' => ['class' => \blog\post\actions\Reload::className()],
            'deletePost' => ['class' => \blog\post\actions\Delete::className()],
            'downloadPost' => [
                'class' => \blog\post\actions\Download::className()
            ],
            'savePostCategoriesRelation' => [
                'class' => \blog\post\actions\SavePostCategoriesRelation::className(),
            ],
            'addCategory' => ['class' => \blog\category\actions\Add::className()],
            'deleteCategory' => ['class' => \blog\category\actions\Delete::className()],
            'editCategory' => ['class' => \blog\category\actions\Edit::className()],
        ]; 
    }
    
    public function actionLogout() 
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}

