<?php

namespace blog\post\actions;

use Yii;
use blog\category\Finder as CategoryFinder;
use yii\web\HttpException;
use blog\post\helpers\PostUrl;

/**
 * @author Anton Karamnov
 */
class SavePostCategoriesRelation extends \yii\base\Action
{
    /**
     * @retunr \yii\web\Response
     * @throws HttpException
     */
    public function run()
    {
        $relationSaver = \blog\post\PostCategoriesRelationSaver::buildWithFoundPostModelByHttpRequest();
        
        $selectedCategoryIds = array_keys(
            Yii::$app->request->post('categoryIds', [])
        );
        
        $allCategoryIds = CategoryFinder::getAllCategoryIds();
        if (count(array_intersect($selectedCategoryIds, $allCategoryIds))
            != count($selectedCategoryIds)
        ) {
            throw new HttpException(403, 'Invalid incoming data');
        }
         
        $relationSaver->savePostCategoriesRelations($selectedCategoryIds); 
        return $this->redirect(PostUrl::show($relationSaver->getModel()->id));
    }
}