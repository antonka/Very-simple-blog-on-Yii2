<?php

namespace app\models;

/**
 * @author Anton Karamnov
 */
class TextFileForm extends \yii\base\Model
{
    /**
     * @var string 
     */
    public $textFile;
    
    public function rules() 
    {
        return [
            [['textFile'], 'file', 'skipOnly' => false, 'extensions' => 'txt'],
        ];
    }
    
}