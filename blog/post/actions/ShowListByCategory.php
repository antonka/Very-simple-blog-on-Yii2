<?php

namespace blog\post\actions;

use yii\data\ActiveDataProvider;
use blog\post\models\Post;
use blog\category\models\Category;
use yii\helpers\Url;

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
        $categoryModel = Category::findByUrlQueryParam('slug', 'slug');
        
        $query = Post::find(['category_id' => $categoryModel->id])
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
    
    /**
     * @param string $categorySlug
     * @return string
     */
    public function url($categorySlug)
    {
        return Url::toRoute(['post/showListByCategory', 'slug' => $categorySlug]);
    }
}
