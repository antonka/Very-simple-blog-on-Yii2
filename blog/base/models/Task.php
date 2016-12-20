<?php

namespace blog\base\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property integer $id
 * @property string $group_id
 * @property string $action
 * @property string $data
 * @property string $created_at
 * @property string $status
 * @property integer $execution_order
 * 
 * @author Anton Karamnov
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'action', 'data', 'execution_order'], 'required'],
            [['data', 'status'], 'string'],
            [['created_at'], 'safe'],
            [['execution_order'], 'integer'],
            [['group_id', 'action'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'action' => 'Action',
            'data' => 'Data',
            'created_at' => 'Created At',
            'status' => 'Status',
            'execution_order' => 'Execution Order',
        ];
    }
}
