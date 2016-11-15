<?php

namespace blog\post;

use Yii;

/**
 * @author Anton Karamnov
 */
class PostCategoriesRelationSaver
{
    /**
     * @var \app\models\Post 
     */
    protected $postModel;

    /**
     * @param \app\models\Post $postModel
     */
    public function __construct(\app\models\Post $postModel) 
    {
        $this->postModel = $postModel;
    }
    
    /**
     * @return \self
     */
    public static function buildWithFoundPostModelByHttpRequest()
    {
       return new self(Finder::findByHttpRequest()); 
    }
    
    /**
     * @param array $categoryIds
     */
    public function savePostCategoriesRelations(array $categoryIds)
    {
        $boundCategories = Finder::findBoundCategories($this->postModel->id);
        
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $this->removeRelationWithCategories(
                self::findCategoriesToRemoveFromRelations($boundCategories, $categoryIds)
            );

            $this->bindCategoriesWithPost(
                self::findCategoriesToBindRelations($boundCategories, $categoryIds)    
            );
            
            $transaction->commit();
        }
        catch (Exception $e) {
            $transaction->rollBack();
            throw $e; 
        }
    }
    
    /**
     * @param array $boundCategories
     * @param array $currentCategoryIds
     * @return array
     */
    protected static function findCategoriesToRemoveFromRelations(
        array $boundCategories, array $currentCategoryIds
    ) {
        return array_filter(
            $boundCategories, function($row) use ($currentCategoryIds) {
                return !in_array($row['id'], $currentCategoryIds);
            }
        );
    }
    
    /**
     * @param array $boundCategories
     * @param array $currentCategoryIds
     * @return array
     */
    protected static function findCategoriesToBindRelations(
        array $boundCategories, array $currentCategoryIds
    ) {
        $boundCategoryIds = array_map(function($rowData) {
            return $rowData['id'];
        }, $boundCategories);
        
        return array_filter(
            $currentCategoryIds, 
            function($currentCategoryId) use ($boundCategoryIds) {
                return !in_array($currentCategoryId, $boundCategoryIds);
            }
        );
    }
    
    /**
     * @param array $categoryIds
     * @return boolean
     */
    protected function bindCategoriesWithPost(array $categoryIds)
    {
        if (!$categoryIds) {
            return false;
        }
        $postId = $this->postModel->id;
        $data = array_map(function($categoryId) use ($postId) {
            return [$postId, $categoryId];
        }, $categoryIds);
        
        return Yii::$app->db->createCommand()->batchInsert(
            'posts_categories', ['post_id', 'category_id'], $data
        )->execute();
    }
    
    /**
     * @param array $boundCategories
     */
    protected function removeRelationWithCategories(array $boundCategories)
    {      
        foreach ($boundCategories as $boundCategoryRowData) {
            Yii::$app->db->createCommand()->delete(
                'posts_categories', 
                'post_id = :post_id AND category_id = :category_id',
                [
                    ':post_id' => $this->postModel->id, 
                    ':category_id' => $boundCategoryRowData['id']
                ]
            )->execute();
        }
    }
    
    /**
     * @return \app\models\Post
     */
    public function getPostModel()
    {
        return $this->postModel;
    }
            
}