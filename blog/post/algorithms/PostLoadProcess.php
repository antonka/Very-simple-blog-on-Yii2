<?php

namespace blog\post\algorithms;

use Yii;
use blog\post\models\Post;
use blog\base\FileLoader;
use yii\web\IdentityInterface;
use blog\base\MarkDownFileLoaderFactory;
use blog\post\algorithms\PostCategoriesRelationSaveProcess;

/**
 * @author Anton Karamnov
 */
class PostLoadProcess
{
    /**
     * @var Post
     */
    protected $post;
    
    /**
     * @var FileLoader
     */
    protected $fileLoader;
    
    /**
     * @var IdentityInterface
     */
    protected $identity;
    
    /**
     * @var string 
     */
    protected $cutTag = '#cut#';
    
    /**
     * @param Post $post
     * @param FileLoader $fileLoader
     * @param IdentityInterface $identity
     */
    public function __construct(
        Post $post, FileLoader $fileLoader, IdentityInterface $identity
    ) {
        $this->post = $post;
        $this->fileLoader = $fileLoader;
        $this->identity = $identity;
    }
    
    /**
     * @return boolean
     */
    public function execute() 
    {
        return $this->fileLoader->loadFile()
            && $this->savePost($this->fileLoader->getFileContent());
    }
    
    /**
     * @param string $content
     * @return boolean
     */
    protected function savePost($content)
    {
        $this->post->load(Yii::$app->request->post());
        $this->post->title = self::findPostTitle($content);
        $this->post->content = preg_replace(
            "/" . $this->cutTag  . "/", '', $content
        );
        $this->post->cutted_content = $this->cutContent($content);
        $this->post->user_id = $this->identity->getId();
        
        if (!$this->post->save()) {
            return false;
        }
        
        $this->post->getBoundCategoryIds();
        $process = new PostCategoriesRelationSaveProcess($this->post, array_merge(
            [$this->post->category_id], $this->post->getBoundCategoryIds()
        ));
        $process->execute();
        
        return true;
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
     * @var Post
     */
    public function getPost() 
    {
        return $this->post;
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
    
    /**
     * @param Post $post
     * @return \self
     */
    public static function build(Post $post)
    {
        return new self(
            $post, 
            MarkDownFileLoaderFactory::build(),
            \Yii::$app->user->getIdentity()
        );
    }
}