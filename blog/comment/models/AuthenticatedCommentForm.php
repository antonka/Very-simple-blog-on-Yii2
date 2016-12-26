<?php

namespace blog\comment\models;

/**
 * @author Anton Karamnov
 */
class AuthenticatedCommentForm extends \yii\base\Model
{
    /**
     * @var integer
     */
    public $postId;
    
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
            ['content', 'string', 'max' => 2000],
            ['postId', 'integer', 'integerOnly' => true],
        ];
    }
    
    /**
     * @return array
     */
    public function attributeLabels() {
        return [
            'content' => 'Content',
        ];
    }
}

