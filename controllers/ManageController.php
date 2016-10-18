<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;

/**
 * @author Anton Karamnov
 */
class ManageController extends \yii\web\Controller
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
                        'actions' => array_keys($this->actions()),
                        'roles' => ['@'],
                    ],
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
            'loadPost' => ['class' => \app\actions\LoadPost::className()],
            'reloadPost' => ['class' => \app\actions\ReloadPost::className()],
        //    'deletePost' => ['class' =]
        ];
    }   
}
