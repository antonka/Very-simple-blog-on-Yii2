<?php

namespace blog\post\algorithms;

use Yii;
use blog\post\models\Post;
use blog\base\FileLoader;
use yii\web\IdentityInterface;
use blog\base\MarkDownFileLoaderFactory;
use yii\helpers\Markdown;

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
    protected $cutTag = '<!-- cut -->';
    
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
            && $this->savePost();
    }
    
    /**
     * @return boolean
     */
    protected function savePost()
    {
        list($title, $content) = $this->parseFileContent();

        $this->post->load(Yii::$app->request->post());
        $this->post->title = $title;
        $this->post->content = $content;
        $this->post->cutted_content = $this->cutContent($content);
        $this->post->user_id = $this->identity->getId();
        
        return $this->post->save();
    }
    
    /**
     * @return array ['title', 'content']
     */
    protected function parseFileContent()
    {
        $title = '';
        $lines = explode("\n", $this->fileLoader->getFileContent());
        foreach ($lines as $current => $line) {
            if ($this->identifyHeadline($line, $lines, $current)) {
                if ($line[0] == '#') {
                    $title = trim(substr($line, 1)); 
                    $lines = array_slice($lines, ($current + 1));
                }
                else { 
                    $title = trim($line);
                    $lines = array_slice($lines, ($current + 2));
                }
                break;
            }
        }
        
        $content = Markdown::process(implode("\n", $lines));
        
        return [$title, $content];
    }
    
    /**
     * @param type $line
     * @param type $lines
     * @param type $current
     * @return boolean
     */
    protected function identifyHeadline($line, $lines, $current)
    {
        return (
            // heading with #
            $line[0] === '#' && !preg_match('/^#\d+/', $line)
            ||
            // underlined headline
            !empty($lines[$current + 1]) &&
            (($l = $lines[$current + 1][0]) === '=' || $l === '-') &&
            preg_match('/^(\-+|=+)\s*$/', $lines[$current + 1])
        );
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
        if (($cutPosition = strpos($content, $this->cutTag)) > 0) {
            return substr($content, 0, $cutPosition);
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