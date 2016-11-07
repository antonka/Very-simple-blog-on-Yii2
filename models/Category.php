<?php

namespace app\models;

class Category extends \yii\db\ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName() 
    {
        return 'categories';
    }
    
    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50], 
        ];
    }
    
    public function attributeLabels() 
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }  
}