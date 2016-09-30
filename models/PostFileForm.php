<?php

namespace app\models;

/**
 * @author Anton Karamnov
 */
class PostFileForm extends \yii\base\Model
{
    /**
     * @var string 
     */
    public $file;
    
    public function rules() 
    {
        return [
            [['file'], 'file', 'skipOnly' => false, 'extensions' => 'txt'],
        ];
    }
    
}