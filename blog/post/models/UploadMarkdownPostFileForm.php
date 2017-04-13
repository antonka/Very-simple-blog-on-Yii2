<?php

namespace blog\post\models;

use Yii;

/**
 * @author Anton Karamnov
 */
class UploadMarkdownPostFileForm extends \yii\base\Model
{
    public $file;
    
    public $slug;
    
    public $category_id;
    
    public function rules()
    {
        return [
            ['file', 'file', 'mimeTypes' => 'text/markdown, text/plain', 'skipOnEmpty' => false],
            [['slug', 'category_id'], 'required'],
            [['slug'], 'string', 'max' => 100],
        ];
    }
}