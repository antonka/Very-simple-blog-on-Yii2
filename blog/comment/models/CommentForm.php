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
     * @var integer
     */
    public $postId;
    
    /**
     * @return array
     */
    public function rules() 
    {
        return [
            [['content', 'postId'], 'required'],
            [['username', 'email'], 'required', 'on' => 'need_to_authenticate_user'],
            ['email', 'email', 'on' => 'need_to_authenticate_user'],
            [['content'], 'string', 'max' => 2000],
            ['postId', 'integer', 'integerOnly' => true],
        ];
    }
    
    /**
     * @return array
     */
    public function attributeLabels() {
        return [
            'username' => 'Name',
            'email' => 'Email',
            'content' => 'Content',
        ];
    }
    
}
