<?php

namespace app\actions;

use Yii;
use app\components\PostManager;
use app\components\CategoryFinder;
use yii\web\HttpException;
use app\components\PostHelper;

/**
 * @author Anton Karamnov
 */
class SavePostCategoriesRelation extends \yii\base\Action
{
    /**
     * @throws HttpException
     */
    public function run()
    {
        $postManager = PostManager::buildWithFoundPostModelByHttpRequest();
        
        $selectedCategoryIds = array_keys(
            Yii::$app->request->post('categoryIds', [])
        );
        
        $allCategoryIds = CategoryFinder::getAllCategoryIds();
        if (count(array_intersect($selectedCategoryIds, $allCategoryIds))
            != count($selectedCategoryIds)
        ) {
            throw new HttpException(403, 'Invalid incoming data');
        }
         
        $postManager->savePostCategoriesRelations($selectedCategoryIds); 
        PostHelper::redirectToPostPage($postManager->getPostModel()->id);
    }
}

