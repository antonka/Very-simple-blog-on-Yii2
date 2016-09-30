<?php

namespace app\helpers;

use Yii;

class PostLoader 
{
    /**
     * @var \yii\base\Model
     */
    public $formModel;
    
    public function __construct(\yii\base\Model $formModel) 
    {
        $this->formModel = $formModel;
    }
    
    /**
     * 
     */
    static public function loadFile() 
    {
        echo "called FileLoader::load();";
    }
}

