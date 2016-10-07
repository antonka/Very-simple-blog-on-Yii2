<?php

namespace app\models;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    /**
     * @var integer
     */
    protected $id = 1;
    
    /**
     * @var string 
     */
    protected $username;

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
}
