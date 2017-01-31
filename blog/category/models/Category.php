<?php

namespace blog\category\models;

class Category extends \blog\base\ActiveRecord
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
    
    public function getPosts()
    {
        return $this->hasMany(\blog\post\models\Post::className(), ['id' => 'post_id'])
            ->viaTable('posts_categories', ['category_id' => 'id']);
    }
    
    /**
     * @return array
     */
    public static function getAllIds()
    {
        return Yii::$app->db->createCommand(
            'SELECT id FROM ' . models\Category::tableName()
        )->queryColumn();
    }
}