<?php

namespace app\helpers;

use Yii;

class PostLoader 
{
    /**
     * @var \yii\base\Model
     */
    public $model;
    
    public function __construct(\yii\base\Model $model) 
    {
        $this->model = $model;
    }
}

