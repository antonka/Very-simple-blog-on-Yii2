<?php

namespace blog\post\models;

use Yii;

/**
 * @author Anton Karamnov
 */
class UploadPostForm extends Post
{
    const TAG_CUT = '<!-- cut -->';
    
    public $file;
        
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['file', 'file', 'mimeTypes' => 'text/markdown, text/plain', 'skipOnEmpty' => false],
        ]);
    }
}

/*
 *   
    public function getContent()
    {
        return $this->fileLoaded ? 
            file_get_contents($this->model->file->tempName) : '';
    }
 */