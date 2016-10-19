<?php

namespace app\components;

/**
 * @author Anton Karamnov
 */
class PostLoader
{    
    /**
     * @var \yii\db\ActiveRecord 
     */
    protected $model;
    
    /**
     * @var \app\helpers\FileLoader
     */
    protected $fileLoader;
    
    /**
     * @var string
     */
    protected $cutTag = "#cut_post#";

    /**
     * @param \yii\db\ActiveRecord $model
     * @param \app\helpers\FileLoader $fileLoader
     */
    public function __construct(
        \yii\db\ActiveRecord $model, FileLoader $fileLoader
    ) {
        $this->model = $model;
        $this->fileLoader = $fileLoader;
    }
    
    /**
     * @return boolean
     */
    public function load() 
    {
        if (!$this->fileLoader->loadFile()) {
            return false;
        }
        
        $content = $this->fileLoader->getFileContent();
       
        $this->model->title = self::findPostTitle($content);
        $this->model->content = preg_replace($this->cutTag, '', $content);
        $this->model->cutted_content = $this->cutContent($content);
        
        return $this->model->save();
    }
    
    /**
     * @return string
     */
    protected static function findPostTitle($content) 
    {
        $rows = explode("=", $content);
        return substr(trim($rows[0]), 0, 255);
    }
    
    /**
     * @return FileLoader
     */
    public function getFileLoader() 
    {
        return $this->fileLoader;
    }
    
    /**
     * @var \yii\db\ActiveRecord 
     */
    public function getModel() 
    {
        return $this->model;
    }
    
    /**
     * @param string $content
     * @return string or null
     */
    protected function cutContent($content)
    {
        if (($cutTagPosition = strpos($content, $this->cutTag)) > 0) {
            return substr($content, 0, $cutTagPosition);
        }
        
        return '';
    }
            
}