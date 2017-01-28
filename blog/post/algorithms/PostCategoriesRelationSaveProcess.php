<?php

namespace blog\post\algorithms;

use blog\post\models\Post;
use Yii;

/**
 * @author Anton Karamnov
 */
class PostCategoriesRelationSaveProcess
{
    /**
     * @var \blog\post\models\Post 
     */
    protected $post;
    
    /**
     * @var array
     */
    protected $categoryIds;

    /**
     * @param Post $post
     * @param array $categoryIds
     */
    public function __construct(Post $post, array $categoryIds) 
    {
        $this->post = $post;
        $this->categoryIds = $categoryIds;
    }
     
    /**
     * @throws Exception
     */
    public function execute()
    {
        $boundCategories = $this->post->getBoundCategories();
        
        $transaction = Yii::$app->db->beginTransaction();
        try {
            
            $this->removeRelationWithCategories(
                self::findCategoriesToRemoveFromRelations(
                    $boundCategories, $this->categoryIds
                )
            );

            $this->bindCategoriesWithPost(
                self::findCategoriesToBindRelations(
                    $boundCategories, $this->categoryIds
                )    
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
        $postId = $this->post->id;
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
        $boundCategoryIds = array_map(function($rowData) {
            return $rowData['id'];
        }, $boundCategories);
        
        Yii::$app->db->createCommand()->delete('posts_categories', [
            'post_id' => $this->post->id,
            'category_id' => $boundCategoryIds,
        ])->execute();
    }            
}

