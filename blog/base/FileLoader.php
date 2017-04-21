<?php

namespace blog\base;

use Yii;
use yii\web\UploadedFile;

/**
 * @author Anton Karamnov
 */
class FileLoader 
{
    /**
     * @var \yii\base\Model
     */
    protected $model;
    
    /**
     * @var string
     */
    public $fileFieldName;
    
    /**
     * @param \yii\base\Model $model
     * @param type $fileFieldName
     */
    public function __construct(\yii\base\Model $model, $fileFieldName) 
    {
        $this->model = $model;
        $this->fileFieldName = $fileFieldName;
    }
    
    /**
     * @return \yii\base\Model
     */
    public function getModel()
    {
        return $this->model;
    }
    
    /**
     * @throws Exception
     */
    public function loadFile()
    {
        $shortModelClassName = (
            new \ReflectionClass($this->model)
        )->getShortName();
        
        if (!array_key_exists($shortModelClassName, Yii::$app->request->post())) {
            throw new Exception('File can not loaded');
        }
         
        $this->model->{$this->fileFieldName} = UploadedFile::getInstance(
            $this->model, $this->fileFieldName);
    }
}

