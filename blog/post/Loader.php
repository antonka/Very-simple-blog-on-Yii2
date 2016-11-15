<?php

namespace blog\post;

/**
 * @author Anton Karamnov
 */
class Loader
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
    protected $cutTag = '#cut#';
    
    /**
     * @var \yii\web\IdentityInterface 
     */
    protected $identity;

    /**
     * @param \yii\db\ActiveRecord $model
     * @param \app\helpers\FileLoader $fileLoader
     */
    public function __construct(
        \yii\db\ActiveRecord $model, 
        \blog\base\FileLoader $fileLoader,
        \yii\web\IdentityInterface $identity
    ) {
        $this->model = $model;
        $this->fileLoader = $fileLoader;
        $this->identity = $identity;
    }
    
    /**
     * @return boolean
     */
    public function load() 
    {
        if (!$this->fileLoader->loadFile()) {
            return false;
        }
        
        return $this->savePost($this->fileLoader->getFileContent()); 
    }
    
    /**
     * @param string $content
     * @return boolean
     */
    protected function savePost($content)
    {
        $this->model->title = self::findPostTitle($content);
        $this->model->content = preg_replace(
            "/" . $this->cutTag  . "/", '', $content
        );
        $this->model->cutted_content = $this->cutContent($content);
        $this->model->user_id = $this->identity->getId();
        
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
        $explodedContent = explode("\n", $content);
        if (strpos($explodedContent[1], '=') !== false) {
            unset($explodedContent[0]);
            unset($explodedContent[1]);
        }
        
        $content = implode("\n", $explodedContent);
        
        if (($cutTagPosition = strpos($content, $this->cutTag)) > 0) {
            return substr($content, 0, $cutTagPosition);
        }
        
        return '';
    }
            
}
