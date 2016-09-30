<?php

namespace app\controllers;

use Yii;

/**
 * @author Anton Karamnov
 */
class ManageController extends \yii\web\Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'addPost' => ['class' => \app\actions\AddPost::className()]
        ];
    }   
}
