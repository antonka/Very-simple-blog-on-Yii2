<?php

namespace blog\user\models;

use Yii;

/**
 * @author Anton Karamnov
 */
class ChangePasswordForm extends \yii\base\Model
{
    /**
     * @var blog\user\models
     */
    protected $user;
    
    /**
     * @var string
     */
    public $currentPassword;
    
    /**
     * @var string
     */
    public $newPassword;
    
    /**
     * @var string
     */
    public $repeatedNewPassword;
    
    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['currentPassword', 'newPassword', 'repeatedNewPassword'], 'required'],
            ['currentPassword', function($attribute, $params) {
                if (!Yii::$app->security->validatePassword(
                    $this->$attribute, $this->user->password_hash
                )) {
                    $this->addError($attribute, Yii::t('user', 'The password is
                        incorrect'));
                }
            }],
            [
                'repeatedNewPassword', 
                'compare', 
                'compareAttribute' => 'newPassword',
                'message' => Yii::t('user', "The new passwords don't match"),
            ],
        ];
    }
    
    
    
    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'currentPassword' => Yii::t('user', 'Current Password'), 
            'newPassword' => Yii::t('user', 'New Password'),  
            'repeatedNewPassword' => Yii::t('user', 'Repeate new password'),
        ];
    }
    
    /**
     * @param \blog\user\models\User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }
    
    public function saveNewPassword()
    {
        $this->user->password_hash = Yii::$app->security
            ->generatePasswordHash($this->newPassword);
        
        return $this->user->save();
    }
} 