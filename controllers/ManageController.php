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
            
            // Post
            'loadPost' => ['class' => \blog\post\actions\Load::className()],
            'reloadPost' => ['class' => \blog\post\actions\Reload::className()],
            'deletePost' => ['class' => \blog\post\actions\Delete::className()],
            'downloadPost' => [
                'class' => \blog\post\actions\Download::className()
            ],
            'savePostCategoriesRelation' => [
                'class' => \blog\post\actions\SavePostCategoriesRelation::className(),
            ],
            
            // Category
            'addCategory' => ['class' => \blog\category\actions\Add::className()],
            'deleteCategory' => ['class' => \blog\category\actions\Delete::className()],
            'editCategory' => ['class' => \blog\category\actions\Edit::className()],
            
            
        ];
    }   
}
