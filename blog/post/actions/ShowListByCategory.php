<?php

namespace blog\post\actions;

use blog\category\Finder as CategoryFinder;
use yii\data\ActiveDataProvider;
use blog\post\models\Post;

/**
 * @author Anton Karamnov
 */
class ShowListByCategory extends \blog\base\Action 
{
    /**
     * @return \yii\web\Response
     */
    public function run()
    {
        $categoryModel = CategoryFinder::findByHttpRequest();
  
        $query = Post::find()
            ->join(
                'inner join',
                'posts_categories AS rel',
                'rel.post_id = posts.id AND rel.category_id = :category_id',
                [':category_id' => $categoryModel->id]
            )
            ->orderBy('created_at DESC');
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
        ]);
        
        return $this->render('list/show_by_category', [
            'categoryName' => $categoryModel->name,
            'postsListActiveDataProvider' => $dataProvider,
        ]);
    }
}
