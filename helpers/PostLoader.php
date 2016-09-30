<?php

namespace app\helpers;

use Yii;

/**
 * @author Anton Karamnov
 */
class PostLoader 
{
    /**
     * @var \yii\base\Model
     */
    public $postFileModel;
   
    /**
     * @param \yii\base\Model $postFileModel
     */
    public function __construct(\yii\base\Model $postFileModel) 
    {
        $this->postFileModel = $postFileModel;
    }
    
    /**
     * @return \yii\base\Model
     */
    public function getPostFileModel()
    {
        return $this->postFileModel;
    }
}

