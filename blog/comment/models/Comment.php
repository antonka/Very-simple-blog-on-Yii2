<?php

namespace blog\comment\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $content
 * @property string $created_at
 * @property string $status
 */
class Comment extends \yii\db\ActiveRecord
{
    const STATUS_MODERATION = 'moderation';
    const STATUS_PUBLICATED = 'publicated';
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'content', 'status', 'post_id'], 'required'],
            [['user_id', 'post_id'], 'integer'],
            ['email', 'email'],
            ['created_at', 'safe'],
            ['status', 'string'],
            ['content', 'string', 'max' => 2000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'username' => 'Name',
            'email' => 'Email',
            'content' => 'Content',
            'created_at' => 'Created At',
            'status' => 'Status',
        ];
    }
}
