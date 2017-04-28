<?php

namespace blog\post\models;

use Yii;
use yii\helpers\Markdown;
use yii\web\UploadedFile;

/**
 * @author Anton Karamnov
 */
class UploadPostForm extends Post
{
    const TAG_CUT = '<!-- cut -->';
    
    /**
     * @var yii\web\UploadedFile 
     */
    public $file;
        
    /**
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['file', 'file', 'mimeTypes' => 'text/markdown, text/plain', 'skipOnEmpty' => false],
        ]);
    }
    
    
    /**
     * @return array ['title', 'content']
     */
    protected function parseFileContent()
    {
        $fileContent = file_get_contents($this->file->tempName);
        $title = '';
        $lines = explode("\n", $fileContent);
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
            isset($line[0])
            &&
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
     * @param string $content
     * @return string
     */
    protected function getCuttedContent()
    {
        if (($cutPosition = strpos($this->content, self::TAG_CUT)) > 0) {
            return substr($this->content, 0, $cutPosition);
        }
        return '';
    }
    
    protected function fillBaseModelAttributes()
    {
        list($title, $content) = $this->parseFileContent();
        
        $this->title = $title;
        $this->content = $content;
        $this->cutted_content = $this->getCuttedContent();
        $this->user_id = Yii::$app->user->getIdentity()->getId();
    }

    /**
     * @return boolean
     */
    public function loadPost()
    {
        if ($this->load(Yii::$app->request->post())) {
            $this->file = UploadedFile::getInstance($this, 'file');
            if (!$this->validate(['file'])) {
                return false;
            }
            $this->fillBaseModelAttributes();
            return $this->save();
        }
        return false;
    }
     
}
