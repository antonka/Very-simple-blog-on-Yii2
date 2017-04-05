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
    protected $selectedCategoryIds;
    
    /**
     * @var array
     */
    protected $boundCategoryIds;
   
    /**
     * @param Post $post
     * @param array $selectedCategoryIds
     */
    public function __construct(Post $post, array $selectedCategoryIds) {
        $this->post = $post;
        $this->selectedCategoryIds = $selectedCategoryIds;
        $this->boundCategoryIds =  $this->post->getBoundCategoryIds();
    }
     
    /**
     * @throws Exception
     */
    public function execute()
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $this->bindRelation();
            $this->unbindRelation();
            $transaction->commit();
        }
        catch (Exception $e) {
            $transaction->rollBack();
            throw $e; 
        }
    }
    
    protected function bindRelation()
    {
        $boundCategoryIds = $this->boundCategoryIds;
        $categoryIds = array_diff(
            $this->selectedCategoryIds, $this->boundCategoryIds
        );
        
        if (!$categoryIds) {
            return;
        }
        
        $postId = $this->post->id;
        $data = array_map(function($categoryId) use ($postId) {
            return [$postId, $categoryId];
        }, $categoryIds);
        
        Yii::$app->db->createCommand()->batchInsert(
            'posts_categories', ['post_id', 'category_id'], $data
        )->execute();
        
        $this->boundCategoryIds = array_merge($boundCategoryIds, $categoryIds);
    }
    
    protected function unbindRelation()
    {   
        $categoryIds = array_diff(
            $this->boundCategoryIds, $this->selectedCategoryIds
        );
        
        if (!$categoryIds) {
            return;
        }
        
        Yii::$app->db->createCommand()->delete('posts_categories', [
            'post_id' => $this->post->id,
            'category_id' => $categoryIds,
        ])->execute();
    }            
}

