<?php

namespace blog\post\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $created_at
 */
class Post extends \blog\base\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['content'], 'string'],
            [['created_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['cutted_content'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'created_at' => 'Created At',
        ];
    }
    
    /**
     * @return array
     */
    public function getBoundCategoryIds()
    {
        return self::getBoundCategoryIdsByPk($this->id);
    }
    
    /**
     * @param integer $primaryKey
     * @return array
     */
    public static function getBoundCategoryIdsByPk($primaryKey)
    {
        return Yii::$app->db->createCommand('
            SELECT c.id
            FROM posts_categories AS rel
            JOIN categories AS c
                ON c.id = rel.category_id
            WHERE rel.post_id = :post_id
        ')->bindValue(':post_id', $primaryKey)->queryColumn();
    }
}
