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
    protected $fileModel;
    
    /**
     * @var boolean
     */
    public $fileLoaded = false;
   
    /**
     * @param \yii\base\Model $fileModel
     */
    public function __construct(\yii\base\Model $fileModel) 
    {
        $this->fileModel = $fileModel;
    }
    
    /**
     * @return \yii\base\Model
     */
    public function getFileModel()
    {
        return $this->fileModel;
    }
    
    /**
     * @return string
     */
    public function getFileContent()
    {
        return $this->fileLoaded ? 
            file_get_contents($this->fileModel->file->tempName) : '';
    }
    
    /**
     * @return boolean
     */
    public function validateFileModel()
    {
        $postParams = Yii::$app->request->post();
        $shortModelClassName = (
            new \ReflectionClass($this->fileModel)
        )->getShortName();
        
        if (!array_key_exists($shortModelClassName, $postParams)) {
            return false;
        }
         
        $this->fileModel->file = UploadedFile::getInstance(
            $this->fileModel, 'file'
        );

        return $this->fileModel->file && $this->fileModel->validate();
    }
    
    /**
     * @return boolean
     */
    public function loadFile() 
    {
        if (Yii::$app->request->isPost) {
            $this->fileLoaded = $this->validateFileModel();
        }
        
        return $this->fileLoaded;
    }
}

