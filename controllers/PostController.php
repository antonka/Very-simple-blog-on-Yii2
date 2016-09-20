<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class PostController extends Controller
{
    /**
     * @return string
     */
    public function actionList()
    {
        return $this->render('list');
    }
    
    /**
     * @param string $id
     * @return string
     */
    public function actionIndex($id)
    {
        return $this->render('index');
    }
}