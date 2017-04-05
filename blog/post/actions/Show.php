<?php

namespace blog\post\actions;

use blog\post\models\Post;

/**
 * @author Anton Karamnov
 */
class Show extends \blog\base\Action
{
    /**
     * @var Post; 
     */
    protected $post;
    
    public function run() 
    {
        $this->post = Post::findByUrlQueryParam('slug', 'slug');
        $category = $this->post->getCategory()->asArray()->one();
        
        return $this->render('show', [
            'post' => $this->post,
            'category' => $category,
        ]);
    }
    
    /**
     * @return Post
     */
    public function getPost()
    {
        return $this->post;
    }
}
