<?php

namespace app\models;

use Yii;

/**
 * @author Anton Karamnov
 */
class LoginForm extends \yii\base\Model
{
    /**
     * @var string
     */
    public $password;
    
    /**
     * @var string 
     */
    public $email;
    
    /**
     * @return array
     */
    public function rules() 
    {
        return [
            [['password', 'email'], 'required'],
            [['email'], 'email'],
        ];
    }
    
}