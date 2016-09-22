<?php

namespace app\controllers;

use Yii;

class PublicController extends \yii\web\Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'index' => ['class'=>'app\actions\PostsListAction'],
            'post'  => ['class'=>'app\actions\PostAction'],
        ];
    }
}
