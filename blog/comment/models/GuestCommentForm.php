<?php

namespace blog\comment\models;

use \blog\comment\models\AuthenticatedCommentForm as AuthenticatedCommentForm;

/**
 * @author Anton Karamnov
 */
class GuestCommentForm extends AuthenticatedCommentForm
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
     * @return array
     */
    public function rules() 
    {
        return array_merge(parent::rules(), [
            [['username', 'email'], 'required'],
            ['email', 'email'],
        ]);
    } 
    
    /**
     * @return array
     */
    public function attributeLabels() 
    {
        return array_merge(parent::attributeLabels(), [
            'username' => 'Name',
            'email' => 'Email',
        ]);
    }
}

