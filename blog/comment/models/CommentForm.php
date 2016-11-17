<?php

namespace blog\comment\models;

use Yii;

/**
 * @author Anton Karamnov
 */
class CommentForm extends \yii\base\Model
{
    /**
     * @var string
     */
    public $username;
            
    /**
     * @var string
     */
    public $email;
            
    /**
     * @var string
     */
    public $content;
    
    /**
     * @return array
     */
    public function rules() 
    {
        return [
            [['username', 'email', 'content'], 'required'],
            ['email', 'email'],
            ['content', 'length', 'max' => 2000],
        ];
    }
    
}
