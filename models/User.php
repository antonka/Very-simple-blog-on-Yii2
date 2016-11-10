<?php

namespace app\models;

/**
 * @autor Anton Karamnov
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{ 
    /**
     * @inheritdoc
     */
    public static function findIdentity($id = 1)
    {
        return new static();
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return new static();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        throw new \yii\base\ErrorException(__METHOD__  . ' not implemented');
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        throw new \yii\base\ErrorException(__METHOD__  . ' not implemented');
    }
    
    /**
     * @return string
     */
    public static function tableName() 
    {
        return 'users';
    }
    
    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['email', 'name', 'role'], 'required'],
            [['password'], 'safe'],
        ];
    }
    
    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => '#',
            'email' => 'Email',
            'name' => 'Name',
            'password' => 'Password',
            'role' => 'Role',
        ];
    }   
}