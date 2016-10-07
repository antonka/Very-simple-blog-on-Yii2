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
     * @return array
     */
    public function rules() 
    {
        return [
            [['password'], 'required'],
            [['password'], 'validatePassword'],    
        ];
    }
    
    /**
     * 
     * @param string $attribute
     * @param array $params
     */
    public function validatePassword($attribute, $params)
    {
        if (Yii::$app->params['password'] !== $this->password) {
            $this->addError($attribute, 'Incorrect password');
        }
    }
    
}