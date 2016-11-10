<?php

namespace app\actions;

use app\components\CategoryFinder;
use app\components\PostHelper;

/**
 * @author Anton Karamnov
 */
class ShowPostsListByCategory extends \yii\base\Action
{
    public function run()
    {
        $categoryModel = CategoryFinder::findByHttpRequest();
        $postsListActiveDataProvider = PostHelper::getPostsListActiveDataProvider();
        $postsListActiveDataProvider->query->join(
            'inner join',
            'posts_categories AS rel',
            'rel.post_id = posts.id AND rel.category_id = :category_id',
            [':category_id' => $categoryModel->id]
        );
        
        return $this->controller->render('/posts_list/list_by_category', [
            'categoryName' => $categoryModel->name,
            'postsListActiveDataProvider' => $postsListActiveDataProvider,
        ]);
    }
}
