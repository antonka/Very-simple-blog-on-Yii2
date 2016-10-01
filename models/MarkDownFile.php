<?php

namespace app\models;

/**
 * @author Anton Karamnov
 */
class MarkDownFile extends \yii\base\Model
{
    /**
     * @var string 
     */
    public $file;
    
    public function rules() 
    {
        return [
            ['file', 'file', 'mimeTypes' => 'text/markdown, text/plain', 'skipOnEmpty' => false],
        ];
    }
    
}