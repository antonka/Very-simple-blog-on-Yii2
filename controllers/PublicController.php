<?php

namespace app\controllers;

use Yii;

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
            'post' => ['class'=> \app\actions\ShowPost::className()],
        ];
    }
}
