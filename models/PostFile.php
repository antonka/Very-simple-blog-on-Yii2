<?php

namespace app\models;

/**
 * @author Anton Karamnov
 */
class PostFile extends \yii\base\Model
{
    /**
     * @var string 
     */
    public $file;
    
    public function rules() 
    {
        return [
            [['file'], 'file', 'extensions' => 'md'],
        ];
    }
    
}