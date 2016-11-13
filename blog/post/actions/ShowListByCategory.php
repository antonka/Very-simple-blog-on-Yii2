<?php

namespace blog\post\actions;

use app\components\CategoryFinder;

/**
 * @author Anton Karamnov
 */
class ShowListByCategory extends \yii\base\Action
{
    public function run()
    {
        $categoryModel = CategoryFinder::findByHttpRequest();
        $postsListActiveDataProvider = \blog\post\Helper::getPostsListActiveDataProvider();
        $postsListActiveDataProvider->query->join(
            'inner join',
            'posts_categories AS rel',
            'rel.post_id = posts.id AND rel.category_id = :category_id',
            [':category_id' => $categoryModel->id]
        );
        
        return $this->controller->render(
            '@blog/post/views/list/show_by_category',
            [
                'categoryName' => $categoryModel->name,
                'postsListActiveDataProvider' => $postsListActiveDataProvider,
            ]
        );
    }
}
